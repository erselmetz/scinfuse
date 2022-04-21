function setup() {
  createCanvas(1300, 700);

  var V
  var R
  
  V = createSlider(0, 500, 0);
  V.position(850, 350);
  V.style('width', '130px');
  
  R = createSlider(0, 500, 0);
  R.position(850, 522);
  R.style('width', '130px');

draw = function(){
  
  let vol = V.value();
  let res = R.value();
  
  var I = vol/res
  
  background(255, 255, 204)
  
  fill(0, 0, 0)
  rect(88, 190, 625, 420) 
  fill(255, 255, 204)
  rect(100, 200, 600, 400)
  
  fill(102, 51, 0)
  rect(290, 555, 180, 100)
  fill(153, 153, 102)
  rect(290, 555, 50, 100)
  
  fill(255, 255, 255)
  textSize(25)
  text("SCinFuse",350,615)

if(I>0 && res > 0){
  fill(153, 153, 102)
  rect(350, 130, 80, 70)
  fill(255, 255, 255 - vol + res)
  ellipse(390,110,130,130)
  
  fill(0, 0, 0)
  textSize(30)
  text("ON",367,120)
}
  
else {
  fill(153, 153, 102)
  rect(350, 130, 80, 70)
  fill(255, 255, 255)
  ellipse(390,110,130,130)
  
  fill(0, 0, 0)
  textSize(30)
  text("OFF",360,120)
}
  
var Voltage = function(vol) {
  return vol
}

var Resistance = function(res) {
  return res
}

var Current = function(vol,res) {
  return vol/res
}
  
  fill(0,0,0)
  textSize(40)
  text("Current, I",800,550)
  
  fill(0, 0, 0)
  textSize(40)
  text(Current(vol,res) + "A",850,610)
  
  fill(255, 153, 0)
  textSize(40)
  text("Voltage, V",800,220)
  
  fill(0, 0, 0)
  textSize(40)
  text(Voltage(vol) + "V",1000,273)
  
  fill(51, 102, 255)
  textSize(40)
  text("Resistance, R",800,390)
  
  fill(0, 0, 0)
  textSize(40)
  text(Resistance(res) + "\u2126",1000,443)
  
  fill(0,0,0)
  textSize(70)
  text("V = IR",290,410)
}
}