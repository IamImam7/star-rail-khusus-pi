<?php
    include '../../../koneksi.php';

    $gambar = $_FILES['gambar']['name'];
    $efek = $_POST['efek'];
    $nama = $_POST['nama'];

    if($gambar != ""){
        $ekstensi_allowed = array('png','jpg');
        $x = explode('.',$gambar);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];   
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar;
        if(in_array($ekstensi, $ekstensi_allowed) === true){
            move_uploaded_file($file_tmp, '../Ornaments/'.$nama_gambar_baru);

            $query = "INSERT INTO ornament (nama, gambar, efek) VALUES ('$nama','$nama_gambar_baru','$efek')";

            $result = mysqli_query($conn, $query);

            if(!$result){
                die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
            } else{
                echo "<script>alert('Data berhasil ditambah');window.location='../ornament.php';</script>";
            }
        }else{
            echo "<script>alert('Eksternsi Gambar hanya jpg / png');window.location='../ornament.php';</script>";
        }
    }else{
        $query = "INSERT INTO ornament (nama, gambar, efek) VALUES ('$nama','$nama_gambar_baru','$efek')";

        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
        } else{
            echo "<script>alert('Data berhasil ditambah');window.location='../ornament.php';</script>";
        }
    }
?>
