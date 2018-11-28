

var btnShowPastEvent = document.getElementById("btnShowPasteEvents")

btnShowPastEvent.addEventListener("click", function(e){
    let events = document.getElementsByClassName("old-even");

    var i;
    for (i = 0; i < events.length; i++) {
        if(events[i].style.display === ""){
            events[i].style.display = "block";
        }
        else{
            events[i].style.display = "";
        }
    }
});