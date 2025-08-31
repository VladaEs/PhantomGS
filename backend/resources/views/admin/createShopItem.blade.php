@extends('layouts.app')

@section('title')
    create a new shop item
@endsection

@section('links')
@endsection


@section('content')



    <div class="relative flex flex-col gap-5 mt-40 mb-40 items-center justify-center w-[100%] h-[70vh] ">
        @if (session('success'))
            <div class="p-4 mb-4 mt-6 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error') || $errors->any())
            <div class="p-4 mb-4 mt-6 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <span class="font-medium">{{ session('error') }}
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </span>
            </div>
        @endif
        <x-form method="POST" action="{{ route('StoreShopItem') }}" enctype="multipart/form-data"
            class=" mx-auto w-[40%] widthForm text-white">
            <div class="mb-10">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item
                    Name</label>
                <input required type="text" name="itemName" id="base-input"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-10">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service
                    Description</label>
                <textarea required name="itemDescription" id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Write your thoughts here..."></textarea>
            </div>
            <div class="mb-10">
                <label for="inputPrice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item
                    price</label>
                <input required type="number" name="itemPrice" id="inputPrice"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-10">
                <label for="associatedService" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service
                    to make it associated with</label>
                <select required id="associatedService" name="associatedService"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    @foreach ($services as $service)
                        <option value="{{ $service['id'] }}">{{ $service['service_name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-10">
                <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Images to the gallery.
                    P.S. you can select multiple files</span>
                <input multiple required name="ItemGallery[]" type="file" aria-describedby="file_input_help"
                    id="file_inputGal"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
            </div>

            <x-button type='submit' color='green'>Save</x-button>




        </x-form>



    </div>
@endsection



@section('scripts')
@endsection
