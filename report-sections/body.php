<table style="float:left;border-color:black; border-style:solid; border-width:1px;padding:5px;margin:5px;">
<?php
echo '<tr><td><strong style="text-align:center;">Body Analysis</strong></td><td></td><td></td><td></td></tr>';
echo "<tr><td>current</td><td>c1</td><td>c2</td><td>c3</td></tr>";
echo '<tr><td colspan="4"><strong>WPM</strong></td><td></td><td></td><td></td></tr>';
?>
<tr>
<?php
// current page body tag count
$findme   = '<body'; $pos = strpos($cp_html, $findme); $findme   = '>'; $startpos = strpos($cp_html, $findme,$pos); $findme   = '</body>'; $finalpos = strpos($cp_html, $findme,$startpos); 
$fieldlength = ($finalpos)-($startpos+1);
$cp_bd = substr ($cp_html,$startpos+1,$fieldlength);
$cp_bd_st = strip_tags($cp_bd);
$cp_sp_am=substr_count(strtoupper($cp_bd_st), strtoupper($sp));

// competitor 1 h tag count
$findme   = '<body'; $pos = strpos($c1_html, $findme); $findme   = '>'; $startpos = strpos($c1_html, $findme,$pos); $findme   = '</body>'; $finalpos = strpos($c1_html, $findme,$startpos); 
$fieldlength = ($finalpos)-($startpos+1);
$c1_bd = substr ($c1_html,$startpos+1,$fieldlength);
$c1_bd_st = strip_tags($c1_bd);
$c1_sp_am=substr_count(strtoupper($c1_bd_st), strtoupper($sp));

// competitor 2 h tag count
$findme   = '<body'; $pos = strpos($c2_html, $findme); $findme   = '>'; $startpos = strpos($c2_html, $findme,$pos); $findme   = '</body>'; $finalpos = strpos($c2_html, $findme,$startpos); 
$fieldlength = ($finalpos)-($startpos+1);
$c2_bd = substr ($c2_html,$startpos+1,$fieldlength);
$c2_bd_st = strip_tags($c2_bd);
$c2_sp_am=substr_count(strtoupper($c2_bd_st), strtoupper($sp));

// competitor 3 h tag count
$findme   = '<body'; $pos = strpos($c3_html, $findme); $findme   = '>'; $startpos = strpos($c3_html, $findme,$pos); $findme   = '</body>'; $finalpos = strpos($c3_html, $findme,$startpos); 
$fieldlength = ($finalpos)-($startpos+1);
$c3_bd = substr ($c3_html,$startpos+1,$fieldlength);
$c3_bd_st = strip_tags($c3_bd);
$c3_sp_am=substr_count(strtoupper($c3_bd_st), strtoupper($sp));

?>
<?php
if ($cp_sp_am>$c1_sp_am&&$cp_sp_am>$c2_sp_am&&$cp_sp_am>$c3_sp_am){ $spancolor=' style="color:red;" ';}
elseif ($cp_sp_am<$c1_sp_am&&$cp_sp_am<$c2_sp_am&&$cp_sp_am<$c3_sp_am){ $spancolor=' style="color:orange;" ';}
else {$spancolor="";}
?>
<td<?php echo $spancolor; ?>><?php echo $cp_sp_am; ?></td><td<?php echo $spancolor; ?>><?php echo $c1_sp_am; ?></td><td<?php echo $spancolor; ?>><?php echo $c2_sp_am; ?></td><td<?php echo $spancolor; ?>><?php echo $c3_sp_am; ?><?php if ($cp_sp_am>$c1_sp_am&&$cp_sp_am>$c2_sp_am&&$cp_sp_am>$c3_sp_am){ echo " - <strong>OO</strong>";} if ($cp_sp_am<$c1_sp_am&&$cp_sp_am<$c2_sp_am&&$cp_sp_am<$c3_sp_am){ echo " - <strong>UO</strong>";} ?></td>
</tr>
<?php
// output each search word
foreach ($sw as $v => $value) {	
// count amount of each search word
$cp_sw_am=substr_count(strtoupper($cp_bd_st), strtoupper($value));
$c1_sw_am=substr_count(strtoupper($c1_bd_st), strtoupper($value));
$c2_sw_am=substr_count(strtoupper($c2_bd_st), strtoupper($value));
$c3_sw_am=substr_count(strtoupper($c3_bd_st), strtoupper($value));

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
</table>