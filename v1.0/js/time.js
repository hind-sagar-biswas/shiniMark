//CONSTANTS

//SELECTORS

//FUNCTIONS
function setTime(target) {
    const d = new Date();
    var time = d.getTime();

    target.value = time;
}
//FUNCTION CALL

setTime(time);