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

        $sql = "SELECT id, title, author, created_at, updated_at FROM news";
        $result = $conn->query($sql);

        ?>
        <div class="container">
            <div class="row">
                <div class="cols-md-8">
                <?php include "nav.php"; ?>
                    <h3>Published Articles</h3>
                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col" colspan="3">Action</th>
                                </tr>
                            </thead>
                            <?php if($result && $result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tbody>
                                
                                <tr>
                                    <td scope="row"><?php echo $row['id']; ?></td>
                                    <td><?php echo substr($row['title'], 0, 14) . '...'; ?></td>
                                    <td><?php echo $row['author']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td><?php echo $row['updated_at']; ?></td>
                                    <td><a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"> <i class="fa-regular fa-eye"></i> View</a></td>
                                    <td><a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm"> <i class="fa-regular fa-pen-to-square"></i> Edit</a></td>
                                    <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you really want to remove this news?');"><i class="fa-solid fa-trash"></i> Delete</a></td>
                                </tr>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php conn->close(); ?>
                            </tbody>
                        </table>
                    
                    
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>