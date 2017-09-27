<?php

namespace App\Http\Controllers;
use Barryvanveen\Lastfm\Lastfm;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Отображает страницу поиска и результатов топ альбомов пользователя Last.FM
     *
     * @param Lastfm $lastfm
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userAlbums(Lastfm $lastfm, Request $request)
    {
        //Если форма не пустая и содержит имя пользователя
        if($request->has('data') and $request->filled('data')) {

            //Получаем имя пользователя из формы поиска
            $username = $request->input('data');

            //Делаем запрос на выборку альбомов пользователя
            $albums = $lastfm->userTopAlbums($username)
                ->limit(12)
                ->get();
        }

        return view('albums', compact('albums'));
    }

    /**
     *
     * Отображает страницу поиска и результатов топ исполнителей пользователя Last.FM
     *
     * @param Lastfm $lastfm
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userArtists(Lastfm $lastfm, Request $request)
    {
        if($request->has('data') and $request->filled('data')) {

            //Получаем имя пользователя из формы поиска
            $username = $request->input('data');

            //Делаем запрос на выборку исполнителей пользователя
            $artists = $lastfm->userTopArtists($username)
                ->limit(12)
                ->get();
        }

        return view('artists', compact('artists'));
    }

    /**
     *
     * Отображает страницу поиска и результатов топ прослушанных треков пользователя Last.FM
     *
     * @param Lastfm $lastfm
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function userTracks(Lastfm $lastfm, Request $request)
    {
        if($request->has('data') and $request->filled('data')) {

            //Получаем имя пользователя из формы поиска
            $username = $request->input('data');


            //Делаем запрос на выборку треков пользователя
            $tracks = $lastfm->userTopTracks($username)
                ->limit(12)
                ->get();
        }

        return view('tracks', compact('tracks'));
    }

    /**
     * Отображает страницу поиска и результатов треков
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchTrack(Request $request)
    {
        if($request->has('data') and $request->filled('data')) {

            $trackName = request('data');
            $client = new Client();
            $res = $client->request(
                'GET', 'http://ws.audioscrobbler.com/2.0/?method=track.search&track=' . $trackName . '&api_key=1df3a9c246a15c228d47c4f5bb29cbc3&format=json');
            $stream = $res->getBody();
            $contents = $stream->getContents();
            $contents = json_decode($contents,true);
            $tracks = $contents['results']['trackmatches']['track'];
        }

        return view('search.track', compact('tracks'));
    }

    /**
     * Отображает страницу поиска и результатов альбомов
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchAlbum(Request $request)
    {
        if($request->has('data') and $request->filled('data')) {

            $albumName = request('data');
            $client = new Client();
            $res = $client->request('GET', 'http://ws.audioscrobbler.com/2.0/?method=album.search&album=' . $albumName . '&api_key=1df3a9c246a15c228d47c4f5bb29cbc3&format=json');
            $stream = $res->getBody();
            $contents = $stream->getContents();
            $contents = json_decode($contents,true);
            $albums = $contents['results']['albummatches']['album'];
        }

        return view('search.album', compact('albums'));
    }

    /**
     * Отображает страницу поиска и результатов исполнителей
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchArtist(Request $request)
    {
        if($request->has('data') and $request->filled('data')) {

            $artistName = request('data');
            $client = new Client();
            $res = $client->request('GET', 'http://ws.audioscrobbler.com/2.0/?method=artist.search&artist=' . $artistName . '&api_key=1df3a9c246a15c228d47c4f5bb29cbc3&format=json');
            $stream = $res->getBody();
            $contents = $stream->getContents();
            $contents = json_decode($contents,true);
            $artists = $contents['results']['artistmatches']['artist'];
        }

        return view('search.artist', compact('artists'));
    }

}
