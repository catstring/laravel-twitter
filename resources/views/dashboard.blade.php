@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-xl-2 col-md-3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    @include('shared.left-sidebar')
                </div>
            </div>
            <div class="col-xl-10 col-md-9">
                <div class="row">
                    <div class="col-xl-9 col-lg-12 col-sm-12">
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
                            {{-- {{ $ideas->withQueryString()->links('pagination::bootstrap-4') }} --}}
                            {{ $ideas->links() }}
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-12 col-sm-12 ">
                        <div class="col">
                            @include('shared.search-bar')
                        </div>
                        <div class="col">
                            @include('shared.follow-box')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection