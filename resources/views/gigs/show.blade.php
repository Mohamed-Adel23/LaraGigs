<x-layout>
    @include('partials._search')

    <a href="/" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        {{-- This code will be pulled and dumped into the card component --}}
        <x-card class="p-10">
            <div
                class="flex flex-col items-center justify-center text-center"
            >
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{ $gig->logo ? asset('storage/' . $gig->logo) : asset('/images/no-image.png') }}"
                    alt=""
                />

                <h3 class="text-2xl mb-2">{{ $gig->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $gig->company }}</div>

                {{-- Tags Component --}}
                <x-gig-tags :tagsCsv="$gig->tags" />

                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $gig->location }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{ $gig->description }}

                        <a
                            href="mailto:{{ $gig->email }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i>
                            Contact Employer</a
                        >

                        <a
                            href="{{ $gig->website }}"
                            target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-globe"></i> Visit
                            Website</a
                        >
                    </div>
                </div>
            </div>
        </x-card>
    </div>
</x-layout>

