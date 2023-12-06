<!DOCTYPE html>
<html>
<head>
<style>
  .error {color: #FF0000;}
</style>
</head>
<body>

<h2>Form HTML dan Form Handling PHP</h2>

<?php
$nim = $nama = $alamat = $email = $nohp = $prodi = "";
$nimErr = $namaErr = $emailErr = $alamatErr = $nohpErr = $prodiErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fields = array("nim", "nama", "alamat", "email", "nohp", "prodi");
  
  foreach ($fields as $field) {
    if (empty($_POST[$field])) {
      ${$field . "Err"} = ucfirst($field) . " is required";
    } else {
      ${$field} = test_input($_POST[$field]);
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
  NIM: <input type="text" name="nim" required>
  <span class="error">* <?php echo $nimErr;?></span><br><br>
  
  Nama: <input type="text" name="nama" required>
  <span class="error">* <?php echo $namaErr;?></span><br><br>
  
  Alamat: <input type="text" name="alamat" required>
  <span class="error">* <?php echo $alamatErr;?></span><br><br>
  
  Email: <input type="text" name="email" required>
  <span class="error">* <?php echo $emailErr;?></span><br><br>
  
  No HP: <input type="text" name="nohp" required>
  <span class="error">* <?php echo $nohpErr;?></span><br><br>
  
  Prodi: <input type="text" name="prodi" required>
  <span class="error">* <?php echo $prodiErr;?></span><br><br>

  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "<h2>Submitted Data:</h2>";
  echo "NIM: $nim<br>";
  echo "Nama: $nama<br>";
  echo "Alamat: $alamat<br>";
  echo "Email: $email<br>";
  echo "No HP: $nohp<br>";
  echo "Prodi: $prodi<br>";
}
?>

</body>
</html>
