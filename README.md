# MigratoryData Client for ReactPHP 5.x & 6.x #

Below you can find a tutorial and usage example. For more information please refer to 
[MigratoryData Documentation 5.x](https://migratorydata.com/documentation/5.x/api/client/desktop-apps/reactphp/html/index.html).
[MigratoryData Documentation 6.x](https://migratorydata.com/documentation/6.x/api/enterprise/reactphp/index.html).

## Usage ##
Install the MigratoryData client library 5.x using composer:
```console
$ composer require migratorydata/migratorydata-client-reactphp:5.*
```

Install the MigratoryData client library 6.x using composer:
```console
$ composer require migratorydata/migratorydata-client-reactphp:6.*
```

Import classes and define MigratoryData callback listener:

```php
require __DIR__ . '/vendor/autoload.php';

use MigratoryData\Client\MigratoryDataClient;
use MigratoryData\Client\MigratoryDataMessage;
use MigratoryData\Client\MigratoryDataListener;

class MyListener implements MigratoryDataListener
{
    public function onMessage($message)
    {
        echo "Got message: " . $message . "\n";
    }

    public function onStatus($status, $info)
    {
        echo "Got status: " . $status . " - " . $info . "\n";
    }
}
```

Create the event loop:

```php
$loop = \React\EventLoop\Factory::create();
```

Create a MigratoryData client and attach the event loop:

```php
$client = new MigratoryDataClient(); 
$client->setLoop($loop);
```

Initialize and connect the MigratoryData client:

```php    
$client->setEntitlementToken("some-token");
$client->setServers(array("http://127.0.0.1:8800"));

$client->subscribe(array("/server/status"));

$client->connect();
```
 
Publish a message every second to MigratoryData server:
 
```php
$loop->addPeriodicTimer(1, function () use ($client) {
    try {
        $client->publish(new MigratoryDataMessage("/server/status", "Msg " . time(), "closure-" . time()));
    } catch (MigratoryDataException $e) {
        echo($e->getDetail());
        echo($e->getCause());
    }
});
```

Start the event loop:

```php
$loop->run();
```

## Example client application ##

Copy the code below to a file named `echo-time-client.php` and run it using the following command:

```console  
$ php echo-time-client.php
```

Example for PHP React Client API
The client application connects to the MigratoryData server deployed at `localhost:8800` subscribes and publishes a message every second on the subject `/server/status`.

```php
<?php

require __DIR__ . '/vendor/autoload.php';

use MigratoryData\Client\MigratoryDataClient;
use MigratoryData\Client\MigratoryDataException;
use MigratoryData\Client\MigratoryDataMessage;
use MigratoryData\Client\MigratoryDataListener;

class MyListener implements MigratoryDataListener
{
    public function onMessage($message)
    {
        echo "Got message: " . $message . "\n";
    }

    public function onStatus($status, $info)
    {
        echo "Got status: " . $status . " - " . $info . "\n";
    }
}

$loop = \React\EventLoop\Factory::create();

$client = new MigratoryDataClient();
$client->setEntitlementToken("some-token");
$client->setLoop($loop);
$client->setListener(new MyListener());

try {
    $client->setServers(array("http://127.0.0.1:8800"));
} catch (MigratoryDataException $e) {
    echo($e->getDetail());
    exit(1);
}

$client->subscribe(array("/server/status"));

$client->connect();

$loop->addPeriodicTimer(1, function () use ($client) {
    try {
        $client->publish(new MigratoryDataMessage("/server/status", "Msg " . time(), "closure-" . time()));
    } catch (MigratoryDataException $e) {
        echo($e->getDetail());
        echo($e->getCause());
    }
});


$loop->run();
```