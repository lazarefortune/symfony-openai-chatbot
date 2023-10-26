<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HistoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('theme', TextareaType::class, [
                'label' => 'Dites moi tout',
                'attr' => [
                    'placeholder' => 'ex: Explique moi la nécromancie',
                    'rows' => 1,
                ],
                'required' => true,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Demander à tonton GPT',
                'attr' => [
                    'hx-post' => '/',
                    'hx-target' => '#history',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
