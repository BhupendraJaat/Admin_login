<?php
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['AdminLoginId']))
    header("location: login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panal</title>
</head>
<style>
    body {
        margin: 0;
    }

    .header {
        color: #f0f0f0;
        font-family: poppins;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        padding: 0 60px;
        background-color: #1c1c1e;
    }

    .header button {
        background-color: #f0f0f0;
        font-size: 16px;
        font-weight: 550;
        padding: 8px 12px;
        border-radius: 5px;
        border: 2px solid black;
    }
</style>

<body>

    <div class="header">
        <h1>Welcome -
            <?php echo $_SESSION['AdminLoginId'] ?> in admin panal
        </h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <button type="submit" name="logout">Log out</button>
        </form>
    </div>

    <?php
    if(isset($_POST['logout'])){
        session_destroy();
        header("location: login.php");
    }


    ?>
</body>

</html>