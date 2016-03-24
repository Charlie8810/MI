<?php

class Parser
{
	
	public function chson_to_array($chson)
	{ 

		$comment = false;
		$out = '$x=array("preguntas"=>array( ';
		$chson = str_replace(array("\r", "\n", "\t", "\v" ," "), "", $chson);
		$arr = explode("}},",$chson);
		
		foreach($arr as $iN=>$val)
		{
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
		eval(trim($out));
		return $x;
	} 

	
	public function parse_checkbox($text)
	{
		$html = "";
		$listapreguntas = $this->chson_to_array($text);
		foreach($listapreguntas as $p)
		{
			foreach($p as $pregunta)
			{
				echo "<pre>";
				print_r($pregunta["respuestas"]);
				echo "</pre>";
			}	
		}
	}
	
	
	public function parse_dragndrop()
	{
		
	}
	
	public function parse_sopaletras()
	{
		
	}
	
} 