function getCasesData(t_id) {
    return JSON.parse($.ajax({
        async: false,
        url: 'fetchCases.php',
        type: 'POST',
        data: {t_id: t_id},
        dataType: 'JSON',
        success:function(response) {}
    }).responseText);
}

var t_id = document.getElementById("hiddenTId").value;
var casesArr = getCasesData(t_id);

function drawZones(zoneList) {
  var container = document.getElementById('zone-image-container');

  //  Remove existing circles.
  for (var i = container.children.length - 1; i > 0; i--) {
    container.removeChild(container.children[i]);
  }

  //  Add circles.
  for (var i = 0; i < zoneList.length; i++) {
    var zone = document.createElement('div');
    zone.className = 'zone-circle zone-' + zoneList[i];
    container.appendChild(zone);
  }
}

zones = []
var today = new Date();
for (var i = 0; i < casesArr.length; i++) {
    var caseDate = new Date(casesArr[i]['date']);
    var daydiff = parseInt((today - caseDate) / (1000 * 60 * 60 * 24), 10);
    if (daydiff < 14) {
        loc = casesArr[i]['loc'].match(/\d+/)[0];
        if (casesArr[i]['loc'][0] == 'A') {
            loc = 'A' + casesArr[i]['loc'].match(/\d+/)[0];
            zones.push(loc);
        } else {
            loc = 'RH' + casesArr[i]['loc'].match(/\d+/)[0];
            zones.push(loc);
        }
    }
}
drawZones(zones);
