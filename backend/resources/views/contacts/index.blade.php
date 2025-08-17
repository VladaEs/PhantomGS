@extends('layouts.app')


@section('title')
Contact us
@endsection

@section('links')
<link rel="stylesheet" href="{{ asset('css/contacts/style.css') }}"></link>
@endsection

@section('content')
    <section class="ImgWrapper"> 
        
            <img src="{{ url('storage/servicesImages/contacts.jpg') }}" class="ImgService" >
            <span class="ImageTitle">Contacts</span>
        
    </section>
    <section class="ContactBlocks">
        <div class="contact">
            <span class="ContactText">RING US UP IF YOU HAVE ANY QUESTIONS</span>
            <div class="InfoFooter" data-value="880 5553535">880 5553535</div>
            
        </div>
        
        <div class="contact">
            <span class="ContactText">IF YOU ARE SHY, USE EMAIL INSTEAD</span>
            <div class="InfoFooter" data-value="sales@phantomgunsmiths.co.uk">sales@phantomgunsmiths.co.uk</div>
        </div>
    </section>

@endsection

@section('scripts')
@endsection
