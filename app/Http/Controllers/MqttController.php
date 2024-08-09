<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\Exceptions\MqttClientException;

class MqttController extends Controller
{ 

    public function mq()
    {
        $server   = 'broker.uniolabs.com';  // Replace with your MQTT broker address
        $port     = 1883;                // Replace with your MQTT broker port
        $clientId = 'php-mqtt-client';   // Unique client ID
        $username = 'your-username';     // Replace with your MQTT username
        $password = 'your-password';     // Replace with your MQTT password

try {
    // Create a new MQTT client instance
    $mqtt = new MqttClient($server, $port, $clientId);

    // Connect to the MQTT broker
    $mqtt->connect($username, $password);

    // Subscribe to a topic
    $mqtt->subscribe('test/topic', function (string $topic, string $message, bool $retained) {
        echo sprintf("Received message on topic [%s]: %s\n", $topic, $message);
    }, 0);

    // Publish a message to a topic
    $mqtt->publish('test/topic', 'Hello MQTT', 0);

    // Loop to keep the script running and listening for messages
    $mqtt->loop(true);

    // Disconnect from the broker (this line will never be reached in this example)
    $mqtt->disconnect();

} catch (MqttClientException $e) {
    echo sprintf("An error occurred: %s\n", $e->getMessage());
}
    }


}
