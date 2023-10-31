<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand navbar-primary bg-primary">
        <a class="  navbar-brand text-white" href="{{ route('agence.index') }}">Net'Agence</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse " id="navbarsExample02">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link  text-white" href="{{ route('admin.index') }}">Gérer les biens </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link  text-white" href="{{ route('admin.option') }}">Gérer les options</a>
            </li>
          </ul>

        </div>
      </nav>


    @yield('content')
    
</body>
</html>