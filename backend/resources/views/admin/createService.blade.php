@extends('layouts.app')


@section('title')
Create Service
@endsection


@section('links')
<link rel="stylesheet" href="{{ asset('css/admin/style.css') }}"></link>
@endsection

@section('content')
<div class="mt-12  flex flex-col justify-center items-center">
<span class="text-white text-6xl">Create Service</span>
    @if($errors)
    <div class="flex flex-col gap-3 text-white">
        @foreach ($errors->all() as $message)
            <span>{{ $message }}</span>
        @endforeach
        </div>
    @endif
<x-form method="POST" action="{{ route('StoreService')}}" enctype="multipart/form-data" class="max-w-sm mx-auto widthForm">
    <div class="mb-5">
      <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service Name</label>
      <input type="text" name="serviceTitle" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  <div class="mb-5">
      <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service Description</label>
      <input type="text" name="ServiceDescription" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
  </div>
  
<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
<input  name="serviceImage" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input">
<p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPG</p>

<x-button type='submit' class='mt-6' color='green'>Save</x-button>

</x-form>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/admin/admin.js') }}"></script>
@endsection


