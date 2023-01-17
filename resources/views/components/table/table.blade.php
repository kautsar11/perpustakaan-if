@props(['headers'])

<table class="table table-striped datatable">
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
