@include('shared.head', ['title' => 'Notifications'])

<body>
    @include('shared.navbar', ['active' => null])

    <div class="vertical-center">
        <div class="container col-sm-5 text-center">
            @if (! $unseenNotifications->isEmpty())
                <h2 class="text-primary">Unseen Notifications</h1>
            @endif
            <ul class="list-group">
                @foreach ($unseenNotifications as $notification)
                    <li class="list-group-item list-group-item-primary">
                        <h5 class="text-primary">{{ $notification->name }}</h5>
                        <p class="font-weight-bold">{{ $notification->message }}</p>
                        <p>{{ $notification->created_at }}</p>
                    </li>
                @endforeach
            </ul>

            @if (! $seenNotifications->isEmpty())
                <h2 class="text-primary">Seen Notifications</h1>
            @endif
            <ul class="list-group">
                @foreach ($seenNotifications as $notification)
                    <li class="list-group-item list-group-item-primary">
                        <h5 class="text-primary">{{ $notification->name }}</h5>
                        <p class="font-weight-bold">{{ $notification->message }}</p>
                        <p>{{ $notification->created_at }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
{{--
    @foreach ($unseenNotifications as $notification)
    @include('shared.show.info',[
        'elements' => [
                'Name' => [
                    'type' => 'item',
                    'value' => $notification->name
                ],
                'Message' => [
                    'type' => 'item',
                    'value' => $notification->message
                ],
                'Seen' => [
                    'type' => 'item',
                    'value' => 'No'
                ],
                'Created' => [
                    'type' => 'item',
                    'value' => $notification->created_at
                ],
                'Updated' => [
                    'type' => 'item',
                    'value' => $notification->updated_at
                ],
        ],
        'image' => null
    ])
    @endforeach

    @foreach ($seenNotifications as $notification)
    @include('shared.show.info',[
        'elements' => [
                'Name' => [
                    'type' => 'item',
                    'value' => $notification->name
                ],
                'Message' => [
                    'type' => 'item',
                    'value' => $notification->message
                ],
                'Seen' => [
                    'type' => 'item',
                    'value' => 'Yes'
                ],
                'Created' => [
                    'type' => 'item',
                    'value' => $notification->created_at
                ],
                'Updated' => [
                    'type' => 'item',
                    'value' => $notification->updated_at
                ],
        ],
        'image' => null
    ])
    @endforeach --}}

<br><br>

</body>

</html>
