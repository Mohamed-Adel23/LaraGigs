{{-- بسم الله الرحمن الرحيم --}}
@props(['gig'])

<table class="w-full table-auto rounded-sm">
    <tbody>
        <tr class="border-gray-300">
            <td
                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
            >
                <a href="/gigs/{{ $gig->id }}">
                    {{ $gig->title }}
                </a>
            </td>
            <td
                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
            >
                <a
                    href="/gigs/{{ $gig->id }}/edit"
                    class="text-blue-400 px-6 py-2 rounded-xl"
                    ><i
                        class="fa-solid fa-pen-to-square"
                    ></i>
                    Edit</a
                >
            </td>
            <td
                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
            >
                <form action="/gigs/{{ $gig->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600" type="submit">
                        <i
                            class="fa-solid fa-trash-can"
                        ></i>
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    </tbody>
</table>
