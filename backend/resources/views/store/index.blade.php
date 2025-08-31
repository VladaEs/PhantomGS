@extends('layouts.app')


@section('title')
    Online Store
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/store/cart.css') }}">
    <link rel="stylesheet" href="{{ asset('css/store/shop.css') }}">
@endsection

@section('content')
    <div class="PopUpPurchase formHidden">
        <form class="form">
            <div class="subtitle">Fill the form and we will get in touch with you shortly</div>
            <div class="input-container ic1">
                <input id="firstname" class="input" type="text" placeholder="" name="firstname" required>
                <div class="cut"></div>
                <label for="firstname" class="placeholder">First name</label>
            </div>
            <div class="input-container ic2">
                <input id="lastname" class="input" type="text" placeholder="" name="lastname" required>
                <div class="cut"></div>
                <label for="lastname" class="placeholder">Last name</label>
            </div>
            <div class="input-container ic2">
                <input id="email" class="input" type="text" placeholder="" name="email" required>
                <div class="cut cut-short"></div>
                <label for="email" class="placeholder">Email
                </label>
            </div>
            <button type="text" class="submit">submit</button>
        </form>
    </div>




    <div class="cartFullScreen ">
        <div class="bgCart"></div>
        <div class="cartScreen">
            <div class="controlsCart">
                <button class="closeCart">Close</button>
                <button class="proceedCart">Proceed</button>
                <button class="clearCart">Clear cart</button>
            </div>
            <span class="cartTitle">Shopping Bag</span>
            <div class="cartItems">

            </div>
        </div>
    </div>

    <div class="cart">
        <img class="iconCart" src="../../public/Images/Busket.png">
        <span class="busketLabel">Basket</span>
        <span class="amountBusket">0</span>
    </div>
    <!--- Поп ап что товар добавлен в корзину-->
    <div class="notificationCard">
        <p class="notificationHeading">Success</p>
        <p class="notificationPara">Item added to your cart</p>
    </div>


    <div class='popUpProduct'>
        <div class="ItemWrapper">
            <section class="splide" aria-label="Slides">
                <div class="splide__track">
                    <ul class="splide__list">

                    </ul>
                </div>
            </section>
            <div class="infoCardPopUp">
                <span class='TitlePopUp'>Title</span>
                <span class='FormDescription'>Decr</span>
            </div>
            <div class="buttonsPopUp">
                <span class="popUpPrice">500$</span>
                <span class="ItemPrice popUpAddToCart">add to cart</span>
            </div>
        </div>
    </div>


    <div class="topFilters">
        <div>Filter by</div>

        <div id="list1" class="dropdown-check-list" tabindex="100">
            <span class="anchor">Category</span>
            <div class="items">
                <label data-id="0" class="SelectLabels">
                    All
                    <input type="checkbox" class="CategorySelect">
                </label>
                @foreach ($servicesFilter as $filter)
                    <label data-id="{{ $filter['id'] }}" class="SelectLabels elementsOnPageLabel">
                        {{ $filter['service_name'] }}
                        <input type="checkbox" class="CategorySelect">
                    </label>
                @endforeach

            </div>
        </div>

        <div class='filterSection priceFilter' wire:click="$emitTo('store-items','setPriceOrder')">Price <div class="arrowChange price"></div>
        </div>
        <div class='filterSection dateFilter' wire:click="setDateOrder">Date <div class="arrowChange date"></div>
        </div>
        <div>
            <span class="filterSection pages">Elements on page</span>
            <div class="PagesItems">
                @foreach($elementsOnPage as $item)
                <label class="PagesSelect" data-pageAmount="{{ $item }}" wire:click="setPerPage({{ $item }})">
                    {{ $item }}
                <input type="radio" name="pages" value="{{ $item }}" class="PagesSelectInp">
                </label>
                @endforeach
            </div>
        </div>
    </div>


    <div class="shopWrapper">


        


    </div>

    <div class="intersectionObserverDiv">loading ...</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/store/shop.js') }}"></script>


    
@endsection
