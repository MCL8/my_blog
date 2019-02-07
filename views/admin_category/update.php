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
                            <li><a href="/admin/category">Управление категориями</a></li>
                            <li class="active">Редактировать статью</li>
                        </ul>
                    </div>
                    <br/>
                    <h4>Редактировать статью #<?php echo $id; ?></h4>
                    <br/>

                    <?php if (isset($errors) && is_array($errors)): ?>
                        <div class="error-list">
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li> - <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="admin-form">
                        <form action="#" method="post">
                            <p>Название</p>
                            <input type="text" name="name" placeholder="" value="<?php echo $category['name']; ?>">
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