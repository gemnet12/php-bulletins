<?php 
    include './config/database.php';

    $name = $author = $pic = $body = '';

    if(isset($_POST['send'])) {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $pic = filter_input(INPUT_POST, 'pic', FILTER_SANITIZE_URL);
        $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_EMAIL);
        $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if(!empty($name) && !empty($pic) && !empty($author) && !empty($body) && isset($connection)) {
            $sql_insert_post = "INSERT INTO bulletins (name, picture, author, body) VALUES ('$name', '$pic', '$author', '$body')";
            if(mysqli_query($connection , $sql_insert_post)) {
                header('Location: ./posts.php');
            }
        }
    }
    if(isset($_POST['back'])) {
        
    }
?>

<div class="mui-container">
    <form class="mui-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <legend>Добавить объявление</legend>
        <div class="mui-textfield">
            <input type="text" name="name" required>
            <label>Название</label>
        </div>
        <div class="mui-textfield">
            <input type="text" name="pic" required>
            <label>URL картинки</label>
        </div>
        <div class="mui-textfield mui-textfield--float-label">
            <textarea required name="body"></textarea>
            <label>Текст</label>
        </div>
        <div class="mui-textfield">
            <input type="email" name="author" required>
            <label>E-mail</label>
        </div>
        <button type="submit" class="mui-btn mui-btn--raised" name="send">Отправить</button>
        <a href="posts.php" class="mui-btn mui-btn--raised mui-btn--primary" name="back">Вернуться</a>
    </form>
</div>