<?php

use app\assets\EditorAsset;

EditorAsset::register($this)

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
        <input id="name" type="text" placeholder="имя проекта" value="Без имени">
        <div id="penal">
            <button class="no_active" id="pen"><img src="/images/pencil.png" alt="pencil"></button>
            <button class="no_active" id="eraser"><img src="/images/eraser.png" alt="pencil"></button>
        </div>

        <div class="option">
            <label for="size-slider"></label>
            <input type="range" id="size-slider" min="1" max="200" value="5">
        </div>

        <div class="row_buttons">
            <button class="clear-canvas" onclick="clearCanvas()">Clear Canvas</button>
            <button id="add_color">Добавить цвет</button>
            <button id="save-img">Save As Image</button>
        </div>
    </div>
    <div></div>
</div>
</body>
</html>
