<form action="{{ $attributes['action'] }}" method="get">
    @if (request('dari'))
        <input type="hidden" name="dari" value="{{ request('dari') }}">
    @endif

    @if (request('sampai'))
        <input type="hidden" name="sampai" value="{{ request('sampai') }}">
    @endif

    @if (request('status'))
        <input type="hidden" name="status" value="{{ request('status') }}">
    @endif

    <div {{ $attributes->merge(['class'=>'input-group input-group-sm mb-3']) }}>
        <input type="text" class="form-control" placeholder="{{ $attributes['placeholder'] }}"
            value="{{ request('search') }}" name="search" />
    </div>
</form>
