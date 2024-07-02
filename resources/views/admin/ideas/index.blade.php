@extends('layout.app')

@section('title', 'Echos | Admin Dashboard')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                @include('admin.shared.left-sidebar')
            </div>
            <div class="col-md-9 col-sm-12">
                <h1>Echos</h1>

                <table class="table table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Content</th>
                            <th>Created At</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ideas as $idea)
                        <tr>
                            <td>{{ $idea->id }}</td>
                            <td>
                                <a href="{{ route('users.show', $idea->user) }}">
                                    {{ $idea->user->name }}
                                </a>
                            </td>
                            <td>{{ $idea->content }}</td>
                            <td>{{ $idea->created_at->toDateString() }}</td>
                            <td>
                                <a href="{{ route('ideas.show', $idea) }}">View</a>
                                <a href="{{ route('ideas.edit', $idea) }}">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $ideas->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection     