@props(['name'])

<x-form.label name="{{ str_replace('_', ' ', $name) }}"/>
<input {{ $attributes->merge(['class'=>'form-control']) }} name="{{ $name }}" id="{{ $name }}" {{ $attributes }}/>
<x-form.error :name="$name"/>