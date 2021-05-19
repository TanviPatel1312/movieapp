<?php

namespace App\Http\Controllers;
use App\Models\Theatres;
use Illuminate\Http\Request;

class TheatresController extends Controller
{
    public function index()
    {
        $theatres= Theatres::latest()->paginate(5);
        return view('theatres.index',compact('theatres'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('theatres.create');
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
            'name' => 'required',
            'starttime' => 'required',
            'endtime' => 'required',
            'price' => 'required',
            'seatsAvailable' => 'required',
            'seats' => 'required',
        ]);

        Theatres::create($request->all());

        return redirect()->route('theatres.index')
            ->with('success', 'theatres created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Theatre $theatre)
    {
        return view('theatres.show', compact('theatre'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Theatre $theatre)
    {
        return view('theatres.edit', compact('theatre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Theatre $theatre)
    {
        $request->validate([
            'name' => 'required',
            'starttime' => 'required',
            'endtime' => 'required',
            'price' => 'required',
            'seatsAvailable' => 'required',
            'seats' => 'required',
        ]);
        $theatres->update($request->all());

        return redirect()->route('theatres.index')
            ->with('success', 'theatres updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theatre $theatre)
    {
        $theatres->delete();

        return redirect()->route('theatres.index')
            ->with('success', 'theatres deleted successfully');
    }
}

