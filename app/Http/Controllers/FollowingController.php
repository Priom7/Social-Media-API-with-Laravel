<?php

namespace App\Http\Controllers;

use App\Models\Following;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;

class FollowingController extends Controller
{

    public function __construct()
    {
        $this->middleware('JWT');
    }

    public function person_follow_create($following)
    {
        $user = auth()->user();
        return Following::create([
            'person_id' => $user->id,
            'following_person_id' => $following,
            'source_type_id' => 1,

        ]);
    }

    public function page_follow_create($following)
    {
        $user = auth()->user();
        return Following::create([
            'person_id' => $user->id,
            'following_page_id' => $following,
            'source_type_id' => 2,

        ]);
    }
}
