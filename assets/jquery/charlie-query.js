// JavaScript Document

//common
//Funcion para serializar formularios pero dandole etiquetas especiales a los caracteres raros
jQuery.fn.cserialize = function () {
	
	var string_serial 	= '';	
	var separador 		= '&';
 
	  $(this).find(':input').each (function() {
			
			if ($(this).attr("name") != undefined){
				
				string_serial +=   $(this).attr("name")+"="+htmlentities($(this).val());
				string_serial += separador;
			}
			
	  });
 	string_serial = string_serial.substring(0, string_serial.length-1);
	//console.log(string_serial + "////");
  	return string_serial;
}

//Funcion que codifica los caracteres especiales en codigo html
function htmlentities(texto) {
	
	texto = texto.replace(/á/g,'@aacute;');
    texto = texto.replace(/é/g,'@eacute;');
    texto = texto.replace(/í/g,'@iacute;');
    texto = texto.replace(/ó/g,'@oacute;');
    texto = texto.replace(/ú/g,'@uacute;');
                                          
    texto = texto.replace(/Á/g,'@Aacute;');
    texto = texto.replace(/É/g,'@Eacute;');
    texto = texto.replace(/Í/g,'@Iacute;');
    texto = texto.replace(/Ó/g,'@Oacute;');
    texto = texto.replace(/Ú/g,'@Uacute;');
                                          
    texto = texto.replace(/ñ/g,'@ntilde;');
    texto = texto.replace(/Ñ/g,'@Ntilde;'); 
 
	texto = texto.replace(/°/g,'@deg;');	
	texto = texto.replace(/º/g,'@ordm;');
	texto = texto.replace(/½/g,'@frac12;'); 
	//texto = texto.replace(/ª/g,'@ordf;');
	texto = texto.replace(/°/g,'@ordm;');
	texto = texto.replace(/,/g,'@#44;');
	texto = texto.replace(/_/g,'@ordf;');
	//texto = texto.replace(/-/g,'@ordf;');

	return texto;
}



function lpad(originalstr, length, strToPad) {
    while (originalstr.length < length)
        originalstr = strToPad + originalstr;
    return originalstr;
}
 
function rpad(originalstr, length, strToPad) {
    while (originalstr.length < length)
        originalstr = originalstr + strToPad;
    return originalstr;
}


/*
Validaciones

*/

//Array de funciones para validar los formularios
var validaciones = { 
	vacio: function(e) {return /[A-Za-z0-9_]/.test($(e).val());},
	email: function(e) {return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($(e).val());},
	numero: function(e) {return /[0-9]/.test($(e).val());},
	telefono: function(e) {return  /^\+*\d*\-*\s*\d\w{1,15}\d$/.test($(e).val());},
	checked: function(e) {return $(e).is(':checked');},
	anio: function(e) {return /^\d{4,4}$/.test($(e).val());},
	fecha: function(e) {return /^\d{1,2}\/\d{1,2}\/\d{2,4}$/.test($(e).val());}
	//rut: function(e){ return Valida_Rut($(e).val())},
	//same: function(e){ if(validaciones['vacio'](e)){return ($(e).val()==$("#"+$(e).attr('alt')).val()) ? true:false;}},
	//compara_fechas: function(e){return compara_fecha($(e).attr('alt'),$(e).attr('id'));}
};

function validar_form(formulario,mensaje_div,mensaje){
	var cadena = Array();
	$("#"+formulario).find("input, textarea, select").each(function(i,elemento){
		//console.log(elemento);
		if($(elemento).attr('class')){
			$.each($(elemento).attr('class').split(" "),function(c,clase){
				if( jQuery.isFunction(validaciones[clase])){
					var campos = $(elemento).attr('title');
					if(validaciones[clase](elemento)==false){
						$(elemento).addClass("en-error");
						//$(elemento).css("border-color: #E9322D;box-shadow: 0 0 6px #F8B9B7;");
						//$(elemento).attr("style","border-color: #AA0000;box-shadow: 0 0 6px #FCF8E3;");
						//$(elemento).attr('title',$(elemento).data('title'));
						//$(elemento).tooltip({ position: { my: "left+100 center", at: "right center" } });
						switch(clase){
							/*case 'same':
								campos += " no coincide con "+$("#"+$(elemento).attr('alt')).attr('title');
								break;*/
							case 'cero_positivo':
								campos += " debe ser mayor a 0";
								break;
							case 'type_file':
								campos = "Formato de "+campos+" no permitido";
								break;
							/*case 'fecha':
								campos += " debe ser una fecha valida";
								break;*/
						}
						if(jQuery.inArray(campos, cadena) == '-1')
							cadena.push(campos);
					}else{
						//$(elemento).attr("style","");
						$(elemento).removeClass("en-error");
						$(elemento).data('title', $(elemento).attr('title') );
						$(elemento).removeAttr('title');
					}
				}
			});
		}
	});
	if( cadena.length > 0 ){
		var errores = '';//cadena.join(', ');
		var salto = '';
		/*if(cadena.length <= 2){
			salto = '';
		}*/
		var boton = '';//'<button type="button" class="close" data-dismiss="alert">&times;</button>';
		//$('#error').html(mensaje('Por favor complete los campos requeridos: <b>'+errores+'</b>.'+salto,'error'));
		$("#"+mensaje_div).css("display","block");
		$("#"+mensaje_div).removeClass("alert-success");
		$("#"+mensaje_div).addClass("alert alert-block");
		//mensaje = false;
		if(mensaje === false){
			$("#"+mensaje_div).html(boton + "<b>Por favor complete los campos requeridos, que están marcados en rojo</b>: "+errores+"."+salto);
		}else{
			$("#"+mensaje_div).html("<b>"+mensaje+"</b>");
		}
		return false;
	}else{
		//$("#enviar").attr("disabled",true);
		return true;
	}
}


function mensaje_frm(mensaje_div, tipo, mensaje_html){
	$("#"+mensaje_div).css("display","block");
	
	if(tipo == "err"){
		$("#"+mensaje_div).removeClass("alert-success");
		$("#"+mensaje_div).addClass("alert alert-block");
	}else if(tipo == "ok"){
		$("#"+mensaje_div).removeClass("alert-block");
		$("#"+mensaje_div).addClass("alert alert-success");
	}
	$("#"+mensaje_div).html(mensaje_html);
}

function add_row(tbody_id){
	var nuevo_tr = $("#"+tbody_id+" tr:last").clone(true);
	var inputs = nuevo_tr.find('input[type=text], input[type=hidden]');
	var btneliminar = nuevo_tr.find('a');
	$('#'+tbody_id).append(nuevo_tr);
	var trs = $("#"+tbody_id).find("tr");
	
	var correlativo = parseInt($(trs[trs.length-1]).attr("id").replace(/\D/g,''));
	//var nuevo_id_tr = $(trs[trs.length-1]).attr("id").replace(correlativo,'') + (correlativo+1);
	var nuevo_id_tr = 'tmp_' + (correlativo+1);
	$(trs[trs.length-1]).attr('id',nuevo_id_tr);
			
	$.each(inputs,function(i,e){
		var inc = parseInt($(e).attr('id').replace(/\D/g,''));
		var nuevo_id = $(e).attr("id").replace(inc,'') + (inc+1);
		$(e).attr('id',nuevo_id);
		$(e).val('');
		$(e).attr('style','');
		/*Si tiene datepicker*/
		if($(e).hasClass("hasDatepicker")){
			$(e).removeClass('hasDatepicker');
			$(e).datepicker();
		}
		//$(e).tooltip({ disabled: true });
		$(e).data('title', $(e).attr('title') );
        $(e).removeAttr('title');
		if(i==0){
			$(btneliminar).attr('id',nuevo_id).attr('onclick','$("#'+nuevo_id_tr+'").remove();');	
		}
	});
	$(trs[trs.length-1]).find(".rellenar").val(nuevo_id_tr);
}

