
@include('shared.head', ['title' => 'Add an user'])

<body>
    @include('shared.navbar', ['active' => 'users'])

    @include('shared.title', ['title' => 'Add an user'])

    @include('shared.errors', [ 'errorsName' => [
                                    'name',
                                    'email',
                                    'password',
                                    'gender',
                                    'country',
                                    'birth_date',
                                    'address',
                                    'phone_number'
                                ]
            ])

    @include('shared.create.form', [
        'path' => 'users',

        'parameters' => [
            'Name' => [
                'type' => 'text',
                'name' => 'name',
                'required' => 'required'
            ],
            'Email' => [
                'type' => 'email',
                'name' => 'email',
                'required' => 'required'
            ],
            'Password' => [
                'type' => 'password',
                'name' => 'password',
                'required' => 'required'
            ],
            'Gender' => [
                'type' => 'select',
                'name' => 'gender',
                'values' => ['male', 'female', 'unknown'],
                'selected' => 'unknown',
                'required' => 'required'
            ],
            'Birth date' => [
                'type' => 'date',
                'name' => 'birth_date',
                'required' => 'required'
            ],
            'Address' => [
                'type' => 'text',
                'name' => 'address',
                'required' => 'required'
            ],
            'Phone number' => [
                'type' => 'text',
                'name' => 'phone_number',
                'required' => 'required'
            ],
        ],
        'enctype' => null
    ])

</body>

</html>
