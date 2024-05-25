<div class="card overflow-hidden mb-3">
    <div class="d-md-flex flex-column flex-md-column">
        <nav class="nav flex-row flex-md-column">
                <a class="{{ Route::is('dashboard') ? 'text-white bg-primary rounded' : 'text-muted' }} nav-link" href="{{ Route('dashboard') }}">
                    <i class="fa fa-home px-2" style="width: 30px" aria-hidden="true"></i>
                    <span class="d-none d-md-inline">Home</span></a>
                <a class="nav-link text-muted" href="#">
                    <i class="fa fa-search px-2" style="width: 30px" aria-hidden="true"></i>
                    <span class="d-none d-md-inline">Explore</span></a>
                <a class="{{ Route::is('feed') ? 'text-white bg-primary rounded' : 'text-muted' }} nav-link" href="{{ Route('feed') }}" href="#">
                    <i class="fa fa-comments px-2" style="width: 30px" aria-hidden="true"></i>
                    <span class="d-none d-md-inline">Feed</span></a>
                <a class="{{ Route::is('terms') ? 'text-white bg-primary rounded' : 'text-muted' }} nav-link" href="{{ Route('terms') }}">
                    <i class="fa fa-paperclip px-2" style="width: 30px" aria-hidden="true"></i>
                    <span class="d-none d-md-inline">Terms</span></a>
                <a class="nav-link text-muted" href="#">
                    <i class="fa fa-user px-2" style="width: 30px"  aria-hidden="true"></i>
                    <span class="d-none d-md-inline">Profile</span></a>
                <a class="nav-link text-muted" href="#">
                    <i class="fa fa-cog px-2" style="width: 30px" aria-hidden="true"></i>
                    <span class="d-none d-md-inline">Settings</span></a>
        </nav>
    </div>
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