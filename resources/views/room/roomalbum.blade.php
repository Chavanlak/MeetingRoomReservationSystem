<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Room booking</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anuphan:wght@100..700&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">





    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


    <style>
        body {
            font-family: "Anuphan", serif;
        }

        div {
            font-family: "Anuphan", serif;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .scrollable {
            overflow-y: auto;
            max-height: 200px;
            min-height: 200px;
        }

        .bg-custom-1 {
            background-color: #fdfefe;
            /* Light Coral */
        }

        .bg-custom-2 {
            background-color: #e3e6e6;
            /* Light Coral */
        }
    </style>


</head>

<body>



    <main>

        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">ระบบจองห้องประชุม</h1>
                    <p class="lead text-muted">กรุณาเลือกห้องที่ต้องการจอง หรือกลับไปดูหน้าการจองของฉัน <a
                            href="/home">click</a></p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($roomList as $room)
                        <div class="col">
                            <div class="card shadow-sm">
                                @if ($room->roomName == 'Meeting Room1')
                                    <img src="{{ asset('picture/meeting1.jpg') }}" alt="">
                                @elseif($room->roomName == 'Meeting Room2')
                                    <img src="{{ asset('picture/meeting2.jpg') }}" alt="">
                                @else
                                    <img src="{{ asset('picture/meeting3.jpg') }}" alt="">
                                @endif



                                <div class="card-body scrollable">
                                    <p class="card-title fw-bold">{{ $room->roomName }}</p>
                                    @php
                                        // Define an array of colors for bookings
                                        $colors = [
                                            'bg-custom-1',
                                            // 'bg-light',
                                            // 'bg-success',
                                            // 'bg-danger',
                                            // 'bg-warning',
                                            // 'bg-info',
                                        ];
                                        $colorIndex = 0;
                                    @endphp

                                    {{-- <div class="card-text"> --}}

                                    @foreach ($bookingList as $booking)
                                        @foreach ($booking as $bb)
                                            @if ($bb->roomId == $room->roomId)
                                                @php
                                                    // Assign a color and cycle through the array
                                                    $currentColor = $colors[$colorIndex % count($colors)];
                                                    $colorIndex++;
                                                @endphp
                                                <div class="card text-dark {{ $currentColor }} mb-3"
                                                    style="max-width: 18rem;">
                                                    <div class="card-body">

                                                        {{-- <p class="text-decoration-underline">{{ $bb->bookingAgenda }}</p> --}}
                                                        {{-- <p>{{ $bb->bookingAgenda }}</p> --}}
                                                        <p class="card bg-secondary text-white">
                                                            {{ $bb->bookingTimeStart . ' - ' . $bb->bookingTimeFinish }}
                                                        </p>
                                                        <p>หัวข้อ : {{ $bb->bookingAgenda }}</p>
                                                        {{-- <p>ผู้จอง : {{ $bb->firstName . ' ' . $bb->lastName }}</p> --}}
                                                        {{-- <p>ผู้จอง : {{ $bb->department }}&nbsp;&nbsp;&nbsp;&nbsp;{{ $bb->phone}}</p> --}}

                                                        <p>ผู้จอง :
                                                            {{ $bb->department }}&nbsp;&nbsp;&nbsp;&nbsp;{{ $bb->phone }}
                                                        </p>

                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="card-footer text-muted">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="/booking/{{ $room->roomId }}"
                                                class="btn btn-sm btn-outline-secondary">จองห้อง</a>
                                            {{-- <a href="#" class="btn btn-sm btn-outline-secondary">รายละเอียด</a> --}}
                                        </div>
                                        @foreach ($bookingList as $booking)
                                            @foreach ($booking as $bb)
                                                @if ($bb->roomId == $room->roomId)
                                                    <small
                                                        class="text-mute">reservation:{{ $booking->count() }}</small>
                                                    @break

                                                    {{-- <small class="text-mute">{{"Reservation:"$bb->count()}}</small> --}}
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


</body>

</html>
