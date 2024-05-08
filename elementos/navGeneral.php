<nav>
    <ul>
        <li><a href="#" class="navMain">
                <hr class="lineaMain">Unimatch
            </a></li>
        <li><a href="#" class="navText">Eventos</a></li>
        <li class="vacio"></li>
        <li><a href="#" class="navText">Inicio</a></li>
        <li><a href="#" class="navText">Registrarse</a></li>
    </ul>
    <div class="lineas">
        <hr class="lineaLeft">
        <a href="#" class="navFoto"><img class="logo" src="img/logo_unimatch-removebg-preview.png" alt=""></a>
        <hr class="lineaRight">
    </div>
</nav>
<style>
    nav {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        margin-bottom: 5%;
    }

    nav ul {
        width: 100%;
        height: 55px;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin: 0;
    }



    nav ul li {
        width: 18%;
        height: 100%;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        align-content: space-around;
        justify-content: center;
        align-items: center;
        height: 100%;

    }



    .lineaMain {
        width: 100%;
        border: 0;
        height: 3px;
        background: rgba(240, 14, 14, 0.587);
        box-shadow: 0 0 20px red;
    }

    .vacio {
        width: 10%;
    }

    nav ul li a {

        color: #fff;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        align-content: space-around;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
    }

    nav ul li a:hover {
        background-color: rgb(56, 55, 53);

    }

    .navMain {
        display: grid;
        grid-template-columns: 1fr;
        grid-template-rows: 1fr 99% 1fr;
        background-color: rgba(255, 0, 0, 0.1);
    }


    .lineas {
        width: 100%;
        height: 1px;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        align-content: space-around;
        justify-content: space-between;
        align-items: center;
    }

    .lineaLeft {
        width: 45%;
        border: 0;
        height: 1px;
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgb(255, 255, 255));
    }

    .lineaRight {
        width: 45%;
        border: 0;
        height: 1px;
        background-image: linear-gradient(to left, rgba(0, 0, 0, 0), rgb(255, 255, 255));
    }

    .navFoto {
        width: 10%;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        align-content: space-around;
        justify-content: center;
        align-items: center;
    }

    .logo {
        width: 80%;
        height: 100%;
    }
</style>