<link rel="stylesheet" href=<?php echo base_url("css\librairieCalendrier\fullcalendar.min.css_9.0.6\fullcalendar.min.css");?>>
<link rel="stylesheet" href=<?php echo base_url("css\librairieCalendrier\fullcalendar.min.js_4.0.0-alpha.4\fullcalendar.min.js");?>>
<link rel="stylesheet" href=<?php echo base_url("css\librairieCalendrier\moment.min.js_2.27.0\moment.min.js");?>>
<script src=<?php echo base_url("css\librairieCalendrier\index.global.js")?>></script> 
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialDate: '2023-07-01',
      editable: true,
      selectable: true,
      businessHours: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title:'Test',
          start:'2023-07-11',
          end: '2023-07-13'
          
        }
      ]
    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 800px;
    margin: 0 auto;
  }

  .input-search-date{
    margin-left: 400px;
    margin-bottom: 100px;
  }

</style>
