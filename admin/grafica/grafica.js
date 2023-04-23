(async () => {

    const respuestaRaw = await fetch("/admin/grafica/grafica.php");

    const respuesta = await respuestaRaw.json();

    const $grafica = document.querySelector("#grafica");

    const etiquetas = respuesta.etiquetas; // <- Aquí estamos pasando el valor traído usando AJAX

    const datosVentas2020 = {
        label: "Conteo de  Votos",
        data: respuesta.datos,
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)', 
        borderWidth: 1,
    };
    new Chart($grafica, {
        type: 'bar', 
        data: {
            labels: etiquetas,
            datasets: [
                datosVentas2020,
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
            },
        }
    });
})();