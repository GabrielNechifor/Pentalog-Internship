
@include('shared.head', ['title' => 'Add a borrowing'])

<body>
    @include('shared.navbar', ['active' => 'borrowing'])

    @include('shared.title', ['title' => 'Add a borrowing'])

    @include('shared.errors', [ 'errorsName' => ['book_title', 'user_name', 'borrowing_date', 'returning_date'] ])

    @include('shared.create.form', [
        'path' => 'borrowings',

        'parameters' => [
            'Book' => [
                'type' => 'select',
                'name' => 'book_title',
                'values' => $books,
                'selected' => old('book_title'),
                'required' => 'required'
            ],
            'User' => [
                'type' => 'select',
                'name' => 'user_name',
                'values' => $users,
                'selected' => old('user_name'),
                'required' => 'required'
            ],
            'Borrowing date' => [
                'type' => 'date',
                'name' => 'borrowing_date',
                'required' => 'required'
            ],
            'Returning date' => [
                'type' => 'date',
                'name' => 'returning_date',
                'required' => null
            ]
        ],
        'enctype' => null
    ])


</body>

</html>
