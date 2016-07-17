<html>
<head>
<meta name="viewport" content="width=device-width" />
<style  type="text/css">
caption {background-color:orange;font-size:150%;}
th {background-color: lightgrey;}
td {background-color: lightblue;}
</style>
<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script> 
<script type="text/javascript" src="js/jquery-latest.js"></script> 
<script type="text/javascript" src="js/jquery.tablesorter.min.js"></script> 
</head>
<body>
<table align="center" id="myTable" class="tablesorter" > 
<CAPTION><a style="text-decoration : none;" href="http://78.225.229.46:8096/mydump1090.html">ADSB16</a></CAPTION>
<thead> 
<tr> 
    <th>sq</th> 
    <th>d</th> 
    <th>t</th> 
    <th>nb</th> 
    <th>nbt</th> 
    <th>nbac</th> 
    <th>nbmlat</th> 
    <th>dmac</th>     
</tr> 
</thead> 
<tbody> 
<?php
include "conf/connect.php";
$d=$_GET['d'];
if (empty($d)) {$d=date('Ymd');}
$sql = "select * from piawarelog where d='".$d."' order by t";
$stmt = $db->query($sql);    
$k=0;
$nbt=0;
while($data = $stmt->fetch())
    {
	$k+=1;
	$d=$data['d'];
	$nb=$data['nb'];
	$nbt+=$nb;
	$nbac=$data['nbac'];
	$nbmlat=$data['nbmlat'];
	$dmax=$data['dmax'];
	$myurl=urlencode($data['timestamp1']);
echo '<tr>';
echo '<td bgcolor=lightgrey>'.$k.'</td><td bgcolor=lightgrey>'.$d.'</td>';
echo '<td bgcolor=lightgrey>'.$data['t'].'</td><td bgcolor=lightgrey><b>'.$nb.'</b></td><td bgcolor=lightgrey>'.$nbt.'</td>';
echo '<td bgcolor=lightgrey>'.$nbac.'</td><td bgcolor=lightgrey><b>'.$nbmlat.'</b></td><td bgcolor=lightgrey>'.$dmax.'</td>';
echo '</tr>';
    }
$stmt->closeCursor();
echo'<tbody>';
echo '<TFOOT>';
echo '<TR><TH ALIGN=CENTER COLSPAN=8>'.''.'</TH></TR>';
?>
</TFOOT>
</table>
<script type="text/javascript">
$(document).ready(function()
    {
        //$("#myTable").tablesorter();
     	$("#myTable").tablesorter({
     		sortList: [[2,1]]
 		});
    }
);
</script>
</body>
</html>
