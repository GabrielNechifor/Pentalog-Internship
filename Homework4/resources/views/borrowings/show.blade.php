@include('shared.head', ['title' => 'Borrowing'])

<body>
    @include('shared.navbar', ['active' => 'borrowing'])

    @include('shared.title', ['title' => $borrowing->id])

    @include('shared.show.info',[
        'elements' => [
            'Book' => [ 'type' => 'item', 'value' => $borrowing->book->title ],
            'User' => [ 'type' => 'item', 'value' => $borrowing->user->name ],
            'Borrowing date' => [ 'type' => 'item', 'value' => $borrowing->borrowing_date ],
            'Returning date' => [ 'type' => 'item', 'value' => $borrowing->returning_date ],
            'Created' => [ 'type' => 'item', 'value' => $borrowing->created_at ],
            'Updated' => [ 'type' => 'item', 'value' => $borrowing->updated_at ],
        ],
        'image' => null
    ])

</body>

</html>


