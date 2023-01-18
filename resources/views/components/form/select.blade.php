@props(['name', 'nilai','data'=> null])
<x-form.label name="{{ str_replace('_', ' ', $name) }}" />
<select name="{{ $name }}" {{ $attributes->merge(['class' => 'form-select']) }}>
    <option selected>Pilih!</option>
    @foreach ($nilai as $n)
        <option value="{{ $n }}" {{ $data === $n ? "selected" : "" }}>{{ $n }}</option>
    @endforeach
</select>
<x-form.error :name="$name" />
