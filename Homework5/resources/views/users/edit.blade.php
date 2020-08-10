
@include('shared.head', ['title' => 'Edit an user'])

<body>
    @include('shared.navbar', ['active' => 'users'])

    @include('shared.title', ['title' => 'Edit an user'])

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

    @include('shared.update.form', [
        'path' => 'users',

        'id' => $user->id,

        'parameters' => [
            'Name' => [
                'type' => 'text',
                'name' => 'name',
                'value' => $user->name,
                'required' => 'required'
            ],
            'Email' => [
                'type' => 'email',
                'name' => 'email',
                'value' => $user->email,
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
                'selected' => $user->gender,
                'required' => 'required'
            ],
            'Birth date' => [
                'type' => 'date',
                'name' => 'birth_date',
                'value' => $user->birth_date,
                'required' => 'required'
            ],
            'Address' => [
                'type' => 'text',
                'name' => 'address',
                'value' => $user->address,
                'required' => 'required'
            ],
            'Phone number' => [
                'type' => 'text',
                'name' => 'phone_number',
                'value' => $user->phone_number,
                'required' => 'required'
            ],
        ],
        'enctype' => null
    ])

</body>

</html>
