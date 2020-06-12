<?php

namespace App\twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;

class FunctionExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('json_decode', [$this, 'jsonDecode'])
        ];
    }

    public function jsonDecode(string $url)
    {
        $data = file_get_contents($url);

        return json_decode($data);
    }
}
