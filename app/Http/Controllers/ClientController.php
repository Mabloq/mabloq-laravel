<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ClientController extends Controller
{
    protected function performRequest($method, $url, $parameters = []) {

      $client = new Client(['curl' => [CURLOPT_CAINFO => base_path('resources/certs/cacert.pem')]]);
      $response = $client->request($method, $url, $parameters);

      return $response->getBody()->getContents();
    }

    protected function performGetRequest($url,$parameters) {
       $contents = $this->performRequest('GET', $url, $parameters);
       $decodedData = json_decode($contents);

       return $decodedData;
    }

    protected function performPostRequest($url,$parameters) {
       $contents = $this->performRequest('POST', $url, $parameters);
       $decodedData = json_decode($contents);

       return $decodedData;
    }

}
