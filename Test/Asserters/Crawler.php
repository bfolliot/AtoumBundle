<?php

namespace atoum\AtoumBundle\Test\Asserters;

use mageekguy\atoum;
use mageekguy\atoum\asserter;
use mageekguy\atoum\asserters;

class Crawler extends asserters\object
{
    public function setWith($value, $checkType = false)
    {
        parent::setWith($value, $checkType);

        if (self::isCrawler($this->value) === false) {
            $this->fail(sprintf($this->getLocale()->_('%s is not a crawler'), $this));
        } else {
            $this->pass();
        }

        return $this;
    }

    public function hasElement($element)
    {
        $asserter = new Element($this->generator, $this);

        return $asserter->setWith($this->valueIsSet()->value->filter($element), $element);
    }

    protected static function isCrawler($value)
    {
        return ($value instanceof \Symfony\Component\DomCrawler\Crawler);
    }
}
