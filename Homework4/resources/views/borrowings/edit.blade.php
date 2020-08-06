
@include('shared.head', ['title' => 'Edit a borrowing'])

<body>
    @include('shared.navbar', ['active' => 'borrowing'])

    @include('shared.title', ['title' => 'Edit a borrowing'])

    @include('shared.errors', [ 'errorsName' => ['book_title', 'user_name', 'borrowing_date', 'returning_date'] ])

    @include('shared.update.form', [
        'path' => 'borrowings',
        'id' => $borrowing->id,
        'parameters' => [
            'Book' => [ 'type' => 'select', 'name' => 'book_title', 'values' => $books, 'selected' => $borrowing->book->title, 'required' => 'required' ],
            'User' => [ 'type' => 'select', 'name' => 'user_name', 'values' => $users, 'selected' => $borrowing->user->name, 'required' => 'required' ],
            'Borrowing date' => [ 'type' => 'date', 'name' => 'borrowing_date', 'value' => $borrowing->borrowing_date, 'required' => 'required' ],
            'Returning date' => [ 'type' => 'date', 'name' => 'returning_date', 'value' => $borrowing->returning_date, 'required' => null ]
        ],
        'enctype' => null
    ])


</body>

</html>
