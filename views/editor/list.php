<?php
/** @var $pictures */
/** @var $users */
?>
<p></p>
<div class="pictures">
    <?php foreach ($pictures as $picture): ?>
        <div class="picture">
            <div class="picture_name"><?=$picture['name']?></div>
            <div class="picture_img"><a href="/editor/picture?id=<?=$picture['id']?>"><img id="picture_<?=$picture['id']?>" src="<?=$picture['url']?>" alt="from canvas"></a></div>
            <div class="picture_user"><?= $users[$picture['user_id']]?></div>
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
