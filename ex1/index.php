<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Exercise 1</title>
</head>

<body>

<?php

	include 'include/header.php';

	$personal_info = array(
					"Name"				=> "Gregory Pearson", 
					"Favorite color"	=> "Red", 
					"Favorite movie"	=> "Conair", 
					"Favorite book"		=> "Belly", 
					"Favorite website"	=> "www.reddit.com"
					);
					
	echo "<h1>".$personal_info['Name']."</h1>";
	
	$other_info = getValue($personal_info);
	echo $other_info;
					
	function getValue($personal_info) {
		$str = '<ul>';
		
		foreach($personal_info as $key => $value) {
			if($key == "Name") {
				continue;
			} 		
			$str .= '<li>' . $value . '</li>';
		}
		
		$str .= '</ul>';
		
		return $str;
	
	}


	include 'include/footer.php';

?>


</body>
</html>