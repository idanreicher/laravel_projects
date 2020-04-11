<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>
        @yield('title')
    </title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Todos App</a>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/todos">todos</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/new-todos">Create todos </a>
          </li>
      </ul>

    </div>
  </nav>
    <body>
        <div class="container">

            @if(session()->has('success'))

                <div class="alert alert-success">
                    {{ session()->get('success') }}

                </div>
            @endif
            @yield('content')

        </div>

    </body>


</html>
