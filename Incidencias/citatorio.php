<?php 
/* include("./conexion.php");

$sql="
SELECT COUNT(boleta) FROM  `incidencias` WHERE boleta=''";
$resultado = $conexion->query($sql);
 */?>

<div id="modalcitatorio" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="POST" id="citatorio_form">
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label class="form-label" id="folio">Folio Incidencia:</label>
                        <input type="text" class="form-control" readonly id="folio_inc" name="folio_inc" >
                        <label class="form-label" id="1no_cita">No. Cita: <?php   ?></label>
                        <input type="text" class="form-control" id="no_cita" readonly name="no_cita">
                        <label class="form-label" id="1boleta">Boleta:</label>
                        <input type="text" class="form-control" size="10" readonly id="boleta_al" name="boleta_al">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="fecha_generada">Fecha generación de citatorio:</label>
                        <input type="date" class="form-control" id="fecha_generada" name="fecha_generada" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="fecha_cita">Fecha cita:</label>
                        <input type="date" class="form-control" id="fecha_cita" name="fecha_cita"required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="hora">Hora: </label>
                        <input type="text" class="form-control" id="hora_citat" name="hora_citat" placeholder="00:00">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="area">Área a asistir: </label>
                        <input type="text" class="form-control" id="area" name="area">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="persona_atiende">Persona que atiende: </label>
                        <input type="text" class="form-control" id="persona_atiende" name="persona_atiende">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" name="cerrar" id="cerrar" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

