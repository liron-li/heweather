<?php
namespace Liron\Heweather;

/**
 *
 * Class Weather
 * @package Liron\Heweather
 * @method forecast($params)
 * @method now($params)
 * @method hourly($params)
 * @method lifestyle($params)
 * @method weather($params)
 * @method gridMinute($params)
 * @method gridNow($params)
 * @method gridForecast($params)
 * @method gridHourly($params)
 * @method alarm($params)
 * @method alarmAll($params)
 * @method scenic($params)
 * @method airNow($params)
 * @method airForecast($params)
 * @method airHourly($params)
 * @method air($params)
 * @method historical($params)
 * @method solarSunriseSunset($params)
 * @method mapCloudmap($params)
 * @method solarSolarElevationAngle($params)
 */
class Weather extends Base
{
    public $api = [
        // 3-10天天气预报
        'forecast' => [
            'method' => 'get',
            'free' => 'https://free-api.heweather.com/s6/weather/forecast',
            'paying' => 'https://api.heweather.com/s6/weather/forecast'
        ],
        // 实况天气
        'now' => [
            'method' => 'get',
            'free' => 'https://free-api.heweather.com/s6/weather/now',
            'paying' => 'https://api.heweather.com/s6/weather/now'
        ],
        // 逐小时预报
        'hourly' => [
            'method' => 'get',
            'free' => 'https://free-api.heweather.com/s6/weather/hourly',
            'paying' => 'https://api.heweather.com/s6/weather/hourly'
        ],
        // 生活指数
        'lifestyle' => [
            'method' => 'get',
            'free' => 'https://free-api.heweather.com/s6/weather/lifestyle',
            'paying' => 'https://api.heweather.com/s6/weather/lifestyle'
        ],
        // 常规天气数据集合
        'weather' => [
            'method' => 'get',
            'free' => 'https://free-api.heweather.com/s6/weather',
            'paying' => 'https://api.heweather.com/s6/weather'
        ],
        // 分钟级降雨（邻近预报）
        'gridMinute' => [
            'method' => 'get',
            'free' => '',
            'paying' => 'https://api.heweather.com/s6/weather/grid-minute'
        ],
        // 格点实况天气
        'gridNow' => [
            'method' => 'get',
            'free' => '',
            'paying' => 'https://api.heweather.com/s6/weather/grid-now'
        ],
        // 格点7天预报
        'gridForecast' => [
            'method' => 'get',
            'free' => '',
            'paying' => 'https://api.heweather.com/s6/weather/grid-forecast'
        ],
        // 格点逐小时预报
        'gridHourly' => [
            'method' => 'get',
            'free' => '',
            'paying' => 'https://api.heweather.com/s6/weather/grid-hourly'
        ],
        // 分钟级降雨（邻近预报）
        'alarm' => [
            'method' => 'get',
            'free' => '',
            'paying' => 'https://api.heweather.com/s6/alarm'
        ],
        // 天气灾害预警集合
        'alarmAll' => [
            'method' => 'get',
            'free' => '',
            'paying' => 'https://api.heweather.com/s6/alarm'
        ],
        // 景点天气预报
        'scenic' => [
            'method' => 'get',
            'free' => '',
            'paying' => 'https://api.heweather.com/s6/scenic'
        ],
        // 空气质量实况
        'airNow' => [
            'method' => 'get',
            'free' => 'https://free-api.heweather.com/s6/air/now',
            'paying' => 'https://api.heweather.com/s6/air/now'
        ],
        // 空气质量7天预报
        'airForecast' => [
            'method' => 'get',
            'free' => '',
            'paying' => 'https://api.heweather.com/s6/air/forecast'
        ],
        // 空气质量逐小时预报
        'airHourly' => [
            'method' => 'get',
            'free' => 'https://free-api.heweather.com/s6/air/hourly',
            'paying' => 'https://api.heweather.com/s6/air/hourly'
        ],
        // 空气质量数据集合
        'air' => [
            'method' => 'get',
            'free' => 'https://free-api.heweather.com/s6/air',
            'paying' => 'https://api.heweather.com/s6/air'
        ],
        // 历史天气
        'historical' => [
            'method' => 'get',
            'free' => '',
            'paying' => 'https://api.heweather.com/s6/weather/historical'
        ],
        // 日出日落
        'solarSunriseSunset' => [
            'method' => 'get',
            'free' => 'https://free-api.heweather.com/s6/solar/sunrise-sunset',
            'paying' => 'https://api.heweather.com/s6/solar/sunrise-sunset'
        ],
        // 卫星云图
        'mapCloudmap' => [
            'method' => 'get',
            'free' => '',
            'paying' => 'https://api.heweather.com/s6/map/cloudmap'
        ],
        // 太阳高度
        'solarSolarElevationAngle' => [
            'method' => 'get',
            'free' => '',
            'paying' => 'https://api.heweather.com/s6/solar/solar-elevation-angle'
        ],
    ];

    /**
     * 城市搜索
     * @param $params
     * @return string
     */
    public function find($params)
    {
        $params['key'] = $this->key;
        return $this->get('https://search.heweather.com/find', $params);
    }

    /**
     * 热门城市列表
     * @param $params
     * @return string
     */
    public function top($params)
    {
        $params['key'] = $this->key;
        return $this->get('https://search.heweather.com/top', $params);
    }
}