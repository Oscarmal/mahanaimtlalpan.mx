<script>
function save(){
  var ajax_url = "index_save.php";
  var TipoMov = $("#tipomov").val();
  var FechaMov = $("#fecha_mov").val();
  var Horario = $("#horario").val();
  var Diezmos = $("#diezmos").val();
  var Ofrendas = $("#ofrendas").val();
  var DiezmoCentral = $("#diezmo_central").val();
  var ProtemploPorc = $("#protemplo_porc").val();
  var Protemplo = $("#protemplo").val();
  var Siervo = $("#siervo").val();
  var TotRecibido = $("#tot_recibido").val();
  var TotPagos = $("#tot_pagos").val();
  var TotDeposito = $("#total").val();
  var Comentarios = $("#comentarios").val();
  $.ajax({
      type: 'POST',
      url: ajax_url,
      data: {
      tipomov : TipoMov,
      fecha_mov : FechaMov,
      horario : Horario,
      diezmos : Diezmos,
      ofrendas : Ofrendas,
      diezmo_central : DiezmoCentral,
      protemplo_porc : ProtemploPorc,
      protemplo : Protemplo,
      siervo : Siervo,
      tot_recibido : TotRecibido,
      tot_pagos : TotPagos,
      total : TotDeposito,
      comentarios : Comentarios
      },
      success: function(data){                                             
          if(data !=''){                                    
              if(data == 1){
                  alert("Información guardada corectamente.")
                  location.reload();                                                             
              }else{
                  alert("Error al guardar");
              }
          }else{
              alert("error al envíar datos");
          }                                
      }
  });
}

$(function() {
  $( "#fecha_mov" ).datepicker({
      dateFormat: "yy-mm-dd"
  });
});

function calcula_totales(){
  var Diezmos = parseFloat(0+document.getElementById('diezmos').value);
  var Ofrendas = parseFloat(0+document.getElementById('ofrendas').value);
  var Recibido = Diezmos + Ofrendas;
  var DiezDeDiez = Diezmos *.1;
  var ProtemploPorc = parseFloat(0+document.getElementById('protemplo_porc').value)/100;
  var Protemplo = Recibido * ProtemploPorc;
  var Siervo = parseFloat(0+document.getElementById('siervo').value);
  var Pagos = DiezDeDiez+Protemplo+Siervo;
  var Total = Recibido - Pagos;
  document.getElementById('tot_recibido').value = Recibido.toFixed(2);
  document.getElementById('diezmo_central').value = DiezDeDiez.toFixed(2);
  document.getElementById('protemplo').value = Protemplo.toFixed(2);
  document.getElementById('tot_pagos').value = Pagos.toFixed(2);
  document.getElementById('total').value = Total.toFixed(2);
}
</script>

<center>
<table width="70%" border="0" cellpadding="0" cellspacing="3" class="tabla">
  <form id="f_datos" method="post" action="[@FORM_ACTION]">
  <tr>
    <td height="25" colspan="2" valign="top" class="tit_cuadro">Ingresos</td>
  </tr>
  <tr>
    <td width="120" height="19" valign="top" class="caja_etiqueta">Tipo de movimiento:</td>
    <td valign="top"><select name="tipomov" class="caja1" id="tipomov">
      <option value="INGRESO" selected="selected">INGRESO - Entrada</option>
      <!--<option value="EGRESO">EGRESO - Salida</option>-->
    </select>    </td>
  </tr>
  <tr>
    <td width="120" height="19" valign="top" class="caja_etiqueta">Concepto:</td>
    <td valign="top"><select name="tipomov" class="caja1" id="tipomov">
      <option value="1" selected="selected">Ingresos en Reunión</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="21" valign="top" class="caja_etiqueta">Fecha:</td>
  <td width="221" valign="top"><input name="fecha_mov" type="text" class="caja1" id="fecha_mov" size="10" onkeyup="mayusc(this)" /></td>
  </tr>
  <tr>
    <td height="21" valign="top" class="caja_etiqueta">Horario:</td>
    <td valign="top"><select name="horario" class="caja1" id="horario">
      <option selected="selected"> </option>
      <option value="MAÑANA">MAÑANA</option>
      <option value="TARDE">TARDE</option>
      <option value="NOCHE">NOCHE</option>
      <option value="VELADA">VELADA</option>
    </select></td>
  </tr>
  <tr>
    <td height="19" valign="top" class="caja_etiqueta" colspan="2"><hr /></td>
  </tr>
  <tr>
    <td height="21" valign="top" class="caja_etiqueta">Diezmos:</td>
    <td valign="top"> $<input name="diezmos" type="text" class="caja1" id="diezmos" size="10" maxlength="10"  onkeyup="javascript: calcula_totales();" /></td>
  </tr>
  <tr>
    <td height="19" valign="top" class="caja_etiqueta">Ofrendas:</td>
    <td valign="top"> $<input name="ofrendas" type="text" class="caja1" id="ofrendas" size="10" maxlength="10"  onkeyup="javascript: calcula_totales();" /></td>
  </tr>  
  
  <tr>
    <td height="19" valign="top" class="caja_etiqueta" colspan="2"><hr /></td>
  </tr>
  <tr>
    <td height="19" valign="top" class="caja_etiqueta">Diezmo a Central:</td>
    <td valign="top">- $<input name="diezmo_central" type="text" class="caja1" id="diezmo_central" size="10" maxlength="10"  onkeyup="javascript: calcula_totales();" /></td>
  </tr>
  <tr>
    <td height="19" valign="top" class="caja_etiqueta">Pro-Templo:</td>
    <td valign="top">- $<input name="protemplo" type="text" class="caja1" id="protemplo" size="10" maxlength="10"  onkeyup="javascript: calcula_totales();" />
    <select name="protemplo_porc" class="caja1" id="protemplo_porc" onchange="javascript: calcula_totales();">
      <option value="0">0%</option>
      <option value="10" selected="selected">10%</option>
      <option value="20">20%</option>
      <option value="30">30%</option>
      <option value="40">40%</option>
      <option value="50">50%</option>
    </select>
    </td>
  </tr>
   <tr>
    <td height="19" valign="top" class="caja_etiqueta">Siervo:</td>
    <td valign="top">- $<input name="siervo" type="text" class="caja1" id="siervo" size="10" maxlength="10" value="0.00" onkeyup="javascript: calcula_totales();" /></td>
  </tr>
  
  <tr>
    <td height="19" valign="top" class="caja_etiqueta" colspan="2"><hr /></td>
  </tr>
   <tr>
    <td height="19" valign="top" class="caja_etiqueta">Total Recibído:</td>
    <td valign="top">&nbsp;$<input name="tot_recibido" type="text" class="caja1" id="tot_recibido" size="10" maxlength="10"  onkeyup="javascript: calcula_totales();" readonly /></td>
  </tr>
   <tr>
    <td height="19" valign="top" class="caja_etiqueta">Total Pagos:</td>
    <td valign="top">-$<input name="tot_pagos" type="text" class="caja1" id="tot_pagos" size="10" maxlength="10"  onkeyup="javascript: calcula_totales();" readonly /></td>
  </tr>
  <tr>
    <td height="19" valign="top" class="caja_etiqueta">Total a Depositar:</td>
    <td valign="top">&nbsp;$<input name="total" type="text" class="caja1" id="total" size="10" maxlength="10"  onkeyup="javascript: calcula_totales();" readonly /></td>
  </tr>
  
   <tr>
    <td height="19" valign="top" class="caja_etiqueta" colspan="2"><hr /></td>
  </tr>
  <tr>
    <td height="19" valign="top" class="caja_etiqueta">Comentarios:</td>
    <td valign="top"><textarea name="comentarios" cols="40" rows="2" class="caja1" id="comentarios"  onkeyup="mayusc(this)"></textarea></td>
  </tr>
  <tr>
    <td height="50" valign="top">&nbsp;</td>
    <td valign="middle"><input name="guardar" type="button" class="boton_guardar" id="guardar" value=":: Guardar ::" OnClick="save()" /></td>
  </tr>
  </form>
</table>
<!-- <div class="msj_azul" id="msj"><?php echo $msj_ok; ?><span class="msj_rojo"><?php echo $msj_er; ?></span></div> -->
<br />
<div id="resultados">[@Resultados]</div>
</center>