<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">

        <title>Laravel</title>

        @vite(['resources/css/app.css', 'resources/sass/main.sass', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
        <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 20px;" class="products">
            @foreach($products as $product)
                <div class="product">
                    <h3 style="font-size: 30px; text-align: center;">{{ $product->title }}</h3>
                    <img src="{{ $product->thumbnail }}" alt="">
                </div>
            @endforeach
        </div>
    </body>
</html>
