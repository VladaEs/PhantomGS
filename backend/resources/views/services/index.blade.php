@extends('layouts.app')


@section('title')
Services
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('css/services/style.css') }}">
@endsection

@section('content')
    <section class="services" id="services">

        @foreach ($services as $service)
        
            <a href="{{ route('servicePage', $service['id']) }}" class="service">
                <img src="{{ url('storage/'. $service['image_location'] .'/' . $service['image_name']) }}" class="serviceImg" alt="">
                <div class="TextCenterService">
                    <span class="TitleService">{{ $service['service_name'] }}</span>
                    <span class="DescriptionService">{{ $service['description'] }}</span>
                </div>
            </a>
        @endforeach

    </section>
@endsection

@section('scripts')
@endsection
