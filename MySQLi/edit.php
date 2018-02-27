<?php
  include('config.php');

  $id = $_GET['edit'];
  $i = mysqli_query ($con, "SELECT * FROM `regUser` WHERE id = '$id'");
  $edit = mysqli_fetch_array($i);
  $o = explode(', ', $edit['hobby']);
  $sql = mysqli_query($con, "SELECT * FROM `regUser` ORDER BY id DESC");
 ?>

<html>
<head>
  <meta charset="UTF-8">
  <title>EDIT CHECKBOX</title>
</head>
<body>

	<!-- Форма ввода данных -->
<form action="handler_EditProfile.php" method="POST">
  <table>
    <tr>
      <td>Name</td>
      <td>:</td>
      <td><input type="text" name="name" value="<?php echo $edit['name'] ?>"></td>
    </tr>
    <tr>
      <td>Hobby</td>
      <td>:</td>
      <td>
        <input type="checkbox" name="hobby[]" value="Travel" <?php in_array('Travel', $o) ? print 'checked' : ''?> >Travel</br>
        <input type="checkbox" name="hobby[]" value="hobby1" <?php in_array('hobby1', $o) ? print 'checked' : ''?> >hobby1</br>
        <input type="checkbox" name="hobby[]" value="hobby2" <?php in_array('hobby2', $o) ? print 'checked' : ''?> >hobby2</br>
        <input type="checkbox" name="hobby[]" value="hobby3" <?php in_array('hobby3', $o) ? print 'checked' : ''?> >hobby3</br>
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><input type="submit" name="save" value="Save"></td>
      <td><input type="hidden" name="id" value="<?php echo $edit['id'] ?>">
	</td>
    </tr>
  </table>
</form>

	<!-- Вывод данных -->
<table border="1">
  <tr>
    <th>NAME</th>
    <th>HOBBY</th>
    <th>EDIT</th>
  </tr>
  <?php if(mysqli_num_rows($sql)>0){ ?>
    <?php while($data = mysqli_fetch_array($sql)){ ?>
  <tr>
    <td><?php echo $data['name'] ?></td>
    <td><?php echo $data['hobby'] ?></td>
    <td>
      <a href="edit.php?edit=<?php echo $data['id'] ?>">Edit</a>
    </td>
  </tr>
  <?php } ?>
<?php } ?>
</table>

</body>
</html>
