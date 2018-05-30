<?php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class CustomDateTime extends AbstractExtension
{
    public function getFilters()
    {
        return array(
            new TwigFilter('customDateTime', array($this, 'customDateTimeFilter')),
        );
    }

    public function customDateTimeFilter()
    {
        $customDateTime = date("d M Y H:i:s");
        return $customDateTime;
    }
}