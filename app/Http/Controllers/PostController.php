<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Post;

class PostController extends Controller
{

    public function index()
    {
        $list = $this->list();
        return view('index')->with(['list' => $list]);
    }

    public function view($id, $slug)
    {
        $list = $this->list($id);
        return view('index')->with(['list' => $list]);
    }

    private function list($id = null)
    {
        $location = $this->getLocation();

        $origLat = $location->latitude;
        $origLon = $location->longitude;
        $tableName = 'post';
        $dist = 2000; // This is the maximum distance (in miles) away from $origLat, $origLon in which to search

        if($id) {
            $query = "SELECT *, 3956 * 2 * 
          ASIN(SQRT( POWER(SIN(($origLat - lat)*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(($origLon-lon)*pi()/180/2),2))) 
          as distance FROM $tableName WHERE id = $id LIMIT 1";
        }else {
            $query = "SELECT *, 3956 * 2 * 
          ASIN(SQRT( POWER(SIN(($origLat - lat)*pi()/180/2),2)
          +COS($origLat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN(($origLon-lon)*pi()/180/2),2))) 
          as distance FROM $tableName WHERE 
          lon between ($origLon-$dist/cos(radians($origLat))*69) 
          and ($origLon+$dist/cos(radians($origLat))*69) 
          and lat between ($origLat-($dist/69)) 
          and ($origLat+($dist/69)) 
          having distance < $dist ORDER BY distance, id desc limit 100";
        }

        $results = \DB::select( \DB::raw($query) );

        return $results;
    }

    public function save(Request $request)
    {
        $location = $this->getLocation();
        $post = new Post;
        $post->title = $request->title;
        $post->slug = str_slug($request->title);
        if(isset($request->content)) {
            $post->content = $request->content;
        }
        $post->type = $request->type;
        if(isset($request->file)) {
            $path = $request->file->store('post-photos', 'public');
            $post->file = $path;
        }
        if(isset($request->url)) {
            $post->url = $request->url;
        }
        $post->location = $location->city.', '.$location->region_code;
        $post->lat = $location->latitude;
        $post->lon = $location->longitude;
        $post->save();

        \Session::flash('success', 'Your post is live!' );

        return redirect('/');


    }

    private function getLocation(){

        $ip = \Request::ip();

        if($ip == '127.0.0.1'){
            $ip = '70.183.167.33';
        }

        $slug = str_slug($ip);

        $location = Cache::remember('location-'.$slug, 1440, function () use($ip) {
            return json_decode(file_get_contents('https://freegeoip.net/json/'.$ip));
        });

        return $location;
    }
}
