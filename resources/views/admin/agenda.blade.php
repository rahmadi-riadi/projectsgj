@extends('layout.maindash')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Agenda Pemerintahan</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Calendar</div>
                    <div class="card-body">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#calendar').fullCalendar({
                defaultDate: new Date(),
                navLinks: true, // can customize the navigaton arrows
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [{
                        title: 'All Day Event',
                        start: '2019-06-01',
                    },
                    {
                        title: 'Long Event',
                        start: '2019-06-07',
                        end: '2019-06-10'
                    },
                    {
                        title: 'Meeting',
                        start: '2019-06-08',
                        end: '2019-06-09'
                    },
                    {
                        title: 'Birthday Party',
                        start: '2019-06-13',
                        end: '2019-06-14'
                    },
                    {
                        title: 'Click for Editing',
                        start: '2019-06-09T12:00:00',
                        end: '2019-06-09T5:00:00',
                        editable: true
                    },
                ]
            });
        });
    </script>
    @endsection
