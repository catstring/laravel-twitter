<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ideas = Idea::when(request()->has('search'), function ($query) {
            $query->search(request('search', ''));
        })->orderBy('created_at','DESC')->paginate(5);

        $topUsers = User::withCount('ideas')
            ->orderBy('created_at', 'DESC')
            ->limit(5)->get();

        return view("dashboard",[
            'ideas' => $ideas,
            'topUsers' => $topUsers
        ]);
    }
}
