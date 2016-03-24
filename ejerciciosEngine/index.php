<?php

include("Parser.php");


$chson_str = '{"Quien vive en el 1308":{"Jonathan","correcta"},{"Carlos","incorrecta"},{"Julio","correcta"}}, 
			  {"Quien vive en La Pintana":{"Jonathan","incorrecta"},{"Carlos","correcta"},{"Julio","incorrecta"},{"Julio1","incorrecta"},{"Julio2","incorrecta"},{"Julio3","incorrecta"}},
			  {"Quien vive en La Pintana":{"Jonathan","incorrecta"},{"Carlos","correcta"},{"Julio","incorrecta"}},
			  {"Quien vive en La Pintana":{"Jonathan","incorrecta"},{"Carlos","correcta"},{"Julio","incorrecta"}},
			  {"Quien vive en La Pintana":{"Jonathan","incorrecta"},{"Carlos","correcta"},{"Julio","incorrecta"}},
			  {"Quien vive en La Pintana":{"Jonathan","incorrecta"},{"Carlos","correcta"},{"Julio","incorrecta"}},
			  {"Quien vive en La Pintana":{"Jonathan","incorrecta"},{"Carlos","correcta"},{"Julio","incorrecta"}}';

			 		
$parser = new Parser();

?>
<!DOCTYPE html>
<html>
	<head>
		<script language="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
		<script language="javascript" type="text/javascript" src="http://bunkat.github.io/wordfind/src/wordfind.js"></script> 
		<script language="javascript" type="text/javascript" src="http://bunkat.github.io/wordfind/example/scripts/wordfindgame.js"></script>
		<link rel="stylesheet" type="text/css" href="http://bunkat.github.io/wordfind/example/styles/style.css">
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
		  var gamePuzzle = wordfindgame.create(words, '#puzzle', '#words');

		  $('#solve').click( function() {
			wordfindgame.solve(gamePuzzle, words);
		  });

		  // create just a puzzle, without filling in the blanks and print to console
		  var puzzle = wordfind.newPuzzle(
			words, 
			{height: 18, width:18, fillBlanks: false}
		  );
		  wordfind.print(puzzle);

		</script>
		
	</body>
</html>