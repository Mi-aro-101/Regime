<link rel="stylesheet" href=<?php echo base_url("css/librairieCalendrier/fullcalendar.min.css_9.0.6/fullcalendar.min.css");?>>
<link rel="stylesheet" href=<?php echo base_url("css/librairieCalendrier/fullcalendar.min.js_4.0.0-alpha.4/fullcalendar.min.js");?>>
<link rel="stylesheet" href=<?php echo base_url("css/librairieCalendrier/moment.min.js_2.27.0/moment.min.js");?>>
<link rel="stylesheet" href=<?php echo base_url("css/librairieCalendrier/jquery.min.js_3.5.1/jquery.min.js");?>>C:
<script src=<?php echo base_url("css/librairieCalendrier/index.global.js")?>></script> 

<?php

$data1 = array(
  'title' => 'Événement 1',
  'start' => '2023-07-11',
  'end' => '2023-07-13'
);

$data2 = array(
  'title' => 'Événement 2',
  'start' => '2023-07-15',
  'end' => '2023-07-16'
);

$data3 = array(
  'title' => 'Événement 3',
  'start' => '2023-07-20',
  'end' => '2023-07-22'
);

$data4 = array(
  'title' => 'Événement 3',
  'start' => '2023-07-28',
  'end' => '2023-08-06'
);

$calendarEvents = array(
  $data1,
  $data2,
  $data3,
  $data4
);


?>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialDate: '2023-07-01',
      editable: true,
      selectable: true,
      businessHours: true,
      dayMaxEvents: true, // allow "more" link when too many events
      // events: [
      //   {
      //     title:'PetitDejeuner',
      //     start:'2023-07-11',
      //     end: '2023-07-11'
          
      //   }
      // ]
      events: <?php echo json_encode($calendarEvents); ?>
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
