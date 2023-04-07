{{-- @php
echo '<pre>';
var_dump($_SERVER);
echo '</pre>';
die();
@endphp --}}

@extends('layout')


@section('content')
@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
@unless (!count($gigs))

@foreach ($gigs as $gig)

    <x-gig-card :gig="$gig" />

@endforeach

@else
<h3>{{ $empty_message }}</h3>
@endunless

</div>
@endsection