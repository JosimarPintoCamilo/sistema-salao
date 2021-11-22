<!DOCTYPE html>
<html lang="pt-br">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $title }}</title>

  <!-- Fonts -->
  {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}

  <link rel="stylesheet" href="{{ url(mix('painel/bootstrap.css')) }}">
  <link rel="stylesheet" href="{{ url(mix('painel/login.css')) }}">

  </head>
  <body class="text-center">

    @yield('content')

    <footer>
      <p class="">&copy; Josimar {{ date('Y') }}</p>
    </footer>

    <script src="{{ url(mix('painel/jquery.js')) }}"></script>
    @yield('scripst')
  </body>
</html>
