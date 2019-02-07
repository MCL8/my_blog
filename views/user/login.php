<?php include ROOT . '/views/layouts/header.php'; ?>

<div class="content">
    <div class="user-form">
        <?php if (isset($errors) && is_array($errors)): ?>
            <div class="error-list">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <h2>ВОЙТИ НА САЙТ</h2>
        <form action="" method="post">
            <input type="email" name="email" placeholder="Ваш Email">
            <input type="password" name="password" placeholder="Ваш пароль">
            <input type="submit" name="submit" value="ВОЙТИ">
        </form>
        <a href="/user/register/">Регистрация</a>
    </div>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
