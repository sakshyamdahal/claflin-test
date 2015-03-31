<?php $head = "Claflin Citizenship test"; ?>
<?php include "head.php"; ?>

	<header>
		<h1> Claflin Citizenship Test </h1>
	</header>

	<div class="questions">
	<form method="post" action="checkSolution.php">
  		<h2><?php include 'questions.php'; ?></h2>
  		<p><input type="submit" name = "submit" value="Submit Answers" class="btn btn-primary btn-lg btn-block" role="button"/></p>
  	</form>
  	</div>


<?php include "foot.php" ?>
