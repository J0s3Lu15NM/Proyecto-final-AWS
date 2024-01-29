<!DOCTYPE html>
<html>
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "5";
?>
<head>
<meta http-equiv="refresh" content=<?php echo $sec;?> URL=<?php echo $page;?>>
<style>
        body
        {
            font-family: arial,verdana,sans-serif,Georgia, "Times New Roman", Times, serif;
            text-align:center;
            background:#cceeff;
        }
        h1
        {
            text-shadow: 5px 5px 5px #aaaaaa;
        }
</style>
</head>
<body>
<img src= 'logo-aws-mexico.png' align="center" height="167" width="300">
<h1>Deteccion de intrusos soporte AWS</h1>
<?php
// Conexion a la base de datos
$username = "<usu_DB>";
$password = "<password>";
$database = '<DB>';
$con=mysqli_connect("localhost",$username,$password) or die ("No fue posible la conexion al MAriaDB");
mysqli_select_db($con,$database) or die ("No se pudo abrir la base de datos");
$query = "SELECT * FROM PIR1";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
mysqli_close($con);?>
<table border=1 align=center>
<tr> <th><font div style="color:red" face="Arial, Helvetica, sans-serif">Fecha</font></th>
<th><font div style="color:red" face="Arial, Helvetica, sans-serif">Dia</font></th>
<th><font div style="color:red" face="Arial, Helvetica, sans-serif">Hora</font></th>
<th><font div style="color:Blue" face="Arial, Helvetica, sans-serif">Imagen</font></th>
</tr>
<?php
$i=0;
function mysqli_result($result, $row, $field=0) { 
    $result->data_seek($row); 
    $datarow = $result->fetch_array(); 
    return $datarow[$field]; 
}
while ($i < $num)
{
$fechahora=mysqli_result($result,$i,"FechaHora");
setlocale(LC_TIME, 'es_MX.UTF-8');
$fecha = strftime("%e/%b/%Y", strtotime($fechahora));
$dia = strftime("%A", strtotime($fechahora));
$hora = strftime("%H:%M:%S", strtotime($fechahora));
$imagen = mysqli_result($result,$i,"Imagen");?>
<tr>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $fecha; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $dia; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $hora; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo '<a href="'.$imagen.'" target="_blank"><img src="'.$imagen.'" align=center height="120" width="160"></a>';?></font></td></tr>
<?php $i++;
}?>
</table>
</body>
</html>
