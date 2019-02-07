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
                        <form action="#" method="post" enctype="multipart/form-data">

                            <p>Заголовок статьи</p>
                            <input type="text" name="title" placeholder="" value="<?php echo $article['title']; ?>">

                            <p>Категория</p>
                            <select name="category_id">
                                <?php if (is_array($categoriesList)): ?>
                                    <?php foreach ($categoriesList as $category): ?>
                                        <option value="<?php echo $category['id']; ?>"
                                            <?php if ($article['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                            <?php echo $category['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>

                            <br/><br/>

                            <p>Изображение</p>
                            <img src="<?php echo $article['image']; ?>" width="360" alt="" />
                            <input type="file" name="image" placeholder="" value="<?php echo $article['image']; ?>">

                            <p>Превью</p>
                            <textarea name="preview_text"><?php echo $article['preview_text']; ?></textarea>

                            <p>Текст статьи</p>
                            <textarea name="content"><?php echo $article['content']; ?></textarea>

                            <br/><br/>

                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                            <br/><br/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include ROOT . '/views/layouts/footer.php'; ?>