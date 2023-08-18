let canvas = document.getElementById('editor');
let size = document.getElementById('size-slider');
canvas.style.width = '900px';
canvas.style.height = '800px';
let ctx = canvas.getContext('2d');
let penStyle = {
    x: 0,
    y: 0,
    color: '#000',
    form: 'round',
    painting: false,
}
let eraserStyle = {
    size: 15,
    x: 0,
    y: 0,
    painting: false,
}

let points = [];

let pen = document.getElementById("pen");
let eraser = document.getElementById("eraser");
pen.addEventListener("click", () => {
    cancelMouse(startErase, endErase, endErase, erase);
    change_class(pen);
    console.log(points);
    if (pen.classList.contains('active-brush') === true) {
        completeMouse(startPos, endPos, endPos, draw);
    }

})
eraser.addEventListener("click", () => {
    cancelMouse(startPos, endPos, endPos, draw);
    change_class(eraser);
    if (eraser.classList.contains('active-brush') === true) {
        completeMouse(startErase, endErase, endErase, erase);
    }
})

function change_class(elem_act) {
    let elems = document.getElementsByClassName("no_active");
    for (let elem of elems) {
        if (elem_act === elem) {
            elem.classList.add("active-brush");
        } else {
            elem.classList.remove("active-brush");
        }
    }

}

function resize() {
    canvas.width = canvas.clientWidth;
    canvas.height = canvas.clientHeight;
}

resize();

// window.addEventListener("resize", resize);
let shape = [];
function startPos(e) {
    penStyle.painting = true;
    shape = [];
    draw(e);

}

function endPos() {
    if (penStyle.painting){
        points.push(shape);
    }
    penStyle.painting = false;


    ctx.beginPath();

}

function draw(e) {
    if (!penStyle.painting) return;
    ctx.lineWidth = size.value;
    ctx.lineCap = penStyle.form;
    ctx.strokeStyle = penStyle.color;
    penStyle.x = e.pageX - this.offsetLeft;
    penStyle.y = e.pageY - this.offsetTop;
    ctx.lineTo(penStyle.x, penStyle.y);
    ctx.stroke();
    ctx.beginPath();
    ctx.moveTo(penStyle.x, penStyle.y);
    if (!isNaN(penStyle.x) && !isNaN(penStyle.y)){
        shape.push({x: penStyle.x, y: penStyle.y});
    }
}

//remove
function cancelMouse(func1, func2, func3, func4) {
    canvas.removeEventListener("mousedown", func1);
    canvas.removeEventListener("mouseup", func2);
    canvas.removeEventListener("mouseout", func3);
    canvas.removeEventListener("mousemove", func4);
}

function completeMouse(func1, func2, func3, func4) {
    canvas.addEventListener("mousedown", func1);
    canvas.addEventListener("mouseup", func2);
    canvas.addEventListener("mouseout", func3);
    canvas.addEventListener("mousemove", func4);
}

function startErase(e) {
    eraserStyle.painting = true;
    erase(e)
}

function endErase() {
    eraserStyle.painting = false;
}

function erase(e) {
    if (!eraserStyle.painting) return;
    eraserStyle.x = e.pageX - this.offsetLeft;
    eraserStyle.y = e.pageY - this.offsetTop;
    ctx.clearRect(eraserStyle.x - eraserStyle.size / 2, eraserStyle.y - eraserStyle.size / 2, eraserStyle.size, eraserStyle.size);
}

let panel = document.getElementById("panel-edit");
let colors = ["red", "green", "blue", "yellow", "white", "black"];
if (!localStorage.getItem("colorsArr")){
    localStorage.setItem('colorsArr', JSON.stringify(colors))
}




function colorsList() {
    let colorsElem = document.createElement("div");
    colorsElem.className = "colorsCont";
    panel.appendChild(colorsElem);
    for (let color of JSON.parse(localStorage.getItem("colorsArr"))){
        let colorElem = document.createElement("button");
        colorElem.style.width = "15px";
        colorElem.style.height = "15px";
        colorElem.style.background = color;
        colorsElem.appendChild(colorElem);
        colorElem.addEventListener("click", () => {
            penStyle.color = colorElem.style.background;
        })
    }
}

let addColor = document.getElementById("add_color");
addColor.addEventListener("click", addColorInArr);
colorsList();
function addColorInArr() {
    let colorsElem = document.querySelector(".colorsCont");
    panel.removeChild(colorsElem);
    let newColor = document.createElement("input");
    newColor.type = "color";
    panel.appendChild(newColor);
    addColor.removeEventListener("click", addColorInArr)
    addColor.addEventListener("click", function SubmitColor() {
        let colorArray = JSON.parse(localStorage.getItem('colorsArr'));
        colorArray.push(newColor.value);
        localStorage.setItem('colorsArr', JSON.stringify(colorArray));
        panel.removeChild(newColor);
        colorsList();
        addColor.removeEventListener("click", SubmitColor);
        addColor.addEventListener("click", addColorInArr);
    })
}
async function convertCanvasToImage() {
    let canvas = document.getElementById('editor');
    let dataUrl = canvas.toDataURL("image/png");
    // let newTab = window.open('about:blank','image from canvas');
    // newTab.document.write("<img src='" + dataUrl +"' alt='from canvas'/>");
    //let form = new FormData();
    //form.set('url', dataUrl);
    let res = await fetch("/send/send-img", {
        method: "POST",
        headers: {
            "Content-type": "application/json; charset=UTF-8"
        },
        body: JSON.stringify({url: dataUrl}),

    });
    const responseText = await res.json();
    console.log(responseText)
}
let saveBtn = document.getElementById("save-img");
saveBtn.addEventListener("click", convertCanvasToImage);




