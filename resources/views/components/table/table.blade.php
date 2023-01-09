@props(['headers'])

<table class="table table-borderless datatable">
    <thead>
        <tr>
         @foreach ($headers as $header)
             <th class="col">{{ $header }}</th>
         @endforeach
        </tr>
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>
