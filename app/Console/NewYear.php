<?php

namespace App\Console;

use Illuminate\Support\Collection;

class NewYear
{
    /**
     * Have a nice 2021
     *
     * @return string
     */
    public static function quote()
    {
        return Collection::make([
            'HAPPY NEW YEAR!',
            'May this year treat you with more laravel',
            'happi happi happi new year!'
        ])->random();
    }
}
