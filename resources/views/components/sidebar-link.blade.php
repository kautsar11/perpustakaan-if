@props(['name','link','icon'])

<a {{ $attributes->merge(['class'=>'nav-link bg-white']) }} href="{{ $link }}">
    <i class="bi {{ $icon }}"></i>
    <span>{{ ucfirst($name) }}</span>
</a>