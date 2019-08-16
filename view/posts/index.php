<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Blog</title>
</head>
<body>

    <?= $widget->run(); ?>

    <p><b>Add post</b></p>
    <?php include_once '/view/form.php'; ?>
    
    <hr>
    <p><b>Post list</b></p>
    <hr>
    
    <?php include_once 'posts_list.php'; ?>
</body>
</html>

