<script>
function save(){
  var ajax_url = "index_save.php";
  var Folio = $("#folio").val();
  var Tipo = $("#tipo").val();
  var Producto = $("#producto").val();
  var Marca = $("#marca").val();
  var Modelo = $("#modelo").val();
  var Serie = $("#serie").val();
  var Caracteristicas = $("#caracteristicas").val();
  var Condicion = $("#condicion").val();
  $.ajax({
      type: 'POST',
      url: ajax_url,
      data: {
          folio : Folio,
          tipo : Tipo,
          producto : Producto,
          marca : Marca,
          modelo : Modelo,
          serie : Serie,
          caracteristicas : Caracteristicas,
          condicion : Condicion
      },
      success: function(data){                                            
          if(data !=''){                                    
              if(data == 1){
                  //load_page("resultados", "index.php"); 
                  location.reload();
              }else{
                  alert("Error al guardar");
              }
          }else{
              alert("Error al envíar datos");
          }                                
      }
  });
}
</script>

<center>
<table width="70%" border="0" cellpadding="0" cellspacing="3" class="tabla">
  <form id="f_datos" method="post" action="[@FORM_ACTION]">
  <tr>
    <td height="25" colspan="2" valign="top" class="tit_cuadro">Captura de Productos</td>
  </tr>
   <tr>
    <td height="21" valign="top" class="caja_etiqueta">No. Inventario:</td>
  <td width="221" valign="top"><input name="folio" type="text" class="caja1" id="folio" size="10" maxlength="10" onKeyUp="mayusc(this)" /></td>
  </tr>
  <tr>
    <td width="120" height="19" valign="top" class="caja_etiqueta">Área:</td>
    <td valign="top"><select name="tipo" class="caja1" id="tipo">
      <option selected="selected"> </option>
      <option value="AUDIO">AUDIO</option>
      <option value="LIMPIEZA">LIMPIEZA</option>
      <option value="ENSEÑANZA">ENSEÑANZA</option>
      <option value="LITERATURA">LITERATURA</option>
      <option value="NIÑOS">NIÑOS</option>
      <option value="INSTRUMENTO">INSTRUMENTO</option>
      <option value="CÓMPUTO">CÓMPUTO</option>
      <option value="ELECTRICIDAD">ELECTRICIDAD</option>
      <option value="OTRO">OTRO</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="21" valign="top" class="caja_etiqueta">Producto:</td>
  <td width="221" valign="top"><input name="producto" type="text" class="caja1" id="producto" size="20" maxlength="100" onKeyUp="mayusc(this)" /></td>
  </tr>
  <tr>
    <td height="21" valign="top" class="caja_etiqueta">Marca:</td>
    <td valign="top"><input name="marca" type="text" class="caja1" id="marca" size="20" maxlength="25"  onkeyup="mayusc(this)" /></td>
  </tr>
  <tr>
    <td height="21" valign="top" class="caja_etiqueta">Modelo:</td>
    <td valign="top"><input name="modelo" type="text" class="caja1" id="modelo" size="20" maxlength="25"  onkeyup="mayusc(this)" /></td>
  </tr>
  <tr>
    <td height="19" valign="top" class="caja_etiqueta">No. de Serie:</td>
    <td valign="top"><input name="serie" type="text" class="caja1" id="serie" size="20" maxlength="20"  onkeyup="mayusc(this)" /></td>
  </tr>
  <tr>
    <td height="19" valign="top" class="caja_etiqueta">Características:</td>
    <td valign="top"><textarea name="caracteristicas" cols="40" rows="2" class="caja1" id="caracteristicas"  onkeyup="mayusc(this)"></textarea></td>
  </tr>
  <tr>
    <td width="120" height="19" valign="top" class="caja_etiqueta">Condición actual:</td>
    <td valign="top"><select name="condicion" class="caja1" id="condicion">
      <option selected="selected"> </option>
      <option value="EXCELENTE">EXCELENTE | FUNCIONANDO AL 100% - PRODUCTO NUEVO</option>
      <option value="BUENO">BUENO | FUNCIONANDO AL 100% - SEMI-NUEVO, SIN MARCAS NI RAYONES</option>
      <option value="REGULAR">REGULAR | FUNCIONA AL 80% - DESGASTE NORMAL POR USO</option>
      <option value="MALO">MALO | FUNCIONA AL 50% - ESTA MUY GASTADO, RAYADO, ROTO</option>
      <option value="PÉSIMO">PÉSIMO | NO FUNCIONA - ESTA ROTO O DESCOMPUESTO</option>
    </select>    </td>
  </tr>
  <tr>
    <td height="19" valign="top">&nbsp;</td>
    <td valign="top"><input name="guardar" type="button" class="boton_guardar" id="guardar" value=":: Guardar ::" onClick="save()" /></td>
  </tr>
  </form>
</table>
<!-- <div class="msj_azul" id="msj"><?php echo $msj_ok; ?><span class="msj_rojo"><?php echo $msj_er; ?></span></div> -->
<br />
<div id="resultados">[@Resultados]</div>
</center>