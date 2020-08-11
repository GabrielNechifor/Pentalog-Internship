@include('shared.head', ['title' => 'Edit an author'])

<body>
    @include('shared.navbar', ['active' => 'authors'])

    @include('shared.title', ['title' => 'Edit an author'])

    @include('shared.errors', ['errorsName' => [
                                    'name',
                                    'gender',
                                    'country',
                                    'birth_date',
                                    'death_date',
                                    'image'
                                    ]
                                ])

    @include('shared.update.form', [
        'path' => 'authors',

        'id' => $author->id,

        'parameters' => [
            'Name' => [
                'type' => 'text',
                'name' => 'name',
                'value' => $author->name,
                'required' => 'required'
            ],
            'Gender' => [
                'type' => 'select',
                'name' => 'gender',
                'values' => ['male', 'female', 'unknown'],
                'selected' => $author->gender,
                'required' => 'required'
            ],
            'Country' => [
                'type' => 'text',
                'name' => 'country',
                'value' => $author->country,
                'required' => 'required'
            ],
            'Birth date' => [
                'type' => 'date',
                'name' => 'birth_date',
                'value' => $author->birth_date,
                'required' => 'required'
            ],
            'Death date' => [
                'type' => 'date',
                'name' => 'death_date',
                'value' => $author->death_date,
                'required' => null
            ],
            'Image' => [
                'type' => 'image',
                'name' => 'image',
                'required' => null
            ]
        ],
        'enctype' => 'multipart/form-data'
    ])

</body>

</html>
