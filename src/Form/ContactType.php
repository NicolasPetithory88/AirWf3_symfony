<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sujet', TextType::class, [
                'constraints' =>[new NotBlank(['message' => 'champ obligatoire']),
                new Length(['min' => '4', 'minMessage' => '{{ limit }} caracteres maximum'])],
                'label' => 'Sujet', 
                'required' => false, 
                'attr'=> ['placeholder' => 'Objet du message'],
                'help' => 'Texte d\'aide'])
            ->add('email', EmailType::class, [
                'constraints' =>[
                    new NotBlank(['message' => 'champ obligatoire'])
            ]])
            ->add('nom', TextType::class, [
                'constraints' =>[
                    new NotBlank(['message' => 'champ obligatoire']),
                    new Length(['max' => '10', 'maxMessage' => '{{ limit }} caracteres maximum'])
                ]
            ])
            ->add('message', TextareaType::class,[
                'constraints' =>[
                    new NotBlank(['message' => 'champ obligatoire']),
                    new Length(['max' => '10', 
                    'maxMessage' => '{{ limit }} caracteres maximum',
                    'min' => '5', 
                    'minMessage' => '{{ limit }} caracteres minimum'])
                ]
            ])
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
