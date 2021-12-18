<?php

namespace App\Form;

use App\Entity\Sender;
use App\Entity\Package;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

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

            ->add('weight', TextType::class, [
                'label' => 'Poids'
            ])

            ->add(
                'status',
                ChoiceType::class,
                array(
                    'attr'  =>  array(
                        'class' => 'form-control',
                        'style' => 'margin:5px 0;'
                    ),
                    'choices' =>
                    array(
                        'En cours de livraison' => array(
                            'Yes' => 'En cours',
                        ),
                        'Livré' => array(
                            'Yes' => 'Livré'
                        ),
                    ),
                    'multiple' => true,
                    'required' => true,
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Package::class,
        ]);
    }
}
