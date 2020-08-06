@include('shared.head', ['title' => 'List of books'])

<body>
    @include('shared.navbar', ['active' => 'books'])

    @include('shared.title', ['title' => 'List of books'])

    @include('shared.index.table', [
        'path' => 'books',
        'id' => 'id',
        'columnNames' => ['Title', 'Author', 'Publisher', 'Year'],
        'objects' => $books,
        'elements' => [
            'title' => [ 'type' => 'showElement', 'methods' => ['title'] ],
            'author' => [ 'type' => 'element', 'methods' => ['author', 'name'] ],
            'publisher' => [ 'type' => 'element', 'methods' => ['publisher', 'name'] ],
            'publishYear' => [ 'type' => 'element', 'methods' => ['publish_year'] ]
        ]
        ])

</body>

</html>
