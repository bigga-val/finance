<?php

namespace App\Form;

use App\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('nom_complet')
            //->add('numero_fiche')
            ->add('genre', ChoiceType::class, [
                'choices' => [
                    'Masculin' => 'M',
                    'Feminin' => 'F'
                ]
            ])
            ->add('lieu_naissance')
            ->add('date_naissance')
            //->add('is_abonne')
            ->add('nom')
            ->add('postnom')
            ->add('telephone')
            ->add('adresse')
            //->add('active')
            //->add('createdBy')
            ->add('save', SubmitType::class, ['label' => 'Ajouter Patient et Payer fiche'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
