<div class="card overflow-hidden mb-3">
    <div class="d-md-flex flex-column flex-md-column">
        <nav class="nav flex-row flex-md-column">
                <a class="{{ Route::is('admin.dashboard') ? 'text-white bg-primary rounded' : 'text-muted' }} nav-link" href="{{ Route('admin.dashboard') }}">
                    <i class="fa fa-home px-2" style="width: 30px" aria-hidden="true"></i>
                    <span class="d-md-inline">Dashboard</span>
                </a>
                <a class="{{ Route::is('admin.users.index') ? 'text-white bg-primary rounded' : 'text-muted' }} nav-link" href="{{ Route('admin.users.index') }}">
                    <i class="fa fa-users px-2" style="width: 30px" aria-hidden="true"></i>
                    <span class="d-md-inline">Users</span>
                </a>
                <a class="{{ Route::is('admin.ideas.index') ? 'text-white bg-primary rounded' : 'text-muted' }} nav-link" href="{{ Route('admin.ideas.index') }}">
                    <i class="fa fa-lightbulb px-2" style="width: 30px" aria-hidden="true"></i>
                    <span class="d-md-inline">Echos</span>
                </a>
                <a class="{{ Route::is('admin.comments.index') ? 'text-white bg-primary rounded' : 'text-muted' }} nav-link" href="{{ Route('admin.comments.index') }}">
                    <i class="fa fa-comment px-2" style="width: 30px" aria-hidden="true"></i>
                    <span class="d-md-inline">Comments</span>
                </a>
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