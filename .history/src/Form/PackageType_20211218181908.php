<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Locker;
use App\Entity\Hub;
use App\Entity\Customer;
use App\Entity\Sender;
use App\Entity\Package;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class PackageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('customer', EntityType::class, [
                'class' => Customer::class,
                'choice_label' => 'name',
            ])

            ->add('locker', EntityType::class, [
                'class' => Locker::class,
                'choice_label' => 'id',
            ])

            ->add('hub', EntityType::class, [
                // looks for choices from this entity
                'class' => Hub::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'id',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])

            ->add('sender', EntityType::class, [
                // looks for choices from this entity
                'class' => Sender::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'name',

                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            ])

            // ->add('customer', EntityType::class, [
            //     'class' => "App\Entity\Customer",
            //     'choice_label' => 'id',
            //     'multiple' => true,
            //     'expanded' => true,
            // ])

            ->add('weight', IntegerType::class, [
                'label' => 'Poids'
            ])


            // ->add('sender', IntegerType::class, [
            //     'label' => "Id de l'expéditeur"
            // ])

            // ->add('locker', IntegerType::class, [
            //     'label' => 'Id du casier'
            // ])

            // ->add('hub', IntegerType::class, [
            //     'label' => 'Id du point relais'
            // ])

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
