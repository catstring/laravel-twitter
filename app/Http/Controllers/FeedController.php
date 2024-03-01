<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function __invoke(Request $request)
    {

        // $user = auth()->user();

        $followingIDs = auth()->user()->followings()->pluck('user_id');

        // dd($followingIDs);

        // $ideas = Idea::orderBy('created_at','DESC');
        $ideas = Idea::whereIn('user_id', $followingIDs)->latest();

        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search', '') . '%');
        }

        return view("dashboard", [
            'ideas' => $ideas->paginate(5)
        ]);
    }
}
