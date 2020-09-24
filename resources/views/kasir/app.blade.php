<!doctype html>
<html lang="en">

<head>

    @include('kasir.component.header')    

</head>

<body>

    @include('kasir.component.navbar')

    <div class="container-fluid">
        @yield('content')
    </div>

    @include('kasir.component.footer')

</body>

</html>