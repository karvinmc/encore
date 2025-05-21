<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
</head>

<body>
  @include('includes.header')
  <main>
    @yield('content')
  </main>
</body>

</html>