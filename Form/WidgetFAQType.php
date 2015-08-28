<?php

namespace Victoire\Widget\FAQBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Widget\ListingBundle\Form\WidgetListingType;

/**
 * WidgetFAQ form type
 */
class WidgetFAQType extends WidgetListingType
{
    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $businessEntityId = $options['businessEntityId'];
        $namespace = $options['namespace'];
        $mode = $options['mode'];

        //if no entity is given, we generate the static form
        $builder->add('faqItems', 'collection', array(
                    'type'         => new WidgetFAQItemType(),
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'options'      => array(
                        'namespace'  => $namespace,
                        'businessEntityId' => $businessEntityId,
                        'mode'       => $mode
                    ),
                    "attr"         => array('id' => 'static')
                ));

        //add the mode to the form
        $builder->add('mode', 'hidden', array(
            'data' => $mode
        ));

        //add the slot to the form
        $builder->add('slot', 'hidden', array());

    }

    /**
     * bind form to WidgetFAQ entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\FAQBundle\Entity\WidgetFAQ',
            'widget'             => 'FAQ',
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
        return 'victoire_widget_form_faq';
    }
}
