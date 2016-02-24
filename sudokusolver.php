<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  </head>
  <body>
  
  <?php
  
$alpha = "ABCDEFGHI";

function checkValidity($inputgrid) {
  	for ($row = 0; $row < 9; $row++) {
  		for ($col = 0; $col < 9; $col++) {
  			if ($inputgrid[9*$row + $col] != "-") {
  				for ($i = $col+1; $i < 9; $i++) {
  					if ($inputgrid[9*$row+$i] == $inputgrid[9*$row+$col]) {
  						echo "<p>invalid row at " . (9*$row+$col) . " vs " . (9*$row+$i)."<//p>";
  						return false;
  					}
  				}
  			}
  			if ($inputgrid[9*$col + $row] != "-") {
  				for ($i = $row+1; $i < 9; $i++) {
  					if ($inputgrid[9*$col+$i] == $inputgrid[9*$col+$row]) {
  						echo "<p>invalid col at " . (9*$col+$row) . " vs " . (9*$col+$i)."<//p>";
  						return false;
  					}
  				}
  			}
  		}
  	}
  	for ($block = 0; $block < 9; $block++) {
  		$blockarray = getBlock($block);
  		for ($pos = 0; $pos < 9; $pos++) {
  			if ($inputgrid[$blockarray[$pos]] != "-")
  			for ($i = $pos+1; $i < 9; $i++) {
  				if ($inputgrid[$blockarray[$i]] == $inputgrid[$blockarray[$pos]]) {
  					echo "<p>invalid block at " . ($blockarray[$pos]) . " vs " . $blockarray[$i]."<//p>";
  					return false;
  				}
  			}
  		}
  	}
  	return true;
  }
  
  function checkValidityOfNum($inputgrid, $num, $pos) {
  	$checkArray = getCheckArray($inputgrid, $pos);
  	foreach ($checkArray as $tester) {
  		if ($inputgrid[$tester] == $num) return false;
  	}
  	return true;
  }
  
  function getCheckArray($inputgrid, $pos) {
	$alpha = "ABCDEFGHI";
  	$checkArray = array();
  	$numCoords = getCoordinates($pos);
  	$row = strpos($alpha, $numCoords[0]);
  	$col = (int)$numCoords[1]-1;
  	$block = getBlock(getBlockNum($pos));
  	for ($i = 0; $i < 9; $i++) {
  		if (9*$row+$i != $pos) array_push($checkArray, 9*$row+$i);
  		if (9*$i+$col != $pos) array_push($checkArray, 9*$i+$col);
  		if ($block[$i] != $pos) array_push($checkArray, $block[$i]);
  	}
  	return $checkArray;
  }
  
  function getBlock($blocknum) {
  	$startnum = 3*($blocknum%3) + 27*floor($blocknum/3);
  	$posarray = array();
  	for ($i = 0; $i < 9; $i++) {
  		array_push($posarray, $startnum + $i%3 + 9*floor($i/3));
  	}
  	return $posarray;
  }
  
  function getBlockNum($pos) {
  	return 3*floor($pos/27) + floor($pos/3)%3;
  }
  		
  
  function getCoordinates($pos)	{
  	$alphaC = "ABCDEFGHI";
  	return $alphaC[floor($pos/9)] . ($pos%9+1);
  }
  
  function getPosFromCoordinates($coords) {
  	return 9*strpos($alpha, $coords[0])+$coords[1]-1;
  }
  
  function solve($inputgrid) {
  	$possibilities = array();
  	for ($i = 0; $i < 81; $i++) {
  		if ($inputgrid[$i] != "-") {
  		 	$possibilities[$i] = $inputgrid[$i];
  		} else {
  			$possibilities[$i] = "123456789";
  		}
  		
  }
  
  
  
  
  
  $puzzle = $_GET["puzzle"];
  
  if (checkValidity($puzzle) == true) {
  	$solved = solve($puzzle);
  	
  	
  }
  
  ?>
  
  </body>
</html>