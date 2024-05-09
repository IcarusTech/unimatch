<!-- Barra lateral -->
<label class="lateral">

    <input type="checkbox">
    <div class="toggle">
        <span class="top_line common"></span>
        <span class="middle_line common"></span>
        <span class="bottom_line common"></span>
    </div>

    <div class="slide">

        <ul>
            <!-- <li><a href="#"><i class="fas fa-tv"></i>dashboard</a></li> -->
            <li class="opL"><a href="#"><i class="far fa-user"></i>Profile</a></li>
            <!-- <li><a href="#"><i class="fab fa-gripfire"></i>trending</a></li> -->
            <li class="opL"><a href="#"><i class="far fa-comments"></i>Messages</a></li>
            <!-- <li><a href="#"><i class="far fa-folder"></i>file manager</a></li> -->
            <!-- <li><a href="#"><i class="far fa-address-book"></i>portfolio</a></li> -->
            <li class="opL"><a href="#"><i class="fas fa-heart"></i>Saved</a></li>
            <li class="opL"><a href="#"><i class="fas fa-cogs"></i>Settings</a></li>
        </ul>
    </div>
</label>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');



    .slide {
        display: flex;
        flex-direction: column;
        height: 100%;
        width: 180px;
        position: absolute;
        background-color: #fff;
        transition: 0.5s ease;
        transform: translateX(-580px);
        z-index: 1;
    }

    h1 {
        color: #8000ff;
        font-weight: 800;
        text-align: right;
        padding: 10px 0;
        padding-right: 30px;
        pointer-events: none;
    }

    ul li {
        list-style: none;

    }

    ul li a {
        color: #011a41;
        font-weight: 500;
        padding: 5px 0;
        display: block;
        text-transform: capitalize;
        text-decoration: none;
        transition: 0.2s ease-out;
    }

    ul .opL:hover a {
        color: #fff;
        background-color: #8000ff;

    }

    ul li a i {
        width: 40px;
        text-align: center;

    }

    input {
        display: none;
        visibility: hidden;
        -webkit-appearance: none;
    }

    .toggle {
        position: absolute;
        height: 30px;
        width: 30px;
        top: 20px;
        left: 15px;
        z-index: 10;
        cursor: pointer;
        border-radius: 2px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .toggle .common {
        position: absolute;
        height: 2px;
        width: 20px;
        background-color: #8000ff;
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

    input:checked~.toggle .top_line {
        left: 2px;
        top: 14px;
        width: 25px;
        transform: rotate(45deg);
    }


    input:checked~.toggle .bottom_line {
        left: 2px;
        top: 14px;
        width: 25px;
        transform: rotate(-45deg);
    }


    input:checked~.toggle .middle_line {
        opacity: 0;
        transform: translateX(20px);
    }

    input:checked~.slide {
        transform: translateX(0);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
    }


    /* ACABA LA BARRA LATERAL */




    


    /* AQUI EMPIEZA MEDIA PARA LA BARRA LATERAL */

    @media (max-width: 650px) {
        .container {
            padding: 36px;
            margin-top: 7%;

        }

        .slide {
            width: 100%;
            /* Ancho completo */
            display: flex;
            flex-direction: column;
            /* Configura flexbox para la columna */
            justify-content: center;
            /* Centra verticalmente */
            align-items: center;
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


    }

    @media(min-width:800px) {

        .lateral {
            display: none;
        }

    }
</style>
<!-- Acaba la barra lateral -->