
<table class="table table-hover table-blue">
    <thread>
    <tr>
        @foreach ($columnNames as $columnName)
            <th scope="col">{{$columnName}}</th>
        @endforeach
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thread>
    @foreach ($objects as $object)
    <tbody>
    <tr>
        @foreach ($elements as $key => $element)
            @php $value = $object @endphp
            @foreach ($element['methods'] as $method)
                @php $value = $value->{$method} @endphp
            @endforeach
            @if ($element['type'] == 'showElement')
                <td><a href={{ "/$path/" . $object->{$id} }}> {{ $value }} </a></td>
            @elseif ($element['type'] == 'element')
                <td>{{ $value }}</td>
            @elseif ($element['type'] == 'linkElement')
            <td><a href="{{ $value }}" target="_blank">{{ $value }}</a></td>
            @endif
        @endforeach

        <td><a class="btn btn-primary" href="{{ "/$path/edit/" . $object->{$id} }}"> Edit </a> </td>
        <td>
            <form action="{{ "/{$path}/delete/" . $object->{$id} }}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" value="Delete" class="btn btn-primary">
            </form>
        </td>
    </tr>
    </tbody>
    @endforeach
</table>

<br><br>
<div class="d-flex justify-content-center">
    <a class="btn btn-primary" href="/{{$path}}/create">Add</a>
</div>
