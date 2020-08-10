
@include('shared.head', ['title' => 'Add a publisher'])

<body>
    @include('shared.navbar', ['active' => 'buplishers'])

    @include('shared.title', ['title' => 'Add a publisher'])

    @include('shared.errors', [ 'errorsName' => ['name', 'founded', 'country', 'location', 'website'] ])

    @include('shared.create.form', [
        'path' => 'publishers',
        'parameters' => [
            'Name' => [
                'type' => 'text',
                'name' => 'name',
                'required' => 'required'
            ],
            'Founded In' => [
                'type' => 'date',
                'name' => 'founded',
                'required' => 'required'
            ],
            'Country' => [
                'type' => 'text',
                'name' => 'country',
                'required' => 'required'
            ],
            'Location' => [
                'type' => 'text',
                'name' => 'location',
                'required' => 'required'
            ],
            'Website' => [
                'type' => 'url',
                'name' => 'website',
                'required' => null
            ],
        ],
        'enctype' => null
    ])

  </form>

</body>

</html>
