<!-- faltanntes:
- Graficas en las filas de los grupos 
- Llenar tabla de docentes 
- Hacer query para sacar el nombre del tutor del grupo
-->

<script>
    $(document).ready(function(){ $('#myFirstGrid').DataTable({searching: false, paging: false, info: false}); });


    const detalle_grupo = (id_grupo, id_carrera)=>{
      $.redirect('<?php echo base_url();?>SiiT/get_grupo',{grupo:id_grupo, carrera:id_carrera},'POST');
    }


//$('#myFirstGrid').DataTable();


/* var MINUTE = 1000 * 60;
var HOUR = 1000 * 60 *60;
var DAY = 1000 * 60 *60 * 24;
var WEEK = DAY * 7;
var MONTH = DAY * 30;
function renderLastSeen(value) {
  if (value >= MONTH) {
    return `${parseInt(value/MONTH)} months ago`;
  } else if (value >= WEEK) {
    return `${parseInt(value/WEEK)} weeks ago`;
  } else if (value >= DAY) {
    return `${parseInt(value/DAY)} days ago`;
  } else if (value >= HOUR) {
    return `${parseInt(value/HOUR)} hours ago`;
  } else if (value >= MINUTE) {
    return `${parseInt(value/MINUTE)} minutes ago`;
  } else if (value < MINUTE) {
    return `Just now`;
  }
}

// Custom loading class for CSS handling
const zgLoaded = document.querySelector('zing-grid');
zgLoaded.addEventListener('grid:ready', () => {
  setTimeout(() => zgLoaded.classList.remove('loading'), 0);
}); */


    /* const gridConfig = {
      caption: 'Hello-world',
      data: [12,13,14,15,16,17,18,19]
    };
    let zingGridRef = new ZingGrid('myFirstGrid', gridConfig); */



   /* let ctx = document.getElementById('general_chart').getContext('2d');
    let myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Alumnos Aprovados', 'Alumnos en Riesgo'],
            datasets: [{
                data: [num_total_aprov, num_total_repro],
                backgroundColor: [
                    'rgba(81, 162, 69, 0.7)',
                    'rgba(220, 57, 57, 0.7)',
                ],
                //borderColor: [
                //'rgba(255, 99, 132, 1)',
                //],
                //borderWidth: 1
            }]
        },
         options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    max: 20, //numero total de alumnos
                    min: 0,
                    display: false
                }
            },
            indexAxis: 'y',
            plugins: {
                legend: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 50,
                        min: 0
                    }
                }
            },
            barPercentage: 0.8
        } 
    });*/
</script>