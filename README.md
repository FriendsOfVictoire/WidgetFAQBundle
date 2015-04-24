Victoire FAQ Bundle
============

Need to add a frequent asked questions in a victoire website ?
Get this listing bundle and so on

First you need to have a valid Symfony2 Victoire edition.
Then you just have to run the following composer command :

    php composer.phar require friendsofvictoire/faq-widget

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
