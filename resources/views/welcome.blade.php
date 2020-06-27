<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Filmy</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light w-100 nav-fill">
            <ul class="navbar-nav mx-auto">
                @if(\Request::is('/'))
                    <li class="nav-item nav-link mr-4">
                        <a href="{{ route('movies') }}">Wszystkie filmy</a>
                    </li>
                    @elseif(\Request::is('movies'))
                    <li class="nav-item nav-link mr-4">
                        <a href="{{ route('add-blade') }}">Dodaj film</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="get" action="{{ url('search') }}">
                    @csrf
                    <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Wyszukaj film po tytule" name="search">
                    <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
                </form>
                    @else
                    <li class="nav-item nav-link mr-4">
                        <a href="{{ route('movies') }}">Wszystkie filmy</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="get" action="{{ url('search') }}">
                    @csrf
                    <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Wyszukaj film po tytule" name="search">
                    <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
                </form>
                @endif
            </ul>
        </nav>
    </body>
    @yield('content')
</html>
