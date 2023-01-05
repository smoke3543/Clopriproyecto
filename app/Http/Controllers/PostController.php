<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }




    public function index(User $user)
    {

        $posts = Post::where('user_id', $user->id)->get();


        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
    
    public function create()
    {
      return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'description' => 'required',
            'imagen' => 'required'
        ]);

        Post::create([
            'titulo' => $request -> titulo,
            'descripcion' => $request -> descripcion,
            'imagen' => $request-> imagen,
            'user_id' =>auth()->user()->id
        ]);

        return redirect()->route('posts.index', auth()->user()->username);


    }
}
