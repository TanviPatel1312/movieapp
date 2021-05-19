<?php

namespace App\Http\Controllers;
use App\Models\Theatres;
use App\Models\Movie;
use App\Models\Actor;
use Illuminate\Http\Request;

class MoviePostController extends Controller
{
    public function  get_all_movie_post(){
        $posts = Movie::with('theatres','actor')->orderBy('id','desc')->get();
        return response()->json([
            'posts'=>$posts
        ],200);
    }
    public function getmovie_by_id($id){
        $post = Movie::with('theatres','actor')->where('id',$id)->first();
        return response()->json([
            'post'=>$post
        ],200);
    }
    public function get_all_theatres(){
        $theatres = Movie::all();
        return response()->json([
            'theatres'=>$theatres
        ],200);
    }
    
    public function search_movie(){

        $search = \Request::get('s');
        if($search!=null){
            $posts = Movie::with('theatres','actor')
                ->where('title','LIKE',"%$search%")
                ->orWhere('overview','LIKE',"%$search%")
                ->get();
            return response()->json([
                'posts'=>$posts
            ],200);
        }else{
           return $this->get_all_movie_post();
        }

    }
    public function latest_post(){
        $posts = Movie::with('theatres','actor')->orderBy('id','desc')->get();
        return response()->json([
            'posts'=>$posts
        ],200);
    }
}