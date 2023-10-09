<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- <meta http-equiv="Content-Type" content="text/html; charset=windows 874" /> -->
</head>
<body>
<?php
$strExcelFileName="data1-All.xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma:no-cache");

?>



<!-- <strong>รายงานสมาชิก วันที่ <?php echo date("d/m/Y");?> ทั้งหมด <?php echo number_format($num);?> ท่าน</strong><br>
 --><br>
<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
<table width="700" height="50" border="1" align="center" >
  <table width="800" height="50" border="0.5" align="center" >
  <tr bgcolor="#FFCCFF">
   <td align="center">NO</td>
<td align="center">ห้อง</td>

      <td align="center">เลขที่</td>
	   <td align="center">เลขประจำตัว</td>
	       <td  align="center">นำหน้า</td>
		         <td align="center">ชื่อ</td>
         <td align="center">สกุล</td>
	<!-- <td  align="center">PIN</td> -->
 
	 <td align="center">น้ำหนัก</td>
   <td align="center">ส่วนสูง</td>
      <td align="center">รอบเอว</td>
	   <td align="center">BMI</td>
	     <td align="center">แปลผล</td></TR>

<?php
error_reporting(E_ALL & ~E_NOTICE);
	$n1=0;$h1=0;$j=0;$m1=0;$hh1=0;       
    include("../system/connectionDb.php");
$strSQL = "SELECT * FROM data_nn ";
$query = $conn->prepare($strSQL);
$query->execute();
 
  while($row= $query->fetch(PDO::FETCH_ASSOC))// คำสั่งให้แสดงข้อมูล
    {
$j++;
$bgc=0;
    $bgc = ($bgc=="#fffff") ? "#FFFFFF" : "#FFFFFF";
echo "<tr bgcolor = $bgc><td align = right>",$j,"&nbsp;&nbsp;</td>";
	//$no=odbc_result($row[id1]);
	// echo "<td><a href='../m1/search_d1.php?show_id=$row[ID]'>edit</a></td> ";
	// echo "<td><a href='del1.php?show_id=$row[ID]'' onclick=\"return confirm('แน่ใจว่าจะลบ!!! ลบแล้วไม่สามารถเรียกคืน')\">del</a></td> ";
			echo "<td align=center>$row[room]</td>";
			echo "<td align=center>$row[no]</td>";
			echo "<td align=center>$row[noid]</td>";
			echo "<td align=left>$row[nn]</td>";
				echo "<td align=left>$row[fname]</td>";
				echo "<td align=left>$row[lname]</td>";
				//echo "<td align=left>$row[pin]</td>";
				echo "<td align=left>$row[w]</td>";
				echo "<td align=center>$row[h]</td>";
				
					echo "<td align=left>$row[rob]</td>";
if($row['h']==''){
$row['h']=0;
}
if($row['w']==''){
$row['w']=0;
}
$n1=$row['w'];
$h1=$row['h']/100;
if(($h1*$h1)==0){
$hh1=1;
}else{
$hh1=(($h1*$h1));
}
$m=$n1/$hh1;

if($m==0){
	$pr="";}
	elseif($m<15){
	$pr="ผอมมาก";
	}elseif($m<17){
$pr="ผอม";
	}elseif($m<18){
		$pr="เริ่มผอม";
	}elseif($m<25){
		$pr="สมส่วน";
	}elseif($m<30){
		$pr="เริ่มอ้วน";
	}else{
		$pr="อ้วน";
		}
echo "<td align=center>";printf('%.2f',$m);
echo "<td align=center>$pr</td></TR>";
}
?>

</table>

<?

$conn = null;


?>
<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();},90000);
</script>


</body>

</html>
</html>