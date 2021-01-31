<main class="main">
    <section class="head">
        <h2 class="head__title"><?= $title ?></h2>
        <p class="head__date"><?= $date ?></p>
    </section>
    <?php
    $a = 7;
    if ($a < 6) {
        echo "$a < 6";
    } else {
        echo "Error";
    }

    date_default_timezone_set("Asia/Tashkent");

    echo "<br>" . date("d l F Y; H i s");
    echo "<br>";
    ?>

    <p>Выберите ваш год рождения</p>

    <select name="" id="">
        <? 
        $year = date("Y");
        for ($i = $year - 70; $i < $year; $i++) : ?>

        <option value="<?= $i ?>"> <?= $i ?> </option>;

        <?endfor;?>
    </select>


    <?
                // Arrays

                $arr = ["apelsin", "mandarin", "yabloko"];
                for ($i = 0; $i < count($arr); $i++) {
                    $x = mb_strtoupper($arr[$i]);
                    echo "<br>" . $x;    
                }

                // Assosiation arrays

                $arr_assoc = [
                    "a" => "100",
                    "b" => "200",
                    "c" => [
                        "d" => "300",
                        "e" => "400"
                    ]
                ];
                echo "<br>";
                echo $arr_assoc["b"];
                echo "<br>";
                echo $arr_assoc["c"]["d"];

                foreach ($arr_assoc as $key => $value) {
                    if (gettype($value) == "array") {
                        foreach ($value as $key => $value) {
                            echo "<p>$key = $value </p>";
                        }
                    } else {
                        echo "<p>$key = $value </p>";
                    }
                }

                var_dump($arr_assoc);

                echo "<br>" . "Hello, World";
            ?>

    <br>
    <br>


    <form action="" method="post">
        <fieldset>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
            <br><br>
            <label for="surname">Surname</label>
            <input type="text" id="surname" name="surname">
        </fieldset>
        <button type="submit">Отправить</button>
    </form>

    <?
                var_dump($_GET);
                echo "<br>";
                var_dump($_POST);
            
                $name = htmlspecialchars($_POST["name"]);
                $surname = htmlspecialchars($_POST["surname"]);

                echo "<p>Name: $name</p>";
                echo "<p>Surname: $surname</p>";
            ?>
</main>