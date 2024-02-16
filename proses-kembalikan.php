<?php
include 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Menggunakan parameter binding untuk menghindari SQL Injection
    $query_search_pinjam = mysqli_prepare($koneksi, "SELECT * FROM tbl_pinjam WHERE id=?");
    mysqli_stmt_bind_param($query_search_pinjam, "i", $id);
    mysqli_stmt_execute($query_search_pinjam);
    
    if(mysqli_stmt_error($query_search_pinjam)){
        die("Error: " . mysqli_stmt_error($query_search_pinjam));
    }

    // Menggunakan mysqli_fetch_assoc
    $result_pinjam = mysqli_stmt_get_result($query_search_pinjam);
    $data_pinjam = mysqli_fetch_assoc($result_pinjam);
    
    if($data_pinjam){
        $nama_barang   = $data_pinjam['nama_barang'];
        $peminjam      = $data_pinjam['peminjam'];
        $level         = $data_pinjam['level'];
        $jml_barang    = $data_pinjam['jml_barang'];
        $tgl_pinjam    = $data_pinjam['tgl_pinjam'];
        $tgl_kembali   = $data_pinjam['tgl_kembali'];
        
        $query_search_barang = mysqli_prepare($koneksi, "SELECT * FROM tbl_barang WHERE nama_barang = ?");
        mysqli_stmt_bind_param($query_search_barang, "s", $nama_barang);
        mysqli_stmt_execute($query_search_barang);

        if(mysqli_stmt_error($query_search_barang)){
            die("Error: " . mysqli_stmt_error($query_search_barang));
        }

        // Menggunakan mysqli_fetch_assoc
        $result_barang = mysqli_stmt_get_result($query_search_barang);
        $data_search_barang = mysqli_fetch_assoc($result_barang);
        
        if($data_search_barang){        
            $query_request_kembali = mysqli_prepare($koneksi, "INSERT INTO tbl_req_kembali (nama_barang, peminjam, level, jml_barang, tgl_pinjam, tgl_kembali) VALUES (?, ?, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($query_request_kembali, "ssssss", $nama_barang, $peminjam, $level, $jml_barang, $tgl_pinjam, $tgl_kembali);
            mysqli_stmt_execute($query_request_kembali);

            if(mysqli_stmt_error($query_request_kembali)){
                die("Error: " . mysqli_stmt_error($query_request_kembali));
            }

            if(mysqli_affected_rows($koneksi) > 0){
                $query_delete_pinjam = mysqli_prepare($koneksi, "DELETE FROM tbl_pinjam WHERE id=?");
                mysqli_stmt_bind_param($query_delete_pinjam, "i", $id);
                mysqli_stmt_execute($query_delete_pinjam);
                
                if(mysqli_stmt_error($query_delete_pinjam)){
                    die("Error: " . mysqli_stmt_error($query_delete_pinjam));
                }
                
                if(mysqli_affected_rows($koneksi) > 0){
                    echo "<script>alert('Berhasil Request Pengembalian Barang');</script>";
                    header("location: barang-dipinjam.php?username=$peminjam");
                    exit(); // Mengakhiri eksekusi skrip
                } else {
                    echo "Gagal Delete tbl_pinjam";
                }
            } else {
                echo "Gagal Insert data ke tbl_req_kembali";
            }    
        } else {
            echo "Gagal Mencari Barang";
        }
    } else {
        echo "Data Peminjaman tidak ditemukan";
    }
}
?>
