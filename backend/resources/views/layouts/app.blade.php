<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>


        

        <link href="{{ asset('css/template/variables.css') }}" rel="stylesheet" >
        <link href="{{ asset('css/template/Footer.css') }}" rel="stylesheet"> 
        <link href="{{ asset('css/template/Header.css') }}" rel="stylesheet"> 
        @yield('links')


        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>



    <body >
       <div class="PageWrapper">
        <header>
            <ul class="desktop">
                <li data-pageId="0"><a href="{{ route('home') }}" >Main</a></li>
                <li data-pageId="1"><a href="{{ route('services') }}" >Services</a></li>
                <li data-pageId="2"><a href="{{ route('contacts') }}" >Contacts</a></li>
                <li data-pageId="3"><a href="{{ route('products') }}" >Products</a></li>
            </ul>
            <label class="burger" for="burger">
                <input type="checkbox" id="burger" class="burgerInput">
                <span></span>
                <span></span>
                <span></span>
              </label>
              <div class="MenuFullScreen">
                <div class="MenuTitle">Menu Phantom Gunsmith</div>
                <ul class="phone">
                    <li data-pageId="0"><a href="{{ route('home') }}" >Main</a></li>
                    <li data-pageId="1"><a href="{{ route('services') }}" >Services</a></li>
                    <li data-pageId="2"><a href="{{ route('contacts') }}" >Contacts</a></li>
                    <li data-pageId="3"><a href="{{ route('products') }}" >Products</a></li>
                </ul>
              </div>
        </header>



        
        @yield('content')

        














        <footer class="FooterWrapper">
            <div class="QuestionLabel"> Any <br/>questions?</div>
            
            <div class="ContactsInfo">
                <div>
                    <span class="InfoLabel"> Email us</span>
                    <div class="InfoFooter" data-value="sales@phantomgunsmiths.co.uk">sales@phantomgunsmiths.co.uk</div>
                    
                </div>

                <div>
                    <span class="InfoLabel">Call us</span>
                    <div class="InfoFooter" data-value="880 5553535">880 5553535</div>
                </div>
            </div>
        </footer>


        <script  src="{{ asset('js/template/Header.js') }}" ></script>
        <script  src="{{ asset('js/template/Footer.js') }}"></script>

        @yield('scripts')

    </div>
    </body>
</html>
