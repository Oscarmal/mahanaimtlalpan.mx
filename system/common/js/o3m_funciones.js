/*O3M*/
function fajax(EtiquetaDiv,Pagina,Tipo,MultiValores,Texto){
/*
*	EtiquetaDiv = 	Nombre de Div/Input en el que regresará el valor
*	Pagina 		=	Pagina PHP que se ejecutará para devolver la respuesta Ejem.: pagina.php
*	Tipo		=	Tipo de respuesta; 1 = Para Div / 2 = Para Input
*	MultiValores=	Cadena de parametros (valores) separados por pipe (|) 
*					los cuales se enviaran a la Pagina.php que devolverá la respuesta.
*					Ejem.: valor1|valor2|...
*	Texto		=	Texto que aparecera mientras se genera la respuesta.
*/
	if(Texto==''){Texto='Generando...';}
	Texto=Texto+'<img src="http://localhost/i/ajax-loader.gif"></img>';
	var xmlhttp;
	try{xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");}
	catch(e){try{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	catch(E){if(!xmlhttp && typeof XMLHttpRequest!='undefined') 
	xmlhttp=new XMLHttpRequest();}}
	if (MultiValores.length==0){
		if(Tipo==1){document.getElementById(EtiquetaDiv).innerHTML="";}
		if(Tipo==2){document.getElementById(EtiquetaDiv).value="";}
		return;
	}
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4 && xmlhttp.status==200){
			if(Tipo==1){document.getElementById(EtiquetaDiv).innerHTML=xmlhttp.responseText;}
			if(Tipo==2){document.getElementById(EtiquetaDiv).value=xmlhttp.responseText;}
		}else{
			if(Tipo==1){document.getElementById(EtiquetaDiv).innerHTML = Texto;}
			if(Tipo==2){document.getElementById(EtiquetaDiv).value = Texto;}
		}

	}
	xmlhttp.open("POST",Pagina+"?v="+MultiValores,true);
	xmlhttp.send(null);
}

function mayusc(campo){
campo.value=campo.value.toUpperCase();
}

function minusc(campo){
campo.value=campo.value.toLowerCase();
}

function capLock(e){
 	 kc=e.keyCode?e.keyCode:e.which;
 	 sk=e.shiftKey?e.shiftKey:((kc==16)?true:false);
 	 if(((kc>=65&&kc<=90)&&!sk)||((kc>=97&&kc<=122)&&sk))
 	 document.getElementById('caplock').style.visibility = 'visible';
  	 else document.getElementById('caplock').style.visibility = 'hidden';
}

function encrypt(campo){
campo.value=hex_md5(campo.value);
}

function solo_txt(e) { 
tecla = (document.all) ? e.keyCode : e.which; //detecta navegador
if (tecla==8 || tecla==13 || tecla==164 || tecla==165) return true;  //tecla retroceso=8(permite borrar), tecla enter=13 (enviar formulario)
//patron = /\d/; // Solo acepta números
//patron = /\w/; // Acepta números y letras
//patron = /\D/; // No acepta números
//patron = /[ajt69]/; //texto personalizado
patron =/[A-Za-zÑñ\\\s]/; // Solo mayusculas, minusculas, espacio, ñ y Ñ
te = String.fromCharCode(tecla);
return patron.test(te); 
//para llamar la funcion:  onkeypress="return solo_txt(event)"
} 

function solo_num(e) { 
tecla = (document.all) ? e.keyCode : e.which; 
if (tecla==8 || tecla==13) return true; 
patron = /\d/;
te = String.fromCharCode(tecla);
return patron.test(te); 
} 

function solo_txtnum(e) { 
tecla = (document.all) ? e.keyCode : e.which; 
if (tecla==8 || tecla==13) return true; 
patron = /\w/;
te = String.fromCharCode(tecla);
return patron.test(te); 
}

function ventana(URL){
var Largo = 755;
var Altura = 600;
var Top = (screen.height-Altura)/2;
var Izquierda = (screen.width-Largo)/2;
miventana = window.open(URL,'miventana','width='+Largo+', height='+Altura+', scrollbars=no, resizable=no, status=no, menubar=no, left='+Izquierda+',top='+Top)
miventana.focus();
//onclick="javascript:ventana2('pagina.php'); return false"
}

function mostrardiv(nombre) {
div = document.getElementById(nombre);
div.style.display = "";
}

function ocultardiv(nombre) {
div = document.getElementById(nombre);
div.style.display="none";
}

/*Máscara de entrada.*/
function mascara(d,sep,pat,nums){
	/* Crear un Arreglo que indique cantidad de digitos entre cada separador:
		ejem: <script language="javascript"> var patron = new Array(2,2,4); </script> 
	Finalmente habremos de llamar al script desde el/los campo/s pasándole como parámetros a sí mismo, el patrón (array) a utilizar, el separador que queramos aplicar y si queremos que sólo acepte números o no:
		ejem: onkeyup="mascara(this,'-',patron2,true)"
	
	var patron = new Array(pat)
	if(patnom == '' || patnom == null){var patnom = new Array(pat)}
	*/
if(d.valant != d.value){
	val = d.value
	largo = val.length
	val = val.split(sep)
	val2 = ''
	for(r=0;r<val.length;r++){
		val2 += val[r]	
	}
	if(nums){
		for(z=0;z<val2.length;z++){
			if(isNaN(val2.charAt(z))){
				letra = new RegExp(val2.charAt(z),"g")
				val2 = val2.replace(letra,"")
			}
		}
	}
	val = ''
	val3 = new Array()
	for(s=0; s<pat.length; s++){
		val3[s] = val2.substring(0,pat[s])
		val2 = val2.substr(pat[s])
	}
	for(q=0;q<val3.length; q++){
		if(q ==0){
			val = val3[q]
		}
		else{
			if(val3[q] != ""){
				val += sep + val3[q]
				}
		}
	}
	d.value = val
	d.valant = val
	}
}

function sombrea(){
	var rows = document.getElementsByTagName('tr');
	for (var i = 0; i < rows.length; i++) {
		rows[i].onmouseover = function() {this.className += ' hilite';}
		rows[i].onmouseout = function() {this.className = this.className.replace('hilite', '');}
	}
}

function Prellena(Texto,Contenido,IdCaja){
	if(Contenido==''){document.getElementById(IdCaja).value==Texto
	}else{document.getElementById(IdCaja).value=""}
}

function DivContenido(Objeto, Contenido){
	document.getElementById(Objeto).innerHTML=Contenido;
}

//-- Funciones con jQuery
function load_page(Div, Page){
	$("#" + Div).load(Page);
}

function load_ajax(Div, Page, Field){
	$.ajax({
		url: Page,
		data:{
			Field : Field
			},
		success:function(result){
	    	$("#"+Div).html(result);
		}
	});
}

/*O3M*/