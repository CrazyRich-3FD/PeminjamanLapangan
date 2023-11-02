@extends('layouts.index')
@section('content')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'local',
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,listWeek'
                // right: 'dayGridMonth,timeGridWeek,listWeek'
            },
            events:[
                @foreach ($event as $w) 
                    {
                        title: '{{ Carbon\Carbon::parse($w->jam_awal)->format("h:ia")}}-{{ Carbon\Carbon::parse($w->jam_akhir)->format("h:ia")}}<-> {{$w->pin->lap->nama}}<->{{$w->pin->us->name}}',
                        start: '{{ Carbon\Carbon::parse($w->tgl_awal)->format("Y-m-d")}}',
                        end: '{{ Carbon\Carbon::parse($w->tgl_akhir)->addDays(1)->format("Y-m-d")}}',
                    },
                @endforeach
            ],
            
        });
        calendar.render();
    });
</script>
    <div class="container">
        <div id='calendar'></div>
    </div>
@endsection
