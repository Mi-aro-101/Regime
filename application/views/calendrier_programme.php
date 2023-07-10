<script src=<?php echo base_url("css/librairieCalendrier/index.global.js"); ?>></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialDate: '<?php echo $year;?>-<?php echo $month;?>-01',
      editable: true,
      selectable: true,
      businessHours: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        // {
        //   <?php for($i=0; $i<count($res); $i++){?>
        //   title: '<?php echo $res[$i]['NomHabitation'];?>',
        //   start: '<?php echo $res[$i]['Datearrive'];?>',
        //   end: '<?php echo $res[$i]['Datedepart'];?>'
        //   <?php }?>
        // }
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
    max-width: 1100px;
    margin: 0 auto;
  }

  .input-search-date{
    margin-left: 400px;
    margin-bottom: 100px;
  }

</style>
<div id='calendar'></div>