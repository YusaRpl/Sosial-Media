<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body>
    <div id="wrapper">
       @include('partials.sidebar')
        <div class="main_content">
            @include('partials.navbar')
             @yield('main_content')
        </div>
    </div>
    @include('partials.story')
    @include('partials.scriptJs')
</body>
</html>