<script>
    let total_alumnos = 0;
    let num_total_aprov = 0;
    let num_total_repro = 0;

    <? foreach ($grupo_data as $grupos) { ?>
        num_total_aprov += <?= $grupos->num_aprov ?>;
        num_total_repro += <?= $grupos->num_repro ?>;
    <? } ?>

    console.log(num_total_aprov);
    $('#almn_apro').text(num_total_aprov + ' Alumnos aprovados');
    $('#almn_repro').text(num_total_repro + ' Alumnos en riesgo');


    let ctx = document.getElementById('general_chart').getContext('2d');
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
            }]
        },
    });


    const detalle_grupos = () => {
        //var element =  document.getElementById('grupos_<?=$id_carrera?>');
        if (document.body.contains(document.getElementById('grupos_<?=$id_carrera?>'))){//si existe
            $("#grupos_<?=$id_carrera?>").fadeToggle();
        }else{//no existe
            $.ajax({
                url: "<?php echo base_url(); ?>SiiT/detalle_grupos",
                method: "POST",
                data: {
                    'carrera': <?= $id_carrera ?>
                }
            }).done(function(resp) {
                $('#appending').append(
                    '<div id="grupos_<?=$id_carrera?>" style="display:none; border-radius: 0 0 0 50px;" class="card col-lg-11">'
                        +resp+
                    '</div>'
                );
                $("#grupos_<?=$id_carrera?>").fadeToggle();
            });
        }
    }
</script>