
@if ($image != null)
<div class="container">
    <div class="row">
        <div class="col-sm-6 text-center">
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
                    @elseif ($properties['type'] == 'itemLink')
                        <h5 class="text-primary">Website</h5>
                        <a href="{{$value}}" target="_blank">{{ $value }}</a>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="col-sm-6">
            <img src="{{ $image }}" style="width:400px" alt=""/>
        </div>

@else
<div class="vertical-center">
    <div class="container col-sm-6 text-center">
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
                @endif
            @endforeach
        </ul>
    </div>
</div>
@endif

<br><br>
