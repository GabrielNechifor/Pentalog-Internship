
@include('shared.head', ['title' => 'Add a book'])

<body>
    @include('shared.navbar', ['active' => 'books'])

    @include('shared.title', ['title' => 'Add a book'])

    @include('shared.errors', [ 'errorsName' => [
                                    'title',
                                    'author_name',
                                    'type',
                                    'volume',
                                    'copies',
                                    'publisher_name',
                                    'publish_year',
                                    'image'
                                ]
                            ]
            )

    @include('shared.create.form', [
        'path' => 'books',

        'parameters' => [
            'Title' => [
                'type' => 'text',
                'name' => 'title',
                'required' => 'required'
            ],
            'Author' => [
                'type' => 'select',
                'name' => 'author_name',
                'values' => $authors,
                'selected' => old('author_name'),
                'required' => 'required'
            ],
            'Type' => [
                'type' => 'select',
                'name' => 'type',
                'values' => ['Light novel', 'Manga'],
                'selected' => old('type'),
                'required' => 'required'
            ],
            'Volume' => [
                'type' => 'number',
                'name' => 'volume',
                'min' => 1,
                'max' => 1000,
                'required' => 'required'
            ],
            'Copies number' => [
                'type' => 'number',
                'name' => 'copies',
                'min' => 1,
                'max' => 1000000,
                'required' => 'required'
            ],
            'Publisher' => [
                'type' => 'select',
                'name' => 'publisher_name',
                'values' => $publishers,
                'selected' => old('publisher_name'),
                'required' => 'required'
            ],
            'Year' => [
                'type' => 'number',
                'name' => 'publish_year',
                'min' => '1000',
                'max' => '9999',
                'required' => 'required'
            ],
            'Image' => [
                'type' => 'image',
                'name' => 'image',
                'required' => 'required'
            ]
        ],
        'enctype' => 'multipart/form-data'
    ])


</body>

</html>
