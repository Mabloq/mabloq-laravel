<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\View;


class YoutubeController extends ClientController
{
  public function getPlayList() {


    return view('youtube.playlist');

  }

  public function renderPlayList() {
    $key = config('services.youtube.key');
    $playlistId = config('services.youtube.playlistId');

    $playlist = $this->performGetRequest('https://www.googleapis.com/youtube/v3/playlistItems', [
                    'query' => ['part' => 'snippet, id',
                                'key' => $key,
                                'playlistId' => $playlistId,
                                'maxResults' => 5]
       ]);

       return response()->json($playlist);
  }


  public function getNextPage(Request $request) {

    $key = config('services.youtube.key');
    $playlistId = config('services.youtube.playlistId');

    $playlist = $this->performGetRequest('https://www.googleapis.com/youtube/v3/playlistItems', [
                    'query' => ['part' => 'snippet',
                                'key' => $key,
                                'playlistId' => $playlistId,
                                'maxResults' => 5,
                                'pageToken' => $request->token]
                      ]);
        return response()->json($playlist);
  }

  public function getPrevpage() {

  }
}
