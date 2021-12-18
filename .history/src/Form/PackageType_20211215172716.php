<?php

namespace App\Form;

use App\Entity\Sender;
use App\Entity\Package;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PackageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id', TextType::class, [
                'label' => 'Nom',
                'required' => false
            ])
            ->add('isAvailable', CheckboxType::class, [
                'label' => "Disponible ?"
            ])
            ->add('description')
            ->add('price')
            ->add('sender', EntityType::class, [
                'label' => 'Autheur',
                'class' => Sender::class,
                'choice_label' => 'lastname',
                'multiple' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Package::class,
        ]);
    }
}
