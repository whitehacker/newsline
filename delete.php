<?php
    require_once 'config.php';
        $id = $_GET['id'];

        $sql = "DELETE FROM news WHERE id = ?";
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("i", $id);
            if($stmt->execute()){
                header("location: list.php?success=true");
                exit();
            }
            else{
                header("location: list.php?success=false");
            }
            $conn->close();
        }

?>