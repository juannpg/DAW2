<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  @vite("resources/css/app.css")
</head>
<body>
  <x-layouts.header />
  <nav>
    <a href="{{route("about")}}">Volver al About</a>
    <a href="{{route("noticias")}}">Volver al Noticias</a>
  </nav>
  <main>
    {{ $slot  }}
  </main>
</body>
</html>