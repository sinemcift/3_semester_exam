
let canvas = document.querySelector("#canvas"); 
let ctx = canvas.getContext('2d');

// level 1
let maze = [
    [0,1,0,1,0,0,0,0,0,1,5,1,0,6,1,0,0,3,0,1,0,0,6],
    [0,1,5,1,5,1,0,1,1,1,0,1,0,1,1,1,1,1,0,1,0,1,1],
    [3,0,0,0,0,1,0,1,6,0,0,1,0,5,0,0,6,1,0,1,0,1,0],
    [0,0,1,1,0,1,0,5,1,1,0,1,3,1,0,3,1,3,0,1,0,1,0],
    [0,1,0,0,0,1,0,0,0,1,0,3,0,0,0,1,0,0,0,1,0,0,6],
    [6,1,6,1,0,1,1,6,0,1,0,3,0,1,0,1,0,1,0,1,0,1,0],
    [0,1,5,1,0,1,6,3,0,0,0,3,0,1,0,1,0,1,0,1,0,1,0],
    [0,1,1,1,0,1,0,3,1,1,1,1,0,1,1,1,0,1,3,1,0,1,0],
    [5,6,4,1,0,0,0,0,0,0,0,0,0,3,0,0,0,1,6,1,0,1,0],
    [1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,0,6,6,1,0,1,0],
    [6,3,0,6,0,1,0,0,0,0,5,1,5,6,0,0,0,3,0,0,0,1,5],
    [0,3,0,3,0,1,3,1,1,1,6,1,1,1,1,1,1,1,1,1,0,1,1],
    [6,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
    [0,0,0,1,5,1,1,1,0,1,1,1,1,3,1,1,0,1,5,1,0,1,0],
    [0,3,0,1,1,1,6,1,0,1,3,0,0,0,0,1,0,1,1,1,0,1,6],
    [0,1,5,3,0,0,0,0,0,1,0,0,1,3,0,1,0,0,0,0,0,1,0],
    [0,1,3,1,1,1,1,1,1,1,3,0,1,0,0,1,1,1,0,6,1,1,0],
    [0,0,0,0,0,0,0,0,0,0,0,0,1,2,3,1,6,0,0,1,5,0,0]
];
// level 2
let lvl2 = [
    [0,0,0,0,0,0,6,3,6,1,6,1,0,0,0,6,1,0,0,0,1,6,0],
    [6,3,0,3,5,6,1,0,0,1,0,1,0,1,0,3,1,4,1,0,1,1,0],
    [3,0,0,3,3,1,1,0,1,1,0,0,0,1,0,0,3,3,6,0,0,0,0],
    [1,3,0,3,6,1,0,0,0,0,1,3,1,1,0,0,0,0,1,0,3,1,1],
    [3,0,0,0,0,1,0,0,0,0,0,0,0,0,0,3,3,0,1,0,0,0,0],
    [0,0,1,1,1,3,0,0,3,1,1,1,3,0,0,0,0,0,1,0,0,1,0],
    [0,3,0,0,0,0,0,6,1,0,0,0,0,3,6,1,1,0,1,1,0,1,1],
    [0,1,0,3,1,1,1,1,0,0,6,3,0,1,1,0,1,0,0,0,0,0,6],
    [0,1,0,0,0,0,0,6,3,5,3,6,0,1,6,0,1,0,1,1,3,0,0],
    [0,6,3,0,1,0,1,1,0,3,2,3,0,3,0,0,0,0,1,0,0,0,0],
    [0,0,3,0,1,0,1,6,0,5,0,5,0,3,3,1,1,0,1,0,1,1,3],
    [0,0,3,0,0,0,0,0,0,0,0,0,0,3,0,0,0,0,3,0,0,3,5],
    [0,0,6,1,0,0,1,1,1,1,1,1,1,0,0,3,0,0,0,3,0,0,0],
    [0,0,1,1,0,3,0,0,0,0,0,0,0,0,0,0,3,6,0,1,1,1,3],
    [0,1,0,0,0,3,0,0,0,1,3,1,3,1,0,1,0,0,0,3,6,0,6],
    [0,0,1,1,3,6,0,0,1,0,0,0,6,0,0,1,0,1,0,0,1,0,0],
    [6,0,0,0,0,0,0,1,0,0,3,3,3,1,1,1,0,0,1,0,0,0,3],
    [5,3,0,1,6,1,0,1,5,0,0,0,0,0,6,1,1,0,6,1,6,3,0]
];

let y = 0;
let x = 0;
let tileSize = 35;
let point = 0;
let score = 1;
let key = 0;
//let player = -1;

// WALL
let wall = new Image();
wall.src ='../../image/bricks/wall.jpg';

// SOLDIER
let soldier = new Image();
soldier.src ='../../image/bricks/soldier.png'; 

// SUITCASE
let suitcase = new Image();
suitcase.src = '../../image/bricks/suitcase.png';

// FAMILY
let family = new Image();
family.src ='../../image/bricks/family.png';

// PLAYER
let playerImg = new Image();
playerImg.src = '../../image/bricks/player.png';

// EXIT
let exit = new Image();
exit.src ='../../image/bricks/exit.png';

let pointdisplay = document.getElementById('pointdisplay');
let keydisplay = document.getElementById('keydisplay');

// FUNCTIONS FOR AUDIO
function die(){
    let die = new Audio('../../audio/die.mp3');
    die.play();
}
function success(){
    let success = new Audio('../../audio/success.wav');
    success.play();
}
function walk(){
    let walk = new Audio('../../audio/walk.wav');
    walk.play();
}
function yay(){
    let yay = new Audio('../../audio/yay.wav');
    yay.play();
}
function ouch(){
    let ouch = new Audio('../../audio/ouch.wav');
    ouch.play();
}
function suitcaseSound(){
    let suitcaseSound = new Audio('../../audio/suitcase.mp4');
    suitcaseSound.play();
}

// FUNCTION FOR WHAT HAPPENS AT THE DIFFERENT TILES 
function grid(){
    // By using a loop inside of another you are building the maze accordingly:
    // First you'll take the first row (y-aksis) and then you loop through the whole forloop inside (x-aksis) to get all the columns in that row.
    for(let y = 0; y < maze.length; y++) {
        for(x = 0; x < maze[y].length; x++) {
            // FLOOR = 0
            if(maze[y][x] == 0){
                ctx.fillStyle = "white";
                ctx.fillRect(x*tileSize,y*tileSize,tileSize,tileSize);
            } 
            // WALL = 1
            else if(maze[y][x] == 1){
                ctx.fillRect(x * tileSize,y * tileSize,tileSize,tileSize);
                ctx.drawImage(wall, x*tileSize,y*tileSize,tileSize,tileSize);
            } 
            // WINNER TILE = 2
            else if(maze[y][x] == 2){
                ctx.fillRect(x * tileSize,y * tileSize,tileSize,tileSize);
                ctx.drawImage(exit, x*tileSize,y*tileSize,tileSize,tileSize);
            } 
            // BOMB = 3
            else if(maze[y][x] == 3){
                ctx.fillRect(x * tileSize,y * tileSize,tileSize,tileSize);
                ctx.drawImage(soldier, x*tileSize,y*tileSize,tileSize,tileSize);
            } 
            // PLAYER = 4
            else if(maze[y][x] == 4){
                // koordinater for player
                player = {y,x};
                console.log(player.y + " " + player.x);
                ctx.fillRect(x * tileSize,y * tileSize,tileSize,tileSize);
                ctx.drawImage(playerImg, x*tileSize,y*tileSize,tileSize,tileSize);
            } 
            // KEY/FAMILY = 5
            else if(maze[y][x] == 5){
                ctx.fillRect(x * tileSize,y * tileSize,tileSize,tileSize);
                ctx.drawImage(family, x*tileSize,y*tileSize,tileSize,tileSize);
            }
            // POINT
            else if(maze[y][x] == 6){
                ctx.fillRect(x * tileSize,y * tileSize,tileSize,tileSize);
                ctx.drawImage(suitcase, x*tileSize,y*tileSize,tileSize,tileSize);
            }
        }
    }
}

// Function for point and keys 
// Points kunne være mad på dåse som man samlede for at få ekstra point. 
function pointScore(){
    point += score;
    pointdisplay.innerHTML = point; 
}
// Key pint skal være familien som man samtaler for at komme ud af lejeren 
function keyScore(){
    key += score;
    keydisplay.innerHTML = key; 
}
// Function for skiftning af bane
function newLvl(){
    if(maze && key == 14){
        maze = lvl2;
    }
    //2 er antallet af keys som man skal have for at man kan afslutte
    if (lvl2 && key == 21){
        canvas.style.display = "none";
        document.getElementById("congrats").style.display = "block";
        document.getElementById("description").style.display = "none";
        document.getElementById("icons").style.display = "none";
        document.getElementById("again-btn").style.display = "block";
        document.getElementById("more-btn").style.display = "block";

        document.getElementById("again-btn").style.display = "block";
        document.getElementById("more-btn").style.display = "block";
    }
}
//Arrow key functions 
function up(){
    // FLOOR
    // det er -1 fordi man bevæger sig up ad y aksen. 
    if(maze[player.y-1][player.x] == 0){
        // Der hvor der står 0 skal der nu stå -1, den nye position
        maze[player.y-1][player.x] = 4;
        // Der hvor player stod før skal der nu stå 0, den gamle position
        maze[player.y][player.x] = 0;
        walk();
    }
    // WINNER TILE
    else if(maze[player.y-1][player.x] == 2){
        success();
        newLvl();   
    }
    // BOMB
    else if(maze[player.y-1][player.x] == 3){
        die();
        setTimeout(function(){
            this.location.reload();
        },1000);
    }
    // KEY
    else if(maze[player.y-1][player.x] == 5){
        maze[player.y-1][player.x] = 4;
        maze[player.y][player.x] = 0;
        keyScore();
        yay();
    }
    //POINT
    else if(maze[player.y-1][player.x] == 6){
        maze[player.y-1][player.x] = 4;
        maze[player.y][player.x] = 0;
        pointScore();
        suitcaseSound();
    }
    //WALL
    else{
        ouch();
    }
    grid();
}
function down(){
    // FLOOR
    if(maze[player.y+1][player.x] == 0){
        // Der hvor der stÃ¥r 0 skal der nu stÃ¥ -1, den nye position
        maze[player.y+1][player.x] = 4;
        // Der hvor player stod fÃ¸r skal der nu stÃ¥ 0, den gamle position
        maze[player.y][player.x] = 0;
        walk();
    }
    //WINNER TILE
    else if(maze[player.y+1][player.x] == 2){
        success();
        newLvl();   
    }
    // BOMBE
    else if(maze[player.y+1][player.x] == 3){
        die();
        setTimeout(function(){
            this.location.reload();
        },1000);
    }
    // KEY
    else if(maze[player.y+1][player.x] == 5){
        maze[player.y+1][player.x] = 4;
        maze[player.y][player.x] = 0;
        keyScore();
        yay();
    }
    // POINT
    else if(maze[player.y+1][player.x] == 6){
        maze[player.y+1][player.x] = 4;
        maze[player.y][player.x] = 0;
        pointScore();
        suitcaseSound();
    }
    //WALL
    else{
        ouch();
    }
    grid();
}
function left(){
    // FLOOR
    if(maze[player.y][player.x-1] == 0){
        // Der hvor der stÃ¥r 0 skal der nu stÃ¥ -1, den nye position
        maze[player.y][player.x-1] = 4;
        // Der hvor player stod fÃ¸r skal der nu stÃ¥ 0, den gamle position
        maze[player.y][player.x] = 0;
        walk(); 
    }
    // WINNER TILE
    else if(maze[player.y][player.x-1] == 2){
        success();
        newLvl();
    }

    // BOMBE
    else if(maze[player.y][player.x-1] == 3){
        die();
        setTimeout(function(){
            this.location.reload();
        },1000);
    }
    // KEY
    else if(maze[player.y][player.x-1] == 5){
        maze[player.y][player.x-1] = 4;
        maze[player.y][player.x] = 0;
        keyScore();
        yay();
    }
    // POINT
    else if(maze[player.y][player.x-1] == 6){
        maze[player.y][player.x-1] = 4;
        maze[player.y][player.x] = 0;
        pointScore();
        suitcaseSound();
    }
    //WALL 
    else{
        ouch();
    }
    grid();
}
function right(){
    // FLOOR
    if(maze[player.y][player.x+1] == 0){
        // Der hvor der stÃ¥r 0 skal der nu stÃ¥ -1, den nye position
        maze[player.y][player.x+1] = 4;
        // Der hvor player stod fÃ¸r skal der nu stÃ¥ 0, den gamle position
        maze[player.y][player.x] = 0;
        walk();
    }
    // WINNER TILE
    else if(maze[player.y][player.x+1] == 2){
        success();
        newLvl();
    }
    // BOMB
    else if(maze[player.y][player.x+1] == 3){
        auch();
        setTimeout(function(){
            this.location.reload();
        },1000);
    }
    // KEY
    else if(maze[player.y][player.x+1] == 5){
        maze[player.y][player.x+1] = 4;
        maze[player.y][player.x] = 0;
        keyScore();
        yay();
    }
    // POINT
    else if(maze[player.y][player.x+1] == 6){
        maze[player.y][player.x+1] = 4;
        maze[player.y][player.x] = 0;
        pointScore();
        suitcaseSound();
    }
    //WALL
    else{
        ouch();
    }
    grid();
}

// A function that calls a function named "callback function"
window.addEventListener('keydown', function(event){
    console.log(event.keyCode);
 
    //min switch skal samle mine key functioner, (up, down, left right)
    // mine functioner skal være den key som samler alt der kan se i den, 
    // key functionerne skal også inkludere keyscore() og pointscore()
    // i hvert winner tile skal newLvl funtion køres. 

    switch (event.keyCode) {
        // LEFT KEY
        case 37:
            // If 'player's' coordinates are -1 in the x axis and the value of the position = 0, then the following shall happen.
            left();
            break;

        // UP KEY
        case 38:
            // hvis players koordinat - 1 i y aksen og værdien på den position er = 0 skal følgende ske.
            up();
            break;

        // RIGHT KEY
        case 39:
            // hvis players koordinat + 1 i x aksen og værdien på den position er = 0 skal følgende ske.
            right();
            break;

        // DOWN KEY
        case 40:
            // hvis players koordinat + 1 i y aksen og vÃ¦rdien pÃ¥ den position er = 0 skal fÃ¸lgende ske.
            down();
            break;
         default:
            break;
    }
})

//Dette gør at når siden bliver loadet så kørers grid funktionen.
window.addEventListener("load", grid);
