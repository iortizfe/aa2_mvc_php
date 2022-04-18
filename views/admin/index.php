<?php
include '../../views/partials/header.php';
?>

<?php $events = [] ?>

<script>
    let events = JSON.parse('<?php echo json_encode($events) ?>');
</script>

<div class="mt-5"></div>
    <div class="row">
        <div class="col-md-12 mb-3">
            <h3 class="text-center" id="title">Como crear un Calendario de Eventos con PHP y MYSQL</h3>
        </div>
    </div>
</div>

<div id="calendar"></div>


<?php
include '../../views/partials/footer.php'
?>