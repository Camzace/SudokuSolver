<!DOCTYPE html>
<html>
  <head><link rel="stylesheet" type="text/css" href="stylesheet.css">
    <meta charset="UTF-8">
    <title>title</title>
  </head>
  <body>
  <div class="container">
  <?php
  
$puzzle = $_POST["puzzle"];
if (strlen($puzzle) != 81) {
	echo '<p>Incorrect character length. Click <a href="http://www.cameronnoyer.info/sudoku.html">here</a> to try again.';
} else {

	$formattedgrid = "";

	for ($i = 0; $i < strlen($puzzle); $i++) {
		if ($puzzle[$i] == "-") {
			$formattedgrid .= "_ ";
		} else {
			$formattedgrid .= $puzzle[$i] . " ";
		}
		if ($i%9 === 8) {
			$formattedgrid .= "<br>";
			$dashes = floor($i/9);
			if ($dashes == 2 || $dashes == 5) {
				$formattedgrid .= "--------------------- <br>";
			}
		} elseif ($i%9 === 2 || $i%9 === 5) {
			$formattedgrid .= "| ";
		}
	}

	echo "<p>".$formattedgrid."</p>";
	
	echo '<br><p><a href="http://www.cameronnoyer.info/sudokusolver.php?puzzle='.$puzzle.'">SOLVE</a></p>';
}

?>
	</div>
  </body>
</html>