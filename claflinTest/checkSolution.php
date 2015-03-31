<?php $head = "Test results"; ?>
<?php include "head.php"; ?>
<header>
		<h1>Your result.</h1>
</header>

<?php

	$myfile = fopen("solutions.txt", "r") or die("Unable to open file!");
	$answers = array();


     while(!feof($myfile)) {
       $answer = trim(fgets($myfile));
       
       array_push($answers, $answer);   
	}

	$totalCorrect = 0;
	$i = 0;
	$wrongAnswers = array();

	array_pop($_POST);
	foreach ($_POST as $key => $value)
	{
		$ans = explode("\t", $answers[$i]);
		if (strcasecmp((string) $value,(string) $ans[0]) == 0)
		{
			$totalCorrect += 1;
		}
		else
		{
			array_push($wrongAnswers, $i);
		}

		$i += 1;
	}

	?>

	<div class="container result">
	<div class="jumbotron">
	<?php echo "<h2>".$totalCorrect . " correct answers</h2>". "<hr/>". "<h2>".count($answers)." total</h2>"; ?>
	</div>

	<?php
		$percent = ( $totalCorrect / count($answers) ) * 100;
		if ($percent == 0)
		{
			echo "<div class=\"alert alert-danger\">Looks like you didn't study at well. You are not a claflinite you are an intruder.</div>";
		}
		elseif ($percent == 100) {
			echo "<div class=\"alert alert-success\">Congratulations!! You got all the questions correct. You are a true claflenite.
			Go get a medal for yourself.</div>";
		}
		elseif ($percent <= 50)
		{
			echo "<div class=\"alert alert-warning\">You still have time to improve and 
			make yourself a better claflenite. Start studying!!.</div>";
		}
		else
		{
			echo "<div class=\"alert alert-info\">You did pretty good but you
			can do better. I can see you have a great potential to be a visionary leader.</div>";
		}
	?>
	<?php if ($totalCorrect < count($answers))
	{
	?>
		<div class="jumbotron">
		<h2>Questions that you failed.</h2>
		<br />
		<?php 
			foreach($wrongAnswers as $i)
			{
		?>
				<div class="panel panel-warning">
						<div class="panel-heading">
						<h3 class="panel-title"><?php echo "Question # ".($i + 1); ?></h3>
						</div>
						<div class="panel-body">
							<?php echo $answers[$i]; ?>
						</div>
				</div>
		<?php } ?>

		</div>
		</div>
	<?php } ?>




<?php include "foot.php" ?>