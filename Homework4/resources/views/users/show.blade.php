@include('shared.head', ['title' => 'User'])

<body>
    @include('shared.navbar', ['active' => 'users'])

    @include('shared.title', ['title' => $user->name])

    @include('shared.show.info',[
        'elements' => [
            'ID' => [ 'type' => 'item', 'value' => $user->id ],
            'List of books borrowed' => [ 'type' => 'list', 'objects' => $user->books()->get(), 'method' => 'title' ],
            'Gender' => [ 'type' => 'item', 'value' => $user->gender ],
            'Birth date' => [ 'type' => 'item', 'value' => $user->birth_date ],
            'Address' => [ 'type' => 'item', 'value' => $user->address ],
            'Phone number' => [ 'type' => 'item', 'value' => $user->phone_number ],
            'Created' => [ 'type' => 'item', 'value' => $user->created_at ],
            'Updated' => [ 'type' => 'item', 'value' => $user->updated_at ]
]       ,
        'image' => null
    ])

</body>

</html>
