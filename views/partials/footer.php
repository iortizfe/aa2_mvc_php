    </main>
    <footer>
        <div class="p6-wrap">
            ©<?php echo date("Y") ?> mvc3
        </div>
    </footer>
    <script type="text/javascript" src="<?php echo URLROOT.'src/js/jquery-3.3.1.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo URLROOT.'src/js/ofi.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo URLROOT.'src/js/select2.full.min.js' ?>"></script>
    <?php if(isset($_SESSION['role'])){ ?>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.5/datatables.min.js"></script>
     <?php }; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.4.1/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/locales-all.min.js"></script>
    
    <!--
    <script src="<?php echo URLROOT.'src/js/fullcalendar/main.min.js' ?>"></script>
    <script src="<?php echo URLROOT.'src/js/fullcalendar/es.js' ?>"></script>
    -->

    <!-- <script src="<?php echo URLROOT.'src/js/calendario.js' ?>"></script> -->
    

</body>
</html>