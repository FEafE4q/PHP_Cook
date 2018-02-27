<?php
  include ('config.php');

  if (isset($_POST['send'])){
    $name = $_POST['name'];
    $hobby = implode(', ', $_POST['hobby']);

    mysqli_query($con, "INSERT INTO `regUser` (id,name,hobby) VALUES ('','$name','$hobby')");
    header('location:index.php?success');
  }
  $sql = mysqli_query ($con, "SELECT * FROM `regUser` ORDER BY id DESC");
 ?>

<html>
<head>
  <meta charset="UTF-8">
  <title>EDIT CHECKBOX</title>
</head>
<body>

	<!-- Форма ввода данных -->
<form action="" method="POST">
  <table>
    <tr>
      <td>Name</td>
      <td>:</td>
      <td><input type="text" name="name"></td>
    </tr>
    <tr>
      <td>Hobby</td>
      <td>:</td>
      <td>
        <input type="checkbox" name="hobby[]" value="Travel">Travel</br>
        <input type="checkbox" name="hobby[]" value="hobby1">hobby1</br>
        <input type="checkbox" name="hobby[]" value="hobby2">hobby2</br>
        <input type="checkbox" name="hobby[]" value="hobby3">hobby3</br>
      </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td><input type="submit" name="send" value="Отправить">
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
      <a href="edit.php?edit=<?php echo $data['id'] ?>">EDIT</a>
    </td>
  </tr>
  <?php } ?>
<?php } ?>
</table>

</body>
</html>
