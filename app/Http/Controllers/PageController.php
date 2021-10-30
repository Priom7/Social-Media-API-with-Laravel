<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware('JWT');
    }


    public function create(Request $request)
    {
        $user = auth()->user();
        return Page::create([
            'name' => $request->name,
            'body' => $request->body,
            'user_id' => $user->id,
        ]);
    }
}
