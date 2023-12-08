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

        $sql = "SELECT id, title, author, created_at, updated_at FROM news limit 3";
        $result = $conn->query($sql);

        ?>
        <div class="container">
            <div class="row">
                <div class="cols-md-8">
                <?php include "nav.php"; ?>
                <h3>Featured News</h3>
                            <?php if($result && $result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                                <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $row['author']; ?></h6>
                                    <p class="card-text"><?php echo $row['content']; ?></p>
                                    <a href="view.php?id=<?php echo $row['id']; ?>" class="card-link">Continue Reading...</a>
                                    <a href="list.php" class="card-link">Go to the list</a>
                                </div>
                                </div>
                            <?php endwhile; ?>
                            <?php endif; ?>
                            <?php conn->close(); ?>
                            
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>