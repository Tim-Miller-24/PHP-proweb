
        <main class="main">
            <section class="head">
                <h2 class="head__title"><?= $title?></h2>
                <p class="head__date"><?= $date?></p>
            </section>
            <div class="slider">
                <div class="slider__line">  
      
                    <? $images = scandir('./img/');
                    for ($i=0; $i < count($images); $i++) : ?>
                        <? $fileType = getExtension($images[$i]); ?>
                        <? if($fileType == 'jpg' || $fileType == 'jpeg' || $fileType == 'png' || $fileType == 'gif') : ?>
                        <img src="../img/<?= $images[$i]?>" alt="" class="slider__img">
                        <? endif; ?>
                    <? endfor; ?>

                </div>
                <div class="slider__controls">
                    <button class="slider__prev slider__btn"><i class="far fa-chevron-left"></i></button>
                    <button class="slider__next slider__btn"><i class="far fa-chevron-right"></i></button>
                </div>
            </div>
        </main>
