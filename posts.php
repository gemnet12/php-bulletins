<?php 
    include './config/database.php';
    include './inc/header.php';
    if(isset($connection)) {
        $sql_get_posts = 'SELECT * FROM bulletins';
        $result_sql = mysqli_query($connection, $sql_get_posts);
        $posts = mysqli_fetch_all($result_sql, MYSQLI_ASSOC);

    }
?>


<div class="mui-container">
    <div class="top-info">
        <a class="mui-btn mui-btn--fab mui-btn--primary" href="./add_post.php">+</a>
        <?php if(empty($posts)): ?>
            <div class="mui--text-display2 noneheader">Здесь пока пусто</div>
        <?php endif; ?>
    </div>
    <?php if(isset($connection)): ?>
    <?php foreach($posts as $post): ?>
    <div class="mui-panel">
        <div class="content">
            <img src="<?php echo $post['picture'] ?>" alt="<?php echo $post['picture'] ?>">
            <div class="panel-content">
                <div class="mui--text-title"><?php echo $post['name'] ?></div>
                <div  class="mui--text-dark-secondary">
                    <span>ID: <?php echo $post['id'] ?></span>    
                    <span>Date: <?php echo $post['date'] ?></span>
                    <span>Author: <?php echo $post['author'] ?></span>
                </div>
                <div class="mui--text-body1"><?php echo $post['body'] ?></div>
            </div>
        </div> 
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>