function enviarVariable() {
    const variable_js = 'valor'; // valor que deseas enviar
    fetch('../unimatch/indexRegistrado.php', {
        method: 'POST',
        body: JSON.stringify({ variable_php: variable_js }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => function(){
        console.log("Funciona función");
        console.log(data);
    });
}
console.log("Funciona enlace");