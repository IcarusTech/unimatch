<!-- Barra lateral -->
<label class="lateral">

    <input type="checkbox" class="input-barraLateral">
    <div class="toggle">
        <span class="top_line common"></span>
        <span class="middle_line common"></span>
        <span class="bottom_line common"></span>
    </div>

    <div class="slide">
        <ul>
            <!-- <li><a href="#"><i class="fas fa-tv"></i>dashboard</a></li> -->
            <li class="opL"><a href="#"><i class='fa-solid fa-house'></i></a></li>
            <li class="opL"><a href="#"><i class="far fa-user"></i></a></li>
            <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
            <li class="opL"><a href="#"><i class="far fa-comments"></i></a></li>
            <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
            <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
            <li class="opL"><a href="#"><i class="fas fa-heart"></i></a></li>
            <li class="opL"><a href="#"><i class="fas fa-cogs"></i></a></li>
            <li class="opL"><a href="#"><i class='fas fa-sign-out-alt'></i></a></li>
        </ul>
    </div>
</label>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');



    .slide {
        border-radius: 5px;
        margin-top: 5%;
        display: flex;
        flex-direction: column;
        height: 80%;
        width: 0%;
        position: absolute;
        background-color: #fff;
        transition: 0.5s ease;
        transform: translateX(-580px);
        z-index: 1;
    }

    .slide ul li {
        list-style: none;
        line-height: 80px;
    }

    .slide ul li a {
        color: red;
        font-weight: 500;
        padding: 5px 5px;
        display: block;
        text-transform: capitalize;
        text-decoration: none;
        transition: 0.2s ease-out;
        border-radius: 10px;
    }

    .slide ul .opL:hover a {
        color: #fff;
        background-color: red;

    }

    .slide ul li a i {
        width: 40px;
        text-align: center;

    }

    .input-barraLateral {
        display: none;
        visibility: hidden;
        
    }

    .toggle {
        position: sticky;
        height: 40px;
        width: 40px;
        top: 20px;
        left: 25px;
        z-index: 10;
        cursor: pointer;
        border-radius: 3px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .toggle .common {
        position: absolute;
        height: 2px;
        width: 20px;
        background-color: red;
        border-radius: 50px;
        transition: 0.3s ease;
    }

    .toggle .top_line {
        top: 30%;
        left: 50%;
        transform: translate(-50%, -50%);
    }


    .toggle .middle_line {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }


    .toggle .bottom_line {
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .lateral input:checked~.toggle .top_line {
        left: 7px;
        top: 18px;
        width: 25px;
        transform: rotate(45deg);
    }


    .lateral input:checked~.toggle .bottom_line {
        left: 7px;
        top: 18px;
        width: 25px;
        transform: rotate(-45deg);
    }


    .lateral input:checked~.toggle .middle_line {
        opacity: 0;
        transform: translateX(20px);
    }

    .lateral input:checked~.slide {
        transform: translateX(0);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    }


    /* ACABA LA BARRA LATERAL */

    /* AQUI EMPIEZA MEDIA PARA LA BARRA LATERAL */

    @media (max-width: 650px) {
    
        .slide {
            width: 30%;
            /* Ancho completo */
            display: flex;
            flex-direction: column;
            /* Configura flexbox para la columna */
            justify-content: center;
            /* Centra verticalmente */
            align-items: flex-start;
            /* Centra horizontalmente */
            font-size: 30px;
        }

        .slide ul li {
            width: 100%;
            /* Ancho completo de cada elemento de la lista */
            text-align: center;
            /* Centra horizontalmente el texto */
        }

        nav {
            display: none;
        }

    }

    @media (min-width: 650px) {
        .toggle {
            display: none;
        }
        .lateral {
            display: none;
        }

    }
</style>
<!-- Acaba la barra lateral -->