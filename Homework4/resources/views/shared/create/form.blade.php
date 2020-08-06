@if ($enctype != null)
<form action={{"/$path/store"}} method="POST" enctype={{$enctype}}>
    @foreach ($parameters as $name => $parameter)
    @if ($parameter['type'] == 'text')
    <div class="form-group">
        <label for="{{$parameter['name']}}">{{$name}}:</label>
        <input class="form-control" type="text" name="{{$parameter['name']}}" value="{{ old($parameter['name']) }}"
            {{$parameter['required'] ?? ''}}>
    </div>

    @elseif ($parameter['type'] == 'number')
    <div class="form-group">
        <label for="{{$parameter['name']}}">{{$name}}:</label>
        <input class="form-control" type="number" name="{{$parameter['name']}}" min={{$parameter['min']}}
            max={{$parameter['max']}} value="{{ old($parameter['name']) }}" {{$parameter['required'] ?? ''}}>
    </div>

    @elseif ($parameter['type'] == 'url')
    <div class="form-group">
        <label for="{{$parameter['name']}}">{{$name}}:</label>
        <input class="form-control" type="url" name="{{$parameter['name']}}" value="{{ old($parameter['name']) }}"
            {{$parameter['required'] ?? ''}}>
    </div>

    @elseif ($parameter['type'] == 'select')
    <div class="form-group">
        <label for="{{$parameter['name']}}">{{$name}}:</label>
        <select class="custom-select" name='{{$parameter['name']}}'>
            @foreach ($parameter['values'] as $value)
            @if ($value == $parameter['selected'])
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
        <input class="form-control" type="date" name="{{$parameter['name']}}" value="{{ old($parameter['name']) }}"
            {{$parameter['required'] ?? ''}}>
    </div>

    @elseif ($parameter['type'] == 'image')
    <p>{{$name}}:<p>
            <div class="custom-file mb-3">
                <label class="custom-file-label" for="$parameter['name']">Choose an image</label>
                <input class="custom-file-input" type="file" accept="image/*" name="{{$parameter['name']}}"
                    {{$parameter['required'] ?? ''}}>
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
<form action={{"/$path/store"}} method="POST">
    @foreach ($parameters as $name => $parameter)
    @if ($parameter['type'] == 'text')
    <div class="form-group">
        <label for="{{$parameter['name']}}">{{$name}}:</label>
        <input class="form-control" type="text" name="{{$parameter['name']}}" value="{{ old($parameter['name']) }}"
            {{$parameter['required'] ?? ''}}>
    </div>

    @elseif ($parameter['type'] == 'number')
    <div class="form-group">
        <label for="{{$parameter['name']}}">{{$name}}:</label>
        <input class="form-control" type="number" name="{{$parameter['name']}}" min={{$min}} max={{$max}}
            value="{{ old($parameter['name']) }}" {{$parameter['required'] ?? ''}}>
    </div>

    @elseif ($parameter['type'] == 'url')
    <div class="form-group">
        <label for="{{$parameter['name']}}">{{$name}}:</label>
        <input class="form-control" type="url" name="{{$parameter['name']}}" value="{{ old($parameter['name']) }}"
            {{$parameter['required'] ?? ''}}>
    </div>

    @elseif ($parameter['type'] == 'select')
    <div class="form-group">
        <label for="{{$parameter['name']}}">{{$name}}:</label>
        <select class="custom-select" name='{{$parameter['name']}}'>
            @foreach ($parameter['values'] as $value)
            @if ($value == $parameter['selected'])
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
        <input class="form-control" type="date" name="{{$parameter['name']}}" value="{{ old($parameter['name']) }}"
            {{$parameter['required'] ?? ''}}>
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
