<main class="main">
    <section class="head">
        <h2 class="head__title"><?= $title ?></h2>
        <p class="head__date"><?= $date ?></p>
    </section>
    <? if(isset($_SESSION["id"])) : ?>
        <form action="./includes/guets-book.php" class="form" method="post">
            <label class="form__label">
                <span class="form__text"><?= $userInfo['user_name']?></span>
                <input type="text" class="form__input" name="name" value="<?= $userInfo['user_name']?>">
            </label>
            <label class="form__label">
                <span class="form__text">Оставьте отзыв</span>
                <textarea class="form__input" name="descr"></textarea>
            </label>
            <button class="form__btn">Отправить</button>
        </form>

    <? else : ?>
        <p>Чтобы оставить отзыв, нужно войти в аккаунт.</p>
    <? endif; ?>
    <? $userCommentInfo = userCommentInfo(); ?>
    <div class="comments">  
        <? foreach ($userCommentInfo as $key => $value) : ?>
        <div class="comments__item">
            <p class="comments__item-time"><?= $value['time']?></p>
            <section class="comments__body">
                <div class="comments__head">
                    <h2 class="comment__head-title"><?= $value['user_name']?></h2>
                    <img src="<?= $value['img_path']?>" alt="" class="comments__head-img">
                </div>
                <p class="comments__body-descr"><?= $value['user_comment']?></p>

                <? if ($value['user_id'] == $_SESSION['id'] && isset($_SESSION['id'])) : ?>
                <div class="comments__footer">
                    <a href="./includes/user-edit-comment.php?edit=<?= $value["comment_id"]?>" class="comments__footer-link"><i class="fal fa-edit"></i></a>
                    <a href="./includes/user-del-comment.php?trash=<?= $value["comment_id"]?>" class="comments__footer-link"><i class="fal fa-trash"></i></a>
                </div>
                <? endif; ?>

            </section>
        </div>
        <? endforeach; ?>
    </div>
</main>