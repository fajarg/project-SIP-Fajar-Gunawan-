<?php

namespace App\Http\Controllers;

use App\Exports\PostExport;
use App\Post;
// use PDF;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PostImport;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->session()->get('judul');
        $request->session()->get('key');
        return view('posting/post', [
                'posts' => Post::latest()->where('category', 'like', '%'. $request->session()->get('key'))->paginate(6),
        ], ['title' => $request->session()->get('judul')]);
    }

    public function show(Post $post)
    { 
        return view('posting/show', compact('post'));
    }

    public function create()
    {
        return view('posting/create');
    }

    public function store(Request $request)
    {
        $post = new Post;
        $slug = $request->title;
        $thumbnail = request()->file('thumb');
            
        if(isset($thumbnail)){       
            $thumbnail = request()->file('thumb');
            $thumbnailUrl = $thumbnail->storeAs("images/posts", "{$slug}.{$thumbnail->extension()}");
        }
        elseif(!isset($thumbnail)){
            $thumbnail = request()->file('thumb');
            $thumbnailUrl = '';
        }   

        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category = $request->category;
        $post->thumb = $thumbnailUrl;
        $post->created_at = $request->create;
        $post->updated_at = $request->update;
        $post->save();

        return redirect('posting/post')->with('status', 'Post was added');
    }

    public function edit(Post $post)
    { 
        return view('posting/edit', compact('post'));
    }

    public function update(Post $post, Request $request)
    { 
      
        $slug = $request->title;
       
        $thumbnail = request()->file('thumb');
        $t = $post->thumb;
            
        if(isset($thumbnail) && isset($t)){       
            $thumbnail = request()->file('thumb');
            $thumbnailUrl = $thumbnail->storeAs("images/posts", "{$slug}.{$thumbnail->extension()}");
        }
        elseif(isset($t)){
            $thumbnail = request()->file('thumb');
            $thumbnailUrl = $t;
        }elseif(!isset($thumbnail) && !isset($t)){
            $thumbnail = request()->file('thumb');
            $thumbnailUrl = '';
        }   

        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category = $request->category;
        $post->thumb = $thumbnailUrl;
        $post->created_at = $request->create;
        $post->updated_at = $request->update;
        $post->update();
        return redirect('posting/post')->with('status', 'Post was edited');
    }

    public function delete(Post $post)
    {
       $post->delete();
       return redirect('posting/post')->with('status', 'Post was deleted');
    }

    public function download(Post $post)
    {
        // return view('posting/download', compact('post'));
        $pdf = \PDF::loadView('posting/download', compact('post'));
        return $pdf->stream('post.pdf');
        // dd($posting);
    }

    public function import()
    {
        Excel::import(new PostImport, request()->file('import'));
        return redirect('posting/post')->with('status', 'Post was added');
    }

    public function filter(Request $request, Post $post)
    {
        $dataSubmit = $request->submit;
        $data;

        if($dataSubmit == "all")
        {
            $request->session()->put('key', '');
            $data = 'All post';
        }
        elseif($dataSubmit == "information")
        {
            $request->session()->put('key', 'information');
            $data = 'Information';
        }
        elseif($dataSubmit == "tips")
        {
            $request->session()->put('key', 'tips');
            $data = 'Tips';
        }
        elseif($dataSubmit == "experience")
        {
            $request->session()->put('key', 'experience');
            $data = 'Experience';
        }
            
        $request->session()->put('judul', $data);
        return view('posting/post', [
                'posts' => Post::latest()->where('category', 'like', '%'. $request->session()->get('key'))->paginate(6), 
        ], ['title' => $data ]);

        
    }

    public function export(Request $request)
    {
        // dd($request->session()->get('key'));
        return Excel::download(new PostExport($request->session()->get('key')), 'posts.xlsx');
    }

    public function deleteCheck(Request $request)
    {
        $ids = $request->ids;
        Post::whereIn('title', $ids)->delete();
        return response()->json(['success' => "data was deleted"]);
    }
}
