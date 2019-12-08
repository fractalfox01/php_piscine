#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$tot = 0;
		$y = 0;
		$x = 0;
		$row = 1;
		$cmd = readline("Enter your command: ");
		$info = array();
		if (($handle = fopen($argv[1], "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$sdata = explode(";", $data[0]);
				echo $data[0] . "\n";
				$num = count($sdata);
				echo "$num\n";
				// while ($x < $num)
				// {
				// 	// echo $sdata[$x] . "\n";
				// 	array_push($info, $sdata[$x]);
				// 	$x += 1;
				// }
				$x = 0;
				$tot += $num;
			}
			fclose($handle);
			$IP = 3;
			// while ($tot > 0)
			// {
			// 	if (($tot - 1) % 5 == 0)
			// 	{
			// 		echo "\n";
			// 		$IP = $y + 3;
			// 	}
			// 	if ($y == $IP and strcmp($cmd, "IP") == 0)
			// 	{
			// 		echo $info[$y] . " ";
			// 	}
			// 	$y += 1;
			// 	$tot -= 1;
			// }
		}
		else
		{
			echo "failed to open.\n";
		}
	}
?>