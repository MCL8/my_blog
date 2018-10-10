<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<div class="content">
    <main>
        <div class="container">
        <div class="container-block">
            <div class="admin-panel">
                <br/>
                <div class="breadcrumbs">
                    <ul class="breadcrumb">
                        <li><a href="/admin">Админпанель</a></li>
                        <li><a href="/admin/category">Управление статьями</a></li>
                        <li class="active">Добавить статью</li>
                    </ul>
                </div>
                <br/>
                <h4>Добавить новую категорию</h4>
                <br/>

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                    <div class="admin-form">
                        <form action="#" method="post">
                            <p>Название</p>
                            <input type="text" name="name" placeholder="" value="">
                            <br><br>
                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>