<?php

namespace AppBundle\Form;

use AppBundle\Entity\Definition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

/**
 * Class DefinitionType
 *
 * @package AppBundle\Form
 */
class DefinitionType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('speechPart', TextType::class, [
                'label' => 'Speech Part',
                'label_attr' => [
                    'class' => 'control-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('text', TextareaType::class, [
                'label_attr' => [
                    'class' => 'control-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'rows' => 5,
                ],
            ]);
    }

    /**
     * @inheritDoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Definition::class,
        ]);
    }
}
