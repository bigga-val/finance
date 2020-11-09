<?php

namespace App\Form;

use App\Entity\Cabinet;
use App\Entity\Service;
use App\Entity\SignesVitaux;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

class SignesVitauxType extends AbstractType
{
    private $user;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->user = $tokenStorage->getToken()->getUser();
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tension_arterielle')
            ->add('poids')
            ->add('temperature')
            ->add('created_at', HiddenType::class)
            ->add('active', HiddenType::class, [
                'data'=>true
            ])
            ->add('cabinet', EntityType::class, [
                'class'=>Cabinet::class,
                'choice_label'=>'designation'
            ])
            ->add('created_by', HiddenType::class, [

            ])
            ->add('save', SubmitType::class, ['label'=>'Enregistrer', 'attr'=>['class'=>'btn btn-primary mt-3']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SignesVitaux::class,

        ]);
    }
}
