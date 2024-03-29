<body>
    <header class="header-home">
        <div class="p6-wrap">
            <div class="logo">
                <a href="<?php echo URLROOT;?>">
                    <img class="w100" src="<?php echo URLROOT.'src/img/logowhite.svg' ?>"/>
                </a>
            </div>
            <!-- MENU -->
            <div class="menu">
                <button class="menu-burguer"></button>
                <nav class="menu-primary">
                    <ul>
                        <?php if(!isset($_SESSION['user'])){ ?>
                            <li>
                                <a href="<?php echo URLROOT.'controllers/login.php' ?>">login</a>
                            </li>
                            <li class="has-dropdown">
                                <span class="dropdown-button">Registro</span">
                                <ul class="dropdown">
                                    <li><a href="<?php echo URLROOT.'controllers/register/' ?>">Estudiante</a></li>
                                    <li><a href="<?php echo URLROOT.'controllers/register/admin.php' ?>">Administrador</a></li>
                                </ul>                    
                            </li>
                        <?php } elseif($_SESSION['role'] == 'admin') { ?>
                            <li class="has-dropdown">
                                <a class="dropdown-button" href="<?php echo URLROOT.'controllers/admin/' ?>">Administracion</a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="<?php echo URLROOT.'controllers/admin/courses/' ?>">Courses</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo URLROOT.'controllers/admin/clases/' ?>">Clases</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo URLROOT.'controllers/admin/teachers/' ?>">teachers</a>
                                    </li>
                                </ul>                    
                            </li>
                            <li class="has-dropdown">
                                <span class="dropdown-button">Mi perfil</span>
                                <ul class="dropdown">
                                    <li>
                                        <a href="<?php echo URLROOT.'controllers/miperfil/' ?>">Modificar</a>
                                    </li>
                                    <li><a href="<?php echo URLROOT.'libraries/logout.php' ?>">Logout</a></li>
                                </ul>                    
                            </li>
                        <?php } elseif($_SESSION['role'] == 'student') { ?>
                            <li class="has-dropdown">
                                <span class="dropdown-button">Mi aprendizaje</span>
                                <ul class="dropdown">
                                    <li>
                                        <a href="<?php echo URLROOT.'controllers/student/' ?>">Mis clases</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo URLROOT.'controllers/student/miscursos.php' ?>">Mis cursos</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-dropdown">
                                <span class="dropdown-button">Mi perfil</span>
                                <ul class="dropdown">
                                    <li>
                                        <a href="<?php echo URLROOT.'controllers/miperfil/' ?>">Modificar</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo URLROOT.'libraries/logout.php' ?>">Logout</a>
                                    </li>
  
                                </ul>                    
                            </li>

                        <?php } ?>
                    </ul>
                </nav>
            </div>
            
        </div>
    </header>
    