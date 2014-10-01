<?php

namespace Victoire\Widget\FAQBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Widget\ListingBundle\Form\WidgetListingItemType;

/**
 * WidgetFAQ form type
 */
class WidgetFAQItemType extends WidgetListingItemType
{
    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('title', null, array(
                'label' => 'form.listing.FAQ.question.label',
                'required' => true))
            ->add('answer', 'textarea', array(
                'label' => 'form.listing.FAQ.answer.label'));
    }

    /**
     * bind form to WidgetFAQ entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\FAQBundle\Entity\WidgetFAQItem',
            'widget'             => null,
            'translation_domain' => 'victoire'
        ));
    }

    /**
     * get form name
     *
     * @return string The form name
     */
    public function getName()
    {
        return 'victoire_widget_form_faqitem';
    }
}
