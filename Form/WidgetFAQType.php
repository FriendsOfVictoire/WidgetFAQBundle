<?php

namespace Victoire\Widget\FAQBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Widget\ListingBundle\Form\WidgetListingType;

/**
 * WidgetFAQ form type.
 */
class WidgetFAQType extends WidgetListingType
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
        //if no entity is given, we generate the static form
        $builder->add('faqItems', CollectionType::class, [
                    'entry_type'   => WidgetFAQItemType::class,
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'attr'         => ['id' => 'static'],
                    'options'      => [
                        'namespace'        => $options['namespace'],
                        'businessEntityId' => $options['businessEntityId'],
                        'mode'             => $options['mode'],
                    ],
                ]);

        //add the mode to the form
        $builder->add('mode', HiddenType::class, [
            'data' => $options['mode'],
        ]);

        //add the slot to the form
        $builder->add('slot', HiddenType::class, []);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\FAQBundle\Entity\WidgetFAQ',
            'widget'             => 'FAQ',
            'translation_domain' => 'victoire',
        ]);
    }
}
