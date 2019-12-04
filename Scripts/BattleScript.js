

// initialize config variables here
let canvas;
let ctx;

// setup config variables and start the program
function init () {
  canvas = document.getElementById('gameCanvas');
  ctx = canvas.getContext('2d');
}

blobIndex = 1;
function drawBluwub(blobColor)
{
    ctx.fillStyle = blobColor;
    ctx.drawImage("../Resources/bluwubBaseImage.png", 25*blobIndex, 25*blobIndex);
    blobIndex++;
}

init();
//drawBluwub(blob1Color);
//drawBluwub(blob2Color);

var lastUpdate = Date.now();
var myInterval = setInterval(tick, 0);

function tick() {
    var now = Date.now();
    var dt = now - lastUpdate;
    lastUpdate = now;
    dt /= 1000;
    update(dt);
}

blob1Ticker = 0;
blob2Ticker = 0;

pageLink = "./quack.php?";

function update(time)
{
  console.log("UPDT");
  blob1Ticker += time;
  blob2Ticker += time;

  if(blob1Ticker > blob1AttackSpeed)
  {
    damageToDo = (blob1Damage - (blob2Defense/2));
    if(damageToDo <= 0)
    {
      damageToDo = 1;
    }
    console.log("I SMAK BLOB2 FOR: " + damageToDo);
    blob2CurrentHealth -= damageToDo;
    blob1Ticker = 0;
  }

  if(blob2Ticker > blob2AttackSpeed)
  {
    damageToDo = (blob2Damage - (blob1Defense/2));
    if(damageToDo <= 0)
    {
      damageToDo = 1;
    }
    console.log("I SMAK BLOB1 FOR: " + damageToDo);
    blob1CurrentHealth -= damageToDo;
    blob2Ticker = 0;
  }

  if(blob1CurrentHealth <= 0)
  {
    pageLink += "winner=blob2&blob1id="+blob1ID+"&blob2id="+blob2ID+"$blob1CurrentHealth=0&blob2CurrentHealth="+blob2CurrentHealth+"";
    window.location.href = pageLink;
    pageLink = "./quack.php?";
  }
  
  if(blob2CurrentHealth <= 0)
  {
    pageLink += "winner=blob1&blob1id="+blob1ID+"&blob2id="+blob2ID+"$blob1CurrentHealth="+blob1CurrentHealth+"&blob2CurrentHealth=0";
    window.location.href = pageLink;
    pageLink = "./quack.php?";
  }

}