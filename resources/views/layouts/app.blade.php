<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

     <title>@yield('title')</title>
 
     {{-- Bootstrap css --}}
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
 
    @stack('styles')

    <style>
        /* ドロップダウン矢印を非表示にする */
        .dropdown-toggle::after {
            display: none;
        }
    </style>
 </head>

 <body style="padding: 60px 0;">
    <div id="app">
        @include('layouts.header')

        <main class="py-4">
            @yield('content')
        </main>

         @include('layouts.footer')
    </div>
    {{-- Bootstrap js --}}
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

     @stack('scripts')
</body>
</html>