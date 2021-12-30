
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-info">
    

<?php
function getTodoDisplay()
{
?>
    <?php if (isset($_SESSION['todo'])) : ?>
        <?php if (count($_SESSION['todo']) > 0) : ?>

            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th scope="col">Sno</th>
                        <th scope="col">Name</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['todo'] as $key => $task) : ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $task ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="text" name="item" value="<?= $key ?>" hidden>
                                    <!-- <input type="text" name="item" value="test" > -->
                                    <button class="btn btn-danger" name='del' type="submit">X</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            </div>
                </div>
            </div>
        <?php endif ?>
    <?php endif ?>
<?php
}


function getPosts()
{
?>
    <?php
    require_once('utilities.php');
    $conn = getConnection();
    // $posts = $conn->query("SELECT * FROM " . TABLE . " ORDER BY id DESC");
    $posts = $conn->query("SELECT * FROM " . TABLE);
    foreach ($posts as $key => $post) :
    ?>
        <div class="jumbotron jumbotron-fluid bg-light border border-warning m-2">
            <div class="container">
                <h1 class="display-4">#<?= $key + 1 ?>. <?= $post['title'] ?></h1>
                <div class="small float-right">Posted By: <?= $post['user'] ?></div>
                <div class="small float-right">Posted At: <?= $post['createdAt'] ?></div>
                <hr>
                <p class="lead"><?= $post['body'] ?></p>
            </div>
        </div>
    <?php
    endforeach
    ?>
<?php
?>

</body>
</html>
<?php
}
