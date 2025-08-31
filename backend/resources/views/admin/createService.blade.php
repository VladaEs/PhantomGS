@extends('layouts.app')


@section('title')
    Create Service
@endsection


@section('links')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    </link>
@endsection

@section('content')
    <div class="mt-12  flex flex-col justify-center items-center">
        <span class="text-white text-6xl">Create Service</span>
        @if ($errors)
            <div class="flex flex-col gap-3 text-white">
                @foreach ($errors->all() as $message)
                    <span>{{ $message }}</span>
                @endforeach
            </div>
        @endif




        <x-form method="POST" action="{{ route('StoreService') }}" enctype="multipart/form-data"
            class=" mx-auto w-[40%] widthForm text-white">

            <div class="mb-10">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service Name</label>
                <input required type="text" name="serviceTitle" id="base-input"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <div class="mb-10">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service
                    Description</label>
                <textarea required name="ServiceDescription" id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..."></textarea>
            </div>

            <div class="mb-10">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Image for
                    service Page</label>
                <input required name="serviceImage" type="file"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="file_input_help" id="file_input">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPG</p>
            </div>


            <div class="mb-10">

                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service
                    Description on the service page</label>
                <textarea required name="ServiceDescriptionOnPage" id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..."></textarea>
            </div>

            <div class="mb-10">
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image to be in the Background on
                    service page </span>
                <input required name="serviceBG" type="file" aria-describedby="file_input_help" id="file_inputGal"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            </div>


            <div class="mb-10">
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Images to the gallery.
                    P.S. you can select multiple files</span>
                <input multiple required name="serviceGallery[]" type="file" aria-describedby="file_input_help" id="file_inputGal"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            </div>









            <x-button type='submit' class='mt-6' color='green'>Save</x-button>

        </x-form>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/admin/admin.js') }}"></script>
@endsection
