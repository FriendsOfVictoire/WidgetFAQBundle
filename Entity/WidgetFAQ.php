<?php

namespace Victoire\Widget\FAQBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Widget\ListingBundle\Entity\WidgetListing;

/**
 * ThemeList FAQ.
 *
 * @ORM\Table("vic_widget_faq")
 * @ORM\Entity
 */
class WidgetFAQ extends WidgetListing
{
    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="WidgetFAQItem", mappedBy="faq", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\OrderBy({"position" = "ASC"})
     */
    protected $faqItems;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->faqItems = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set faqItems.
     *
     * @param array $faqItems
     *
     * @return WidgetListing
     */
    public function setFAQItems($faqItems)
    {
        foreach ($faqItems as $faqItem) {
            $faqItem->setFAQ($this);
        }
        $this->faqItems = $faqItems;

        return $this;
    }

    /**
     * Add faqItems.
     *
     * @param \Victoire\Widget\ListingBundle\Entity\WidgetListingItem $faqItems
     *
     * @return WidgetListing
     */
    public function addFAQItem(WidgetFAQItem $faqItem)
    {
        $faqItem->setFAQ($this);
        $this->faqItems[] = $faqItem;

        return $this;
    }

    /**
     * Remove faqItems.
     *
     * @param \Victoire\Widget\ListingBundle\Entity\WidgetListingItem $faqItems
     */
    public function removeFAQItem(WidgetFAQItem $faqItems)
    {
        //set item as orphan
        $faqItems->setFAQ(null);

        $this->faqItems->removeElement($faqItems);
    }

    /**
     * Get faqItems.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFAQItems()
    {
        return $this->faqItems;
    }
}
