
        <main class="main">
            <section class="head">
                <h2 class="head__title"><?= $title?></h2>
                <p class="head__date"><?= $date?></p>
            </section>
            <? 
            $name = "Вася";
            echo $name . " <br> привет";
            echo '<h1>Привет $name!</h1>';
            echo "<h1>Привет $name!</h1>";
            $a = 10;
            if ($a < 6) {
                echo "$a < 6";
            } 
            else if ($a > 6) {
                echo "$a > 6";
            }
            elseif ($a == 6) {
                echo "$a == 6";
            }
            else {
                echo "Ошибка!";
            }
            date_default_timezone_set("Asia/Tashkent");
            echo "<br>". date("d 'l' - F - Y; H:i:s");

            ?>

            <?= "<h1>Привет $name!</h1>"?>
            <p>Выберите ваш год рождения</p>
            <select name="" id="">
                <? 
                $year = date("Y");
                for ($i = $year - 80 ; $i < $year; $i++): ?> 
                    <option value="<?= $i?>"> <?= $i?> </option>
                <? endfor;?>
            </select>

            <?
            // Массивы
            $arr = ["апельсин", "мандарин", "лимон", "limon"];
            for ($i=0; $i < count($arr); $i++) {
                $x =  mb_strtoupper($arr[$i]);
                echo "<br> $x";                
            }

            // Ассоциативные массивы
            $arr_assoc = [
                "a" => "сто",
                "b" => "двести",
                "c" => [
                    "d"=> "триста",
                    "e" => "четыреста"
                ]
                ];
            echo "<br>" . $arr_assoc["b"];
            foreach ($arr_assoc as $key => $value) {
                if (gettype($value) == "array") {
                    foreach ($value as $x) {
                        echo "<p>$key = $x</p>";
                    }
                } else {
                    echo "<p>$key = $value</p>";
                }                
            }
        
            var_dump($arr_assoc)
            ?>

            <form action="" method="post">
                <fieldset>
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name">
                    <br><br>
                    <label>Фамилия
                        <input type="text" name="surname">
                    </label>
                </fieldset>                
                <button>Отправить</button>
            </form>

            <?
                var_dump($_GET);
                var_dump($_POST);

                $name = strip_tags($_POST["name"]);
                $surname = htmlspecialchars($_POST["surname"]);
                echo "<p>Имя: $name</p>";
                echo "<p>Фамилия: $surname</p>";
            ?>
        </main>
  