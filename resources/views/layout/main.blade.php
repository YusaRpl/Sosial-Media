<!DOCTYPE html>
<html lang="en">

@include('partials.lainya.head')

<body>

    <div id="wrapper">

       @include('partials.lainya.sidebar')

        <div class="main_content">
            @include('partials.lainya.navbar')
            @yield('main_content')
        </div>

    </div>

    @include('partials.lainya.story')
    @include('partials.lainya.scriptJs')
</body>

</html>