<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$controller = app()->make(App\Http\Controllers\UndiruvchiController::class);

$req = Illuminate\Http\Request::create('/undiruvchilar/xarita', 'GET');
$req->setLaravelSession(app('session')->driver('array'));
$req->session()->put('auth_token', env('API_TEST_TOKEN', 'some_token'));

// Bypassing middleware
try {
    $res = $controller->map($req);
    if ($res instanceof \Illuminate\View\View) {
        echo "View rendered successfully!\n";
        echo substr($res->render(), 0, 500); // Compile view to catch blade errors
    } else {
        echo "Returned: " . get_class($res) . "\n";
    }
} catch (\Throwable $e) {
    echo "Exception:\n" . $e->getMessage() . "\n" . $e->getTraceAsString();
}
