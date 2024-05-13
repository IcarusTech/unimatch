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
                    <a href="#" target="_blank" onclick>
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" target="_blank" onclick>
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" target="_blank" onclick>
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" target="_blank" onclick>
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>

            <div class="footer-links">

                <h4>Algun enlace por la cara</h4>

                <ul>
                    <li><a href="#">Politica de privacidad</a></li>
                </ul>
            </div>


        </div>


    </div>

</footer>
<style>
    footer {
        position: relative;
        top: auto;
        height: fit-content;
        padding: 20px 0;
    }

    footer * {
        list-style: none;
    }

    .footer {
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-row {
        display: flex;
        flex-wrap: wrap;
    }

    .footer-links {
        width: 25%;
        padding: 0 15px;
    }

    .footer-links h4 {
        width: 280px;
        font-size: 20px;
        color: #ffffff;
        margin-bottom: 25px;
        font-weight: 500;
        font-size: 20px;
        color: #ffffff;
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
        color: white;
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
        color: #BBBBBB;
        display: block;
        margin-bottom: 15px;
        transition: all .3s ease;
    }

    .footer-links ul li a:hover {
        color: #FFFFFF;
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
        color: #FFFFFF;
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