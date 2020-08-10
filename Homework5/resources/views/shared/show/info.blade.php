
{{-- Items types and parameters:
        item: value,

        itemLink: value,

        localItemLink: path, id, value,

        list: objects, method,

        localLinkList: path, id, objects, method

        boolItem: value  ///checks if is equal to 1
    --}}

@if ($image != null)
<div class="container">
    <div class="row">
        <div class="col-sm-6 text-center">
@else
<div class="vertical-center">
    <div class="container col-sm-6 text-center">
@endif
            <ul class="list-group">
                @foreach ($elements as $name => $properties)

                    @if ($properties['type'] == 'item')
                        <li class="list-group-item list-group-item-primary">
                            <h5 class="text-primary">{{ $name }}</h5>
                            <p>{{ $properties['value'] }}</p>
                        </li>

                    @elseif ($properties['type'] == 'list')
                        <li class="list-group-item list-group-item-primary">
                            <h5 class="text-primary">{{ $name }}</h5>
                            <ul class="list-group">
                            @foreach ($properties['objects'] as $object)
                                <li class="list-group-item list-group-item-info">{{ $object->{$properties['method']} }}</li>
                            @endforeach
                            </ul>
                        </li>

                    @elseif ($properties['type'] == 'localLinkList')
                        <li class="list-group-item list-group-item-primary">
                            <h5 class="text-primary">{{ $name }}</h5>
                            <ul class="list-group">
                            @foreach ($properties['objects'] as $object)
                                <a href="{{ $properties['path'] . $object->{$properties['id']} }}" target="_blank">
                                    <li class="list-group-item list-group-item-info">{{ $object->{$properties['method']} }}</li>
                                </a>
                            @endforeach
                            </ul>
                        </li>

                    @elseif ($properties['type'] == 'localItemLink')
                        <li class="list-group-item list-group-item-primary">
                            <h5 class="text-primary">{{ $name }}</h5>
                            <p>
                                <a href="{{ $properties['path'] . $properties['id'] }}" target="_blank">{{ $properties['value'] }}</a>
                            </p>
                        </li>

                    @elseif ($properties['type'] == 'itemLink')
                        <li class="list-group-item list-group-item-primary">
                            <h5 class="text-primary">{{ $name }}</h5>
                            <p>
                                <a href="{{ $properties['value'] }}" target="_blank">{{ $properties['value'] }}</a>
                            </p>
                        </li>

                    @elseif ($properties['type'] == 'boolItem')
                        <li class="list-group-item list-group-item-primary">
                            <h5 class="text-primary">{{ $name }}</h5>
                            @if ($properties['value'] == 1)
                                <p>Yes</p>
                            @else
                                <p>No</p>
                            @endif
                        </li>

                    @endif
                @endforeach
            </ul>
        @if ($image != null)
            </div>
            <div class="col-sm-6">
                <img src="{{ $image }}" style="width:400px" alt=""/>
            </div>
        @endif

<br><br>
