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
    
    function update($edit){
        global $conn;

        $id = $edit["id"];
        $visitor_name = htmlspecialchars($edit['visitor_name']);
        $instansi = htmlspecialchars($edit['instansi']);
        $keperluan = htmlspecialchars($edit['keperluan']);
        $alamat = htmlspecialchars($edit['alamat']);

        $query = "UPDATE visitors SET visitor_name = '$visitor_name', instansi = '$instansi', keperluan = '$keperluan', alamat = '$alamat' WHERE id= $id";
        var_dump($query);
        // die;
        mysqli_query($conn, $query);
        
        var_dump(mysqli_affected_rows($conn));
        // die;
        return mysqli_affected_rows($conn);
    }
?>