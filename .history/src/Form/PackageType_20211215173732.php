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

            ->add('status', TextType::class, [
                'label' => 'Nom'
            ])

            ->add(
                'roles',
                ChoiceType::class,
                array(
                    'attr'  =>  array(
                        'class' => 'form-control',
                        'style' => 'margin:5px 0;'
                    ),
                    'choices' =>
                    array(
                        'ROLE_SENDER' => array(
                            'Yes' => 'ROLE_SENDER',
                        ),
                        'ROLE_HUB' => array(
                            'Yes' => 'ROLE_HUB'
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
