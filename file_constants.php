<html>
<head>
<title>grade1</title>
</head>
<body>
<table border="1" cellspacing="1" cellpadding="1">
<tr>
<th>Sno</th>
<th>Roll no</th>
<th>Name</th>
<th>Percentage</th>
<th>date</th>
<th>Attendance</th>
</tr>
<?php
$date=date("Y-m-d");
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("DB2", $connection);
 $result=mysql_query("select * from attend order by sno", $connection);
  echo "<form action=insertattend.php method=POST>";
 while( $row = mysql_fetch_array($result))
{
  echo "<tr>";
$per=($row['present']/($row['present']+$row['absent']))*100;
  echo "<td>" . "<input type=text name=sno value=" .$row['sno']." ></td>";
  echo "<td>" . "<input type=text name=rollno value=" .$row['rollno']." ></td>";
  echo "<td>" . "<input type=text name=name value=" .$row['name']." ></td>";
  echo "<td>" . "<input type=text value=" .$per." ></td>";
  echo "<td>" . "<input name=date type=date value='$date'></td>";
  echo "<td>" . "<input type=checkbox name=attend value='present'>";?>P
  <?php echo "<input type=checkbox name=attend value='absent'>";?>A
  <?php
  echo"</td>";
  }
  echo "</tr>";     
  ?>
  </table>
  <input type="submit" value="submit">
  </form>
  </body>
  </html>
