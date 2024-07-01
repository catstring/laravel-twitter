<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ideas = Idea::orderBy('created_at','DESC');

        if(request()->has('search')){
            $ideas = $ideas->where('content','like','%' . request()->get('search','') . '%');
        }

        $topUsers = User::withCount('ideas')
            ->orderBy('created_at', 'DESC')
            ->limit(5)->get();

        return view("dashboard",[
            'ideas' => $ideas ->paginate(5),
            'topUsers' => $topUsers
        ]);
    }
}
