<?php include("db_connect.php");

$id = $_GET['id'];

$queri = $db->query("SELECT * FROM reg_user WHERE id = '$id'");
$row = $queri->fetch_array(MYSQLI_ASSOC);
$cheked = explode(', ', $row['cekbox'])
?>
<form action="" method="POST">
  <h1>HOBI</h1>
  <input type="checkbox" name="hobi[]" value="Memasak" <?php in_array('Memasak', $cheked) ? print "checked" : ""; ?> >Memasak<br>
  <input type="checkbox" name="hobi[]" value="Memancing" <?php in_array('Memancing', $cheked) ? print "checked" : ""; ?> >Memancing<br>
  <input type="checkbox" name="hobi[]" value="Melukis" <?php in_array('Melukis', $cheked) ? print "checked" : ""; ?> >Melukis<br>
  <input type="checkbox" name="hobi[]" value="Voli" <?php in_array('Voli', $cheked) ? print "checked" : ""; ?> >Bermain Voli<br>

  <h1>AGAMA</h1>
  <select name="agama" id="">
	  <option value="">--Pilih--</option>
    <option value="Islam" <?php $row['combox'] == 'Islam' ? print "selected" : ""; ?> >Islam</option>
    <option value="Kristen" <?php $row['combox'] == 'Kristen' ? print "selected" : ""; ?> >Kristen</option>
    <option value="Hindu" <?php $row['combox'] == 'Hindu' ? print "selected" : ""; ?> >Hindu</option>
  </select>
  <br>
  <br>
  <input type="submit" value="Update" name="update">
</form>

<?php if (isset($_POST['update']))
	{
	//print_r($_POST);

    $agama = $_POST['agama'];
    $hobi = implode(', ', $_POST['hobi']);
	$db->query("UPDATE reg_user SET cekbox = '$hobi', combox = '$agama' WHERE id = '$id' ");
    header('location:index.php?editdatasukses');
	}
?>