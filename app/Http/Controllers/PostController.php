<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with('users')->paginate(10);
        return Inertia::render('Post',['posts'=>$posts]);
    }

    public function create() {
        return Inertia::render('Create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => ['required','string','max:4096'],
            'content' => ['required','string' ,'max:4096'],
        ]);
        $user_id = Auth::user()->id;
        Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'user_id' => $user_id,
            'view_count' => 0,
        ]);
        return to_route('post');
    }

    public function show($id){

    $posts = Post::with('users')->findOrFail($id);
    $user = Auth::user();

    return Inertia::render('show',['posts'=> $posts, 'user'=>$user]);

    }

    public function edit($id) {
        $posts = Post::with('users')->findOrFail($id);
        return Inertia::render('edit',['posts'=> $posts]);
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'title' => ['required','string','max:4096'],
            'content' => ['required','string' ,'max:4096'],
        ]);
        $posts = Post::findOrFail($id);
        $posts->update($data);

        return to_route('post');
    }

    public function destory($id) {

        $posts = Post::findOrFail($id);
        $posts->delete();

        return to_route('post');
    }
}
