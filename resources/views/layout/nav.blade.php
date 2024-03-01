<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
data-bs-theme="dark">
<div class="container">
    <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>{{config ('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            @guest
            <li class="nav-item">
                <a class="{{(Route::is('login')) ? 'text-danger' : ''}} nav-link active" aria-current="page" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="{{(Route::is('register')) ? 'text-danger' : ''}} nav-link active" href="{{route('register')}}">Register</a>
            </li>
            @endguest
            @auth

            <li class="nav-item">
                <a class="{{(Route::is('profile')) ? 'text-success' : ''}} nav-link" href="{{route ('profile')}}"> HI  {{Auth::user()->name}} </a>
            </li>

            @if (Auth :: user()->is_admin)
            <li class="nav-item">
                <a class="{{ (Route::is('admin.dashboard')) ? 'text-success mt-1' : ''}} nav-link fa-solid fa-person-circle-check mt-1" href="{{route ('admin.dashboard')}}"></a>
            </li>

            @endif

            <li class="nav-item ">
          <form  action="{{route ('logout')}}" method="POST">
            @csrf
            <button class="fa fa-sign-out mt-2  btn btn-danger btn-sm" type="submit" ></button>
             </form>
        </li>
        @endauth
        </ul>
    </div>
</div>
</nav>
