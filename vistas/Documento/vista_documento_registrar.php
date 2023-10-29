<script type="text/javascript" src="_recursos/js/console_documento.js"></script>
<link type="text/css" rel="stylesheet" href="_recursos/input-file/css/disenio_input2.css">
<div class="contendor_kn">
  <div class="panel panel-default">
    <div class="panel-heading">
       <label><h2><b>REGISTRAR DOCUMENTOS</b></h2></label>
    </div>
    <div class="panel-body">
        <br>
        <form method="POST" id="create-form-documento">
          <div class="form-group">
            <input type="text" value="1" style="display: none"  name="idusuario">
            <div class="col-md-6">
              <input type="text" id="txtiddocumento" name="iddocumento" hidden>
              <label>Asunto</label>
              <textarea class="form-control" rows="5"  style="resize: none" style="color: rgb(25,25,51); background-color: rgb(255,255,255);solid 5px;" placeholder="Ingresar Asunto ..." id="txtasunto_documento" name="asunto"></textarea>
            </div> 
          </div>
          <div class="form-group">
            <div class="col-sm-6">
                  <label>Fecha Registro</label>
                  <div class=" input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" id="txtfecharegistro" name="txtfecharegistro" readonly style="color: rgb(25,25,51); background-color: rgb(255,255,255);solid 5px;color:#9B0000; text-align:center;font-weight: bold;" class="form-control"><br>
                  </div><br>
              </div>
            <div class="col-md-6">
              <label>Estado</label>
              <input type="text" id="txtestado" value="ACTIVO" readonly style="color: rgb(25,25,51); background-color: rgb(255,255,255);solid 5px;color:#9B0000; text-align:center;font-weight: bold;" class="form-control"><br>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <label>Tipo Documento</label>
              <select id="combo_tipodocumento" name="idtipodocu" class="form-control select2"></select>
            </div>
            <div class="col-md-6">
              <label>&Aacute;rea de Destino</label>
              <select id="combo_area" name="idarea"  class="form-control select2"></select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-3"><br>
              <input type="text" name="opcion" hidden id="txttipo">
              <label>C&oacute;digo Remitente</label>
              <input type="text" id="txtidremitente" name="idremitente" readonly style="color: rgb(25,25,51); background-color: rgb(255,255,255);solid 5px;color:#9B0000; text-align:center;font-weight: bold;" class="form-control">
            </div>
            <div class="col-md-5"><br>
              <label>Datos Remitente</label>
              <input type="text" id="txtdatosremitente" name="txtdatosremitente" readonly style="color: rgb(25,25,51); background-color: rgb(255,255,255);solid 5px;color:#9B0000; text-align:center;font-weight: bold;" class="form-control">
            </div>
            <div class="col-md-4"><br><label>&nbsp;</label>
              <a role="button" class="btn btn-primary col-sm-12" style="width: 100%"  onClick="AbrirModalRemitente()"><i class="fa fa-search"></i> <b>Seleccionar Remitente</b></a>
              <br> 
            </div>
            <div class="col-sm-12">
              <div class="form-group"><br>
                <label>Seleccionar Documento</label>
                <input type="file" name="id_archivo" class="file-upload-default">
                <div class="input-group col-sm-12" style="width: 94%">
                  <input  type="text" class="form-control file-upload-info" disabled placeholder="Seleccionar Documento">
                  <span class="input-group-append">
                    <button class="file-upload-browse btn btn-info" type="button"><strong>Cargar</strong></button>
                  </span>
                </div>
              </div>
            </div> 
          </div>
          <div class="form-group">
            <div class="col-md-12" style="text-align: center;"><br>
              <br><button class="btn btn-success" onclick="Registrar_documento_post()"><strong> Registrar Documento</strong></button><br><br>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>
<!-- INICIO MODAL -->
<script type="text/javascript">TraerCodigoDocumento();</script>
<script type="text/javascript">Listar_tipodocumento_combo();</script>
<script type="text/javascript">Listar_areas_combo();</script>
<!--Fin Modal-->
<div class="modal fade bs-example-modal-lg" id="modal_remitente">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title" id="myModalLabel"><b>Remitentes Disponibles</b></h4>
         </div>
        <div class="modal-body">
          <div class="panel-body">
               <div class="box-body">
                  <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                      <li class="active"><a href="#tab_1-1" data-toggle="tab"><strong> CIUDADANOS </strong>  </a></li>
                      <li><a href="#tab_2-2" data-toggle="tab"><strong> INSTITUCIONES</strong></a></li>
                    </ul>
                    <div class="tab-content" style="width: 100%">
                      <div class="tab-pane active" id="tab_1-1"><BR><BR>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DNI del ciudadano remitente:</label>
                        <br>
                        <div class="col-md-12"> 
                          <div class=" input-group">
                            <input type="text" class="form-control" placeholder="Ingresar dni del ciudadano remitente a buscar" id="txtbuscar_dniremitente" onkeypress="return soloNumeros(event)">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                          </div>
                          <br>
                        </div>
                        <div id="listar_ciudadanosdisponibles_remitente" class="icon-loading col-md-12 table-responsive">
                          <i id="loading_nivel"></i>
                          <div id="nodatos">          
                          </div>
                        </div>
                        <p id="paginador_ciudadanosdisponibles_remitente" style="text-align:right" class="mi_paginador"></p>
                      </div>
                      <div class="tab-pane" id="tab_2-2"><br><br>
                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre de la instituci&oacute;n:</label>
                        <br>
                        <div class="col-md-12"> 
                          <div class=" input-group">
                            <input type="text" class="form-control" placeholder="Ingresar nombre de la instituci&oacute;n a buscar" id="txtbuscar_institucionremiten" onkeypress="return soloLetras(event)">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                          </div>
                          <br>
                        </div>
                        <div id="div_listar_instituciondisponible_remitente" class="icon-loading col-md-12 table-responsive">
                          <i id="loading_nivel"></i>
                          <div id="nodatos">          
                          </div>
                        </div>
                        <p id="paginador_instituciondisponible_remitente" style="text-align:right" class="mi_paginador "></p>
                      </div>
                    </div>
                  </div>        
                </div>
          </div>         
        </div> 
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;<b>Cancelar</b></button>
        </div> 
    </div>
  </div> 
</div>
<style type="text/css">
	.contendor_kn{
		padding: 10px;
	}
</style>
<script src="_recursos/input-file/js/bootstrap-uploader/file-upload.js"></script>
<script type="text/javascript">
  var f = new Date();
  txtfecharegistro.value= f.getFullYear() + "-" + (f.getMonth() +1) + "-" + f.getDate();
</script>
<script type="text/javascript">
	$("#txtbuscar_dniremitente").keyup(function(){
		var dato_buscar = $("#txtbuscar_dniremitente").val();
		listar_ciudadanoremitente_vista(dato_buscar,'1');
	});
  $("#txtbuscar_institucionremiten").keyup(function(){
    var dato_buscar = $("#txtbuscar_institucionremiten").val();
    listar_institucionremitente_vista(dato_buscar,'1');
  });
</script>
<script>
    $(function () {
        $('.select2').select2();
    })
</script>  
<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
    function soloNumeros(e){
        tecla = (document.all) ? e.keyCode : e.which;

        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8){
            return true;
        }
            
        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
</script>