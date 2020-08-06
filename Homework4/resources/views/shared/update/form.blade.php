
@if ($enctype != null)
<form action={{"/$path/update"}} method="POST" enctype={{$enctype}}>
    @method('PUT')
    @csrf
    <div class="form-group">
        <input type="number" name="id" value={{$id}} hidden>
    </div>

    @foreach ($parameters as $name => $parameter)
        @if ($parameter['type'] == 'text')
            <div class="form-group">
                <label for="{{$parameter['name']}}">{{$name}}:</label>
                <input class="form-control" type="text" name="{{$parameter['name']}}" value={{ old($parameter['name'], $parameter['value']) }} {{$parameter['required'] ?? ''}}>
            </div>

        @elseif ($parameter['type'] == 'number')
            <div class="form-group">
                <label for="{{$parameter['name']}}">{{$name}}:</label>
                <input class="form-control" type="number" name="{{$parameter['name']}}" min={{$parameter['min']}} max={{$parameter['max']}} value="{{ old($parameter['name'], $parameter['value']) }}" {{$parameter['required'] ?? ''}}>
            </div>

        @elseif ($parameter['type'] == 'url')
            <div class="form-group">
                <label for="{{$parameter['name']}}">{{$name}}:</label>
                <input class="form-control" type="url" name="{{$parameter['name']}}" value="{{ old($parameter['name'], $parameter['value']) }}" {{$parameter['required'] ?? ''}}>
            </div>

        @elseif ($parameter['type'] == 'select')
            <div class="form-group">
                <label for="{{$parameter['name']}}">{{$name}}:</label>
                <select class="custom-select" name='{{$parameter['name']}}'>
                    @foreach ($parameter['values'] as $value)
                        @if ( $value == old($parameter['name']) )
                            <option value="{{$value}}" selected>{{$value}}</option>
                        @elseif ($value == $parameter['selected'])
                            <option value="{{$value}}" selected>{{$value}}</option>
                        @else
                            <option value="{{$value}}">{{$value}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

        @elseif ($parameter['type'] == 'date')
            <div class="form-group">
                <label for="{{$parameter['name']}}">{{$name}}:</label>
                <input class="form-control" type="date" name="{{$parameter['name']}}" value="{{ old($parameter['name'], $parameter['value']) }}" {{$parameter['required'] ?? ''}}>
            </div>

        @elseif ($parameter['type'] == 'image')
            <p>{{$name}}:<p>
            <div class="custom-file mb-3">
                <label class="custom-file-label" for="$parameter['name']">Choose an image</label>
                <input class="custom-file-input" type="file" accept="image/*" name="{{$parameter['name']}}" {{$parameter['required'] ?? ''}}>
            </div>
            <script>
                $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
            </script>
        @endif
    @endforeach

    <br><br>

    <div class="d-flex justify-content-center">
        <input type="submit" class="btn btn-primary mr-4">
        <a href={{"/$path"}} class="btn btn-danger">Cancel</a>
    </div>

</form>

@else
<form action={{"/$path/update"}} method="POST">
    @method('PUT')
    @csrf
    <div class="form-group">
        <input type="number" name="id" value={{$id}} hidden>
    </div>

@foreach ($parameters as $name => $parameter)
    @if ($parameter['type'] == 'text')
        <div class="form-group">
        <label for="{{$parameter['name']}}">{{$name}}:</label>
            <input class="form-control" type="text" name="{{$parameter['name']}}" value="{{ old($parameter['name'], $parameter['value']) }}" {{$parameter['required'] ?? ''}}>
        </div>

    @elseif ($parameter['type'] == 'number')
        <div class="form-group">
            <label for="{{$parameter['name']}}">{{$name}}:</label>
            <input class="form-control" type="number" name="{{$parameter['name']}}" min={{$min}} max={{$max}} value="{{ old($parameter['name'], $parameter['value']) }}" {{$parameter['required'] ?? ''}}>
        </div>

    @elseif ($parameter['type'] == 'url')
        <div class="form-group">
            <label for="{{$parameter['name']}}">{{$name}}:</label>
            <input class="form-control" type="url" name="{{$parameter['name']}}" value="{{ old($parameter['name'], $parameter['value']) }}" {{$parameter['required'] ?? ''}}>
        </div>

    @elseif ($parameter['type'] == 'select')
        <div class="form-group">
            <label for="{{$parameter['name']}}">{{$name}}:</label>
            <select class="custom-select" name='{{$parameter['name']}}'>
                @foreach ($parameter['values'] as $value)
                    @if ($value == old($parameter['name']))
                        <option value="{{$value}}" selected>{{$value}}</option>
                    @elseif ($value == $parameter['selected'])
                        <option value="{{$value}}" selected>{{$value}}</option>
                    @else
                        <option value="{{$value}}">{{$value}}</option>
                    @endif
                @endforeach
            </select>
        </div>

    @elseif ($parameter['type'] == 'date')
        <div class="form-group">
            <label for="{{$parameter['name']}}">{{$name}}:</label>
            <input class="form-control" type="date" name="{{$parameter['name']}}" value="{{ old($parameter['name'], $parameter['value']) }}" {{$parameter['required'] ?? ''}}>
        </div>

    @endif
@endforeach

<br><br>

<div class="d-flex justify-content-center">
    <input type="submit" class="btn btn-primary mr-4">
    <a href={{"/$path"}} class="btn btn-danger">Cancel</a>
</div>

</form>
@endif
