<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio</title>
    <link rel="stylesheet" href="./styles/index.css?v=<?php echo time(); ?>">
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="styles/grafica.css?v=<?php echo time(); ?>">
    
</head>

<body>

    <!-- INCLUDE DE MENÚ LATERAL -->
    <?php
    include './elementos/navGeneral.php';
    ?>
    <!-- INCLUDE DEL NAV  -->
    <?php
    include './elementos/menuLateral.php';
    ?>

    <div class="container">
        <!-- LANZAMIENTO -->
        <div class="timeline">
            <div class="custom"></div>
            <div class="icon">

                <!-- <span><i class="fa fa-star"></i></span> -->

                <span><img src="img/rocket2.0.png" alt=""></span>

            </div>
            <div class="info">
                <h2>Lanzamiento</h2>
                <small><strong>Mayo 2024</strong></small>
                <p><strong>UniMatch es una plataforma desarrollada por alumnos del Instituto Nebrija,con la finalidad de
                        acercar a los estudiantes de los diferentes grados impartidos.
                        Esperemos que sirva para romper el hielo.
                </p></strong>
            </div>
        </div>

        <!-- GUÍA -->
        <div class="timeline box-right">
            <div class="custom"></div>
            <div class="icon">

                <!-- <span><i class="fa fa-star"></i></span> -->

                <span><img src="img/guia2.0.png" alt=""></span>

            </div>
            <div class="info">
                <h2>Guía de uso</h2>
                <br>
                <ol class="useGuide">
                    <li><strong>Resgistrate con el correo institucional</strong></li>
                    <li><strong>Crea tu perfil</strong></li>
                    <li><strong>Elige tu centro y busca gente nueva</strong></li>
                </ol>

            </div>
        </div>

        <!-- MULTIPLATAFORMA -->
        <div class="timeline">
            <div class="custom"></div>
            <div class="icon">

                <!-- <span><i class="fa fa-star"></i></span> -->
                <span><img src="img/movil2.0.png" alt=""></span>


            </div>
            <div class="info">
                <h2>Multiplataforma</h2>
                <small><strong>Agosto 2024</strong></small>
                <p><strong>Este sera una gran paso para nuestra plataforma ya que sera accesible desde cualquier
                        dispositivo movil.</strong></p>
            </div>
        </div>

        <!-- EXPANSIÓN -->
        <div class="timeline box-right">
            <div class="custom"></div>
            <div class="icon">

                <!-- <span><i class="fa fa-star"></i></span> -->
                <span><img src="img/expansion2.0.png" alt=""></span>
            </div>
            <div class="info">
                <h2>Digital Marketing</h2>
                <small><strong>Septiembre 2024</strong></small>
                <p><strong>Se dara acceso a estudiantes de otras Universidades y asi conectar las diferentes
                        comunidades.</strong> </p>
            </div>
        </div>

        <!-- EVENTOS -->
        <div class="timeline ">
            <div class="custom"></div>
            <div class="icon">

                <!-- <span><i class="fa fa-star"></i></span> -->
                <span><img src="img/party2.0.png" alt=""></span>
            </div>
            <div class="info">
                <h2>Eventos</h2>
                <small><strong>2025</strong></small>
                <p><strong>Eventos sera un apartado de la plataforma donde se podra encontrar toda la info y acceso a
                        tickets de las mejores sesiones en los mejores clubs y festivales del momento.</strong></p>
            </div>
        </div>
    </div>

    <?php
    include './elementos/paginaGrafica.php';
    include './elementos/footer.php';
    ?>

</body>

</html>