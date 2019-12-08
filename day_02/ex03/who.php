#!/usr/bin/php
<?php
$str = shell_exec("w");
$tmp1 = trim(preg_replace('/\s+/', ' ', $str));
$arr = explode("WHAT", $tmp1);
$tmp1 = $arr[1];
$arr1 = explode(" ", $tmp1);
$len = count($arr1);
$x = 1;
while ($x < $len)
{
	$name = $arr1[$x];
	$x += 1;
	$tty = $arr1[$x];
	$x += 5;
	echo $name . " ";
	if (strcmp($tty, "console") == 0)
	{
		echo $tty . "  ";
		$str1 = shell_exec("finger $name");
		$arr2 = explode("On since ", $str1);
		$r = 1;
		$len2 = count($arr2);
		while ($r < $len2 - 1)
		{
			if (strchr("console", $arr2[$r]) == 0)
			{
				$arr4 = explode(" ", $arr2[$r]);
				echo $arr4[1] . "  " . $arr4[3] . " " . $arr4[4] . "\n";
				break ;
			}
			$r += 1;
		}
	}
	else
	{
		echo "tty" . $tty . "  ";
		$str1 = shell_exec("finger $name");
		$arr2 = explode("On since ", $str1);
		$r = 1;
		$len2 = count($arr2);
		while ($r < $len2 - 1)
		{
			if (strchr($tty, $arr2[$r]) == 0)
			{
				$arr4 = explode(" ", $arr2[$r]);
				echo $arr4[1] . "  " . $arr4[3] . " " . $arr4[4] . "\n";
				break ;
			}
			$r += 1;
		}
		
	}
}

?>