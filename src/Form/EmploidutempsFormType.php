<?php

namespace App\Form;

use App\Entity\Emploidutemps;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EmploidutempsFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('jour', TextType::class, [
              'attr'=> array('class' => 'jour',
                              'name' => 'jour')
            ])
            ->add('mois', TextType::class, [
              'attr'=> array('class' => 'mois',
                              'name' => 'mois')
            ])
            ->add('annee', TextType::class, [
              'attr'=> array('class' => 'annee',
                              'name' => 'annee')
            ])
            ->add('data', TextType::class, [
              'attr'=> array('class' => 'data-input',
                              'name' => 'click')
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Emploidutemps::class,
        ]);
    }
}
