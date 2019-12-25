{
"use strict";
let empty_square = {top: "300px", left: "300px"};
let individual_pieces;
window.addEventListener("load", function(){
    //get the pieces first
    individual_pieces = document.querySelectorAll("#puzzlearea div");
    //every piece needs to have the css rule applied to it
    i = 0;
    individual_pieces.forEach(function(piece){
       piece.classList.add("puzzlepiece");
       putPieceInProperLocation(i, piece);
       piece.addEventListener("click", moveTileHandler);
       if (can_move_or_not(piece)){
           piece.classList.add("movablepiece");
       }
       i++;
   });
   //make the pieces, (15, 11) have the ability to move...? how to do that
   //can_move_or_not();
   var shuffleButton = document.getElementById("shufflebutton");
   shuffleButton.addEventListener("click", function(){
       //WRITE THE CODE TO SHUFFLE
       //the process will chose at random an item that can be moved
       //then move it to the empty square
       //then repeat
       for(var i = 0; i < 100; i++){
            var individual_pieces = document.querySelectorAll(".movablepiece");
            //get a random int from 0 to individual_pieces.length
            move(individual_pieces[getRandomInt(individual_pieces.length)]);
            //after moved I must update which squares can be moved
            //so find out the new possible ones to move
           can_move_or_not(individual_pieces[getRandomInt(individual_pieces.length)]);
       }
   });
});

/*
    This is a helper function found on the Mozilla page for Javascript functions
*/
function getRandomInt(max){
    return Math.floor(Math.random() * Math.floor(max));
}

function putPieceInProperLocation(number, piece_to_locate){
    var place_on_row = number % 4;//only 4 on a row 
    //remember that the first row is arr[0], arr[1], arr[2], arr[3]
    //so arr[4] must go on the next row
    var left_pos = place_on_row * 100;
    var right_pos = left_pos + 100;
    var top_pos = Math.floor(number / 4) * 100;
    var bottom_pos = top_pos - 100;

    //now assign these positions to the style of the piece
    piece_to_locate.style.left = left_pos + "px";
    piece_to_locate.style.right = right_pos + "px";

    piece_to_locate.style.top = top_pos + "px";
    piece_to_locate.style.bottom = bottom_pos + "px";

    //add the picture to each box based on where it is in the square
    addBackgroundPicture(piece_to_locate, left_pos, top_pos);
}

function addBackgroundPicture(piece_to_locate, left_pos, top_pos){
    piece_to_locate.style.backgroundImage = "url('background.jpg')";
    piece_to_locate.style.backgroundSize = "400px 400px";
    piece_to_locate.style.backgroundPosition = -left_pos + "px" + " " + -top_pos + "px";
}
    
function moveTileHandler(event) {
    var target = event.target;//target is the piece that triggered event
    //when we shuffle we are going to add a class "moveablepiece"
    //after we shuffled
    if(target.classList.contains("movablepiece")){
        move(target);//swapping is this method
        can_move_or_not(target);//recalculate what can and cannot move
        //check_if_finished();//check to see if the game has completed
    }
    //always call to can_move_or_not 
    //because the square may have moved
    //and there would be different possible squares
    can_move_or_not(target);
    check_if_finished();
}

function move(tile){
    //take the piece and change its style attributes
    //basically, the tile passed is going to be the blank tile
    //and the tile that is blank will get the title attribute's

    var filled_piece_top = tile.style.top;
    var filled_piece_left = tile.style.left;

    //use the original empty square to swap ... square 16
    //put the piece to swap in the last position
    //last position would be 300px x 300px --> see the requirement doc
    tile.style.left = empty_square.left;
    tile.style.top = empty_square.top;

    //put the empty square, that is, the blank one where the filled one just came from
    empty_square.top = filled_piece_top;
    empty_square.left = filled_piece_left;
}

function check_if_finished(){
   var i;
    for(i = 0; i < individual_pieces.length; i++){
        //get the actual values of the borders for each div
        var actual_top = individual_pieces[i].style.top;
        var actual_left = individual_pieces[i].style.left;

        //get the expected values per square
        var expected_top = Math.floor(i/4) * 100;
        var expected_left = 100 * (i % 4);

        //if at any time the actual and expected values for both left and top don't equal each other
        //then break and i will be less than 15, subsequently not alerting th user they won
        if((parseInt(actual_left) !== expected_left) || (parseInt(actual_top) !== expected_top)){
           break;
        }
    }
    //iterated thru each div and they are in order
    if(i==individual_pieces.length) alert("You Won!!")
}

function can_move_or_not(piece){
    //in order to calculate if a piece is movable,
    //check to see where it is in relation to the empty square

    //add the class "moveablepiece" if it can be moved
    //var total_square = document.querySelectorAll("#puzzleare div");
    individual_pieces.forEach(function(piece){
        piece.classList.remove("movablepiece");

        var possible_piece_top = parseInt(piece.style.top);
        var possible_piece_left = parseInt(piece.style.left);

        var empty_piece_top = parseInt(empty_square.top);
        var empty_piece_left = parseInt(empty_square.left);

        //first find the possible pieces that can move along the y-axis
        //the left_pos should not change but the top should be +100 or -100

        var top_difference = Math.abs(possible_piece_top - empty_piece_top);
        var left_difference = Math.abs(possible_piece_left - empty_piece_left);

        if((possible_piece_left === empty_piece_left && top_difference === 100
            ) || (possible_piece_top === empty_piece_top && left_difference === 100)){
            piece.classList.add("movablepiece");
        }    
    });
}

}