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
        <div class="container">
            <div class="row">
                <div class="cols-md-8">
                    <?php include "nav.php"; ?>
                    <?php
                        $success = $_GET['success'];
                        if(isset($success) && !empty($success)){
                            if($success == "true"){
                            echo "
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <b>Success:</b> Article has been added successfully!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>
                            ";
                            }
                        else {
                            echo "
                            <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <b>Failed:</b> Something went wrong!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>
                            ";
                        }
                        }
                    ?>
                    <h3>Add Article</h3>
                    <form action="create.php" method="POST">
                        <div class="mb-3">
                            <label for="" class="form-label">Add a title</label>
                            <input
                                type="text"
                                class="form-control"
                                name="title"
                            />
                            <small id="helpId" class="form-text text-muted">Article title</small>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Author</label>
                            <input
                                type="text"
                                class="form-control"
                                name="author"
                            />
                            <small id="helpId" class="form-text text-muted">Who is publishing?</small>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Content</label>
                            <textarea class="form-control" name="content" rows="6"></textarea>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Add Article
                        </button>
                        
                        
                        
                        
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>