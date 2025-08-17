
@extends('layouts.app')

@section('title')
    Phantom Gunsmiths
@endsection


@section('links')
    <link href= "{{ asset('css/main/main.css') }}" rel="stylesheet" >
    <link rel="icon" href="../../public/Logo.ico" />
@endsection 


@section('content')

        <section class="MainVideo">
            <video class="VideoFrame" autoPlay muted playsinline webkit-playinginline>
                <source src="{{ asset('media/videos/VideoMain1.mp4') }} " class="VideoSource" type="video/mp4"></source>
                <source src=" {{ asset('media/videos/VideoMain1.webm') }} " class="VideoSource" type="video/webm"></source>
                <source src=" {{ asset('media/videos/VideoMain1.ogv') }}" class="VideoSource" type="video/ogg"></source>
            </video>
            <div class="CompanyName"><span class="CompanyNameSmall">PHANTOM<br></span>
                GUNSMITHS LTD</div>
                <div class="CompanyDescription">Firearms, sales and repairs  service in<br/> Surrey, UK</div>
        </section>


        <section class="About">
            <div class="Heading">About Us</div>
            <div class="DescriptionAbout">Phantom Gunsmiths is a small company providing a high-quality service for all your firearm needs. Conveniently
                located near Gatwick with modern equipment and processes. </div>
            <div class="DescriptionAbout">We undertake any work from simple servicing to full rebuild or
                custom manufacture of complete rifles.
                 We have in house design and full 5 axis CNC for manufacturing.</div>


            <div class="videoAbout">
                <video class="VideoPreview" muted>
                    <source src=" {{ asset('media/videos/preview.mp4') }}"></source>
                    <source src=" {{ asset('media/videos/preview.ogv') }}" ></source>
                    <source src=" {{ asset('media/videos/preview.webm') }}" ></source>
                </video>
                <div class="PlayBtn"></div>
                <img class="MuteBtn" src=" {{ asset('media/images/soundOff.png') }}">
            </div>

        </section>

        
@endsection


@section('scripts')
    <script src= "{{ asset('js/main/main.js') }}"></script>
@endsection


    


