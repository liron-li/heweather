# liron-li/heweather
和风天气sdk 官方api文档：[https://www.heweather.com/documents/api/s6](https://www.heweather.com/documents/api/s6)

# 安装
```
composer require liron-li/heweather
```
# 使用
```
// 用户名和秘钥通过登录“和风天气”官网获取
$weather = new \Liron\Heweather\Weather(
    'xxxx', // 用户名
    'xxx', // 秘钥
    false // 是否为付费用户, 默认为false
);


/**
 * 请求示例
 */
// 获取3-10天天气预报 （传参时候可以省去 username、t、sign、key 字段，请求时会自动补全）
$res = $weather->forecast([
    'location' => 'auto_ip',
]);


print_r($res); // api response

```
# 在Laravel中使用

### 1.安装
```
composer require liron-li/heweather
```
### 4.注册服务提供者
**注意：** laravel5.5及以上版本可以跳过此步骤
#### 编辑config/app.php
```
// 在 providers 数组中加入
'providers' => [
    // ...
    Liron\Heweather\ServiceProvider::class
    // ...
]
// 在 aliases 数组中加入
'aliases' => [
    // ...
    'Weather' => Liron\Heweather\Facade::class
    // ...
]
```

### 2.发布配置文件
```
php artisan vendor:publish --provider=Liron\Heweather\ServiceProvider
```
### 3.修改config/weather.php配置
```
<?php
/**
 * 和风天气配置
 */
return [
    // 是否为付费用户
    'paying'    => env('HEWEATHER_PAYING', false),
    // 用户名
    'username'  => env('HEWEATHER_USERNAME', ''),
    // 秘钥
    'key'       => env('HEWEATHER_KEY', ''),
];
```
### 使用示例
```
// 可直接使用 Weather facade类
$res = \Weather::forecast([
    'location' => 'auto_ip'
])

```
# API列表
- Weather
    - forecast (3-10天天气预报)
    - now (实况天气)
    - hourly (逐小时预报)
    - lifestyle (生活指数)
    - weather (常规天气数据集合)
    - gridMinute (分钟级降雨（邻近预报）)
    - gridNow (格点实况天气)
    - gridForecast (格点7天预报)
    - gridHourly (格点逐小时预报)
    - alarm (分钟级降雨（邻近预报）)
    - alarmAll (天气灾害预警集合)
    - scenic (景点天气预报)
    - airNow (空气质量实况)
    - airForecast (空气质量7天预报)
    - airHourly (空气质量逐小时预报)
    - air (空气质量数据集合)
    - historical (历史天气)
    - solarSunriseSunset (日出日落)
    - mapCloudmap (卫星云图)
    - solarSolarElevationAngle (太阳高度)
    - find (城市搜索)
    - top (热门城市列表)