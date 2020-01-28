<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;

class StatusesController extends Controller
{
    /**
     * Return statuses according to a connected user.
     *
     * @param  Request  $request
     * @return Json
     */
    public function index(\GuzzleHttp\ClientInterface $client, Request $request)
    {
        $parameters = $request->query();
        if ($parameters && $parameters['for_user_id']) {
            $response = $client->get('statuses?'. http_build_query(array_intersect_key($parameters, array_flip(['for_user_id']))));
            $statuses = json_decode($response->getBody(), true);
            $status_code = $response->getStatusCode();

            $view = view('partials/statuses', ['statuses' => $statuses['items']]);
            $view = $view->render();
            return response()->json([
                'status' => $status_code,
                'data'=> $view
            ], $status_code);
        } else {
            return response()->json([
                'status' => 400,
                'error'=> 'Missing parameters'
            ], 400);
        }
    }

    /**
     * Create a new status
     *
     * @param  Request  $request
     * @return Json
     */
    public function create(\GuzzleHttp\ClientInterface $client, Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'message' => 'required',
            'user_id' => 'required',
            'owner_type' => 'required',
            'owner_id' => 'required'
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'status' => 400, 
                'errors'=> $validator->errors()->all()
            ], 400);
        } else {

            try {
                $response = $client->post('statuses', [
                    \GuzzleHttp\RequestOptions::JSON => $request->all()
                ]);
                $statuses = json_decode($response->getBody(), true);
                $status_code = $response->getStatusCode();

                if ($status_code != 201) {
                    return response()->json([
                        'status' => $status_code,
                        'error'=> $statuses
                    ], $status_code);
                } else {

                    $view = view('partials/status', ['status' => $statuses]);
                    $view = $view->render();

                    return response()->json([
                        'status' => $status_code,
                        'data'=> $view
                    ], $status_code);
                }
            }
            catch (\Exception $e) {
                $response = $e->getResponse();
                return response()->json([
                    'error' => json_decode($response->getBody(), true),
                    'status'=> $response->getStatusCode()
                ], $response->getStatusCode());
            }
        }
        
    }


    /**
     * Like a given status.
     * 
     * @param Request  $request
     * @param $id
     * @return Json
     */
    public function like(\GuzzleHttp\ClientInterface $client, Request $request, $id)
    {
        $parameters = $request->query();
        if ($parameters && $parameters['user_id']) {
            try {
                $response = $client->put('statuses/'.$id.'/like?'. http_build_query(array_intersect_key($parameters, array_flip(['user_id']))));
                $statuses = json_decode($response->getBody(), true);
                $status_code = $response->getStatusCode();

                if ($status_code != 200) {
                    return response()->json([
                        'status' => $status_code,
                        'error'=> $statuses
                    ], $status_code);
                } else {
                    return response()->json([
                        'status' => $status_code,
                        'total'=> $statuses
                    ], $status_code);
                }
            }
            catch (\Exception $e) {
                $response = $e->getResponse();
                return response()->json([
                    'error' => json_decode($response->getBody(), true),
                    'status'=> $response->getStatusCode()
                ], $response->getStatusCode());
            }
        } else {
            return response()->json([
                'status' => 400,
                'error'=> 'Missing parameters'
            ], 400);
        }
    }

    /**
     * Unlike a given status
     * 
     * @param  Request  $request
     * @param $id
     * @return Json
     */
    public function unlike(\GuzzleHttp\ClientInterface $client, Request $request, $id)
    {
        $parameters = $request->query();
        if ($parameters && $parameters['user_id']) {
            try {
                $response = $client->put('statuses/'.$id.'/unlike?'. http_build_query(array_intersect_key($parameters, array_flip(['user_id']))));
                $statuses = json_decode($response->getBody(), true);
                $status_code = $response->getStatusCode();

                if ($status_code != 200) {
                    return response()->json([
                        'status' => $status_code,
                        'error'=> $statuses
                    ], $status_code);
                } else {
                    return response()->json([
                        'status' => $status_code,
                        'total'=> $statuses
                    ], $status_code);
                }
            }
            catch (\Exception $e) {
                $response = $e->getResponse();
                return response()->json([
                    'error' => json_decode($response->getBody(), true),
                    'status'=> $response->getStatusCode()
                ], $response->getStatusCode());
            }
        } else {
            return response()->json([
                'status' => 400,
                'error'=> 'Missing parameters'
            ], 400);
        }
    }

    /**
     * Delete a status
     * 
     * @param $id
     * @return Json
     */
    public function delete(\GuzzleHttp\ClientInterface $client, $id)
    {
        try {
            $response = $client->delete('statuses/'.$id);
            $statuses = json_decode($response->getBody(), true);
            $status_code = $response->getStatusCode();

            if ($status_code != 200) {
                return response()->json([
                    'status' => $status_code,
                    'error'=> $statuses
                ], $status_code);
            } else {
                return response()->json([
                    'status' => $status_code
                ], $status_code);
            }
        }
        catch (\Exception $e) {
            $response = $e->getResponse();
            return response()->json([
                'error' => json_decode($response->getBody(), true),
                'status'=> $response->getStatusCode()
            ], $response->getStatusCode());
        }
    }
}