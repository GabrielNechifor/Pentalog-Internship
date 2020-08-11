
{{--
    Parameters:
        path,   //used for button action; '/' not necessary; ex:users
        columnNames,   //column names in the table
        objects,   //a collection of objects used to populate the table
        id,   //name of the id for given models
        elements:   //array of elemnts
            elementName:   //ex: 'name'
                type:   //type of the element
                    element,  //normal element
                    showElement,   //link to the show page of an object
                    linkElement   //link to a webpage
                    boolElement   ///display 'yes' if the value is 1, else no
                methods   //specify the methos called for every object to display in the table; calls in the same order as in the array

    --}}

<table class="table table-hover table-blue">
    <thread>
    <tr class="text-center">
        @foreach ($columnNames as $columnName)
            <th scope="col">{{$columnName}}</th>
        @endforeach
        @auth
            <th scope="col"></th>
            <th scope="col"></th>
        @endauth
    </tr>
    </thread>
    @foreach ($objects as $object)
    <tbody>
    <tr class="text-center">
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

            @elseif ($element['type'] == 'boolElement')
                @if ($value == 1)
                    <td>Yes</td>
                @else
                    <td>No</td>
                @endif

            @endif
        @endforeach

        @auth('admin')
            <td><a class="btn btn-primary" href="{{ "/$path/edit/" . $object->{$id} }}"> Edit </a> </td>
            <td>
                <form action="{{ "/{$path}/delete/" . $object->{$id} }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Delete" class="btn btn-primary">
                </form>
            </td>
        @endauth
    </tr>
    </tbody>
    @endforeach
</table>

@auth('admin')
    <br><br>
    <div class="d-flex justify-content-center">
        <a class="btn btn-primary" href="/{{$path}}/create">Add</a>
    </div>
@endauth
