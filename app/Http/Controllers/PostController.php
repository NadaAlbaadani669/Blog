<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){

        return view('posts.index' ,[
            'posts' => Post::latest()->filter(
                request(['search','category','auther'])
                )->paginate(3)->withQueryString()
        ]);
    }

    public function show(Post $post){
        return view('posts.show',[
            'post'=> $post
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // $path = request()->file('thumbnail')->store('thumbnails');

        // return 'Done '.$path;
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail'=>'required|image',
            'slug' => ['required',Rule::unique('posts','slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories','id')]
        ]);

        $attributes['user_id']= auth()->id();

        $file = request()->file('thumbnail');
        //  Store the file to the disk
        $storedFile = $file->store('thumbnail', 'public');
        //  set storage path to store the file (actual video)
        $storage = Storage::disk('public');
        $path    = $storage->url($storedFile);


        $attributes['thumbnail']=$path;

        Post::create([
            'title'=>$attributes['title'],
            'thumbnail'=>$attributes['thumbnail'],
            'slug'=>$attributes['slug'],
            'excerpt'=>$attributes['excerpt'],
            'body'=>$attributes['body'],
            'category_id'=>$attributes['category_id'],
            'user_id'=>$attributes['user_id'],


        ]);

        return redirect('/')->with('success','Your Post Has Been Added.');
    }

}
