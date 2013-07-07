<html>
<head>
<link rel="stylesheet" type="text/css" href="ext.css" />
<style type="text/css">
.h {text-transform:uppercase;}
</style>
</head>
<body>
<div class='wat'>
<?php
	$pre = "<span style='position:relative;font-family:monospace;opacity:0.3'><div style='position:absolute;top:0;left:0'>";
	$posts = file_get_contents("wp_posts");
//	$words = explode(" ", $posts);
	$arr = str_split($posts);
	for($i = 0, $siz = sizeof($arr); $i < $siz; $i++){
		if($arr[$i]==" "){
			$arr[$i]="µ";
		}
		if($arr[$i]=="ø"){
			$j = 0;
			while($arr[$i+$j]=="ø"){
				unset($arr[$i+$j]);	
				if ($arr[$i-$j-1] == "µ")
				{
					$arr[$i-$j-1] = "X";
				}
				$j++;
			}
			$pend = "";
			$x = 0;
			while($x<$j){
				$pend = $pend."X";
				$x++;
			}
			$arr[$i-$j] = $pre.$pend."</div>".$arr[$i-$j];
			$arr[$i-1] = $arr[$i-1]."</span>";
			$arr = array_values($arr);
		}
	}

	$words = implode($arr);
	$words = explode("µ", $words); 	
		
	$n = sizeof($words);
	$i = 0;

	$b = 0; //b is for bold which is strong
	$em = 0; //em is for emphasis
	$h = 0;
	$h2 = 0;

	while ($i < $n) {
		$em = rand(0,10);
		if($em == 0){
			$words[$i] = "<em>".$words[$i]."</em>";
		}
	
		if ($h2 == 0) 
		{
			if ( rand(0,5) == 0 )
			{
				echo "<h2>";
			}
			$h2 = rand(2,8);
		}
		elseif ($h2 == 1)
		{
			echo "</h2>";
		}
		if ($h2 > 0) 
		{
			$h2--;
		}

		if ($h == 0) 
		{
			if ( rand(0,5) == 0 )
			{
				echo "<span class='h'>";
			}
			$h = rand(2,8);
		}
		elseif ($h == 1)
		{
			echo "</span>";
		}
		if ($h > 0) 
		{
			$h--;
		}

		if ($b == 0) 
		{
			if ( rand(0,5) == 0 )
			{
				echo "<strong>";
			}
			$b = rand(2,8);
		}
		elseif ($b == 1)
		{
			echo "</strong>";
		}
		if ($b > 0) 
		{
			$b--;
		}
					
		
		echo $words[$i]." ";
		$i++;		
	}
					
			

?>
</div>
</body>
</html>
