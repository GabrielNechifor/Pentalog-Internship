@include('shared.head', ['title' => 'List of users'])

<body>
    @include('shared.navbar', ['active' => 'users'])

    @include('shared.title', ['title' => 'List of users'])

    @include('shared.index.table', [
        'path' => 'users',

        'id' => 'id',

        'columnNames' => ['Name', 'Email', 'Gender', 'Birth Date', 'Address', 'Phone Number'],

        'objects' => $users,

        'elements' => [
            'name' => [
                'type' => 'showElement',
                'methods' => ['name']
            ],
            'email' => [
                'type' => 'element',
                'methods' => ['email']
            ],
            'gender' => [
                'type' => 'element',
                'methods' => ['gender']
            ],
            'birth_date' => [
                'type' => 'element',
                'methods' => ['birth_date']
            ],
            'address' => [
                'type' => 'element',
                'methods' => ['address']
            ],
            'phone_number' => [
                'type' => 'element',
                'methods' => ['phone_number']
            ]
        ]
        ])
</body>

</html>
