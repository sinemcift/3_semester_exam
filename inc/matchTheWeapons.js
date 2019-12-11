var ctx, balls = [];
var mouseDownX = null, mouseDownY = null;
var imageList = [orange, red, blue, green, grey, purple];

function Ball(x, y) {
    this.x1 = x;
    this.y1 = y;
    this.x2 = x;
    this.y2 = y;
}

function initialize() {
    // Create Ball Objects. 
    for ( var x = 0; x < 10; x++) {
        balls[x] = [];
        for (var y = 0; y < 10; y++) {
            balls[x][y] = new Ball (x, y);
        }
    }
    // Set Color. 
    for (var x = 0; x < 10; x++) {
        for (var y = 0; y < 10; y++) {
            while (true) {
                var colorNum = Math.floor(Math.random() * 6);
                if (checkColor(x, y, colorNum)) {
                    balls[x][y].color = colorNum;
                    break;
                }
            }
        }
    }
    //Initialize canvas.
    var canvas = document.getElementById("canvas-2");
    ctx = canvas.getContext("2d");

    // Set mouse events.
    canvas.onmousedown = myMouseDown;
    canvas.onmouseup = myMouseUp;

    paint();
}

function checkColor(x, y, c) {
    var flag = true;

    if (x > 1) {
        var c0 = balls[x-2][y].color;
        var c1 = balls[x-1][y].color;
        if (c0 == c1 && c1 == c) {
            flag = false;
        }
    }
    if (y > 1) {
        var c0 = balls[x][y-2].color;
        var c1 = balls[x][y-1].color;
        if (c0 == c1 && c1 == c) {  
            flag = false;
        }
    }
    return flag;
}

function paint() {
    for (var x = 0; x < 10; x++) {
        for (var y = 0; y < 10; y++) {
            //drawImage (image, x, y, width, height)
            ctx.drawImage(imageList[balls[x][y].color], x * 60, y * 60 + 100, 60, 60);
        }
    }

    //Text
    ctx.font = 'bold 20px Open Sans';
    ctx.textAlign = 'center';
    ctx.fillText('Moves Left : 10', 150, 50);
    ctx.fillText('Score : 33333', 450, 50);
}

function myMouseDown(e) {
    mouseDownX = e.offsetX; 
    mouseDownY = e.offsetY;
}
function myMouseUp(e) {
    var ballX1 = Math.floor(mouseDownX /60);
    var ballY1 = Math.floor((mouseDownY - 100) / 60);
    console.log("ballX:" + ballX1);
    console.log("ballY:" + ballY1);
}
