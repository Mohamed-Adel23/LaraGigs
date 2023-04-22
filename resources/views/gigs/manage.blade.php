{{-- بسم الله الرحمن الرحيم --}}

<x-layout>
    @include('partials._search');
    <x-card class="p-10">

        @unless ($gigs->isEmpty())
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Gigs
            </h1>
        </header>
            @foreach ($gigs as $gig)
                {{-- component to display gigs --}}
                <x-user-gigs :gig='$gig' />
            @endforeach
        @else
            <p align="center">You don't have any Gigs yet!!</p>
        @endunless
    </x-card>
</x-layout>
