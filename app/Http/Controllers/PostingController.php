<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\posting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostingController extends Controller
{
    public $table = "postings";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('posting.coba',[
        //     'title' => '',
        //     'posts' => posting::where('user_id', auth()->user()->id)->get()
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posting.create',[
            'title' => 'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'keterangan' => 'max:500',
        'image' => 'image|file',
        'video' => 'file|mimetypes:video/mp4',
    ]);
    if($request->file('image')){
        $validatedData['image'] = $request->file('image')->store('post-images');
    }
    if($request->file('video')){
        $validatedData['video'] = $request->file('video')->store('post-video');
    }
    $validatedData['user_id'] = auth()->user()->id;
    $validatedData['quote'] = Str::limit(strip_tags($request->keterangan), 25, '...');
    posting::create($validatedData);
    return redirect('/')->with('success', 'New Post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($posting)
    {
    //     return view('posting.coba1',[
    //        'posting' => $posting,
    //        'title' => ''
    //    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(posting $posting)
    {
        return view('posting.edit',[
            'title' => 'create',
            'post' => $posting
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, posting $posting)
    {
        $rules = [
            'image' => 'image|file|max:1024',
            'keterangan' => 'max:500',
            'video' => 'file|mimetypes:video/mp4'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        if($request->file('video')){
            if($request->oldImage){
                Storage::delete($request->oldvideo);
            }
            $validatedData['video'] = $request->file('video')->store('post-video');
        }

        $validatedData['user_id'] = auth()->user()->id;
        posting::where('id', $posting->id)
            ->update($validatedData);
        return redirect('/')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(posting $posting)
    {
        if($posting->image){
            Storage::delete($posting->image);
        }
        posting::destroy($posting->id);
        return redirect('/')->with('success', 'Post has been deleted!');
    }
}
