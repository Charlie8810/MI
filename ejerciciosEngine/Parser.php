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
		
		//print_r($listapreguntas);
		
		
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
	
	
	public function parse_dragndrop()
	{
		
	}
	
	public function parse_sopaletras()
	{
		
	}
	
} 