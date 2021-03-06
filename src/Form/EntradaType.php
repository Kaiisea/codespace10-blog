<?php

namespace App\Form;

use App\Entity\Entrada;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class EntradaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titulo', TypeTextType::class, [
                'label' => 'Título',
                'required' => true,
                'constraint' => [
                    new NotBlank()
                ]
            ])
            ->add('estado', ChoiceType::class, [
                'choices' => [
                    'En elaboración' => 0,
                    'Publicada' => 1
                ]
            ])
            ->add('resumen', TextareaType::class, [
                'attr' => [
                    'rows' => 4,
                    'placeholder' => 'Escribe aqui el resumen'
                ]
            ])
            ->add('texto', TextareaType::class, [
                'attr' => ['class' => 'richeditor']
            ])
            ->add('categoria', EntityType::class, [
                'label' => 'Categoría',
                'class' => Categoria::class
            ])
            ->add('etiquetas', EntityType::class, [
                'label' => 'Seleccione las etiquetas vinculadas',
                'class' => Etiqueta::class,
                'multiple' => true,
                'expanded' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entrada::class,
        ]);
    }
}
