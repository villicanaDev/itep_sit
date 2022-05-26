<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,600" rel="stylesheet">



<div class="row">
  <div class="d-flex flex-column w-100">
    <p class="text-center" style="font-size:20px; margin-top: 1rem;">Grupos </p>
    <hr style="width:100%; border-top: solid 0px #4964ae !important; margin-bottom: 0px !important;">
    <div class="w-100" style="padding: 0 2rem 1rem;border: solid 2px #4964ae; border-radius: 0 0 0 50px;">
      <table id="myFirstGrid" class="display">
        <thead>
          <tr>
            <th>Grupo</th>
            <th>Tutor</th>
            <th>Alumnos Aprovados</th>
            <th>Alumnos en Riesgo</th>
          </tr>
        </thead>
        <tbody>
        <?foreach ($carrera_data as $carrera_grupo) { ?>
          <tr>
            <td><a href="#" onclick="detalle_grupo('<?= $carrera_grupo->num_grupo?>', '<?= $carrera_grupo->id_carrera?>');"><?= $carrera_grupo->num_grupo?></a></td>
            <td><?= $carrera_grupo->id_tutor?></td><!-- Ojo aqui falta una query para sacar el nombre -->
            <td><?= $carrera_grupo->num_aprov?></td>
            <td><?= $carrera_grupo->num_repro?></td>
          </tr>
        <?}?>                    
        </tbody>
        <tfoot>
        </tfoot>
      </table>
    </div>
    <!-- <zing-grid src="https://zinggrid-marketing.firebaseio.com/website-visitors-milliseconds" pager sort filter gridlines="both" page-size="10" page-size-options="5,10,20" class="loading" layout="row" layout-controls="disabled">
            <zg-colgroup>
                <zg-column frozen index="user" header="<i class='fas fa-users'></i> Name">
                    <img src="[[index.user.0.avatar]]" alt="Avatar N/A" class="user--avatar" />
                    <span>[[index.user.0.name]]</span>
                </zg-column>
                <zg-column index="lastSeen" type="number" renderer="renderLastSeen" header="<i class='far fa-calendar-alt'></i> Last Seen"></zg-column>
                <zg-column index="firstSeen" type="number" renderer="renderLastSeen" header="<i class='far fa-calendar-alt'></i> First Seen"></zg-column>
                <zg-column index="signedUp" type="number" renderer="renderLastSeen" header="<i class='far fa-calendar-alt'></i> Signed Up"></zg-column>
                <zg-column index="webSessions" type="number" header="<i class='fas fa-chart-line'></i> Web Sessions"></zg-column>
                <zg-column index="city" header="<i class='fas fa-city'></i> City"></zg-column>
            </zg-colgroup>
        </zing-grid> -->
  </div>
</div>