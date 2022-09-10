<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'visitors_db');

    function store($data){
        global $conn;
        
        $visitor_name = htmlspecialchars($data['visitor_name']);
        $instansi = htmlspecialchars($data['instansi']);
        $keperluan = htmlspecialchars($data['keperluan']);
        $alamat = htmlspecialchars($data['alamat']);

        // var_dump($visitor_name);
        // var_dump($instansi);
        // var_dump($keperluan);
        // var_dump($alamat);
        
        $query = "INSERT INTO visitors VALUES ('', '$visitor_name', '$instansi', '$keperluan', '$alamat')";
        var_dump($query);
        mysqli_query($conn, $query);
        
        var_dump(mysqli_affected_rows($conn));

        return mysqli_affected_rows($conn);
    }

    function query($query){
        global $conn;

        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] =$row;
        }

        return $rows;
    }

    function destroy($id){
        // var_dump($id);
        global $conn;

        mysqli_query($conn, "DELETE FROM visitors WHERE id=".$id);
        return mysqli_affected_rows($conn);
    }
?>