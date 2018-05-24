<?php namespace Barryvdh\Debugbar;

use Liron\Heweather\Weather;

class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'weather';
    }
}
