<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Favorite
{
    /**
     * @Assert\Url()
     * @Assert\NotBlank()
     */
    private $link;

    /**
     * @Assert\NotBlank()
     */
    private $quote;

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link): void
    {
        $this->link = $link;
    }

    /**
     * @return mixed
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param mixed $quote
     */
    public function setQuote($quote): void
    {
        $this->quote = $quote;
    }
}
