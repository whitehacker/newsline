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
                    
                    <h3>Update Article</h3>
                    <form action="update.php" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Add a title</label>
                            <input
                                type="text"
                                class="form-control"
                                name="title"
                                value="<?php echo $title; ?>"
                            />
                            <small id="helpId" class="form-text text-muted">Article title</small>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Author</label>
                            <input
                                type="text"
                                class="form-control"
                                name="author"
                                value="<?php echo $author; ?>"
                            />
                            <small id="helpId" class="form-text text-muted">Who is publishing?</small>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Content</label>
                            <textarea class="form-control" name="content" rows="6"><?php echo $content; ?></textarea>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button
                            type="submit"
                            class="btn btn-warning"
                        >
                            Update Article
                        </button>
                        
                        
                        
                        
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>