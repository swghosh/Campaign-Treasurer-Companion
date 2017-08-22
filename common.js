// common script, javascript code that is to be executed on all pages
var updateTime = function() {
    var hiddenTimeDiv = document.querySelector('div.hidden.time');
    var smallTime = document.querySelector('small.time');
    if(hiddenTimeDiv !== null && smallTime !== null) {
        smallTime.innerHTML = hiddenTimeDiv.innerHTML; 
    }
};
updateTime();