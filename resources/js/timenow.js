let timeSite = document.getElementById('currentTime');

setInterval(function () {
    let currentTime = new Date();
    timeSite.innerHTML = currentTime.toLocaleString({dateStyle: 'medium', timeStyle: 'short'});
}) ;

