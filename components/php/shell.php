<?php

function getShell()
{
    include_once "./components/php/variables.php";
?>
    <div class="container shell">
        <div class="row row-cols-5 g-5">

            <?php
            // include_once "./components/php/variables.php";
            foreach ($cdResponse["response"] as $currentDisc) {
            ?>
                <div class="col">
                    <div class="cd-card">
                        <img class="cd-card-img w-100" src="<?php echo $currentDisc["poster"] ?>" alt="<?php echo $currentDisc["title"] . " cover" ?>">
                        <h3 class="cd-card-title"><?php echo $currentDisc["title"] ?></h3>
                        <p class="cd-card-name"><?php echo $currentDisc["author"] ?></p>
                        <p class="cd-card-year"><?php echo $currentDisc["year"] ?></p>
                    </div>
                </div>

            <?php
            }

            ?>





        </div>
    </div>
<?php
}
