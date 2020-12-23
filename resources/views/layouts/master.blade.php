<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/theme.css")}}">
    @yield('css-personalizado')
    <title>Cars</title>
</head>
<body class="no-scroll">
    <div class="container-fluid m-0 p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary w-100">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Vehículos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Arriendos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          {{-- <ul class="nav justify-content-center bg-primary">
            <li class="nav-item ">
              <a class="nav-link active text-light" aria-current="page" href="#">Active</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link text-light" href="#">Link</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link text-light" href="#">Link</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link disabled text-light" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link disabled text-light" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link disabled text-light" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link disabled text-light" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link disabled text-light" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul> --}}

        <div class="row m-0">
            @yield('main_content') 
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</html>
    
