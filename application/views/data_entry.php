<form action="" method="post">
	<?php
		$i = 0;
		while (isset($qns[$i])) {
			echo $qns[$i];
			echo '<input type="text" name="'.$qnid[$i].'" placeholder="enter value"></br>';
			$i++;
		}
	?>
	<button type="submit">Submit</button>
</form>