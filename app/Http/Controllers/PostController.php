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

        $user_post = Post::where('user_id', $user->id)
            ->orWhereHas('page', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->orWhereHas('user.following', function ($query) use ($user) {
                $query->where('person_id', $user->id);
            })
            ->orWhereHas('page.following', function ($query) use ($user) {
                $query->where('person_id', $user->id);
            })
            ->paginate(5);



        return [
            'user_post' => $user_post,
        ];
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
