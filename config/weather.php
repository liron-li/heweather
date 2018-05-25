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