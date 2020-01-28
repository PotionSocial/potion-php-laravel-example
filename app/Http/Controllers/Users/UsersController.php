<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @return Json
     */
    public function index(\GuzzleHttp\ClientInterface $client)
    {
        $response = $client->get('users');
        $status_code = $response->getStatusCode();
        $users = json_decode($response->getBody(), true);
        return response()->json([
            'status' => $status_code,
            'data'=> $users
        ], $status_code);
    }
}