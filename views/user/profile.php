<?php
/** @var $model */
?>
<p>hi</p>
<?php foreach ($model as $item):?>
    <img src='<?=$item['name']?>' alt='from canvas'/>
    <img src='<?=$item['url']?>' alt='from canvas'/>
<?php endforeach;?>
