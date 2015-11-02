<?php

namespace Victoire\Widget\FAQBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Widget\ListingBundle\Entity\WidgetListingItem;

/**
 * WidgetFAQItem.
 *
 * @ORM\Table("vic_widget_faq_item")
 * @ORM\Entity
 */
class WidgetFAQItem extends WidgetListingItem
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="answer", type="text")
     */
    protected $answer;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="WidgetFAQ", inversedBy="faqItems")
     * @ORM\JoinColumn(name="faq_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $faq;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get question.
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->title;
    }

    /**
     * Set answer.
     *
     * @param string $answer
     *
     * @return WidgetFAQItem
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer.
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set faq.
     *
     * @param \Victoire\Widget\FAQBundle\Entity\WidgetFAQ $faq
     *
     * @return WidgetFAQItem
     */
    public function setFAQ(\Victoire\Widget\FAQBundle\Entity\WidgetFAQ $faq = null)
    {
        $this->faq = $faq;

        return $this;
    }

    /**
     * Get faq.
     *
     * @return \Victoire\Widget\FAQBundle\Entity\WidgetFAQ
     */
    public function getFAQ()
    {
        return $this->faq;
    }
}
