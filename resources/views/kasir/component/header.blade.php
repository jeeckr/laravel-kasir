 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="csrf-token" content="{{ csrf_token() }}" />

 <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
 <link rel="stylesheet" href="{{ asset('/assets/font-awesome/css/font-awesome.min.css') }}">
 <!-- <link href="{{ asset('/css/app.css') }}" type="text/css" rel="stylesheet"> -->


 <style>
     body {
         width: 100%;
         height: 100%;
         overflow-y: hidden;
         overflow-x: hidden;
         background-color: #caf0f8;
     }
 </style>

 @yield('style_css')

 <title>Ayam Bonbon</title>