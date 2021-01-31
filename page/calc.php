<main class="main">
    <section class="head">
        <h2 class="head__title"><?= $title?></h2>
        <p class="head__date"><?= $date?></p>
    </section>

    <form action="/?route=calc" class="form" method="post">
        <?
        $firstNum = htmlentities($_POST["one"]);
        $secondNum = htmlentities($_POST["two"]);
        $symbol = htmlentities($_POST["symbol"]);
        ?>
        <label class="form__label">
            <span class="form__text"><?= $firstNum ?></span>
            <input type="text" class="form__input" name="one">
        </label>
        <div class="form__mySelect">
            <div class="form__select">
                <div class="form__select-name">Выбирите знак</div>
                <div class="form__select-option">

                </div>
            </div>
            <select name="symbol">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
        </div>
        <label class="form__label">
            <span class="form__text"><?= $secondNum ?></span>
            <input type="text" class="form__input" name="two">
        </label>
        <button class="form__btn" type="submit">Посчитать</button>
        <?
        switch ($symbol) {
            case "+":
                $result = $firstNum + $secondNum;
                break;
            case "-":
                $result = $firstNum - $secondNum;
                break;
            case "*":
                $result = $firstNum * $secondNum;
                break;
            case "/":
                $result = $firstNum / $secondNum;
                break;
            default:
                $result = 0;
            }  
        ?>

        <label class="form__label">
            <span class="form__text"><?= $result ?></span>
            <input type="text" class="form__input" value="<?= $result ?>">
        </label>

    </form>
</main>