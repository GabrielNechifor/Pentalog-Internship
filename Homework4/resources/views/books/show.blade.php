@include('shared.head', ['title' => 'Book'])

<body>
    @include('shared.navbar', ['active' => 'books'])

    @include('shared.title', ['title' => $book->title])

    @include('shared.show.info',[
        'elements' => [
            'ID' => [ 'type' => 'item', 'value' => $book->id ],
            'Author' => [ 'type' => 'item', 'value' => $book->author->name ],
            'Publisher' => [ 'type' => 'item', 'value' => $book->publisher->name ],
            'Publish Year' => [ 'type' => 'item', 'value' => $book->publish_year ],
            'Created' => [ 'type' => 'item', 'value' => $book->created_at ],
            'Updated' => [ 'type' => 'item', 'value' => $book->updated_at ],
        ],
        'image' => Storage::url($book->cover_link)
    ])

</body>

</html>


