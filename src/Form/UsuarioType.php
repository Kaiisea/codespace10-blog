<?php

namespace App\Form;

use App\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Usuario normal' => 'ROLE_USER',
                    'Administrador' => 'ROLE_ADMIN',
                    'Superadministrador' => 'ROLE_SUPERADMIN'
                ],
                'multiple' => true,
                'expanded' => true
            ])
            ->add('password', PasswordType::class, [
                
            ])
            ->add('nombre')
            ->add('perfil')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
        ]);
    }
}
