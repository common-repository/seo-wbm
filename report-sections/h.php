<table style="float:left;border-color:black; border-style:solid; border-width:1px;padding:5px;margin:5px;">
<?php
echo '<tr><td><strong style="text-align:center;">H tag Analysis</strong></td><td></td><td></td><td></td></tr>';
echo "<tr><td>current</td><td>c1</td><td>c2</td><td>c3</td></tr>";
echo '<tr><td colspan="4"><strong>WPM</strong></td><td></td><td></td><td></td></tr>';
?>
<tr>
<?php
// current page h tag count
preg_match_all('|<\s*h[1-6](?:.*)>(.*)</\s*h|Ui', $cp_html, $matches);
$cp_ht_cc = implode(" ", $matches{1});
$cp_ht_st = strip_tags($cp_ht_cc);
$cp_sp_am=substr_count(strtoupper($cp_ht_st), strtoupper($sp));

// competitor 1 h tag count
preg_match_all('|<\s*h[1-6](?:.*)>(.*)</\s*h|Ui', $c1_html, $matches);
$c1_ht_cc = implode(" ", $matches{1});
$c1_ht_st = strip_tags($c1_ht_cc);
$c1_sp_am=substr_count(strtoupper($c1_ht_st), strtoupper($sp));

// competitor 2 h tag count
preg_match_all('|<\s*h[1-6](?:.*)>(.*)</\s*h|Ui', $c2_html, $matches);
$c2_ht_cc = implode(" ", $matches{1});
$c2_ht_st = strip_tags($c2_ht_cc);
$c2_sp_am=substr_count(strtoupper($c2_ht_st), strtoupper($sp));

// competitor 3 h tag count
preg_match_all('|<\s*h[1-6](?:.*)>(.*)</\s*h|Ui', $c3_html, $matches);
$c3_ht_cc = implode(" ", $matches{1});
$c3_ht_st = strip_tags($c3_ht_cc);
$c3_sp_am=substr_count(strtoupper($c3_ht_st), strtoupper($sp));
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
$cp_sw_am=substr_count(strtoupper($cp_ht_st), strtoupper($value));
$c1_sw_am=substr_count(strtoupper($c1_ht_st), strtoupper($value));
$c2_sw_am=substr_count(strtoupper($c2_ht_st), strtoupper($value));
$c3_sw_am=substr_count(strtoupper($c3_ht_st), strtoupper($value));

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