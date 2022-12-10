<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::orderBy('created_at', 'DESC')->get();
        return view('pages.index',compact('video'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
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
            'title' => 'required|string|max:255',
            'video' => 'required|mimes:mp4,3gp,ogx,oga,ogv,ogg,webm'
        ]);

        $datetime = Carbon::now();
        $file = $request->file('video');
        $file_name = $file->getClientOriginalName().'-'.$datetime->format("Y-m-d-H-i-s");
        $file->storeAs('public/upload',$file_name);
        $file_video = $file_name;

        Video::create([
            'title' => $request->title,
            'video' => $file_video
        ]);

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('pages.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('pages.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|mimes:mp4,3gp,ogx,oga,ogv,ogg,webm'
        ]);

        $datetime = Carbon::now();
        $file = $request->file('video');
        $file_name = $file->getClientOriginalName().'-'.$datetime->format("Y-m-d-H-i-s");
        $file->storeAs('public/upload',$file_name);
        $file_video = $file_name;
        Storage::delete('public/upload/' . $video->video);

        $video->update([
            'title' => $request->title,
            'video' => $file_video
        ]);

        return redirect()->route('show' , $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        Storage::delete('public/upload/' . $video->video);
        $video->delete();

        return redirect()->route('index');
    }
}
