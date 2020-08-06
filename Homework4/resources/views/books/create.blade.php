
@include('shared.head', ['title' => 'Add a book'])

<body>
    @include('shared.navbar', ['active' => 'books'])

    @include('shared.title', ['title' => 'Add a book'])

    @include('shared.errors', [ 'errorsName' => ['title', 'author_name', 'publisher_name', 'publish_year', 'image'] ])

    @include('shared.create.form', [
        'path' => 'books',
        'parameters' => [
            'Title' => [ 'type' => 'text', 'name' => 'title', 'required' => 'required' ],
            'Author' => [ 'type' => 'select', 'name' => 'author_name', 'values' => $authors, 'selected' => old('author_name'), 'required' => 'required' ],
            'Publisher' => [ 'type' => 'select', 'name' => 'publisher_name', 'values' => $publishers, 'selected' => old('publisher_name'), 'required' => 'required' ],
            'Year' => [ 'type' => 'number', 'name' => 'publish_year', 'min' => '1000', 'max' => '9999', 'required' => 'required' ],
            'Image' => [ 'type' => 'image', 'name' => 'image', 'required' => 'required' ]
        ],
        'enctype' => 'multipart/form-data'
    ])


</body>

</html>
