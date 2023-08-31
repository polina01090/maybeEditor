<?php
/** @var $model */
?>
<h1>PROFILE</h1>
<div class="pictures">

    <?php foreach ($model as $picture): ?>
        <div class="picture">
            <div class="picture_name"><?=$picture['name']?></div>
            <div class="picture_img"><a href="/editor/picture?id=<?=$picture['id']?>"><img id="picture_<?=$picture['id']?>" src="<?=$picture['url']?>" alt="from canvas"></a></div>
            <a class="edit" href="edit?id=<?= $picture['id'] ?>">edit</a>
            <div class="status"><?=($picture['status'] === 0) ? "Публичный" : "Приватный"?></div>
            <button class="download_btn" onclick="downloadImg(`<?=$picture['url']?>`)">скачать картинку</button>
        </div>
    <?php endforeach; ?>
</div>
<script>
    function downloadImg(img){
        const a = document.createElement("a");
        a.href = img;
        a.download = "imageName.png";
        a.click();
    }
</script>