function imprimirGrafica(compatibilidad) {
  //Etiquetas a comparar
  console.log("La compatibilidad es de "+compatibilidad);
  //A partir de la compatibilidad en tanto por 100 podemos obtener el porcentaje y mostrarlo 
  let total=100;
  let diferencia=total-compatibilidad;
  const etiquetas = ['Compatible', 'No compatible'];
  //Array de colores
  const colors = ['#fe3c72', 'rgba(255, 255, 255, 0)'];
  //Seleccionamos el canvas
  const migrafico = document.getElementById('grafico');
  //Creamos una variable que almacene la antigua gráfica unida a un elemento en el html por ID
  const graficoantiguo = Chart.getChart('grafico');
  if (graficoantiguo) { //Si existe la antigua y otra actualizada, destruimos la antigua para que se muestra la actualizada
    graficoantiguo.destroy();
  }

  //Datos
  const datos = {
    labels: etiquetas,
    datasets: [{
      label: "Comparativas dias con porciones",
      data: [compatibilidad, diferencia],
      backgroundColor: colors,
      borderWidth: 0
    }]
  };
  Chart.register( // Registrar el plugin personalizado
    {
      //Creo un campo a mano para el config donde se muestre un texto en el medio de la gráfica
      id: 'centerText',
      beforeDraw: function (chart) {
        const width = chart.width,
          height = chart.height,
          ctx = chart.ctx;

        ctx.restore();
        const fontSize = (height / 120).toFixed(2);
        ctx.font = fontSize + "em Arial";
        ctx.fillStyle = chart.options.plugins.centerText.color;
        ctx.textBaseline = "middle";
        ctx.textAlign = "center"; // Establecer textAlign en "center"

        const text = chart.options.plugins.centerText.text,
        textX = width / 2, // Centrar horizontalmente
        textY = height / 1.65; // Centrar verticalmente

        ctx.fillText(text, textX, textY);
        ctx.save();
      }
    }
  );

  //Configuracion del tipo de gráfico
  const config = {
    type: 'doughnut',
    data: datos,
    options: {
      maintainAspectRatio: false,
      plugins: {
        customCanvasBackgroundColor: {
          color: 'white',
        },
        title: {
          display: true,
          text: 'Compatibilidad',
          color:'#fe3c72',
          font: {
            size: 30
        }
        },
        legend: {
          display: false,

        },
        centerText: { // Plugin para texto en el centro
          text: compatibilidad+'%',
          color: '#fe3c72',
          fontStyle: 'bold',
          sidePadding: 20 // Espaciado lateral
        }
      },
      scales: {
        display: false
      }
    }
  };

  new Chart(migrafico, config);
}
