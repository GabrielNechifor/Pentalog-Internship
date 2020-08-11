@include('shared.head', ['title' => 'Publisher'])

<body>
    @include('shared.navbar', ['active' => 'publishers'])

    @include('shared.title', ['title' => $publisher->name])

    @include('shared.show.info', [
        'elements' => [
            'ID' => [
                'type' => 'item',
                'value' => $publisher->id
            ],
            'Founded' => [
                'type' => 'item',
                'value' => $publisher->founded
            ],
            'Origin Country' => [
                'type' => 'item',
                'value' => $publisher->origin_country
            ],
            'Location' => [
                'type' => 'item',
                'value' => $publisher->location
            ],
            'Website' => [
                'type' => 'itemLink',
                'value' => $publisher->website
            ],
            'Books' => [
                'type' => 'localLinkList',
                'objects' => $publisher->books()->get(),
                'method' => 'fullTitle',
                'path' => '/books/',
                'id' => 'id'
            ],
            'Authors' => [
                'type' => 'localLinkList',
                'objects' => $publisher->authors()->get()->unique(),
                'method' => 'name',
                'path' => '/authors/',
                'id' => 'id'
            ],
            'Created' => [
                'type' => 'item',
                'value' => $publisher->created_at
            ],
            'Updated' => [
                'type' => 'item',
                'value' => $publisher->updated_at
            ]
        ],
        'image' => null
    ])

</body>

</html>
