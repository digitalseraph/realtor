<?php

namespace DigitalSeraph\Pages\Facade;

use DigitalSeraph\Pages\Pages;
use Illuminate\Support\Facades\Facade;

class Pages extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Pages::class;
    }
}
