<?php
namespace Liron\Heweather;

/**
 *
 * Class Weather
 * @package Liron\Heweather
 * @method forecast($params)
 * @method now($params)
 */
class Weather extends Base
{
    public $api = [
        'forecast' => [
            'method' => 'get',
            'free' => 'https://free-api.heweather.com/s6/weather/forecast',
            'paying' => 'https://api.heweather.com/s6/weather/forecast'
        ],
        'now' => [
            'method' => 'get',
            'free' => 'https://free-api.heweather.com/s6/weather/now',
            'paying' => 'https://api.heweather.com/s6/weather/now'
        ]
    ];
}