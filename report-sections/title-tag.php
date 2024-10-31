<?php
echo '<table style="float:left;border-color:black; border-style:solid; border-width:1px;padding:5px;margin:5px;">';
echo '<tr><td><strong style="text-align:center;">Title tag Analysis</strong></td><td></td><td></td><td></td></tr>';
echo "<tr><td>current</td><td>c1</td><td>c2</td><td>c3</td></tr>";
echo '<tr><td colspan="4"><strong>WPM</strong></td><td></td><td></td><td></td></tr>';
if ($cp_sp_am>$c1_sp_am&&$cp_sp_am>$c2_sp_am&&$cp_sp_am>$c3_sp_am){ $spancolor=' style="color:red;" ';}
elseif ($cp_sp_am<$c1_sp_am&&$cp_sp_am<$c2_sp_am&&$cp_sp_am<$c3_sp_am){ $spancolor=' style="color:orange;" ';}
else {$spancolor="";}
echo "<tr><td".$spancolor.">".$cp_sp_am."</td><td".$spancolor.">".$c1_sp_am."</td><td".$spancolor.">".$c2_sp_am."</td><td".$spancolor.">".$c3_sp_am;
if ($cp_sp_am>$c1_sp_am&&$cp_sp_am>$c2_sp_am&&$cp_sp_am>$c3_sp_am){ echo " - <strong>OO</strong>";}
if ($cp_sp_am<$c1_sp_am&&$cp_sp_am<$c2_sp_am&&$cp_sp_am<$c3_sp_am){ echo " - <strong>UO</strong>";}
echo"</td></tr>";
foreach ($sw as $v => $value) {	
// count amount of each search word
$cp_sw_am=substr_count(strtoupper($cp_tt), strtoupper($value));
$c1_sw_am=substr_count(strtoupper($c1_tt), strtoupper($value));
$c2_sw_am=substr_count(strtoupper($c2_tt), strtoupper($value));
$c3_sw_am=substr_count(strtoupper($c3_tt), strtoupper($value));

if ($cp_sw_am>$c1_sw_am&&$cp_sw_am>$c2_sw_am&&$cp_sw_am>$c3_sw_am){ $spancolor=' style="color:red;" ';}
elseif ($cp_sw_am<$c1_sw_am&&$cp_sw_am<$c2_sw_am&&$cp_sw_am<$c3_sw_am){ $spancolor=' style="color:orange;" ';}
else {$spancolor="";}
echo'<tr><td colspan="4">';
echo "<strong>".$value."</strong></td></tr><tr><td".$spancolor.">".$cp_sw_am."</td><td".$spancolor.">".$c1_sw_am."</td><td".$spancolor.">".$c2_sw_am."</td><td".$spancolor.">".$c3_sw_am;
	if ($cp_sw_am>$c1_sw_am&&$cp_sw_am>$c2_sw_am&&$cp_sw_am>$c3_sw_am){ echo " - <strong>OO</strong>";}
	if ($cp_sw_am<$c1_sw_am&&$cp_sw_am<$c2_sw_am&&$cp_sw_am<$c3_sw_am){ echo " - <strong>UO</strong>";}
	echo"</td></tr>";
}
?>