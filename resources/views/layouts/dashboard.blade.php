<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body{
            background-color: #bdc7c9;
        }

        .card-header{
            background-color: #2b4f60;
            color: white;
        }

    </style>
</head>
<body>
    {{-- start of navbar --}}
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm mb-0 fixed-top" style="background-color: #2b4f60">
            <div class="container-fluid">

                {{-- off canvas trigger button --}}
                    <span class="navbar-toggler text-light mb-2 me-2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                        <svg xmlns="http://www.w3.org/2000/svg" data-bs-target="#offcanvasScrolling" width="32" height="24" fill="currentColor" class="bi bi-arrow-left-right fw-bold" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z"/>
                        </svg>
                    </span>
                {{-- end of off canvas trigger button --}}

                <a class="navbar-brand text-light text-uppercase me-auto" href="{{ url('/admin/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <button class="btn btn-outline-light btn-sm me-3 mb-1">
                                        <a class="nav-link text-light py-0" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </button>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <button class="btn btn-outline-light btn-sm">
                                        <a class="nav-link text-light py-0" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </button>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-circle"></i>&nbsp;{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-center" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }} <i class="fas fa-sign-out-alt pb-0"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    {{-- end of navbar --}}

    {{-- start of offcanvas --}}

    <div class="offcanvas offcanvas-start sidebar-nav text-white fixed-top" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
      <div class="offcanvas-body p-0" >
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <div class="px-3 my-2">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                    <span class="input-group-text" style="background-color: #845460">
                                        <i class="bi bi-search text-white"></i>
                                    </span>
                              </div>
                          </form>
                    </div>
                </li>
                <li class="py-0">
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <div class="px-3 my-0">
                        <a href="#" class="nav-link active">
                            <i class="bi bi-speedometer me-2" style="font-size: 1.1rem; color: #ead3cb;"></i>
                            <span class="fs-4">Dashoard</span>
                        </a>
                    </div>
                </li>
                <li class="py-1">
                    <hr class="dropdown-divider py-0">
                </li>
                <li>
                    <div class="px-3 my-0">
                        <a class="text-white sidebar-link" style="text-decoration: none" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="bi bi-wrench me-2" style="font-size: 1.4rem; color: #ead3cb;" ></i>
                            <span class="fs-4">Users</span>
                            <span class="sidebar-chevron ms-auto">
                            <i class="bi bi-chevron-down" style="font-size: 1.1rem;"></i>
                            </span>
                        </a>
                      </p>
                      <div class="collapse mb-0 px-3" id="collapseExample">
                        <div class="text-white border-0" style="background-color: #2b4f60">
                            <ul class="navbar-nav">
                                <li>
                                    <a class="text-white nav-link" style="text-decoration: none" href="{{ route('users.index') }}" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="bi bi-person-lines-fill" style="font-size: 1.0rem; color: #ead3cb;"></i>
                                        <span class="fs-6">All Users</span>
                                    </a>
                                </li>
                                <li class="py-0 mb-0">
                                    {{-- <hr class="dropdown-divider py-0"> --}}
                                </li>
                                <li>
                                    <a class="text-white nav-link" style="text-decoration: none" href="{{ route('users.create') }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="bi bi-person-plus" style="font-size: 1.0rem; color: #ead3cb;"></i>
                                        <span class="fs-6 mb-0">Create User</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                </li>
                <li class="py-0">
                    <hr class="dropdown-divider py-0">
                </li>
                <li>
                    <div class="px-3 my-0">
                        <a class="text-white sidebar-link" style="text-decoration: none" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                            <i class="bi bi-wrench me-2" style="font-size: 1.4rem; color: #ead3cb;" ></i>
                            <span class="fs-4">Posts</span>
                            <span class="sidebar-chevron ms-auto">
                            <i class="bi bi-chevron-down" style="font-size: 1.1rem;"></i>
                            </span>
                        </a>
                      </p>
                      <div class="collapse mb-0 px-3" id="collapseExample2">
                        <div class="text-white border-0" style="background-color: #2b4f60">
                            <ul class="navbar-nav">
                                <li>
                                    <a class="text-white nav-link" style="text-decoration: none" href="{{ route('posts.index') }}" aria-expanded="false" aria-controls="collapseExample2">
                                        <i class="bi bi-sticky" style="font-size: 1.0rem; color: #ead3cb;"></i>
                                        <span class="fs-6">All Posts</span>
                                    </a>
                                </li>
                                <li class="py-0 mb-0">
                                    {{-- <hr class="dropdown-divider py-0"> --}}
                                </li>
                                <li>
                                    <a class="text-white nav-link" style="text-decoration: none" href="{{ route('posts.create') }}" role="button" aria-expanded="false" aria-controls="collapseExample2">
                                        <i class="bi bi-stickies" style="font-size: 1.0rem; color: #ead3cb;"></i>
                                        <span class="fs-6 mb-0">Create Post</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                </li>
                <li class="py-0">
                    <hr class="dropdown-divider py-0">
                </li>
                <li>
                    <div class="px-3 my-0">
                        <a class="text-white sidebar-link" style="text-decoration: none" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                            <i class="bi bi-wrench me-2" style="font-size: 1.4rem; color: #ead3cb;" ></i>
                            <span class="fs-4">Categories</span>
                            <span class="sidebar-chevron ms-auto">
                            <i class="bi bi-chevron-down" style="font-size: 1.1rem;"></i>
                            </span>
                        </a>
                      </p>
                      <div class="collapse mb-0 px-3" id="collapseExample3">
                        <div class="text-white border-0" style="background-color: #2b4f60">
                            <ul class="navbar-nav">
                                <li>
                                    <a class="text-white nav-link" style="text-decoration: none" href="#" aria-expanded="false" aria-controls="collapseExample3">
                                        <i class="bi bi-tag" style="font-size: 1.0rem; color: #ead3cb;"></i>
                                        <span class="fs-6">All Categories</span>
                                    </a>
                                </li>
                                <li class="py-0 mb-0">
                                    {{-- <hr class="dropdown-divider py-0"> --}}
                                </li>
                                <li>
                                    <a class="text-white nav-link" style="text-decoration: none" href="#" role="button" aria-expanded="false" aria-controls="collapseExample3">
                                        <i class="bi bi-tags" style="font-size: 1.0rem; color: #ead3cb;"></i>
                                        <span class="fs-6 mb-0">Create Categories</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                </li>
            </ul>
        </nav>
      </div>
    </div>
    {{-- end of off-canvas --}}

    {{-- MAIN SECTION --}}
    <main class="py-4 mt-5 px-3">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
    {{-- END OF MAIN SECTION --}}
</body>
</html>


