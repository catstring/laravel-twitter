<div class="card overflow-hidden">
    <div class="d-md-flex flex-column flex-md-column mb-2">
        <nav class="nav flex-row flex-md-column">
                <a class="{{ Route::is('dashboard') ? 'text-white bg-primary rounded' : '' }} nav-link text-dark" href="{{ Route('dashboard') }}">
                    <span>Home</span></a>
                <a class="nav-link" href="#">
                    <span>Explore</span></a>
                <a class="{{ Route::is('feed') ? 'text-white bg-primary rounded' : '' }} nav-link" href="{{ Route('feed') }}" href="#">
                    <span>Feed</span></a>
                <a class="{{ Route::is('terms') ? 'text-white bg-primary rounded' : '' }} nav-link" href="{{ Route('terms') }}">
                    <span>Terms</span></a>
                <a class="nav-link" href="#">
                    <span>Support</span></a>
                <a class="nav-link" href="#">
                    <span>Settings</span></a>
        </nav>
    </div>
</div>
<div class="card-footer text-center py-2 mb-2">
    <a class="btn btn-link btn-sm" href="#">View Profile </a>
</div>

<style>
    @media (max-width: 767.98px) {
        .nav {
                display: flex;
                justify-content: space-around;
                flex-wrap: wrap;
            }
        .nav-link {
            font-size: 0.875rem;
            padding-left: 0.2rem !important;
            padding-right: 0.2rem !important;
        }
    }
</style>