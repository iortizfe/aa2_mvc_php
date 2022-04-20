<?php
    include '../../views/partials/header.php';
?>
   
  
<!DOCTYPE html>
<html lang='es'>
  <head>
    <meta charset='utf-8' />
<script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
 

  var calendar = new FullCalendar.Calendar(calendarEl, {
	
    initialView: 'dayGridMonth',
    initialDate: '2022-04-07',
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay',
	  
    },
	locale: 'es',
    events: [
		<?php 
			if(isset($mine_clases)){
				foreach ($mine_clases as $clase) { 
 		?>
		
	  
		
      {
        title: "<?php echo "Curso: ".$clase->cursename; ?>",
		start: "<?php echo $clase->day."T".$clase->time_start ?>",
		
		

		
      },
      {
        title: "<?php echo $clase->classname; ?>",
		
		end: "<?php echo $clase->day."T".$clase->time_end ?>",
		allDay:true,
      },
      
	  {
		
		
	  }


	  <?php }
			}
		?>
    ],

	eventTimeFormat: { // like '14:30:00'
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit',
    meridiem: false
  }
  });

  calendar.render();
});
</script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>


<?php
    include '../../views/partials/footer.php'
?>