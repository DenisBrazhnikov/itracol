<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('markdown', [$this, 'markdown']),
        ];
    }

    public function markdown($text = '')
    {
        return \Parsedown::instance()
            ->setBreaksEnabled(true)
            ->text($text);
    }
}