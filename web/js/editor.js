let canvas = document.getElementById('editor');
let context = canvas.getContext('2d');
let pen = {
    size: 15,
    x: 15,
    y: 15,
    color: '#000',
}
function resize() {
    canvas.width = canvas.clientWidth;
    canvas.height = canvas.clientHeight;
}

window.addEventListener("resize", resize);

function loop(){
    context.arc(pen.x, pen.y, pen.size, 0, 2 * Math.PI, false);
    context.fillStyle = pen.color;
    context.fill();
}
requestAnimationFrame(() => loop());