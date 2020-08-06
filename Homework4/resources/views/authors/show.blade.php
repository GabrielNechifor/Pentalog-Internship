@include('shared.head', ['title' => 'Author'])

<body>
    @include('shared.navbar', ['active' => 'authors'])

    @include('shared.title', ['title' => $author->name])

    @include('shared.show.info',[
        'elements' => [
            'ID' => [ 'type' => 'item', 'value' => $author->id ],
            'Books' => [ 'type' => 'list', 'objects' => $author->books()->get(), 'method' => 'title' ],
            'Publishers' => [ 'type' => 'list', 'objects' => $author->publishers()->get()->unique(), 'method' => 'name' ],
            'Gender' => [ 'type' => 'item', 'value' => $author->gender ],
            'Country' => [ 'type' => 'item', 'value' => $author->country ],
            'Birth Date' => [ 'type' => 'item', 'value' => $author->birth_date ],
            'Death Date' => [ 'type' => 'item', 'value' => $author->death_date ],
            'Created' => [ 'type' => 'item', 'value' => $author->cretaed_at ],
            'Updated' => [ 'type' => 'item', 'value' => $author->updated_at ]
        ],
        'image' => Storage::url($author->image_url)
    ])

</body>

</html>
