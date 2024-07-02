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
            </div>
        </div>
    </div>
@endsection