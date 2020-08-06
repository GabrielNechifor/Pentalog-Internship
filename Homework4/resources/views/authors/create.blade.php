@include('shared.head', ['title' => 'Add an author'])

<body>
    @include('shared.navbar', ['active' => 'authors'])

    @include('shared.title', ['title' => 'Add an author'])

    @include('shared.errors', [ 'errorsName' => ['name', 'gender', 'country', 'birth_date', 'death_date', 'image'] ])

    @include('shared.create.form', [
        'path' => 'authors',
        'parameters' => [
            'Name' => [ 'type' => 'text', 'name' => 'name', 'required' => 'required' ],
            'Gender' => [ 'type' => 'select', 'name' => 'gender', 'values' => ['male', 'female', 'unknown'], 'selected' => 'unknown', 'required' => 'required' ],
            'Country' => [ 'type' => 'text', 'name' => 'country', 'required' => 'required' ],
            'BirthDate' => [ 'type' => 'date', 'name' => 'birth_date', 'required' => 'required' ],
            'DeathDate' => [ 'type' => 'date', 'name' => 'death_date', 'required' => null ],
            'Image' => [ 'type' => 'image', 'name' => 'image', 'required' => 'required' ]
        ],
        'enctype' => 'multipart/form-data'
    ])

</body>

</html>
