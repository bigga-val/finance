<?php

namespace App\Form;

use App\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero_fiche')
            ->add('genre')
            ->add('lieu_naissance')
            ->add('date_naissance')
            ->add('is_abonne')
            ->add('nom')
            ->add('postnom')
            ->add('active')
            ->add('telephone')
            ->add('adresse')
            ->add('created_at')
            ->add('createdBy')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
