<?php

require __DIR__ . '/vendor/autoload.php';

use App\MessagingInterface;
use App\MessagingService;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Spiral\Goridge\StreamRelay;
use Spiral\RoadRunner\GRPC\Invoker;
use Spiral\RoadRunner\GRPC\Server;
use Spiral\RoadRunner\Worker;

//Load laravel application here

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
);

//loading laravel application finished here


$worker = new Worker(new StreamRelay(STDIN, STDOUT));

$server = new Server(new Invoker());

$server->registerService(MessagingInterface::class, new MessagingService());

$server->serve($worker);

