<?php
/** @var $model */
?>
<p>hi</p>
<?php foreach ($model as $item):?>
    <p><?=$item['name']?></p>
    <img src='<?=$item['url']?>' alt='from canvas'/>
<?php endforeach;?>
