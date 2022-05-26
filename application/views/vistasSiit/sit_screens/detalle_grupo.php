<div class=" m-b-10 bg-stars">
    <div class="container">
        <div class="row">
            <div class="col-md-4 m-auto text-white p-t-40 p-b-90">
                <div class="text-md-right">
                    <!-- Espaciador -->
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="admin-content">
    <div class="m-b-10 bg-stars">
        <div class="container">
            <div class="col-lg card">
                <p style="font-size: 38px; margin-bottom:0px;">Grupo <?= $text_carrera ?></p>
                <hr style="width:100%; border-top: solid 3px #4964ae !important; margin-bottom: 0px !important;">
                <?= var_dump($num_materias) ?>
                <div class="w-100" style="padding: 0 2rem 1rem;border: solid 2px #4964ae; border-radius: 0 0 0 50px;">
                    <!-- <table id="myFirstGrid" class="display">
                        <thead>
                            <tr>
                                <th>Nombre </th>
                                <th>Materias Cursadas</th>
                                <th>Materias Aprovadas</th>
                                <th>Materias Reprovadas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? foreach ($data_almns as $detalle_almn) { ?>
                                <tr>
                                    <td><?= $detalle_almn->nombre ." ". $detalle_almn->apellido ?></td>
                                    <td><?= $num_materias?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <? } ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table> -->
                </div>
            </div>
        </div>
    </div>
</div>