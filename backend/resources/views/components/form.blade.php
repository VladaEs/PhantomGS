@props(['method'=> "GET"])

@php($method= strtoupper($method))
@php($_method = in_array($method, ["GET", "POST"]))

<form {{ $attributes }} method="{{ $method }}">
    @csrf
    @if($_method == false)
        <input type="hidden" name="_method" method="{{ $method }}">
    @endif

    {{ $slot }}
</form>