function showEventPast(){
    var oldEvents = document.querySelectorAll("even old-even");

    for (var oldEvent in oldEvents) {
        oldEvent.style.display = 'block';
    }
}