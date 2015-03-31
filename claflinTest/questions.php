<?php

	$myfile = fopen("claflinQues.txt", "r") or die("Unable to open file!");
	 $i = 0;
     while(!feof($myfile)) {
       echo "<div class=\"jumbotron\">";
       $question = fgets($myfile);
       $options = explode("\t", trim(fgets($myfile)));
      
       echo "<h1>".$question."</h1>";
       echo "<br />";
       foreach ($options as $option)
       {
       		$radio = "";
	    	$radio .= "<div class=\"radio\">";
	  		$radio  .=	"<label>";
	    	$radio .= "	<input type=\"radio\" name=\"question$i\"  value=\"$option\" required>";
	    	$radio .= "$option";
	  		$radio .= "</label>";
			$radio .= "</div>";
			echo ($radio);
		}
		echo "</div>";
		$i += 1;
       // echo $options[0] . "\t" . $options[1] . "\t" . $options[2] . "\t" . $options[3];
		   
	}

?>