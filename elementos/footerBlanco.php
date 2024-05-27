<footer>

    <div class="footer">


        <div class="footer-row">

            <div class="footer-links">

                <h4>¿Que podemos hacer por ti?</h4>

                <ul>
                    <li><a href="#">Preguntas frecuentes</a></li>
                    <li><a href="#">Conferencias</a></li>
                    <li><a href="#">Centros</a></li>
                </ul>
            </div>

            <div class="footer-links">

                <h4>El equipo</h4>

                <ul>
                    <li><a href="#">Francisco José</a></li>
                    <li><a href="#">Juan Esteban</a></li>
                    <li><a href="#">Rafael Montes</a></li>
                    <li><a href="#">Marcos</a></li>
                </ul>
            </div>


            <div class="footer-links">

                <h4>¿Trabajamos juntos?</h4>

                <p class="escribenos">¡Escribenos!</p>
                <div class="social-link">
                    
                    <a href="https://www.instagram.com/unimatch2/" target="_blank" onclick>
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/@IcarusTech-qh9fj" target="_blank" onclick>
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="https://github.com/orgs/IcarusTech/people" target="_blank" onclick>
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>

            <div class="footer-links">

                <h4>Enlaces de interés</h4>

                <ul>
                    <li><a href="../unimatch/documentosLegales/privacidad.php"target="_blank">Política de privacidad</a></li>
                    <li><a href="../unimatch/documentosLegales/terminos.php"target="_blank">Terminos y condiciones</a></li>
                </ul>
            </div>


        </div>


    </div>

</footer>
<style>
    footer {
        clear: both;
        position: relative;
        top: auto;
        height: fit-content;
        padding: 20px 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    footer * {
        list-style: none;
    }

    .footer {
        margin: 0 auto;
    }

    .footer-row {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }

    .footer-links {
        width: 25%;
        
    }

    .footer-links h4 {
        width: 280px;
        font-size: 20px;
        color: red;
        margin-bottom: 25px;
        font-weight: 500;
        font-size: 20px;
        margin-bottom: 10px;
        /* Puedes ajustar el espaciado según sea necesario */
        font-weight: 500;
        display: inline-block;
        border-bottom: 2px solid #ff0066;
        /* Línea decorativa debajo de cada título h4 */
        padding-bottom: 5px;
        /* Espacio entre el texto y la línea */
    }

    .escribenos {
        color: black;
        margin-bottom: 5%;
    }

    .linea {
        width: 100px;
        height: 3px;
        background-color: #ff0066;
        position: relative;

    }

    .footer-links ul li a {
        font-size: 18px;
        text-decoration: none;
        color: black;
        display: block;
        margin-bottom: 15px;
        transition: all .3s ease;
    }

    .footer-links ul li a:hover {
        color: red;
        padding-left: 6px;
    }

    .social-link a {
        display: inline-block;
        min-height: 40px;
        width: 40px;
        background-color: rgba(255, 255, 255, 0.2);
        margin: 0 10px 10px 0;
        text-align: center;
        line-height: 40px;
        border-radius: 50%;
        color: black;
        transition: all .5s ease;
    }

    .social-link a:hover {
        background-color: #ff0066;
    }

    @media(max-width:991px) {
        .footer-row {
            text-align: center;
        }


        .footer-links {
            width: 100%;
            margin-bottom: 30px;
        }



    }
</style>