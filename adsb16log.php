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
</tr> 
</thead> 
<tbody> 
<?php
include "conf/connect.php";
mysql_select_db('myadsb',$db);
$d=$_GET['d'];
//echo 'd-->'.$d;
$sql = "select * from piawarelog where d='".$d."' order by t";
//echo $sql;
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
$k=0;
$nbt=0;
while($data = mysql_fetch_assoc($req))
    {
	$k+=1;
	$nb=$data['nb'];
	$nbt+=$nb;
	$myurl=urlencode($data['timestamp1']);
	echo '<tr><td bgcolor=lightgrey>'.$k.'</td><td bgcolor=lightgrey>'.$data['d'].'</td><td bgcolor=lightgrey>'.$data['t'].'</td><td bgcolor=lightgrey><b>'.$nb.'</b></td><td bgcolor=lightgrey>'.$nbt.'</td></tr>';
    }
mysql_close($db);
echo'<tbody>';
echo '<TFOOT>';
echo '<TR><TH ALIGN=CENTER COLSPAN=5>'.''.'</TH></TR>';
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
