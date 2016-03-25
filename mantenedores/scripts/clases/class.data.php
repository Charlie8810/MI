<?php

class Data extends MySQL
{
	
	function cargarPersona($rut)
	{
		$sql = "SELECT * FROM persona WHERE Rut = '".$rut."';";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$pr = parent::fetch_assoc($consulta);	
			$persona = new stdclass();
			$persona->IdPersona 		= $pr["IdPersona"];
			$persona->Nombres 			= $pr["Nombres"];
			$persona->ApellidoPaterno 	= $pr["ApellidoPaterno"];
			$persona->ApellidoMaterno 	= $pr["ApellidoMaterno"];
			$persona->Rut 				= $pr["Rut"];
			$persona->Email 			= $pr["Email"];
			$persona->IdPerfil 			= $pr["IdPerfil"];
			$persona->Direccion 		= $pr["Direccion"];
			$persona->IdRegion 			= $pr["IdRegion"];
			$persona->IdComuna 			= $pr["IdComuna"];
			$persona->Telefono 			= $pr["Telefono"];
			$persona->Celular 			= $pr["Celular"];
			$persona->IdEstado 			= $pr["IdEstado"];
			
			
			return $persona;
		}
		else
		{
			return false;
		}
	}
	
	
	function cargarEmpresa($rut)
	{
		$sql = "SELECT * FROM empresa WHERE Rut = '".$rut."';";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$em = parent::fetch_assoc($consulta);	
			$empresa = new stdclass();
			$empresa->IdEmpresa 		= $em["IdEmpresa"];
			$empresa->Rut 			    = $em["Rut"];
			$empresa->RazonSocial 	    = $em["RazonSocial"];
			$empresa->Direccion 	    = $em["Direccion"];
			$empresa->IdRegion 		    = $em["IdRegion"];
			$empresa->IdComuna 			= $em["IdComuna"];
			$empresa->NombreContacto 	= $em["NombreContacto"];	
			$empresa->EmailContacto 	= $em["EmailContacto"];	
			$empresa->TelefonoContacto 	= $em["TelefonoContacto"];				
			
			return $empresa;
		}
		else
		{
			return false;
		}
	}
	
	
	function guardarEjercicio($ejercicio)
	{
		
		if($ejercicio->IdEjercicio)
		{
			$sqlUpdate = "update ejercicio 
							set IdFase = ".$ejercicio->IdFase.", 
								IdTipo = ".$ejercicio->IdTipo.", 
								Nombre = '".$ejercicio->Nombre."'
							where IdEjercicio = ".$ejercicio->IdEjercicio."	
								";
			$stmt = parent::consulta($sqlUpdate);
			return $ejercicio->IdEjercicio;
		}
		else
		{
			$sqlInsert = "insert into ejercicio (IdFase, IdTipo, Nombre) values (".$ejercicio->IdFase.", ".$ejercicio->IdTipo.", '".$ejercicio->Nombre."');";
			$stmt = parent::consulta($sqlInsert);
			return parent::lastInsertID();
		}
	}
	
	function obtenerEjercicio($IdEjercicio)
	{
		$sql = "SELECT * FROM ejercicio WHERE IdEjercicio = ".$IdEjercicio.";";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$pr = parent::fetch_assoc($consulta);	
			$ejercicio = new stdclass();
			$ejercicio->IdEjercicio 		= $pr["IdEjercicio"];
			$ejercicio->IdFase 				= $pr["IdFase"];
			$ejercicio->IdTipo 				= $pr["IdTipo"];
			$ejercicio->Nombre 				= $pr["Nombre"];
		
			return $ejercicio;
		}
		else
		{
			return false;
		}
	}
	
	function EliminarEjercicio($IdEjercicio)
	{
		$sqlDelete = "delete from ejercicio where IdEjercicio = " . $IdEjercicio;
		$stmt = parent::consulta($sqlDelete);
	}
	
	function guardarGrupoPreguntas($grupo)
	{
		$sqlInsert = "insert into grupo_pregunta(idEjercicio, TextoGrupoPregunta, HtmlGrupoPregunta) values ($grupo->IdEjercicio, '$grupo->Texto', '$grupo->Html');";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
	
	
	function eliminarGrupoPreguntasPorEjercicio($idEjercicio)
	{
		$sqlDelete = "delete from grupo_pregunta where IdEjercicio=".$idEjercicio.";";
		$stmt = parent::consulta($sqlDelete);
	}
	
	function eliminarTerminosPareadosPorEjercicio($idEjercicio)
	{
		$sqlDelete = "delete from terminos_pareados where IdEjercicio=".$idEjercicio.";";
		$stmt = parent::consulta($sqlDelete);
	}
	
	function obtenerGrupoPreguntasPorEjercicio($idEjercicio)
	{
		$sql = "SELECT * FROM grupo_pregunta 
				WHERE idEjercicio = ".$idEjercicio."
				ORDER BY rand() LIMIT 10;
		;";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$grupo_pregunta = new stdclass();
				$grupo_pregunta->IdGrupoPregunta 		= $gr["IdGrupoPregunta"];
				$grupo_pregunta->IdEjercicio 			= $gr["IdEjercicio"];
				$grupo_pregunta->TextoGrupoPregunta 	= $gr["TextoGrupoPregunta"];
				$grupo_pregunta->HtmlGrupoPregunta 		= $gr["HtmlGrupoPregunta"];
				$lista[] = $grupo_pregunta;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerGrupoPreguntasPorEjercicioGestor($idEjercicio)
	{
		$sql = "SELECT * FROM grupo_pregunta 
				WHERE idEjercicio = ".$idEjercicio.";";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$grupo_pregunta = new stdclass();
				$grupo_pregunta->IdGrupoPregunta 		= $gr["IdGrupoPregunta"];
				$grupo_pregunta->IdEjercicio 			= $gr["IdEjercicio"];
				$grupo_pregunta->TextoGrupoPregunta 	= $gr["TextoGrupoPregunta"];
				$grupo_pregunta->HtmlGrupoPregunta 		= $gr["HtmlGrupoPregunta"];
				$lista[] = $grupo_pregunta;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerTerminosPareadosPorEjercicio($idEjercicio)
	{
		$sql = "SELECT * FROM terminos_pareados 
				WHERE idEjercicio = ".$idEjercicio."
				ORDER BY rand() LIMIT 10;
		;";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$grupo_pregunta = new stdclass();
			while($gr = parent::fetch_assoc($consulta))
			{
				$IdTermino 	= $gr["IdTermino"];
				$grupo_pregunta->TextoDerecha[$IdTermino] 	= $gr["TextoDerecha"];
				$grupo_pregunta->TextoIzquierda[$IdTermino] = $gr["TextoIzquierda"];
				$grupo_pregunta->dt[] = array('ID'=>$IdTermino,'d'=>$gr["TextoDerecha"], 'i'=>$gr["TextoIzquierda"]);
			}
			return $grupo_pregunta;
		}
		else
		{
			return false;
		}
	}
	
	function obtenerTerminosPareadosPorEjercicioGestor($idEjercicio)
	{
		$sql = "SELECT * FROM terminos_pareados 
				WHERE idEjercicio = ".$idEjercicio.";";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		if($num_total_registros>0)
		{
			$r = array();
			while($gr = parent::fetch_assoc($consulta))
			{
				$terminopareado = new stdclass();
				$terminopareado->IdTermino 	= $gr["IdTermino"];
				$terminopareado->TextoDerecha 	= $gr["TextoDerecha"];
				$terminopareado->TextoIzquierda = $gr["TextoIzquierda"];
				$r[] = $terminopareado;
			}
			return $r;
		}
		else
		{
			return false;
		}
	}
	
	function guardarPreguntas($pregunta)
	{
		$sqlInsert = "insert into pregunta(IdGrupoPregunta,TextoPregunta) values ($pregunta->IdGrupoPregunta, '$pregunta->TextoPregunta');";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
	
	function guardarTerminosPareados($terminos)
	{
		$sqlInsert = "insert into terminos_pareados(IdEjercicio, TextoIzquierda, TextoDerecha) values ($terminos->IdEjercicio,'$terminos->TextoIzquierda', '$terminos->TextoDerecha');";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
	
	
	
	function guardarRespuesta($respuesta)
	{
		$sqlInsert = "insert into respuesta(IdPregunta, EsCorrecta, TextoRespuesta) values ($respuesta->IdPregunta, $respuesta->EsCorrecta, '$respuesta->Texto');";
		$stmt = parent::consulta($sqlInsert);
		return parent::lastInsertID();
	}
		
	function listarFases()
	{
		$sql = "select IdFase, a.IdCurso
				from ejercicio a
				inner join cursos b on a.IdCurso = b.IdCurso
				where b.IdCurso  = 1
				and IdNivel=1
				GROUP BY IdFase
				ORDER BY IdFase";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$grupo_pregunta = new stdclass();
				$grupo_pregunta->IdFase 		= $gr["IdFase"];
				$grupo_pregunta->IdCurso 		= $gr["IdCurso"];
				$lista[] = $grupo_pregunta;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}	
	
	function listarEjercicios($idCurso, $idFase)
	{
		$sql = "select * 
				from ejercicio 
				where IdCurso  = $idCurso
				and IdFase = $idFase ";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$grupo_pregunta = new stdclass();
				$grupo_pregunta->IdEjercicio 	= $gr["IdEjercicio"];
				$grupo_pregunta->IdTipo 		= $gr["IdTipo"];
				$grupo_pregunta->Nombre 		= $gr["Nombre"];
				$lista[] = $grupo_pregunta;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}
	
	function listarEjerciciosAll()
	{
		$sql = "select * from ejercicio";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$ejercicio = new stdclass();
				$ejercicio->IdEjercicio 	= $gr["IdEjercicio"];
				$ejercicio->IdTipo 			= $gr["IdTipo"];
				$ejercicio->Nombre 			= $gr["Nombre"];
				$ejercicio->IdCurso 		= $gr["IdCurso"];
				$ejercicio->IdFase 			= $gr["IdFase"];
				$lista[] = $ejercicio;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}
	
	function listarCursosAll()
	{
		$sql = "select 
			cursos.IdCurso,
			cursos.Nombre_Curso,
			CONCAT(persona.Nombres,' ',persona.ApellidoPaterno,' ', persona.ApellidoMaterno) as Profesor,
			CONCAT(empresa.RazonSocial,' - ',departamento.Nombre) as Empresa,
			idioma.Nombre as idioma


			from cursos
			inner join persona on persona.IdPersona = cursos.IdProfesor
			inner join relacionempresadepto on relacionempresadepto.IdRelacionEmpresaDepto = cursos.IdRelEmpresaDepto
			inner join departamento on departamento.IdDepartamento = relacionempresadepto.IdDepartamento
			inner join empresa on empresa.IdEmpresa = relacionempresadepto.IdEmpresa
			inner join idioma on idioma.id_Idioma = cursos.IdIdioma";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta)){
			
				$curso = new stdclass();
				$curso->IdCurso 			= $gr["IdCurso"];
				$curso->Nombre 				= $gr["Nombre_Curso"];
				$curso->Profesor 			= $gr["Profesor"];
				$curso->Empresa 			= $gr["Empresa"];
				$curso->Idioma 			    = $gr["idioma"];
				
				
				$lista[] = $curso;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}
	
	
	function listarAlumnosNoEnrrolados($idCurso)
	{
		$sql = "
			select * 
			from persona p
            where p.IdPerfil = 3			
			and p.IdPersona not in (select IdPersona from relacioncursopersona  where relacioncursopersona.Vigente = 1 and relacioncursopersona.IdCurso = ".$idCurso.");";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta))
			{
			
				$alumno = new stdclass();
				$alumno->IdPersona 			= $gr["IdPersona"];
				$alumno->NombreCompleto 	= $gr["Nombres"] . " " . $gr["ApellidoPaterno"] . " " . $gr["ApellidoMaterno"];
				$alumno->Rut 				= $gr["Rut"];
				$lista[] = $alumno;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}
	
	function listarAlumnosEnrrolados($idCurso)
	{
		$sql = "
			select * 
			from persona p 
			where p.IdPerfil = 3
			and p.IdPersona in (select IdPersona from relacioncursopersona  where relacioncursopersona.Vigente = 1 and relacioncursopersona.IdCurso = ".$idCurso." );";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta))
			{
			
				$alumno = new stdclass();
				$alumno->IdPersona 			= $gr["IdPersona"];
				$alumno->NombreCompleto 	= $gr["Nombres"] . " " . $gr["ApellidoPaterno"] . " " . $gr["ApellidoMaterno"];
				$alumno->Rut 				= $gr["Rut"];
				$lista[] = $alumno;
			}
			return $lista;
		}
		else
		{
			return false;
		}
		
	}
	
	function eliminarAsociacionCursoAlumno($idCurso,$idNivel)
	{
		$sqlDelete = "UPDATE relacioncursopersona SET Vigente=0  WHERE IdCurso=".$idCurso." AND IdCurso=".$idNivel.";";
		$stmt = parent::consulta($sqlDelete);
	}
	
	function guardarAsociacionCursoAlumno($entrada)
	{
		
			     $sql ="  SELECT *
				  FROM	relacioncursopersona
				  WHERE	relacioncursopersona.IdCurso = $entrada->IdCurso
				  AND	relacioncursopersona.IDNivel = $entrada->nivel
                  AND	relacioncursopersona.IdPersona = $entrada->IdPersona;";

		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);

        if($num_total_registros>0)
		{
			$sqlupdate = "UPDATE relacioncursopersona SET Vigente=1  WHERE IdCurso=".$entrada->IdCurso." AND IdPersona=".$entrada->IdPersona." AND IdPersona=".$entrada->nivel.";";
		    $stmt1 = parent::consulta($sqlupdate);
		}
        else
		{
			$sqlInsert = "insert into relacioncursopersona(IdCurso, IdPersona, Vigente, IDNivel) values ($entrada->IdCurso, $entrada->IdPersona,'1',$entrada->nivel);";
		    $stmt = parent::consulta($sqlInsert);
		}	
		
	}
	
	
	function listarTiposEjercicios()
	{
		$sql = "
			select * 
			from tipo_pregunta";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			while($gr = parent::fetch_assoc($consulta))
			{
			
				$alumno = new stdclass();
				$alumno->IdTipoEjercicio 			= $gr["IdTipoEjercicio"];
				$alumno->Nombre	= $gr["Nombre"];
				$lista[] = $alumno;
			}
			return $lista;
		}
		else
		{
			return false;
		}
	}
	
		function ObtenerTiposEjercicios($idTipoEjercicio)
	{
		$sql = "
			select * 
			from tipo_pregunta
			where tipo_pregunta.IdTipoEjercicio = ".$idTipoEjercicio."";
		$consulta = parent::consulta($sql);
		$num_total_registros = parent::num_rows($consulta);
		$lista = array();
		if($num_total_registros>0)
		{
			    $gr = parent::fetch_assoc($consulta);
				$alumno = new stdclass();
				$alumno->IdTipoEjercicio 			= $gr["IdTipoEjercicio"];
				$alumno->Nombre	= $gr["Nombre"];
			
			return $alumno;
		}
		else
		{
			return false;
		}
	}
	
	
	function actualizarTiposEjercicios($entrada)
	{

		$sqlupdate = "UPDATE tipo_pregunta SET Nombre = '".$entrada->Nombre."'  WHERE IdTipoEjercicio = ".$entrada->IdTipoEjercicio.";";
		$stmt1 = parent::consulta($sqlupdate);

	}
		
	
}
?>