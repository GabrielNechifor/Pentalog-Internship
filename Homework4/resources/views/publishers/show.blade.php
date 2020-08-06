@include('shared.head', ['title' => 'Publisher'])

<body>
    @include('shared.navbar', ['active' => 'publishers'])

    @include('shared.title', ['title' => $publisher->name])

    @include('shared.show.info',[
        'elements' => [
            'ID' => [ 'type' => 'item', 'value' => $publisher->id ],
            'Founded' => [ 'type' => 'item', 'value' => $publisher->founded ],
            'Origin Country' => [ 'type' => 'item', 'value' => $publisher->origin_country ],
            'Location' => [ 'type' => 'item', 'value' => $publisher->location ],
            'Website' => [ 'type' => 'iteminLk', 'value' => $publisher->website ],
            'Created' => [ 'type' => 'item', 'value' => $publisher->created_at ],
            'Updated' => [ 'type' => 'item', 'value' => $publisher->updated_at ]
        ],
        'image' => null
    ])

</body>

</html>
