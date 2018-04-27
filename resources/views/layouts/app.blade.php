<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    
    <head>
       @include('layouts.partials.html_header')
    </head>

    <body>

        @include('layouts.partials.navbar')

        <div class="container">
            @yield('content')            
        </div>
         
        
        @include('layouts.partials.scripts')
        @yield('scripts')
    </body>

</html>
