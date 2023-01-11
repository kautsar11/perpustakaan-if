@props(['name'])

@error($name)
    <p class="text-danger fs-6 mt-1">{{ $message }}</p>
@enderror
