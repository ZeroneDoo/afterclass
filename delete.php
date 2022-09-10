<?php 

require "function.php";


// var_dump($_GET["id"]);

// destroy($_GET["id"]);    

if(destroy($_GET["id"])>0){
    echo "<script>
    alert('data berhasil dihapus');
    document.location.href = 'indextamu.php';
    </script>";
}else{
    echo "<script>
    alert('data gagal dihapus');
    document.location.href = 'indextamu.php';
    </script>";
}

?>