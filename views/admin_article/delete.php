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
                            <li><a href="/admin/article">Управление статьями</a></li>
                            <li class="active">Удалить статью</li>
                        </ul>
                    </div>
                    <br/>
                    <h4>Удалить статью #<?php echo $id; ?></h4>
                    <br/>
                    <p>Вы действительно хотите удалить эту статью?</p>
                    <br/>
                    <form class="admin-form" method="post">
                        <input type="submit" name="submit" value="Удалить" />
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>
