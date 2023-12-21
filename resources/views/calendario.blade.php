@extends('layouts.app')

@section('content')
    <div id="calendar"></div>
    ciao
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid'],
                events: {
                    url: '/calendario-eventi', // Percorso della rotta per ottenere gli eventi
                    method: 'GET',
                    extraParams: {
                        _token: '{{ csrf_token() }}', // Token CSRF, se necessario
                    },
                    failure: function() {
                        alert('Errore nel caricamento degli eventi!');
                    },
                },
            });
            calendar.render();
        });
    </script>
@endsection
