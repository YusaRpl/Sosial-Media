<!DOCTYPE html>
<html lang="en">

@include('posting.partials.lainya.head')

<body>

    <div id="wrapper">

       @include('posting.partials.lainya.sidebar')

        <div class="main_content">
            @include('posting.partials.lainya.navbar')
            @yield('main_content')
        </div>

    </div>

    @include('posting.partials.lainya.story')
    @include('posting.partials.lainya.scriptJs')
</body>

</html>