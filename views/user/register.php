<?php include ROOT . '/views/layouts/header.php'; ?>

    <div class="content">
        <div class="user-form">

        <?php if ($result): ?>
            <p>Вы зарегистрированы!</p>
        <?php else: ?>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <h2>РЕГИСТРАЦИЯ</h2>
            <form action="#" method="post">
                <input type="text" name="name" placeholder="Ваше имя">
                <input type="email" name="email" placeholder="Ваш Email">
                <input type="password" name="password" placeholder="Ваш пароль">
                <input type="submit" name="submit" value="Регистрация">
            </form>
        <?php endif; ?>
        </div>
    </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>