@extends('layout.app')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                @include('shared.left-sidebar')
            </div>
            <div class="col-md-6 col-sm-12">
                @include('shared.success-message')
                @include('ideas.shared.submit-idea')
                <hr>
                    @forelse ($ideas as $idea)
                        <div class="mt-3">
                            @include('ideas.shared.idea-card')
                        </div>
                    @empty
                        <p class="text-center my-4">No results Found</p>
                    @endforelse
                <div class="mt-3">
                    {{ $ideas->withQueryString()->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="col">
                    @include('shared.search-bar')
                </div>
                <div class="col">
                    @include('shared.follow-box')
                </div>
            </div>
        </div>
    </div>
@endsection