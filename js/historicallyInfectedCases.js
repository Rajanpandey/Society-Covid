var buildings = {}
var rowhouse = {}
var activeHotspots = []
var max = 0;
for (var i = 0; i < casesArr.length; i++) {
    var loc = casesArr[i]['loc'].match(/\d+/)[0];
    var caseDate = new Date(casesArr[i]['date']);
    var daydiff = parseInt((today - caseDate) / (1000 * 60 * 60 * 24), 10);
    if (casesArr[i]['loc'][0] == 'A') {
        loc = 'A' + casesArr[i]['loc'].match(/\d+/)[0];
        if (buildings[loc] == undefined) {
            buildings[loc] = 1;
        } else {
            buildings[loc] += parseInt(casesArr[i]['count']);
        }
        max = Math.max(max, buildings[loc]);
        if (daydiff < 14) {
            activeHotspots.push(loc);
        }
    } else {
        loc = 'RH' + casesArr[i]['loc'].match(/\d+/)[0];
        rowhouse[loc] = parseInt(casesArr[i]['count']);
        if (daydiff < 14) {
            activeHotspots.push(loc);
        }
    }
}
keys = Object.keys(buildings);
for (var i = 0; i < keys.length; i++) {
    var key = keys[i];
    element = document.getElementById(key)
    element.style.height = (buildings[key] * 100 / max)+"%";
    element.innerHTML = key + "<br/>" + buildings[key] + " cases";
}
keys = Object.keys(rowhouse);
for (var i = 0; i < keys.length; i++) {
    var key = keys[i];
    element = document.getElementById(key)
    element.style.height = 100+"%";
    element.innerHTML = key;
}

for (var i = 0; i < activeHotspots.length; i++) {
    document.getElementById(activeHotspots[i]).classList.add("progress-bar-animated");
}
