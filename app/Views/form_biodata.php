<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input Data</title>
</head>
<body>
 <?php
 if(empty($bio)) {
  $nik = "";
  $nama = "";
  $hobi = "";
  $alamat = "";
  $link = "simpandata";
 } else {
  $nik = $bio->nik;
  $nama = $bio->nama;
  $hobi = $bio->hobi;
  $alamat = $bio->alamat;
  $link = "update";
 }
 ?>
    <form action="/biodata/<?=$link;?>" method="post">
     <label>Nik :</label><br/>
        <input type="number" name="nik" value="<?=$nik;?>"><br/>
        <label>Nama :</label><br/>
        <input type="text" name="nama" value="<?=$nama;?>"><br/>
        <label>Hobi :</label><br/>
        <input type="text" name="hobi" value="<?=$hobi;?>"><br/>
        <label>Alamat :</label><br/>
        <textarea name="alamat"><?=$alamat;?></textarea><br/>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>