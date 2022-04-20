<?php
include '../../views/partials/header.php';
?>

<?php $events = [] ?>

<script>
    let events = JSON.parse('<?php echo json_encode($events) ?>');
</script>

<div class="w-content">
  
    <div class="grid-row">
        <div class="grid-md-12  mgb-20">
            <h3 class="text-center">Bienvend@ al Areá de Administración</h3>
        </div>
        <div class="grid-md-12 mgb-3">
            <p class="text-center">Desde estos accesos podras comenzar a insertar</p>
        </div>
    </div>
    <div class="grid-row  mgb-20">
        <div class="grid-md-4 mgb-3">
			<div class="pd-10"><a href="<?php echo URLROOT.'controllers/admin/teachers/insertar.php'?>" class="button">Añadir Profesores</a></div>
        </div>
        <div class="grid-md-4 mgb-3">
			<div class="pd-10"><a href="<?php echo URLROOT.'controllers/admin/courses/insertar.php'?>" class="button">Añadir Cursos</a></div>
        </div>
        <div class="grid-md-4 mgb-3">
			<div class="pd-10"><a href="<?php echo URLROOT.'controllers/admin/clases/insertar.php'?>" class="button">Añadir Clases</a></div>
        </div>
    </div>
    <div class="grid-row ">
        <div class="grid-md-12 mgb-3">
            <p class="text-center">Desde estos accesos podras administrar</p>
        </div>
    </div>
    <div class="grid-row">
        <div class="grid-md-4 mgb-3">
			<div class="pd-10"><a href="<?php echo URLROOT.'controllers/admin/teachers/'?>" class="button">Administrar Profesores</a></div>
        </div>
        <div class="grid-md-4 mgb-3">
			<div class="pd-10"><a href="<?php echo URLROOT.'controllers/admin/courses/'?>" class="button">Administrar Cursos</a></div>
        </div>
        <div class="grid-md-4 mgb-3">
			<div class="pd-10"><a href="<?php echo URLROOT.'controllers/admin/clases/'?>" class="button">Administrar Clases</a></div>
        </div>
    </div>
</div>

<div id="calendar"></div>


<?php
include '../../views/partials/footer.php'
?>