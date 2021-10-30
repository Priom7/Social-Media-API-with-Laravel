<?php

namespace App\Http\Controllers;

use App\Models\Following;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function __construct()
    {
        $this->middleware('JWT');
    }

    public function index()
    {
        $user = auth()->user();
        $user_pages = Page::with('post')->where('user_id', $user->id)->get();
        $user_post = Post::where('user_id', $user->id)->get();
        $following_user = Following::with('user:id,name', 'user.posts:id,body,user_id')->where('person_id', $user->id)->get();
        $following_page = Following::with('page:id,name', 'page.post:id,body,page_id')->where('person_id', $user->id)->get();

        return [
            'user' => $user,
            'user_post' => $user_post,
            'user_pages_post' => $user_pages,
            'following_user_post' => $following_user,
            'following_page_post' => $following_page
        ];
    }

    public function show(Post $post)
    {
        return $post;
    }

    public function person_create(Request $request)
    {
        $user = auth()->user();
        return Post::create([
            'name' => $request->name,
            'body' => $request->body,
            'user_id' => $user->id,
            'source_type_id' => 1
        ]);
    }

    public function page_create($page, Request $request)
    {
        return Post::create([
            'name' => $request->name,
            'body' => $request->body,
            'page_id' => $page,
            'source_type_id' => 2
        ]);
    }
}
