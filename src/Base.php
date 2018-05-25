<?php

namespace Liron\Heweather;


use GuzzleHttp\Client;
use Illuminate\Support\Arr;

class Base
{

    public $http;

    public $options;
    /**
     * 是否为付费用户
     * @var bool
     */
    public $paying = false;

    public $api = [];
    /**
     * 是否签名
     * @var bool
     */
    public $signing = true;

    protected $username;
    /**
     * 加密key
     * @var
     */
    protected $key;

    /**
     * Base constructor.
     * @param $username
     * @param $key
     */
    public function __construct($username, $key)
    {
        $this->http = new Client();
        $this->username = $username;
        $this->key = $key;
    }

    /**
     * 是否为付费用户
     * @param bool $paying
     * @return $this
     */
    public function paying($paying = false)
    {
        $this->paying = $paying;
        return $this;
    }

    /**
     * 是否使用签名
     * @param bool $signing
     * @return $this
     */
    public function signing($signing = true)
    {
        $this->signing = $signing;
        return $this;
    }

    /**
     * setHttpOptions
     * @param $options
     * @return $this
     */
    public function setHttpOptions($options)
    {
        $this->options = $options;
        return $this;
    }
    /**
     * 和风天气签名生成算法-PHP版本
     * @param array $params API调用的请求参数集合的关联数组（全部需要传递的参数组成的数组），不包含sign参数
     * @return string 返回参数签名值
     */
    public function getSignature($params) {
        $str = '';  //待签名字符串
        //先将参数以其参数名的字典序升序进行排序
        array_filter($params);
        $params = Arr::except($params, ['sign', 'key']);
        ksort($params);
        //遍历排序后的参数数组中的每一个key/value对
        foreach($params as $k => $v){
            $str .= $k . '=' . $v . '&';
        }
        $str = substr($str,0,strlen($str)-1);
        //将签名密钥拼接到签名字符串最后面
        $str .= $this->key;
        //通过md5算法为签名字符串生成一个md5签名，该签名就是我们要追加的sign参数值
        return base64_encode(md5($str, true));
    }

    /**
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $parameters = Arr::get($parameters, 0);
        if ($this->signing) {
            $parameters['t'] = time();
            $parameters['username'] = $this->username;
            $parameters['sign'] = $this->getSignature($parameters);
        }
        $url = $this->getApiUrl($method);
        return $this->{$this->getMethod($method)}($url, $parameters);
    }

    /**
     * @param $url
     * @param $parameters
     * @return string
     */
    public function get($url, $parameters)
    {
        $url .= '?' . http_build_query($parameters);
        $response = $this->http->get($url, $this->options)->getBody()->getContents();
        return $this->ret($response);
    }

    /**
     * 获取请求方式
     * @param $method
     * @return mixed
     */
    protected function getMethod($method)
    {
        return Arr::get($this->api, "{$method}.method", 'get');
    }
    /**
     * 获取api url
     * @param $method
     * @return mixed
     */
    protected function getApiUrl($method)
    {
        $slug = $this->paying ? 'paying' : 'free';
        $key = $method . '.' . $slug;
        return Arr::get($this->api, $key);
    }

    /**
     * return response
     * @param $response
     * @return mixed
     */
    public function ret($response)
    {
        return json_decode($response, true);
    }
}
