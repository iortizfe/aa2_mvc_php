<?php
include '../../views/partials/header.php';
?>

<?php $events = [] ?>

<script>
    let events = JSON.parse('<?php echo json_encode($events) ?>');
</script>

<div class="mt-5"></div>

<div class="container">
    <div class="row">
        <div class="col msjs">
            <?php //include('msjs.php') ?>
            <?php if (isset($_REQUEST['e'])) : ?>
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong>Felicitaciones!</strong> El evento fue registrado correctamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>

            <?php if (isset($_REQUEST['ea'])) : ?>
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong>Felicitaciones!</strong> El evento fue actualizado correctamente.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>

            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="display: none;">
                <strong>Felicitaciones!</strong> El evento fue borrado correctamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>

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