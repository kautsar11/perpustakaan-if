<form action="{{ $attributes['action'] }}" method="get">
    <div class="input-group input-group-sm mb-3">
        <input type="text" class="form-control" placeholder="{{ $attributes['placeholder'] }}" value="{{ request('page') ? : request('search') }}"  name="search" />
    </div>
</form>