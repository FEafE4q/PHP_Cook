<?php include("db_connect.php"); ?>

<form action="" method="POST">
  <h1>HOBI</h1>
  <input type="checkbox" name="hobi[]" value="Memasak">Memasak<br>
  <input type="checkbox" name="hobi[]" value="Memancing">Memancing<br>
  <input type="checkbox" name="hobi[]" value="Melukis">Melukis<br>
  <input type="checkbox" name="hobi[]" value="Voli">Bermain Voli<br>

  <h1>AGAMA</h1>
  <select name="agama" id="">
<option value="">--Pilih--</option>
    <option value="Islam">Islam</option>
    <option value="Kristen">Kristen</option>
    <option value="Hindu">Hindu</option>
  </select>
  <br>
  <br>
  <input type="submit" name="kirim" value="SUBMIT">
  <input type="reset" value="RESET">
</form>

<?php

if (isset($_POST['kirim'])) 
	{
    $hobi = implode(', ', $_POST['hobi']);
    $agama = $_POST['agama'];
  $db->query("INSERT INTO reg_user (cekbox,combox) VALUES ('$hobi','$agama')");
  if ($db->affected_rows > 0)
  {
    echo "DATA BERHASIL DI INPUT";
  }
  else
  {
    //other
  }
  $db->close();
  }
  else
  {
      $queri = $db->query("SELECT * FROM reg_user");
      $hasil = $queri->fetch_All(MYSQLI_ASSOC); 

      foreach ($hasil as $row)
      {
        echo "<b>Hobi</b> : " . $row['cekbox'] . "<b>dan Agama</b>" .$row['combox']. " <a href='edit.php?id=$row[id]'>EDIT</a> <br>";
      }
  }
?>
