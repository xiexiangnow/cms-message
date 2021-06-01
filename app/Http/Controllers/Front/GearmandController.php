<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use MHlavac\Gearman\Client;
use MHlavac\Gearman\Worker;

class GearmandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();
        $client->addServer('192.168.2.186',4730);
        $result = $client->doNormal('replace', 'PHP is best programming language!');
        $client->doBackground('long_task', 'PHP rules... PHP rules...');
        var_dump($client);
    }

    /**
     *
     * @throws \MHlavac\Gearman\Exception
     */
    public function worker()
    {
        $function = function($payload) {
            return str_replace('java', 'php', $payload);
        };

        $worker = new Worker();
        $worker->addServer('192.168.2.186',4730);
        var_dump($worker);die;
        $worker->addFunction('replace', $function);

        $worker->work();
    }
}
