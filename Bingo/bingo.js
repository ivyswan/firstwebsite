// JavaScript Document


/* for loop
for (initialisation; limiter; counter) {
		instructions go here
	}
*/	

/*window.onload = initAll;
function initAll(){
	for(var i = 0; i <= 23; i++){
	document.getElementById('square'+i).innerHTML = Math.floor(Math.random()*75)+1;
	}
}*/

//refactor
window.onload = function(){
	var usedNums = new Array(76);
		
	function setSquare(thisSquare){ 
		var currSquare = 'square' + thisSquare; 							//matches the id  of each unique box in the HTML
		var colPlace = [0,0,0,0,0,1,1,1,1,1,2,2,2,2,3,3,3,3,3,4,4,4,4,4]; 	//position of each box's column number 0 - 4
		var factor = 15;													//constant factor for the column numbers
		var colBasis = colPlace[thisSquare] * factor; 						//factored pattern for column 0, 15, 30, 45 or 60
		var randomRange;													//placeholder for random integer between 1 and 75
		//var randomRange = getRandomNumber(1, factor); 					//generates a random integer between 1 and 75
		//var factoredRange = randomRange + colBasis; 						//giving us a range per position 1-15, 16-30, 31-45... etc.
		
		/*if(!usedNums[factoredRange]){
			usedNums[factoredRange] = true;
			document.getElementById(currSquare).innerHTML = factoredRange;	
	
		} else {
			console.log("You have a duplicate of " + factoredRange);
		}*/
		
		do {
			randomRange = getRandomNumber(1, factor) + colBasis;	
		} while (usedNums[randomRange])
		
		usedNums[randomRange] = true;		
		document.getElementById(currSquare).innerHTML = randomRange;
	}
	
	function getRandomNumber(min, max){
		var newNum = (Math.floor(Math.random()* (max-min+1)) + min); 		//creates and stores a random integer between min and max
		return newNum;	
	}
	
	function generateNewCard() {
			for (var i = 0; i < 24; i++){
			setSquare(i)
		}
	}
		
	function generateAnotherCard() {
		for (var i = 1; i < usedNums.length; i++) {
			usedNums[i] = null;
		}
		generateAnotherCard();
	}
	
	if (document.getElementById) {
		generateNewCard();
		document.getElementById('reload').onclick = function() {
			generateAnotherCard();	
			return false;
		}
	} else {
		alert("Sorry, your browser doesn't support this web application. Please upgrade your browser.");	
	}
}
//1-VARIABLES
//2-FUNCTIONS
//3-INSTRUCTIONS