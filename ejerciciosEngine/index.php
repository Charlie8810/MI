<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

include("Parser.php");


$chson_str = '{"Quien vive en el 1308":{"Jonathan","correcta"},{"Carlos","incorrecta"},{"Julio","correcta"}}';

			 		
$parser = new Parser();

$parser->parse_checkbox($chson_str);


?>