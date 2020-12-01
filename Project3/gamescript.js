/*
	Web Programming Section 1
	Project 3

	This is the game javascript file for the fifteen puzzle game.
*/
//call for table id
var table = document.getElementById("puzzle");

//starting tile number
var index = 1;

//base x coordinate for image
var xCoord = 0;
//base y coordinate for image
var yCoord = 0;

//default values
var chosenImg = "";
var userReply = "";

//value for when the page first loads
var firstLoading = 0;

//background list
var imgList = new Array();
imgList[0] = "url('cat.jpg')";
imgList[1] = "url('dog.jpg')";
imgList[2] = "url('bunny.jpg')";
imgList[3] = "url('bird.jpg')";


//runs load function when site is first loaded
function load(){
	//confirms default value
	firstLoading = 0;
	//runs playGame function to create a puzzle
	playGame();
}


//run to create puzzle table
function playGame(){
	//default user input

		userReply = "cat";
	//if site is loading for the first time, choose a random image for the puzzle table
	if (firstLoading == 0){
		//get a number from 0 to 3
		var randomImg = Math.floor(Math.random()*4);
		//if number is 0
		if (randomImg == 0){
			//place input as cat
			userReply = "cat";
		}
		//if number is 1
		else if (randomImg == 1){
			//place input as dog
			userReply = "dog";
		}
		//if number is 2
		else if (randomImg == 2){
			//place input as bunny
			userReply = "bunny";
		}
		//if number is 3
		else if (randomImg == 3){
			//place input as bird
			userReply = "bird";
		}
		//as a precaution, a default value of cat is given
		else {
			userReply = "cat";
		}
		//page has loaded, so increment by 1 so it does not enter this part of the code again
		firstLoading++;
	}
	//otherwise
	else {
		//get actual user input from the text box
		userReply = document.getElementById("picNum").value;
	}
	//default values
	chosenImg = "";
	index = 1;
	//if puzzle table has been created before, delete it for the new requested puzzle table
	if (table.rows.length != 0){
		while (table.rows.length > 0){
			table.deleteRow(0);
		}
	}
	//if user did not enter a valid input, reprompt them to enter a valid input and stop
	if (userReply != "cat" && userReply != "dog" && userReply != "bunny" && userReply != "bird"){
		reset();
		alert("Please enter cat, dog, bunny, or bird.");
	}
	//otherwise if valid input is given
	else {
		//if cat
		if (userReply == "cat"){
			//set chosen image value to cat
			chosenImg = imgList[0];
		}
		//if dog
		else if (userReply == "dog"){
			//set chosen image value to dog
			chosenImg = imgList[1];
		}
		//if bunny
		else if (userReply == "bunny"){
			//set chosen image value to bunny
			chosenImg = imgList[2];
		}
		//if bird
		else if (userReply == "bird"){
			//set chosen image value to bird
			chosenImg = imgList[3];
		}
		else{
			chosenImg = imgList[0];
		}
		//for loop that runs for four rows
		for (var x=0;x<4;x++){
			//make a row each loop
			var row = table.insertRow(table.length);
			//for loop that runs for four cells per row with a part of the image
			for (var y=0;y<4;y++){
				//make a cell each time
				var col = row.insertCell(y);
				//set the cell's HTML to number of tile
				col.innerHTML = "<div>" + index + "</div>";
				//set the cell's background to part of the image
				col.style.cssText = "background-image: " + chosenImg + "; background-position: " + xCoord + "px " + yCoord + "px";
				//shift x coordinate by 100px
				xCoord -= 100;
				//add square class to cell
				col.classList.add("square");
				//add click listener to cell for move function
				table.rows[x].cells[y].addEventListener("click", function(){move(this.parentNode.rowIndex,this.cellIndex)});
				//increase tile number for next cell
				index++;
				//if last cell, empty contents
				if (index == 17){
					col.style.backgroundImage = "";
					col.innerHTML = "";
					continue;
				}
			}
			//shift y coordinate by 100px
			yCoord -= 100;
			//reset x coordinate for next loop
			xCoord = 0;
		}
	}
}

//default values for second cell - for comparison
var otherIndex = 0;
var otherImage = 0;
var currentIndex = 0;
var currentCSS = 0;

//function check() {
//if((table.rows[x+1].cells[y].innerHTML == "") || (table.rows[x-1].cells[y].innerHTML == "") || (table.rows[x].cells[y+1].innerHTML == "") || (table.rows[x].cells[y-1].innerHTML == "")) {
//return true;
//	document.getElementById("puzzle").onmouseover = function() {mouseOver()};
//document.getElementById("puzzle").onmouseout = function() {mouseOut()};
//}else{
//	return false;
//}
//}


//move tile function
function move(x,y){
	//if end row
	if (x == table.rows.length-1){
		//if right corner
		if (y == table.rows[0].cells.length-1){
			//check left
			checkLeft(x,y);
		}
		//if left corner
		else if (y == 0){
			//check right
			checkRight(x,y);
		}
		//otherwise
		else {
			//check both left and right
			checkLeft(x,y);
			checkRight(x,y);
		}
		//check above in all cases
		checkAbove(x,y);
	}
	//if top row
	else if (x == 0){
		//if right corner
		if (y == table.rows[0].cells.length-1){
			//check left
			checkLeft(x,y);
		}
		//if left corner
		else if (y == 0){
			//check right
			checkRight(x,y);
		}
		//otherwise
		else {
			//check both left and right
			checkLeft(x,y);
			checkRight(x,y);
		}
		//check below in all cases
		checkBelow(x,y);
	}
	//otherwise in middle rows
	else {
		//if right end
		if (y == table.rows[0].cells.length-1){
			//check left
			checkLeft(x,y);
		}
		//if left end
		else if (y == 0){
			//check right
			checkRight(x,y);
		}
		//otherwise
		else {
			//check both left and right
			checkLeft(x,y);
			checkRight(x,y);
		}
		//check above and below in all cases
		checkAbove(x,y);
		checkBelow(x,y);
	}
}

//switch tiles if the tile below the current tile is empty
function checkBelow(x,y){
	//if the tile below is empty
	if (table.rows[x+1].cells[y].innerHTML == ""){
		//set other values to above tile
		otherIndex = table.rows[x+1].cells[y].innerHTML;
		otherImage = table.rows[x+1].cells[y].style.cssText;

		//set current values to current tile
		currentIndex = table.rows[x].cells[y].innerHTML;
		currentCSS = table.rows[x].cells[y].style.cssText;

		//switch current tile values to the above tile's values
		table.rows[x].cells[y].innerHTML = otherIndex;
		table.rows[x].cells[y].style.cssText = otherImage;

		//switch the above tile values to the current tile's initial values
		table.rows[x+1].cells[y].innerHTML = currentIndex;
		table.rows[x+1].cells[y].style.cssText = currentCSS;
	}
}

//switch tiles if the tile above the current tile is empty
function checkAbove(x,y){
	//if the tile above is empty
	if (table.rows[x-1].cells[y].innerHTML == ""){
		//set other values to above tile
		otherIndex = table.rows[x-1].cells[y].innerHTML;
		otherImage = table.rows[x-1].cells[y].style.cssText;

		//set current values to current tile
		currentIndex = table.rows[x].cells[y].innerHTML;
		currentCSS = table.rows[x].cells[y].style.cssText;

		//switch current tile values to the above tile's values
		table.rows[x].cells[y].innerHTML = otherIndex;
		table.rows[x].cells[y].style.cssText = otherImage;

		//switch the above tile values to the current tile's initial values
		table.rows[x-1].cells[y].innerHTML = currentIndex;
		table.rows[x-1].cells[y].style.cssText = currentCSS;
	}
}

//switch tiles if the tile to the right of the current tile is empty
function checkRight(x,y){
	//if the tile to the right is empty
	if (table.rows[x].cells[y+1].innerHTML == ""){
		//set other values to above tile
		otherIndex = table.rows[x].cells[y+1].innerHTML;
		otherImage = table.rows[x].cells[y+1].style.cssText;

		//set current values to current tile
		currentIndex = table.rows[x].cells[y].innerHTML;
		currentCSS = table.rows[x].cells[y].style.cssText;

		//switch current tile values to the above tile's values
		table.rows[x].cells[y].innerHTML = otherIndex;
		table.rows[x].cells[y].style.cssText = otherImage;

		//switch the above tile values to the current tile's initial values
		table.rows[x].cells[y+1].innerHTML = currentIndex;
		table.rows[x].cells[y+1].style.cssText = currentCSS;
	}
}

//switch tiles if the tile to the left of the current tile is empty
function checkLeft(x,y){
	//if the tile to the left is empty
	if (table.rows[x].cells[y-1].innerHTML == ""){
		//set other values to above tile
		otherIndex = table.rows[x].cells[y-1].innerHTML;
		otherImage = table.rows[x].cells[y-1].style.cssText;

		//set current values to current tile
		currentIndex = table.rows[x].cells[y].innerHTML;
		currentCSS = table.rows[x].cells[y].style.cssText;

		//switch current tile values to the above tile's values
		table.rows[x].cells[y].innerHTML = otherIndex;
		table.rows[x].cells[y].style.cssText = otherImage;

		//switch the above tile values to the current tile's initial values
		table.rows[x].cells[y-1].innerHTML = currentIndex;
		table.rows[x].cells[y-1].style.cssText = currentCSS;
	}
	else {
		//alert("left doesn't work!");
	}
}

//shuffle function
//NOTE !! TOO RANDOMIZED - NEEDS TO BE FIXED !!
function shuffleMe(){
	for (var x=0;x<4;x++){
		for (var y=0;y<4;y++){
			//find random second cell to work with
			otherX = Math.floor(Math.random()*4);
			otherY = Math.floor(Math.random()*4);

			//set other values to above tile
			otherIndex = table.rows[otherX].cells[otherY].innerHTML;
			otherImage = table.rows[otherX].cells[otherY].style.cssText;

			//set current values to current tile
			currentIndex = table.rows[x].cells[y].innerHTML;
			currentCSS = table.rows[x].cells[y].style.cssText;

			//switch current tile values to the above tile's values
			table.rows[x].cells[y].innerHTML = otherIndex;
			table.rows[x].cells[y].style.cssText = otherImage;

			//switch the above tile values to the current tile's initial values
			table.rows[otherX].cells[otherY].innerHTML = currentIndex;
			table.rows[otherX].cells[otherY].style.cssText = currentCSS;
		}
	}
}


function timeToString(time) {
  let diffInHrs = time / 3600000;
  let hh = Math.floor(diffInHrs);

  let diffInMin = (diffInHrs - hh) * 60;
  let mm = Math.floor(diffInMin);

  let diffInSec = (diffInMin - mm) * 60;
  let ss = Math.floor(diffInSec);

  let diffInMs = (diffInSec - ss) * 100;
  let ms = Math.floor(diffInMs);

  let formattedMM = mm.toString().padStart(2, "0");
  let formattedSS = ss.toString().padStart(2, "0");
  let formattedMS = ms.toString().padStart(2, "0");

  return `${formattedMM}:${formattedSS}:${formattedMS}`;
}

// Declare variables to use in our functions below

let startTime;
let elapsedTime = 0;
let timerInterval;

// Create function to modify innerHTML

function print(txt) {
  document.getElementById("display").innerHTML = txt;
}

// Create "start", "pause" and "reset" functions

function start() {
  startTime = Date.now() - elapsedTime;
  timerInterval = setInterval(function printTime() {
    elapsedTime = Date.now() - startTime;
    print(timeToString(elapsedTime));
  }, 10);
  showButton("PLAY");
}

function pause() {
  clearInterval(timerInterval);
  showButton("PLAY");
}

function reset() {
  clearInterval(timerInterval);
  print("00:00:00");
  elapsedTime = 0;
  showButton("PLAY");
}

// Create function to display buttons

function showButton(buttonKey) {
  const buttonToShow = buttonKey === "PLAY" ? playButton : pauseButton;
  const buttonToHide = buttonKey === "PLAY" ? pauseButton : playButton;

}
// Create event listeners

let playButton = document.getElementById("playButton");
let pauseButton = document.getElementById("pauseButton");
let resetButton = document.getElementById("resetButton");

playButton.addEventListener("click", start);
resetButton.addEventListener("click", reset);

var x = document.getElementById("myAudio");

function playAudio() {
  x.loop = true;
	x.play();
}

function pauseAudio() {
  x.pause();
}
