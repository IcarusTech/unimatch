<div class="card">
  <div class="card-content">
    <p class="card-heading">¿Quieres eliminar tu usuario?</p>
    <p class="card-description">Se borrarán todos tus datos de forma permanente</p>
  </div>
  <div class="card-button-wrapper">
    <button class="card-button secondary" id="btnCancelar" onclick="imprimirBtnDelete()">Cancelar</button>
    <button class="card-button primary" type="submit" id="btnDelete"onclick="permitirSubmit()">Eliminar</button>
  </div>
</div>
<style>
  .containerConfirmacion {
    
    animation: myAnimation 2s;
  }

  @keyframes myAnimation {
    0% {
    transform: translate(0, 0);
  }
  50% {
    transform: translate(0, 5px);
  }
  100% {
    transform: translate(0, 0);
  }
  }

  .card {
    margin: auto;
    width: 90%;
    height: fit-content;
    background: rgb(255, 255, 255);
    border-radius: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 20px;
    padding: 30px;
    position: relative;
    box-shadow: 20px 20px 30px rgba(0, 0, 0, 0.5);
  }

  .card-content {
    width: 100%;
    height: fit-content;
    display: flex;
    flex-direction: column;
    gap: 5px;
  }

  .card-heading {
    font-size: 20px;
    font-weight: 700;
    color: rgb(27, 27, 27);
  }

  .card-description {
    font-weight: 100;
    color: rgb(102, 102, 102);
  }

  .card-button-wrapper {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
  }

  .card-button {
    width: 50%;
    height: 35px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    font-weight: 600;
  }

  .primary {
    background-color: rgb(255, 114, 109);
    color: white;
  }

  .primary:hover {
    background-color: rgb(255, 73, 66);
  }

  .secondary {
    background-color: #ddd;
  }

  .secondary:hover {
    background-color: rgb(197, 197, 197);
  }
  @media(max-width:990px) {
    .card{
      width: 80%;
    }
  }
</style>