<?php
//imports
include("../scripts/clases/class.mysql.php");
include("../scripts/clases/class.data.php");


//Parametros
$curso = isset($_POST["curso"]) ? $_POST["curso"] : false;
$fase = isset($_POST["fase"]) ? $_POST["fase"] : false;
$tipo_ejercicio = isset($_POST["tipo_ejercicio"]) ? $_POST["tipo_ejercicio"] : false;
$nombre_ejercicio = isset($_POST["nombre_ejercicio"]) ? $_POST["nombre_ejercicio"] : false;
$grupopreguntas = isset($_POST["pregunta"]) ? $_POST["pregunta"] : false;
$terminospareadosIzquierda = isset($_POST["izquierda"]) ? $_POST["izquierda"] : false;
$terminospareadosDerecha = isset($_POST["derecha"]) ? $_POST["derecha"] : false;


if($curso != false && $fase != false && $tipo_ejercicio != false)
{
	
	$data = new Data();
	$ejercicio = new stdClass();
	$ejercicio->IdCurso = $curso;
	$ejercicio->IdFase = $fase;
	$ejercicio->IdTipo = $tipo_ejercicio;
	$ejercicio->Nombre = $nombre_ejercicio;
	$idEjercicio = $data->guardarEjercicio($ejercicio);
	
	//nuevo tipo de preguntas
	if($tipo_ejercicio == 3)
	{
		foreach($terminospareadosIzquierda as $key=>$opcion)
		{
			$opI = $terminospareadosIzquierda[$key];			
			$opD = $terminospareadosDerecha[$key]; 	
			
			$terminos = new stdclass();
			$terminos->IdEjercicio = $idEjercicio;
			$terminos->TextoDerecha = mysql_real_escape_string($opD);
			$terminos->TextoIzquierda = mysql_real_escape_string($opI);
			
			$idTermino = $data->guardarTerminosPareados($terminos);
			
		}
	}
	else
	{
		foreach($grupopreguntas as $kg=>$grupopregunta)
		{
			$imprimir = $grupopregunta;
			$encontradas = array();		
			$res = preg_match_all("#@@([\w@,+&.' ]+);#is", $grupopregunta, $encontradas);
			if($res > 0)
			{	
				foreach($encontradas[1] as $kp=>$pregunta)
				{		
					$preguntaO = new stdclass();
					$preguntaO->IdGrupoPregunta = $idGrupoPregunta;
					$preguntaO->TextoPregunta = $pregunta;
					//$idPregunta = $data->guardarPreguntas($preguntaO);
					
					//respuesta simple
					if(strpos($pregunta,",") === false )
					{
						//html
						$imprimir = str_replace($encontradas[0][$kp],"<input type=\"text\" class=\"pregunta_simple\" respuesta=\"$pregunta\" />",$imprimir);		
						
						$respuestaSimple = new stdclass();
						//$respuestaSimple->IdPregunta = $idPregunta;
						$respuestaSimple->EsCorrecta = 1;
						$respuestaSimple->Texto = $pregunta;
						//$idRespuesta = $data->guardarRespuesta($respuestaSimple);
					}
					else // respuesta multiple
					{
						$trozoHtml = "<select class=\"pregunta_multiple\"><option>-- Seleccione --</option>";
						$respuestas = explode(",", $pregunta);
						foreach($respuestas as $ki=>$respuesta)
						{
							$escorrecta = preg_match("/^\+\+/", $respuesta);					
							$respuestaMultiple = new stdclass();
							//$respuestaMultiple->IdPregunta = $idPregunta;
							$respuestaMultiple->EsCorrecta = empty($escorrecta) ? 0 : $escorrecta;
							$respuestaMultiple->Texto = str_replace("++","",$respuesta);
							//$idRespuesta = $data->guardarRespuesta($respuestaMultiple);
							$trozoHtml .= "<option value=\"$respuestaMultiple->Texto\" correcta=\"$respuestaMultiple->EsCorrecta\">$respuestaMultiple->Texto</option>";
						}
						$trozoHtml .= "</select>";
						
						//html
						$imprimir = str_replace($encontradas[0][$kp], $trozoHtml, $imprimir);
					}
				}
				$grupo = new stdClass();
				$grupo->IdEjercicio = $idEjercicio;
				$grupo->Texto = mysql_real_escape_string($grupopregunta);
				$grupo->Html = mysql_real_escape_string($imprimir);
				
				$idGrupoPregunta = $data->guardarGrupoPreguntas($grupo);
			}
		}
	}
	?>
	<form method="post" action="../ReciveEjercicios.php" id="frmsubmit" >
		<input type="hidden" name="htmltt" value="<?php echo htmlspecialchars($imprimir);?>">
		<input type="hidden" name="ejercicio" value="<?php echo $idEjercicio;?>">
	</form>
	
	<script type="text/javascript">
		document.getElementById("frmsubmit").submit();
	</script>
	
<?php
}

?>