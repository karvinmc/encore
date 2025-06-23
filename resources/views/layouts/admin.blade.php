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

<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        @include('admin.partials.sidebar')
        <div class="flex-grow flex flex-col">
            @include('admin.partials.header')
            <main class="p-6 bg-gray-100">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
