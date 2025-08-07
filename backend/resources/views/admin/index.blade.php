@extends('layouts.app')


@section('title')
Admin Panel
@endsection


@section('links')
<link rel="stylesheet" href="{{ asset('css/admin/style.css') }}"></link>
@endsection

@section('content')
    <div class="relative flex flex-col gap-5 mt-12 items-center justify-center w-[100%] h-[70vh]">
        <span class="text-white text-6xl" >Admin Panel Navigation</span>
    <ul class="flex flex-wrap items-center justify-center  text-white text-2xl ">
    <li>
        <a href="{{ route('newService') }}" class="me-4 hover:underline md:me-6 duration-300 transition-[underline]">Create a service |</a>
    </li>
    <li>
        <a href="#" class="me-4 hover:underline md:me-6">Edit a service |</a>
    </li>

    </li>
</ul>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/admin/admin.js') }}"></script>
@endsection


