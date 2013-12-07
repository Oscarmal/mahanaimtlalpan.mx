<link href="[@MENU]menu.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Cuprum&amp;subset=latin' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="[@JS]jquery/jquery.confirm/jquery.confirm.css" />
<script src="[@jQuery]"></script>
<script src="[@JS]jquery/jquery.confirm/jquery.confirm.js"></script>
<div class="container">
    <ul id="nav">
        <li><a href="[@INICIO]">Inicio</a></li>
        <li><a class="hsubs" href="[@CONGREGACION]">Congregaci&oacute;n</a>            
            <!--<ul class="subs">
                <li><a href="#">Submenu 1</a></li>
            </ul> -->
        </li>
        <li><a class="hsubs" href="[@INVENTARIO]">Inventario</a>
        </li>
        <li><a class="hsubs" href="[@CONTABILIDAD]">Contabilidad</a>
        </li>
        <li><a href="[@ADMIN]">Admin</a></li>
        <li><span id="exit"><a href="#" >Salir</a></span></li>
        <div id="lavalamp"></div>
    </ul>
</div>

<script>
$(document).ready(function(){   
    $('#exit').click(function(){      
        var elem = $(this).closest('#exit');      
        $.confirm({
            'title'     : 'Cerrar Sesi&oacute;n',
            'message'   : 'Est&aacute; seguro de querer salir del sistema. <br />Si no ha guardado, los &uacute;ltimos cambios podrian perderse. <br /><br />Desea continuar?',
            'buttons'   : {
                'Salir'   : {
                    'class' : 'blue',
                    'action': function(){
                        $(location).attr('href', '[@SALIR]');
                    }
                },
                'Cancelar'    : {
                    'class' : 'gray',
                    'action': function(){}
                }
            }
        });        
    });    
});
</script>