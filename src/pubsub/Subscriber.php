<?php
/**
 * Created by PhpStorm.
 * User: Jenner
 * Date: 2016/3/19
 * Time: 10:10
 */

namespace jenner\redis\study\pubsub;


use jenner\redis\study\tool\Logger;

class Subscriber
{
    protected $redis;

    const KEY = "pubsub-demo";

    public function __construct()
    {
        $this->redis = new \Redis();
        $this->redis->connect("127.0.0.1", 6379);
        $this->redis->select(4);
    }

    public function subscribe() {
            $this->redis->subscribe(self::KEY, function($redis, $channel, $message) {
                Logger::info("get message[" . $message ."] from channel[" . $channel . "]");
            });
    }
}