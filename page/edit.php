<? if (isset($_SESSION["id"])) : ?>
    <main class="main">
            <section class="head">
                <h2 class="head__title"><?= $userInfo["user_login"]?></h2>
                <p class="head__date"><?= $date?></p>
            </section>
            <img class="userInfo__img" src="<?= $userInfo["img_path"]?>" alt="">
            <form action="/includes/user-photos.php" method="POST" class="addPhoto"  enctype="multipart/form-data">
                <h3 class="addPhoto__title">Добавить фотографии</h3>
                <input type="file" name="photo[]" accept="image/jpeg,image/png,image/gif" multiple>
                <button class="form__btn">Добавить</button>
            </form>
            <? if ($_GET["error"] == "del") :?>
                <p>Нельзя удалить фотографию</p>
            <?endif; ?>
            <form action="./includes/user-edit-photo.php" method="post" class="photos">
                <? foreach ($allPhotos as $key => $value) : ?>
                    <label class="photos__item">
                        <img src="<?= $value["img_path"]?>" alt="" class="photos__img">
                        <input type="radio" name="ava" value="<?= $value["img_id"]?>" <?= $value["img_select"] == 1 ? "checked" : "" ?> >
                        <span class="photos__radio"><i class="fas fa-check"></i></span>
                        <a href="./includes/user-delete-photo.php?trash=<?= $value["img_id"]?>" class="photos__del">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </label>
                <?  endforeach; ?>
                <div class="photos__btn">
                    <button class="form__btn">Изменить аватарку</button>
                </div>
            </form>
            <form action="./includes/user-edit-name.php" method="POST">
                <fieldset class="setname">
                    <legend>Изменить имя</legend>
                    <input type="text" name="name" value="<?= $userInfo ["user_name"]?>">
                    <button class="form__btn">Изменить имя</button>
                </fieldset>
            </form>
            <form action="./includes/user-edit-login.php" method="POST">
                <fieldset class="setname">
                    <legend>Изменить логин</legend>
                    <input type="text" name="login" value="<?= $userInfo ["user_login"]?>">
                    <button class="form__btn">Изменить логин</button>
                </fieldset>
            </form>
    </main>
<?else : ?>
<script> window.location = "/?route=404" </script>
<?endif; ?>
