{{-- If We have a div that wrap the elements we use this method --}}
<div {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6']) }}>

{{ $slot }}

</div>
