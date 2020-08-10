
{{--
    Parameters:
        path,   //used for button action; '/' not necessary; ex:users
        elements:   //array of elemnts
            elementName:   //Label name
                type:   //type of the element
                    text
                    select
                    date
                    image
                    number
                    url
                name //used as 'name' html atribute
                required   //values: 'required', null

                values   //only for select; array/collection of values
                selected   //only for select; selected value

                min   //only for number
                max   //only for number
        enctype
    --}}

<form action={{"/$path/store"}} method="POST"  enctype="{{ $enctype ?? ''}}">
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

        @elseif ($parameter['type'] == 'email')
        <div class="form-group">
            <label for="{{$parameter['name']}}">{{$name}}:</label>
            <input class="form-control" type="email" name="{{$parameter['name']}}" value="{{ old($parameter['name']) }}"
                {{$parameter['required'] ?? ''}}>
        </div>

        @elseif ($parameter['type'] == 'password')
        <div class="form-group">
            <label for="{{$parameter['name']}}">{{$name}}:</label>
            <input class="form-control" type="password" name="{{$parameter['name']}}" value="{{ old($parameter['name']) }}"
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

<br><br>
