
@include('shared.head', ['title' => 'Edit a book'])

<body>
    @include('shared.navbar', ['active' => 'books'])

    @include('shared.title', ['title' => 'Edit a book'])

    @include('shared.errors', [ 'errorsName' => ['title', 'author_name', 'publisher_name', 'publish_year', 'image'] ])

    @include('shared.update.form', [
        'path' => 'books',
        'id' => $book->id,
        'parameters' => [
            'Title' => [ 'type' => 'text', 'name' => 'title', 'value' => $book->title, 'required' => 'required' ],
            'Author' => [ 'type' => 'select', 'name' => 'author_name', 'values' => $authors, 'selected' => $book->author->name, 'required' => 'required' ],
            'Publisher' => [ 'type' => 'select', 'name' => 'publisher_name', 'value' => $book->publisher->name, 'values' => $publishers, 'selected' => $book->publisher->name, 'required' => 'required' ],
            'Year' => [ 'type' => 'number', 'name' => 'publish_year', 'value' => $book->publish_year, 'min' => '1000', 'max' => '9999', 'required' => 'required' ],
            'Image' => [ 'type' => 'image', 'name' => 'image', 'required' => null ]
        ],
        'enctype' => 'multipart/form-data'
    ])


</body>

</html>
