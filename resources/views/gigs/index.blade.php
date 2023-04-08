{{-- @php
echo '<pre>';
var_dump($_SERVER);
echo '</pre>';
die();
@endphp --}}

<x-layout>
    @include('partials._hero')
    @include('partials._search')

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @unless (!count($gigs))

        @foreach ($gigs as $gig)

            {{-- This code will bring the code from gig-card after passing $gig variable --}}
            <x-gig-card :gig="$gig" />

        @endforeach

        @else
        <h3>{{ $empty_message }}</h3>
        @endunless
    </div>
</x-layout>
