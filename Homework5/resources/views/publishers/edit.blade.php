
@include('shared.head', ['title' => 'Edit a publisher'])

<body>
    @include('shared.navbar', ['active' => 'buplishers'])

    @include('shared.title', ['title' => 'Edit a publisher'])

    @include('shared.errors', [ 'errorsName' => ['name', 'founded', 'country', 'location', 'website'] ])

    @include('shared.update.form', [
        'path' => 'publishers',
        'id' => $publisher->id,
        'parameters' => [
            'Name' => [
                'type' => 'text',
                'name' => 'name',
                'value' => $publisher->name,
                'required' => 'required'
            ],
            'Founded In' => [
                'type' => 'date',
                'name' => 'founded',
                'value' => $publisher->founded,
                'required' => 'required'
            ],
            'Country' => [
                'type' => 'text',
                'name' => 'country',
                'value' => $publisher->origin_country,
                'required' => 'required'
            ],
            'Location' => [
                'type' => 'text',
                'name' => 'location',
                'value' => $publisher->location,
                'required' => 'required'
            ],
            'Website' => [
                'type' => 'url',
                'name' => 'website',
                'value' => $publisher->website,
                'required' => null
            ],
        ],
        'enctype' => null
    ])

  </form>

</body>

</html>
