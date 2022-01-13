<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Biodata</title>
</head>
<body>
    <H1> BAGAS ADI PRAKOSO - G-231-18-0208</H1> 
<p>
<a href="/biodata/tambahdata/">TAMBAH DATA</a>
    <table border="1">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Hobi</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($bio as $row):?>
            <tr>
                <td><?=$row['nik'];?></td>
                <td><?=$row['nama'];?></td>
                <td><?=$row['hobi'];?></td>
                <td><?=$row['alamat'];?></td>
                <td><a href="/biodata/edit/<?=$row['nik'];?>">Edit</a> | <a href="/biodata/hapus/<?=$row['nik'];?>">Hapus</a></td>      </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</body>
</html>