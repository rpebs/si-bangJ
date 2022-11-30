@extends('layouts.master')
@section('content')
    <div class="container">
        <p>
        <h1>Daftar Agenda </h1>
        </p>
        <center>
            <div class="card col-md-8">
                <div class="card-header">
                    Agenda Surat Masuk dan Keluar
                </div>
                <div class="row">
                    <div class="panel-body">
                        <div id='calendar'></div>
                    </div>
                </div>


            </div>
        </center>

    </div>
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
                            end: '{{ $ev->tgl_selesai }}',
                            url: 'surat/keluar/{{ $ev->kode_surat }}',

                        },
                    @endforeach
                    @foreach ($event as $evt)
                        {
                            title: '{{ $evt->pengirim }}',
                            description: '{{ $ev->kode_surat }}',
                            start: '{{ $evt->tgl_mulai }}',
                            end: '{{ $evt->tgl_selesai }}',
                            url: 'surat/masuk/{{ $evt->kode_surat }}'
                        },
                    @endforeach

                ],
                eventClick: function(info) {
                    info.jsEvent.preventDefault(); // don't let the browser navigate

                    if (info.event.url) {
                        window.open(info.event.url);
                    }
                },

                selectOverlap: function(event) {
                    return event.rendering === 'background';
                },


            });

            calendar.render();
        });
    </script>
@endsection

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.5.1/fullcalendar.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
    integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- fullcalendar css  -->
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
