<?php
    require_once 'config.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $title = $_POST['title'];
        $author = $_POST['author'];
        $content = $_POST['content'];

        $sql = "INSERT INTO news (title, author, content) VALUES(?, ?, ?)";
        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("sss", $param_title, $param_author, $param_content);

            $param_title = $title;
            $param_author = $author;
            $param_content = $content;
            if($stmt->execute()){
                header("location: add.php?success=true");
                exit();
            }
            else{
                header("location: add.php?success=false");
            }
            $conn->close();
        }
        $conn->close();

    }
?>