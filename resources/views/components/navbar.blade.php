<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
        <a class="navbar-brand" href="index.html">Vincenzo Tisci</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
             
                <li class="nav-item dropdown">
                    @auth
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->email }}
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                          <form action="/logout" method="POST">
                              @csrf
                              <button type="submit" class="border-0 py-0 bg-white">Log out</button>
                          </form>
                        </li>
                      </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('welcome')}}"> <i class="bi bi-house"> </i></a></li>
                      <li class="nav-item"><a class="nav-link" href="{{route('articles.create')}}">Crea nuovo articolo </a></li>  
                    @else
                    <li class="nav-item">
                        <li class="nav-item"><a class="nav-link" href="{{route('login')}}"> <i class="bi bi-person"></i></a></li>
                    </li>
                    <li class="nav-item">
                        <li class="nav-item"><a class="nav-link" href="/register">Register </a></li>
                    </li>
                    @endauth
            </ul>
        </div>
    </div>
</nav>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">