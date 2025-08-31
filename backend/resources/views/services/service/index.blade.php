@extends('layouts.app')


@section('title')
    Service
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/services/servicePage.css') }}">

    <!--- gallery library--->
    <link rel="stylesheet" href="{{ asset('css/lib/photoswipe.css') }}">
@endsection

@section('content')
    <div class="serviceWrapper">
        <div class="ImgWrapper">
            <img class="ImgService" src="{{ url('storage/' . $service['bg_image_location'] . '/' . $service['bg_image_name']) }}"
                alt="{{ $service['service_name'] }}">
            <span class="ImageTitle">{{ $service['service_name'] }}</span>
        </div>
        <div class="TextBlockWrapper">
            <div class="textBlock">
                <span class="title">{{ $service['service_name'] }}</span>
                <span class="textDescription">{{ $service['service_description_on_page'] }}</span>
            </div>
        </div>
    </div>


    <div class="gallery">
        <div class="controlsGallery">
            <span id="LeftArrow" class="arrow left"></span>
            <span id="RightArrow" class="arrow right"></span>
        </div>
        <div class="ImagesWrapper" id="lightgallery">

            @foreach ($gallery as $id => $image)
                <div>
                    <a href="{{ url('storage/' . $image['image_location'] . '/' . $image['image_name']) }}"
                        data-pswp-width="100" data-pswp-height="100" data-orderLink="{{ $id }}">

                        <img src="{{ url('storage/' . $image['image_location'] . '/' . $image['image_name']) }}"
                            data-position="0" class="galleryElement" data-orderImage="{{ $id }}">
                    </a>
                </div>
            @endforeach
        </div>

    </div>















    <div class="popUp popUpInVisible">
        <img src="../../public/Images/servicesGallery/design1.jpg">
    </div>

    <div>
        <span class='FormDescription'>Fill The form and we will get in touch with you</span>

        <form name="EmailForm" class="formBlock" action="SendMail.php" method="POST">

            <input type="text" placeholder="Name" name="Name" required class="inp inpName" />
            <input type="email" placeholder="Email Address" name="Email" required class="inp inpEmail" />
            <input type="hidden" name="Page" value="CurrentPage" class="CurrentPage" />
            <input type="submit" value="We will contact you :)" class="inpSub" />



            <div class="cf-turnstile" data-sitekey="0x4AAAAAABptkoPJBj49ifMq" name='checker' id="captcha"></div>
            <span class="successSpan"></span>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js?render=explicit"></script>
    <script src='{{ asset('js/services/service.js') }}'></script>

    <script src="{{ asset('js/lib/photoswipe.umd.min.js') }}"></script>
    <script src="{{ asset('js/lib/photoswipe-lightbox.umd.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const lightbox = new PhotoSwipeLightbox({
                gallery: '#lightgallery', // ID of your wrapper
                children: 'a', // child selector inside gallery
                pswpModule: PhotoSwipe
            });
            lightbox.init();
        });
    </script>
@endsection
