@props(['href'])
<a href="{{ $href }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded inline-block">
    {{ $slot }}
</a>
