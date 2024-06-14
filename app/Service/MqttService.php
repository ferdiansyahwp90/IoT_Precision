<?php

namespace App\Service;

use Bluerhinos\phpMQTT;

class MqttService
{
    protected $mqtt;

    public function __construct()
    {
        $host = env('MQTT_HOST', 'broker.mqtt-dashboard.com');
        $port = env('MQTT_PORT', 1883);
        $username = env('MQTT_USERNAME', 'iot_precission');
        $password = env('MQTT_PASSWORD', 'IoT_Precission1');
        $clientId = env('MQTT_CLIENT_ID', 'LaravelPublisher');

        $this->mqtt = new phpMQTT($host, $port, $clientId);

        if (!$this->mqtt->connect(true, NULL, $username, $password)) {
            throw new \Exception('Could not connect to MQTT broker');
        }
    }

    public function publish($topic, $message)
    {
        $this->mqtt->publish($topic, $message, 0);
        $this->mqtt->close();
    }
}
