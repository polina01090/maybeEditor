<?php
/** @var $pictures */
/** @var $users */
?>

<div class="pictures">
    <?php foreach ($pictures as $picture): ?>
    <div><?=$picture['name']?></div>
    <div><img src="<?= $picture['url'] ?>" alt="from canvas"></div>
    <div><?= $users[$picture['user_id']] ?></div>
    <?php endforeach; ?>
</div>
