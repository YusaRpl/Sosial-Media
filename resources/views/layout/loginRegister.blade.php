<!DOCTYPE html>
<html lang="en">

@include('partials.loginRes.head')

<body class="bg-gray-100">

    <div id="wrapper" class="flex flex-col justify-between h-screen">
        @yield('loginRegsiter')
    </div>

    @include('partials.loginRes.scriptJs')

</body>

</html>