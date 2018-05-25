<?php

namespace Liron\Heweather;


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
