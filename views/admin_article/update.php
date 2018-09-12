<?php include ROOT . '/views/layouts/header_admin.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <br/>
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="/admin">Панель администратора</a></li>
                        <li><a href="/admin/article">Управление статьями</a></li>
                        <li class="active">Редактировать статью</li>
                    </ol>
                </div>

                <h4>Редактировать статью #<?php echo $id; ?></h4>

                <br/>

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="col-lg-4">
                    <div class="login-form">
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
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>