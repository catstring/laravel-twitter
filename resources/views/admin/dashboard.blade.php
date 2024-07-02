@extends('layout.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                @include('admin.shared.left-sidebar')
            </div>
            <div class="col-md-9 col-sm-12">
                <h1>Admin Dashboard</h1>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        @include('shared.widget', [
                            'title' => 'Total Users',
                            'icon' => 'fas fa-users',
                            'data' => $totalUsers
                        ])
                    </div>
                    <div class="col-sm-6 col-md-4">
                        @include('shared.widget', [
                            'title' => 'Total Idea',
                            'icon' => 'fas fa-lightbulb',
                            'data' => $totalIdeas
                        ])
                    </div>
                    <div class="col-sm-6 col-md-4">
                        @include('shared.widget', [
                            'title' => 'Total Comment',
                            'icon' => 'fas fa-comment',
                            'data' => $totalComments
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection