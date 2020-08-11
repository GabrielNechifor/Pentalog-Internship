@include('shared.head', ['title' => 'Book'])

<body>
    @include('shared.navbar', ['active' => 'books'])

    @include('shared.title', ['title' => $book->title])

    @include('shared.errors', [ 'errorsName' => ['book_title', 'user_name', 'borrowing_date', 'returning_date'] ])

    @auth('user')
        @if ($book->available)
            <div class="container">
                <div class="row justify-content-center">
                    <form class="col-sm-6 text-center" action="/borrowings/store" method="POST">
                        @csrf
                        <input type="text" name=book_title value="{{$book->fullTitle}}" hidden>
                        <input type="text" name="user_name" value="{{ Auth::guard('user')->user()->name }}" hidden>
                        <input type="submit" value="Borrow" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <br><br>
        @endif
    @endauth

    @include('shared.show.info',[
        'elements' => [
            'ID' => [
                'type' => 'item',
                'value' => $book->id
            ],
            'Author' => [
                'type' => 'localItemLink',
                'value' => $book->author->name,
                'path' => '/authors/',
                'id' => $book->author->id
            ],
            'Type' => [
                'type' => 'item',
                'value' => $book->type
            ],
            'Volume' => [
                'type' => 'item',
                'value' => $book->volume
            ],
            'Publisher' => [
                'type' => 'localItemLink',
                'value' => $book->publisher->name,
                'path' => '/publishers/',
                'id' => $book->publisher->id
            ],
            'Publish Year' => [
                'type' => 'item',
                'value' => $book->publish_year
            ],
            'Number of copies' => [
                'type' => 'item',
                'value' => $book->copies_number
            ],
            'Available' => [
                'type' => 'boolItem',
                'value' => $book->available
            ],
            'Created' => [
                'type' => 'item',
                'value' => $book->created_at
            ],
            'Updated' => [
                'type' => 'item',
                'value' => $book->updated_at
            ],
        ],
        'image' => Storage::url($book->cover_link)
    ])



    <br><br>


    <br><br>

</body>

</html>


