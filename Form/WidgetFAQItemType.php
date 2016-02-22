<?php

namespace Victoire\Widget\FAQBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Widget\ListingBundle\Form\WidgetListingItemType;

/**
 * WidgetFAQ form type.
 */
class WidgetFAQItemType extends WidgetListingItemType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     *
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('title', null, [
                'label' => 'form.listing.FAQ.question.label',
                'required' => true,
            ])
            ->add('answer', TextareaType::class, [
                'label' => 'form.listing.FAQ.answer.label',
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\FAQBundle\Entity\WidgetFAQItem',
            'widget'             => null,
            'translation_domain' => 'victoire',
        ]);
    }
}