<body>
    <header class="header-home">
        <div class="p6-wrap">
            <div class="logo">
                <a href="<?php echo URLROOT;?>">
                    <img class="w100" src="<?php echo URLROOT.'src/img/logowhite.svg' ?>"/>
                </a>
            </div>
            <!-- MENU -->
            <div class="menu-burger">
            </div>
            <nav class="menu-primary">
                <ul>
                    <?php if(!isset($_SESSION['user'])){ ?>
                        <li>
                            <a href="<?php echo URLROOT.'controllers/login.php' ?>">login</a>
                        </li>
                        <li>
                            <a href="<?php echo URLROOT.'controllers/register.php' ?>">Registrarse</a>
                        </li>
                    <?php }else{ ?>
                        <li>
                            <a href="<?php echo URLROOT.'libraries/Logout.php' ?>">Logout</a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </header>
    