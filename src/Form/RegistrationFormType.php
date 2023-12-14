<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomUser', TextType::class, ['empty_data' => '',
                'constraints' => [
                    new Length([
                            'max' => 128,
                            'maxMessage' => 'Votre nom doit faire au maximum {{ limit }} caractères']
                    ), ]])
            ->add('pnomUser', TextType::class, ['empty_data' => '',
                'constraints' => [
                new Length([
                        'max' => 128,
                        'maxMessage' => 'Votre prénom doit faire au maximum {{ limit }} caractères']
                ), ]])
            ->add('phoneUser', TelType::class, ['empty_data' => '',
                'constraints' => [
                    new Length([
                            'min' => 10,
                            'minMessage' => 'Votre numéro de téléphone est trop court, il doit faire au minimum {{ limit }} caractères',
                            'max' => 30,
                            'maxMessage' => 'Votre numéro de téléphone doit faire au maximum {{ limit }} caractères']
                    ), ]])
            ->add('email', EmailType::class, ['empty_data' => '',
                'constraints' => [
                new Length([
                    'max' => 180,
                    'maxMessage' => 'Votre email doit faire au maximum {{ limit }} caractères']
                ), ],
            ])
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit faire au minimum {{ limit }} caractères',
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
