<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Blog MSIB')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
    background-color: #dfdfdf;
    color: rgb(0, 0, 0);
    height: 100vh;
    margin: 0;
    display: flex;
    flex-direction: column;
}




        .navbar {
            background: linear-gradient(45deg, #343a40, #007bff);
        }

        .navbar-nav .nav-item .nav-link {
            font-size: 1.2rem;
            font-weight: 500;
            transition: color 0.3s ease;
            color: #6c757d;
        }

        .navbar-nav .nav-item .nav-link.active {
            color: #fff200;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #ffffff; 
        }

        .card-hover:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #343a40;
            color: white;
        }

        footer p {
            margin: 0;
        }

        footer .social-icons {
            margin-top: 10px;
        }

        footer .social-icons a {
            color: white;
            margin: 0 10px;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        footer .social-icons a:hover {
            color: #007bff;
        }

        .alert {
            font-size: 1rem;
            border-radius: 0.5rem;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Blog MSIB</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : 'text-secondary' }}" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('categories*') ? 'active' : 'text-secondary' }}" href="{{ route('categories.index') }}">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('posts*') ? 'active' : 'text-secondary' }}" href="{{ route('posts.index') }}">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('authors*') ? 'active' : 'text-secondary' }}" href="{{ route('authors.index') }}">Authors</a>
                        </li>
                    </ul>

                    <div class="d-flex">
                        @if (auth()->check())
                            <div class="dropdown">
                                <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
                                    Profile
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownProfile">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">My Profile</a></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light me-2">Login</a>
                            <a href="{{ route('register') }}" class="btn btn-light">Register</a>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container mt-4 content">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            @yield('content')
        </div>
    </div>

    <footer class="text-center text-lg-start mt-auto py-3">
        <div class="container d-flex flex-column align-items-center">
            <p class="mb-0">Copyright &copy; 2024 Blog MSIB</p>
            <div class="social-icons d-flex justify-content-center">
                <a href="#" target="_blank" class="mx-2"><i class="bi bi-facebook"></i></a>
                <a href="#" target="_blank" class="mx-2"><i class="bi bi-twitter"></i></a>
                <a href="#" target="_blank" class="mx-2"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
