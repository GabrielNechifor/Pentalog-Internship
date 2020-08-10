@include('shared.head', ['title' => 'User'])

<body>
    @include('shared.navbar', ['active' => 'users'])

    @include('shared.title', ['title' => $user->name])

    @include('shared.show.info',[
        'elements' => [
            'ID' => [
                'type' => 'item',
                'value' => $user->id
            ],
            'Email' => [
                'type' => 'item',
                'value' => $user->email
            ],
            'History of books borrowed' => [
                'type' => 'localLinkList',
                'objects' => $user->books()->get(),
                'method' => 'fullTitle',
                'path' => '/books/',
                'id' => 'id'
            ],
            'List of unreturned books' => [
                'type' => 'localLinkList',
                'objects' => $user->books()->unreturnedBooks('book_id')->get(),
                'method' => 'fullTitle',
                'path' => '/books/',
                'id' => 'id'
            ],
            'Gender' => [
                'type' => 'item',
                'value' => $user->gender
            ],
            'Birth date' => [
                'type' => 'item',
                'value' => $user->birth_date
            ],
            'Address' => [
                'type' => 'item',
                'value' => $user->address
            ],
            'Phone number' => [
                'type' => 'item',
                'value' => $user->phone_number
            ],
            'Created' => [
                'type' => 'item',
                'value' => $user->created_at
            ],
            'Updated' => [
                'type' => 'item',
                'value' => $user->updated_at
            ]
]       ,
        'image' => null
    ])

</body>

</html>
