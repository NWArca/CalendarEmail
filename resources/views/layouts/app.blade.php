<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Laravel App</title>

    <!-- Aggiungi gli stili globali qui -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Aggiungi gli stili specifici di FullCalendar -->
    <link rel="stylesheet" href="{{ mix('css/fullcalendar/core.css') }}">
    <link rel="stylesheet" href="{{ mix('css/fullcalendar/daygrid.css') }}">
</head>
<body>
    <!-- Includi la vista della barra di navigazione se necessario -->
    <div class="container">
        Calendar
        <!-- Contenuto principale della pagina -->
        @yield('content')
    </div>

    <!-- Includi gli script globali qui -->
    <script src="{{ mix('js/app.js') }}"></script>

    <!-- Includi gli script specifici di FullCalendar -->
    <script src="{{ mix('js/fullcalendar/core.js') }}"></script>
    <script src="{{ mix('js/fullcalendar/daygrid.js') }}"></script>
</body>
</html>
