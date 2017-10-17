<?php

namespace AppBundle\Form;

use AppBundle\Entity\Word;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class WordType
 *
 * @package AppBundle\Form
 */
class WordType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('word', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'example'
                ],
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => [
                    'class' => 'js-datepicker form-control',
                ],
                'required' => false,
            ])
            ->add('pronunciation', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('definitions', CollectionType::class, [
                'entry_type' => DefinitionType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Word::class,
        ]);
    }
}
