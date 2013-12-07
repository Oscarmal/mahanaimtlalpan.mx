<html>
<head>
</head>
<body>
    <div id="pagina">
        <div id="contenido-login" align="center" valign="middle">
            <table border="0" cellspan="3" cellpading="0">
            	<form name="f_login" method="POST" action="[@FORM_ACTION_LOGIN]">
            	<tr>
            		<td colspan="2" align="center" height="50"><span class="msj_rojo" >[@MENSAJE]</span></td>
            	</tr>
            	<tr>
            		<td>Usuario: </td>
            		<td><input type="text" name="user" id="user"></td>
            	</tr>
            	<tr>
            		<td>Clave: </td>
            		<td><input type="password" name="pass" id="pass"></td>
            	</tr>
            	<tr>
            		<td colspan="2"><input type="submit" name="b_entrar" id="b_entrar" value="Entrar" class="boton_guardar"> </td>
            	</tr>
            	</form>
            </table>
        </div>
    </div>
    [@FOOTER]    
</body>
</html><span id="