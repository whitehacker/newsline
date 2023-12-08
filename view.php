<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Newsline</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
        <script src="https://kit.fontawesome.com/562bfcfc53.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php
            require_once 'config.php';
            $id  = isset($_GET['id']) ? $_GET['id'] : die('Error: Missing ID');
            
            $sql = "SELECT id, title, author, content FROM news WHERE id = ?";

            if($stmt = $conn->prepare($sql)){
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $title = $row['title'];
                    $author = $row['author'];
                    $content = $row['content'];
                }
                else{
                    echo "No records found!";
                }
            }
            else {
                echo "Error: Could not prepare SQL Statement";
            }


        ?>
        <div class="container">
            <div class="row">
                <div class="cols-md-8">
                    <?php include "nav.php"; ?>
                    <div class="card">
                        <h5 class="card-header">Featured</h5>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $title; ?></h5>
                            <p class="card-text"><?php echo $content; ?></p>
                            <a href="list.php" class="btn btn-primary">Go Back to the List of News</a>
                        </div>
                        </div>
                   
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>