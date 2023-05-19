<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Contracts\Http\Kernel;
use Proto\Service\MyServiceInterfaceImpl;
use Spiral\RoadRunner\Worker;
use Spiral\Goridge\StreamRelay;
use Spiral\RoadRunner\GRPC\Server;
use Illuminate\Http\Request;

use Spiral\RoadRunner\GRPC\Invoker;


$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();


$worker = new Worker(new StreamRelay(STDIN, STDOUT));

$server = new Server(new Invoker());

$server->registerService(\Proto\Service\MyServiceInterface::class, new MyServiceInterfaceImpl());

$server->serve($worker);


