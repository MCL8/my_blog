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
                            <li class="active">Управление категориями</li>
                        </ul>
                    </div>
                    <br/>
                    <br/>
                    <div>
                        <a href="/admin/category/create" class="btn-add">Добавить категорию</a>
                    </div>
                    <br/>
                    <h4>Список категорий</h4>
                    <br/>

                    <table class="table">
                        <tr>
                            <th>ID категории</th>
                            <th>Название категории</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php foreach ($categoriesList as $category): ?>
                            <tr>
                                <td><?php echo $category['id']; ?></td>
                                <td><?php echo $category['name']; ?></td>
                                <td><a href="/admin/category/update/<?php echo $category['id']; ?>"
                                       title="Редактировать"><?php include ROOT . '/views/layouts/icons/edit_icon.php'?></a></td>
                                <td><a href="/admin/category/delete/<?php echo $category['id']; ?>"
                                       title="Удалить"><?php include ROOT . '/views/layouts/icons/remove_icon.php'?></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>

