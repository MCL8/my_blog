<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <br/>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Панель администратора</a></li>
                    <li class="active">Управление статьями</li>
                </ol>
            </div>
            <a href="/admin/article/create" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить статью</a>
            <h4>Список статей</h4>
            <br/>

            <table class="table-bordered table-striped table">
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
                        <td><a href="/admin/article/update/<?php echo $article['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o">Редактировать</i></a></td>
                        <td><a href="/admin/article/delete/<?php echo $article['id']; ?>" title="Удалить"><i class="fa fa-times">Удалить</i></a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>