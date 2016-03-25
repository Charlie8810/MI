<?php

include("Parser.php");


$chson_str = '{"Quien vive en el 1308":{"Jonathan","correcta"},{"Carlos","incorrecta"},{"Julio","correcta"}}, 
			  {"Quien vive en La Pintana":{"Jonathan","incorrecta"},{"Carlos","correcta"},{"Julio","incorrecta"},{"Julio1","incorrecta"},{"Julio2","incorrecta"},{"Julio3","incorrecta"}}';

			  
			  
$chson_str2 = '{"los autos tienen":{"ruedas"},{"puertas"},{"parabrisas"}}, 
			  {"los humanos tienen":{"brazos"},{"piernas"},{"cabeza"},{"ojos"}}';
			  
			 		
$parser = new Parser();

?>
<!DOCTYPE html>
<html>
	<head>
		<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
		<script language="javascript" type="text/javascript" src="http://bunkat.github.io/wordfind/src/wordfind.js"></script> 
		<script language="javascript" type="text/javascript" src="http://bunkat.github.io/wordfind/example/scripts/wordfindgame.js"></script>
		
		<script language="javascript" type="text/javascript" src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="http://bunkat.github.io/wordfind/example/styles/style.css">
		<link rel="stylesheet" type="text/css" href="estilo.css">
	</head>
	<body>
		<p>WordFind.js by BunKat</p>
		<div id='puzzle'></div>
		<div id='words'></div>
		<div><button id='solve'>Solve Puzzle</button></div>
		
		<?php echo $parser->parse_checkbox($chson_str); ?>
		
		<script>

		  var words = ['carlos','jonathan','valeria','julio','ivonne','damary','carmen','barbara'];

		  // start a word find game
		  var gamePuzzle = wordfindgame.create(words, "#puzzle", "#words");

		  $("#solve").click( function() {
			wordfindgame.solve(gamePuzzle, words);
		  });

		  // create just a puzzle, without filling in the blanks and print to console
		  var puzzle = wordfind.newPuzzle(
			words, 
			{height: 18, width:18, fillBlanks: false}
		  );
		  wordfind.print(puzzle);

		</script>
		
		
		
		
		
	<?php /*
	<div class="sideBySide">
		<div class="left">
			<p>Respuestas:</p>
			<ul class="source connected">
				<li draggable="true" class="P1">Jaguar</li>
				<li draggable="true" class="P1">Porsche</li>
				<li draggable="true" class="P1">Tesla</li>
				<li draggable="true" class="P1">Volkswagen</li>
				<li draggable="true" class="P1">Volvo</li>
				<li draggable="true" class="P2">Alfa Romeo</li>
				<li draggable="true" class="P2">Audi</li>
				<li draggable="true" class="P2">BMW</li>
				<li draggable="true" class="P2">Ford</li>
				<li draggable="true" class="P2">Mercedes</li>
			</ul>
		</div>
	
	
		<div class="left P1">
				<p>Pregunta 1:</p>
				<ul class="target connected segundo">
					
				</ul>
		</div>
		
		<div class="left P2">
				<p>Pregunta 2:</p>
				<ul class="target connected segundo">
					
				</ul>
		</div>
	
		
		
	
		
	</div> */ ?>
	
	
	<?php echo $parser->parse_dragndrop($chson_str2); ?>
	
	
	<script type="text/javascript">
      $(function () {
        $(".source, .target").sortable({
		   connectWith: ".connected",
		   placeholder: "sortable-placeholder"
        });
      });
    </script>
		
	</body>
</html>