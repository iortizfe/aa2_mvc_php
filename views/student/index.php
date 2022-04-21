<?php
    include '../../views/partials/header.php';
?>
<main class="o-register-page o-register-form">
	<div class="w-content">
		<h2 class="general-title tcenter">Mis clases</h2>
		<div class="grid-row">
			<div class="grid-md-3">
				<div class="pd-10"><a href="<?php echo URLROOT.'controllers/student/miscursos.php'?>" class="button">Mis cursos</a></div>
			</div>
			<div class="grid-md-9 pd-20">
			</head>
				<div id='calendar'></div>
			</div>
		</div>
	</div>
</main>

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
			title: "<?php echo $clase->classname; ?>",
			start: "<?php echo $clase->day."T".$clase->time_start; ?>",
			end: "<?php echo $clase->day."T".$clase->time_end; ?>",
			allDay:false,
		
			color:"<?php echo $clase->color; ?>",
			
			
		},
	  
	  <?php }
			}
		?>
    ],

		

  });

  calendar.render();
});
</script>
<?php
    include '../../views/partials/footer.php'
?>