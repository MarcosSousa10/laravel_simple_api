<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function  status()
    {
        return response()->json(
            [
                'status' => 'ok',
                'message' => 'Api is running OK!'
            ],
            200
        );
    }
    public function  clients()
    {
      //  $clients = Client::all();
       $clients = Client::paginate(10);
      return response()->json(
            [
                'status' => 'ok',
                'message' => 'sucesso',
                'data' => $clients
            ],
            200
        );
    }
}
