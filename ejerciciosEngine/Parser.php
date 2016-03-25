<?php

class Parser
{
	
	public function chson_to_array($chson)
	{ 

		$comment = false;
		$out = '$x=array("preguntas"=>array( ';
		$chson = str_replace(array("\r", "\n", "\t", "\v"), "", $chson);
		$arr = explode("}},",$chson);
		
		foreach($arr as $iN=>$val)
		{
			$val = trim($val);
			
			if(!strrpos($val, "}}"))
			{
				$val = $val."}}";
			}
			
			for ($i=0; $i<strlen($val); $i++)
			{
				
				if($i==0)
				{
					if ($val[$i] == '{')        $out .= ' array("pregunta"=>';
				}
				else
				{
					if(!$comment)
					{
						if ($val[$i] == '{')        $out .= ' array(';
						else if ($val[$i] == '}')    $out .= ')';
						else if ($val[$i] == ':')    $out .= ', "respuestas"=>array(';
						else                         $out .= $val[$i]; 
					}
					else
					{
						$out .= $val[$i];
					}
					
					if ($val[$i] == '"')    $comment = !$comment;
					
				}
			}
			$out.=") ";
			if($iN<(count($arr)-1)) $out.=", ";		
		}
		$out.="));";
		
		eval($out);
		return $x;
	} 

	
	public function parse_checkbox($text)
	{
		$html = "";
		$listapreguntas = $this->chson_to_array($text);
		
		
		foreach($listapreguntas as $prgs)
		{
			
			foreach($prgs as $kp => $pregunta)
			{
				
				$html.='<div class="pregunta">
				<p>'.$pregunta["pregunta"].'</p>';
				foreach($pregunta["respuestas"] as $kr=>$resp)
				{
					$html_name = 'P'.$kp.'[]';
					$html_id   = 'P'.$kp.'R'.$kr;
					$html.='<input type="checkbox" name="'.$html_name.'" id="'.$html_id.'" value="'.$resp[0].'" correcta="'.$resp[1].'" /><label for="'.$html_id.'">'.$resp[0].'</label><br/>';
				}
				$html.='</div>';
			}	
		}
		return $html;
	}
	
	
	public function parse_dragndrop($text)
	{
		$html = '';
		$listapreguntas = $this->chson_to_array($text);
		
	$html.=	'<div class="sideBySide">
		<div class="left">
			<p>Respuestas:</p>
			<ul class="source connected">';
			
			foreach($listapreguntas as $prgs)
			{
				foreach($prgs as $kp => $pregunta)
				{
					foreach($pregunta["respuestas"] as $kr=>$resp)
					{
						$html_class = 'P'.$kp;
						$html.='<li draggable="true" class="'.$html_class.'">'.$resp[0].'</li>';
					}
				}
			}
			
		$html.='</ul>
		</div>';
	
			foreach($listapreguntas as $prgs)
			{
				foreach($prgs as $kp => $pregunta)
				{
					
					$html_class = 'P'.$kp;
					$html.='<div class="left '.$html_class.'">
									<p>'.$pregunta["pregunta"].':</p>
									<ul class="target connected '.$html_class.'" pregunta="'.$html_class.'">
										
									</ul>
							</div>';
					
				}
			}
		
		
	$html.='</div>
	
	<script type="text/javascript">
      $(function () {
        $(".source, .target").sortable({
		   connectWith: ".connected",
		   placeholder: "sortable-placeholder"
        });
      });
    </script>
	
	';
	
		return $html;
	}
	
	public function parse_sopaletras($texto)
	{
		
		$html = '<div id="puzzle"></div>
		<div id="words"></div>
		<!--div><button id="solve">Solve Puzzle</button></div-->';
		
		
		$html .= '<script type="text/javascript">
		
				var words = '.str_replace(array("{","}"),array("[","]"),$texto).';
				
			 // start a word find game
			  var gamePuzzle = wordfindgame.create(words, "#puzzle", "#words");

			  /*$("#solve").click( function() {
				wordfindgame.solve(gamePuzzle, words);
			  });*/

			  // create just a puzzle, without filling in the blanks and print to console
			  var puzzle = wordfind.newPuzzle(
				words, 
				{height: 18, width:18, fillBlanks: false}
			  );
			  wordfind.print(puzzle);
			
		</script>';
		
		return $html;
	}
	
	public function parse_select($text)
	{
		$trozoHtml = "<select class=\"pregunta_multiple\">
							<option>-- Seleccione --</option>";
		
		
		
	}
	
	
} 