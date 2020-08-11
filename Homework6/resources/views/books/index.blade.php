@include('shared.head', ['title' => 'List of books'])

<body>
    @include('shared.navbar', ['active' => 'books'])

    @include('shared.title', ['title' => 'List of books'])

    @include('shared.index.table', [
        'path' => 'books',

        'id' => 'id',

        'columnNames' => ['Title', 'Author', 'Type', 'Volume', 'Publisher', 'Year', 'Available'],

        'objects' => $books,

        'elements' => [
            'title' => [
                'type' => 'showElement',
                'methods' => ['title']
            ],
            'author' => [
                'type' => 'element',
                'methods' => ['author', 'name']
            ],
            'type' => [
                'type' => 'element',
                'methods' => ['type']
            ],
            'volume' => [
                'type' => 'element',
                'methods' => ['volume']
            ],
            'publisher' => [
                'type' => 'element',
                'methods' => ['publisher', 'name']
            ],
            'publishYear' => [
                'type' => 'element',
                'methods' => ['publish_year']
            ],
            'available' => [
                'type' => 'boolElement',
                'methods' => ['available']
            ]
        ]])

</body>

</html>
