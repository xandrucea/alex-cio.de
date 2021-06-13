let fr = 2; //starting FPS

function setup() {
  createCanvas(400, 400);
  background(0);
  frameRate(fr);
}

function draw() {
  ellipse(random(10, 350), random(10, 360), 20, 20);
}
