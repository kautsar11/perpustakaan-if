@props(['name'])

<label for="{{ $name }}" class="form-label fw-bold">
    {{ ucfirst($name) }}
</label>
