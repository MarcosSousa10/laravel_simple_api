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
    public function clientsById($id)
    {
        $cliente = Client::find($id);
        return response()->json(
            [
                'status' => 'ok',
                'message' => 'sucesso',
                'data' => $cliente
            ],
            200
        );
    }
    public function client(Request $request)
    {
        if (!$request->id) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Client ID is required',
                ],
                400
            );
        }


        $cliente = Client::find($request->id);
        return response()->json(
            [
                'status' => 'ok',
                'message' => 'sucesso',
                'data' => $cliente
            ],
            200
        );
    }
    public function addClient(Request $request)
    {
        $cliente = new Client();
        $cliente->name = $request->name;
        $cliente->email = $request->email;
        $cliente->save();

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'sucesso',
                'data' => $cliente
            ],
            200

        );
    }
    public function updateClient(Request $request)
    {
        if (!$request->id) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Client ID is required',
                ],
                400
            );
        }
        $cliente = Client::find($request->id);
        $cliente->name = $request->name;
        $cliente->email = $request->email;
        $cliente->save();

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'sucesso',
                'data' => $cliente
            ],
            200

        );
    }
    public function deleteClient(Request $request)
    {
        if (!$request->id) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Client ID is required',
                ],
                400
            );
        }
        $cliente = Client::find($request->id);
        $cliente->delete();

        return response()->json(
            [
                'status' => 'ok',
                'message' => 'sucesso',
                'data' => $cliente
            ],
            200

        );
    }
}
