Victoire DCMS FAQ Bundle
============

## What is the purpose of this bundle

This bundles gives you access to the *FAQ Widget*.
This widget integrates Q & A with dropdown hidden answers.

## Set Up Victoire

If you haven't already, you can follow the steps to set up Victoire *[here](https://github.com/Victoire/victoire/blob/master/setup.md)*

## Install the bundle

    php composer.phar require friendsofvictoire/faq-widget

### Reminder

Do not forget to add the bundle in your AppKernel !

    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                ...
                new Victoire\Widget\FAQBundle\VictoireWidgetFAQBundle(),
            );

            return $bundles;
        }
    }
