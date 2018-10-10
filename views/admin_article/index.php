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
                            <li class="active">Управление статьями</li>
                        </ul>
                    </div>
                    <br/>
                    <br/>
                    <div>
                        <a href="/admin/article/create" class="btn-add">Добавить статью</a>
                    </div>
                    <br/>
                    <h4>Список статей</h4>
                    <br/>

                    <table class="table">
                        <tr>
                            <th>ID статьи</th>
                            <th>Заголовок</th>
                            <th>Категория</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php foreach ($articlesList as $article): ?>
                            <tr>
                                <td><?php echo $article['id']; ?></td>
                                <td><?php echo $article['title']; ?></td>
                                <td><?php echo $article['category_name']; ?></td>
                                <td><a href="/admin/article/update/<?php echo $article['id']; ?>"
                                       title="Редактировать"><?php include ROOT . '/views/layouts/icons/edit_icon.php'?></a></td>
                                <td><a href="/admin/article/delete/<?php echo $article['id']; ?>"
                                       title="Удалить"><?php include ROOT . '/views/layouts/icons/remove_icon.php'?></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>