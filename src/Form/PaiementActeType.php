<?php

namespace App\Form;

use App\Entity\PaiementActe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\SubmitType; 
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PaiementActeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_paiement')
            ->add('active')
            // ->add('patient')
            // ->add('acte')
            // ->add('user')
            ->add('save', SubmitType::class, ['label'=>'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PaiementActe::class,
        ]);
    }
}
