<main class="main">
    <section class="head">
        <h2 class="head__title"><?= $title ?></h2>
        <p class="head__date"><?= $date ?></p>
    </section>
    <form action="/?route=table" class="form" method="post">
        <?
        $col = $_POST["col"];
        $row = $_POST["row"];
        ?>
        <label class="form__label">
            <span class="form__text"><?= $col?></span>
            <input type="text" class="form__input" name="col" placeholder="Количество колонок" value="<?= $col?>">
        </label>
        <label class="form__label">
            <span class="form__text"><?= $row?></span>
            <input type="text" class="form__input" name="row" placeholder="Количество строк" value="<?= $row?>">
        </label>
        <button class="form__btn" type="submit">Отправить</button>
    </form>

    <div class="table">
        <? for ($i=1; $i <= $row; $i++) : ?>
            <div class="table__row">

                <? for ($k=1; $k <= $col; $k++) : ?>
                    <div class="table__col">
                        
                        <?= $i * $k?>

                    </div>
                <? endfor ?>

            </div>
        <? endfor ?>
    </div>

</main>