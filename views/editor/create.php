<?php
\app\assets\EditorAsset::register($this)

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div id="edit_board">
    <canvas id="editor" style="border: 1px solid black"></canvas>
    <div id="panel-edit">
        <button class="no_active" id="pen">Brush</button>
        <div class="option">
            <label for="size-slider"></label>
            <input type="range" id="size-slider" min="1" max="50" value="5">
        </div>
        <button class="no_active" id="eraser">Eraser</button>
        <div class="row_buttons">
            <button class="clear-canvas">Clear Canvas</button>
            <button id="add_color">Добавить цвет</button>
            <button id="save-img">Save As Image</button>
        </div>
    </div>
    <div></div>
</div>
</body>
</html>
