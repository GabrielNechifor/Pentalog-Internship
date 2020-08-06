@include('shared.head', ['title' => 'List of borrowings'])

<body>
    @include('shared.navbar', ['active' => 'borrowings'])

    @include('shared.title', ['title' => 'List of borrowings'])

    @include('shared.index.table', [
        'path' => 'borrowings',
        'id' => 'id',
        'columnNames' => ['ID', 'Book', 'User', 'Borrowing date', 'Returning date'],
        'objects' => $borrowings,
        'elements' => [
            'id' => [ 'type' => 'showElement', 'methods' => ['id'] ],
            'book' => [ 'type' => 'element', 'methods' => ['book','title'] ],
            'user' => [ 'type' => 'element', 'methods' => ['user', 'name'] ],
            'borrowing_date' => [ 'type' => 'element', 'methods' => ['borrowing_date'] ],
            'returning_date' => [ 'type' => 'element', 'methods' => ['returning_date'] ]
        ]
        ])

</body>

</html>
