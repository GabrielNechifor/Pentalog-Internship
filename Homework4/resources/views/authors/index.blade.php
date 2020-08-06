@include('shared.head', ['title' => 'List of authors'])

<body>
    @include('shared.navbar', ['active' => 'authors'])

    @include('shared.title', ['title' => 'List of authors'])

    @include('shared.index.table', [
        'path' => 'authors',
        'columnNames' => ['Name', 'Gender', 'Country', 'Birth Date', 'Death Date'],
        'objects' => $authors,
        'id' => 'id',
        'name' => 'name',
        'methods' => ['gender', 'country', 'birth_date', 'death_date'],
        'elements' => [
            'title' => [ 'type' => 'showElement', 'methods' => ['name'] ],
            'gender' => [ 'type' => 'element', 'methods' => ['gender'] ],
            'country' => [ 'type' => 'element', 'methods' => ['country'] ],
            'birthDate' => [ 'type' => 'element', 'methods' => ['birth_date'] ],
            'deathDate' => [ 'type' => 'element', 'methods' => ['death_date'] ]
        ]
    ])


</body>

</html>
