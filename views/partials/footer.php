    </main>
    <footer>
        <div class="p6-wrap">
            ©<?php echo date("Y") ?> mvc3
        </div>
    </footer>
    <script type="text/javascript" src="<?php echo URLROOT.'src/js/jquery-3.3.1.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo URLROOT.'src/js/ofi.min.js' ?>"></script>
    <script type="text/javascript" src="<?php echo URLROOT.'src/js/select2.full.min.js' ?>"></script>
    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){ ?>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.5/datatables.min.js"></script>
     <?php }; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/7.4.1/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo URLROOT.'src/js/app.js' ?>"></script>
</body>
</html>