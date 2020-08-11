@include('shared.head', ['title' => 'Borrowing'])

<body>
    @include('shared.navbar', ['active' => 'borrowing'])

    @include('shared.title', ['title' => $borrowing->id])

    @include('shared.show.info',[
        'elements' => [
            'Book' => [
                'type' => 'localItemLink',
                'value' => $borrowing->book->fullTitle,
                'path' => '/books/',
                'id' => $borrowing->book->id
            ],
            'User' => [
                'type' => 'localItemLink',
                'value' => $borrowing->user->name,
                'path' => '/users/',
                'id' => $borrowing->user->id
            ],
            'Borrowing date' => [
                'type' => 'item',
                'value' => $borrowing->borrowing_date
            ],
            'Returning date' => [
                'type' => 'item',
                'value' => $borrowing->returning_date
            ],
            'Created' => [
                'type' => 'item',
                'value' => $borrowing->created_at
            ],
            'Updated' => [
                'type' => 'item',
                'value' => $borrowing->updated_at
            ],
        ],
        'image' => null
    ])

</body>

</html>


