<?php
    require_once 'config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $title = $_POST['title'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $id = $_POST['id'];

        $sql = "UPDATE news SET title = ?, author = ?, content = ? WHERE id = ?";
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("sssi", $title, $author, $content, $id);
            if($stmt->execute()){
                header("location: list.php?success=true");
                exit();
            }
            else{
                header("location: list.php?success=false");
            }
            $conn->close();
        }
        $conn->close();

    }
?>