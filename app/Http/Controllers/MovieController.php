<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies= Movie::latest()->paginate(5);
        return view('movies.index',compact('movies'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'overview' => 'required',
            'releaseyear' => 'required',
            'runtime' => 'required',
            'castmembers' => 'required',
            'movie_img'=> 'required'
        ]);

       // Movie::create($request->all());
            $file=$request->file('movie_img');
            if($file->isvalid())
          {
              $destinationpath='movieimg/';
              $image=date('ymdHis').'.'.$file->getClientOriginalExtension();
              $file->move($destinationpath,$image);
          } 
          $movie=new Movie();
          $movie->title=$request->get('title');
          //$movie->aid=$request->get('aid');
          $movie->overview=$request->get('overview');
          $movie->releaseyear=$request->get('releaseyear');
          $movie->runtime=$request->get('runtime');
          $movie->castmembers=$request->get('castmembers');
          $movie->movie_img=$image;
          $movie->save();

        return redirect()->route('movies.index')
            ->with('success', 'Movie created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Movie $movie)
    {
        $request->validate([
            'title' => 'required',
            'overview' => 'required',
            'releaseyear' => 'required',
            'runtime' => 'required',
            'castmembers' => 'required',
        ]);
       // $movie->update($request->all());
        $movie=Movie::find($movie);
        $file=$request->file('movie_img');
       if($file->isvalid())
          {
              $destinationpath='movieimg/';
              $image=date('ymdHis').'.'.$file->getClientOriginalExtension();
              $file->move($destinationpath,$image);
          } 
       $movie->title=$request->get('title');
       //$movie->aid=$request->get('aid');
       $movie->overview=$request->get('overview');
       $movie->releaseyear=$request->get('releaseyear');
       $movie->runtime=$request->get('runtime');
       $movie->castmembers=$request->get('castmembers');
       $movie->movie_img=$image;
       $movie->save();
        return redirect()->route('movies.index')
            ->with('success', 'Movie updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')
            ->with('success', 'Movies deleted successfully');
    }
}
