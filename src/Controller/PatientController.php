<?php

namespace App\Controller;

use App\Entity\Abonnement;
use App\Entity\Acte;
use App\Entity\PaiementActe;
use App\Form\AbonneType;
use App\Form\PatientType;
use Doctrine\ORM\EntityManagerInterface;

use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Patient;

class PatientController extends AbstractController
{
    /**
     * @Route("/patient", name="patient")
     */
    public function index(): Response
    {
        $patients = $this->getDoctrine()->getRepository(Patient::class)
            ->findBy([
                'active'=>true
            ], [
                'created_at' => 'DESC'
            ]);
        
        return $this->render('patient/index.html.twig', [
            'controller_name' => 'PatientController',
            'patients' => $patients
        ]);
    }



    /**
     * @Route("/patient/new", name="new_patient")
     */
    public function new_patient(EntityManagerInterface $manager, Request $request)
    {
        $patient = new Patient();
        $abonnement = new Abonnement();
        $abonne = $this->createForm(AbonneType::class, $abonnement);
        $form = $this->createForm(PatientType::class, $patient);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if($request->request->count() > 0){
                if(!$form["is_abonne"]->getData()){
                    $patients = $form->getData();
                    $random = 0;
                    if(!function_exists('random_int')){
                        $random = random_int(1, 5000);
                    }
                    $fiche = 'M-'.$random.$form["nom"]->getData()[0].$form["postnom"]->getData()[0];
                    $patient->setNumeroFiche($fiche);
                    //$patient->setNom($form["nom"]->getData());
                    $patient->setNom($request->request->get('nom'));

                    //$patient->setPostnom($form["postnom"]->getData());
                    $patient->setPostnom($request->request->get('postnom'));
                    //$patient->setLieuNaissance($form["lieu_naissance"]->getData());
                    $patient->setLieuNaissance($request->request('lieu_naissance'));
                    //$patient->setDateNaissance($form["date_naissance"]->getData());
                    $patient->setDateNaissance($request->request->get('date_naissance'));
                    //$patient->setTelephone($form["telephone"]->getData());
                    $patient->setTelephone($request->request->get('telephone'));
                    //$patient->setAdresse($form["adresse"]->getData());
                    $patient->setAdresse($request->request->get('adresse'));
                    //$patient->setGenre($form["genre"]->getData());
                    $patient->setGenre($request->request->get('genre'));
                    //$patient->setCreatedBy($this->getUser());
                    $patient->setCreatedBy($request->request->get('created_by'));
                    //$patient->setIsAbonne($form["is_abonne"]->getData());
                    $patient->setIsAbonne($request->request->get('is_abonne'));
                    //$patient->setActive(true);
                    $patient->setActive($request->request->get('active'));
                    $patient-> setCreatedAt(new \Datetime('now'));
                    $manager->persist($patient);
                    $manager->flush();
                }else{
                    $patients = $form->getData();
                    $random = 0;

                    $fiche = 'M-'.$random.$form["nom"]->getData()[0].$form["postnom"]->getData()[0];
                    $patient->setNumeroFiche($fiche);
                    $patient->setNom($form["nom"]->getData());
                    $patient->setPostnom($form["postnom"]->getData());
                    $patient->setLieuNaissance($form["lieu_naissance"]->getData());
                    $patient->setDateNaissance($form["date_naissance"]->getData());
                    $patient->setTelephone($form["telephone"]->getData());
                    $patient->setAdresse($form["adresse"]->getData());
                    $patient->setGenre($form["genre"]->getData());
                    $patient->setCreatedBy($this->getUser());
                    $patient->setIsAbonne($form["is_abonne"]->getData());
                    $patient->setActive(true);
                    $patient-> setCreatedAt(new \Datetime('now'));
                    $manager->persist($patient);

                    //$abonnement->setMatricule($form["matricule"]->getData());
                    $abonnement->setMatricule($request->request->get('matricule'));
                    $abonnement->setNom($abonne["nom"]->getData());
                    $abonnement->setPostnom($abonne["postnom"]->getData());
                    $abonnement->setTelephone($abonne["telephone"]->getData());
                    $abonnement->setProfession($abonne["profession"]->getData());
                    $abonnement->setGenre($abonne["genre"]->getData());
                    $abonnement->setSociete($abonne["societe"]->getData());
                    $abonnement->setActive(true);
                    $manager->persist($abonnement);



                    $manager->flush();
                }
            }


            return $this->redirectToRoute('patient');
        }
        return $this->render('patient/new_patient.html.twig',[
            'form' => $form->createView(),
            'abonne' => $abonne-> createView(),
        ]);
    }

    /**
     * @Route("/patients/new", name="new_patients")
     */
    public function new_patients(EntityManagerInterface $entityManager, Request $request){
        if($request->isMethod('POST')){
            $data = $request->request->all();
            if($this->isCsrfTokenValid('new_patient', $data['_token'])){
                $patient = new Patient();
                $r = !empty($data['nom_patient'])?$data['nom_patient'][0]:'r';
                $l = !empty($data['postnom_patient'])?$data['postnom_patient'][0]:'l';
                if(!isset($data['numero_bon']) || !isset($data['is_abonne'])){
                    $patient->setTelephone($data['telephone_patient'])
                        ->setActive(true)
                        ->setIsAbonne(false)
                        ->setCreatedBy($this->getUser())
                        ->setCreatedAt(new \DateTime('now'))
                        ->setGenre($data['genre'])
                        ->setAdresse($data['adresse_patient'])
                        ->setLieuNaissance($data['lieu_naissance'])
                        ->setDateNaissance(new \DateTime($data['date_naissance']))
                        ->setNom($data['nom_patient'])
                        ->setPostnom($data['postnom_patient'])
                        ->setNumeroFiche('M-'.$r.$l.random_int(0, 5000));
                    $entityManager->persist($patient);
                    // paiement fiche
                    $fiche = $this->getDoctrine()->getRepository(Acte::class)
                        ->findActeFiche();

                    $paiement = new PaiementActe();
                    $paiement->setActe($fiche);
                    $paiement->setUser($this->getUser());
                    $paiement->setActive(true);
                    $paiement->setPatient($patient);
                    $paiement->setDatePaiement(new \DateTime('now'));
                    $entityManager->persist($paiement);

                    $entityManager->flush();
                    $this->addFlash(
                        'succes', 'Patient enregistré avec succès'
                    );
                    return $this->redirectToRoute('patient');
                }elseif (isset($data['numero_bon']) || isset($data['is_abonne'])){
                    //informations du patient abonne
                    $patient->setTelephone($data['telephone_patient'])
                        ->setActive(true)
                        ->setIsAbonne(true)
                        ->setCreatedBy($this->getUser())
                        ->setCreatedAt(new \DateTime('now'))
                        ->setGenre($data['genre'])
                        ->setAdresse($data['adresse_patient'])
                        ->setLieuNaissance($data['lieu_naissance'])
                        ->setDateNaissance(new \DateTime($data['date_naissance']))
                        ->setNom($data['nom_patient'])
                        ->setPostnom($data['postnom_patient'])
                        ->setNumeroFiche('M-'.$r.$l.random_int(0, 5000));
                    $entityManager->persist($patient);

                    //informations du bon d'abonne
                    $abonnement = new Abonnement();
                    $abonnement->setNumeroBon($data['numero_bon'])
                        ->setNomComplet($data['nom_agent'])
                        ->setMatricule($data['matricule_bon'])
                        ->setCreatedBy($this->getUser())
                        ->setCreatedAt(new \DateTime('now'))
                        ->setActive(true)
                        ->setSociete($data['nom_societe'])
                        ->setPatient($patient);
                    $entityManager->persist($abonnement);

                    // paiement fiche
                    $fiche = $this->getDoctrine()->getRepository(Acte::class)
                        ->findActeFiche();
                    $paiement = new PaiementActe();
                    $paiement->setActe($fiche);
                    $paiement->setUser($this->getUser());
                    $paiement->setActive(true);
                    $paiement->setPatient($patient);
                    $paiement->setDatePaiement(new \DateTime('now'));
                    $entityManager->persist($paiement);

                    $entityManager->flush();
                    $this->addFlash(
                        'succes', 'Patient enregistré avec succès'
                    );
                    return $this->redirectToRoute('patient');
                }else{
                    echo "rien";
                }

            }
        }
        return $this->render("patient/new.html.twig");
    }
}
