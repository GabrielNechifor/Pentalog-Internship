@include('shared.head', ['title' => 'List of publishers'])

<body>
    @include('shared.navbar', ['active' => 'publishers'])

    @include('shared.title', ['title' => 'List of publishers'])

    @include('shared.index.table', [
        'path' => 'publishers',
        'columnNames' => ['Name', 'Founded', 'Country', 'Location', 'Website'],
        'objects' => $publishers,
        'id' => 'id',
        'elements' => [
            'title' => [ 'type' => 'showElement', 'methods' => ['name'] ],
            'founded' => [ 'type' => 'element', 'methods' => ['founded'] ],
            'country' => [ 'type' => 'element', 'methods' => ['origin_country'] ],
            'location' => [ 'type' => 'element', 'methods' => ['location'] ],
            'website' => [ 'type' => 'linkElement', 'methods' => ['website'] ]
        ]
        ])
</body>

</html>
