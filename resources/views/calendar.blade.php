<!doctype html>
<html lang="en">

<head>
    <title>Laravel 9 Fullcalandar Jquery Ajax Create and Delete Event </title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- fullcalendar css  -->
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
</head>
</head>

<body>
    <div class="container">
        <p>
        <h1>Laravel 9 Fullcalandar Jquery Ajax Create and Delete Event </h1>
        </p>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Laravel 9 Fullcalandar Jquery Ajax Create and Delete Event
            </div>
            <div class="row">
                <div class="panel-body col-5">
                    <div id='calendar'></div>
                </div>
                <div class="col">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>1</th>
                                <th>1</th>
                                <th>1</th>
                                <th>1</th>
                                <th>1</th>
                                <th>1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>awdaw</td>
                                <td>awdaw</td>
                                <td>awdaw</td>
                                <td>awdaw</td>
                                <td>awdaw</td>
                                <td>awdaw</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>


        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            eventColor: 'green',
            events: [
                @foreach ($events as $ev)
                    {
                        color: 'red',
                        title: '{{ $ev->tujuan }}',
                        start: '{{ $ev->tgl_mulai }}',
                        end: '{{ $ev->tgl_selesai }}'
                    },
                @endforeach
                @foreach ($event as $evt)
                    {
                        title: '{{ $evt->pengirim }}',
                        start: '{{ $evt->tgl_mulai }}',
                        end: '{{ $evt->tgl_selesai }}'
                    },
                @endforeach

            ],
            selectOverlap: function(event) {
                return event.rendering === 'background';
            }
        });

        calendar.render();
    });
</script>

</html>
