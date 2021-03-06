var data
var text
var chosen

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    text = ev.target.innerHTML;
    ev.dataTransfer.setData("text", ev.target.id);
}

function selectText(item) {
    data = new Array(2);
    data[0] = $(item).attr("id");
    chosen = item;
}

function drop(ev) {
    if (chosen.draggable) {
        ev.preventDefault();
        var content = text.split(" ");
        var element;
        if (content.length > 4) {
            var changed = content[0] + " " + content[1] + " " + content[2] + " ..." + "<br />";
            console.log(content[0]);
            console.log(content[1]);
            console.log(content[2]);
            element = ev.dataTransfer.getData("text");
            var nodeCopy = document.getElementById(element).cloneNode(true);
            nodeCopy.id += " last in " + data[1];
            nodeCopy.innerHTML = changed;
            ev.target.appendChild(nodeCopy);
            $(chosen).css('opacity','0.5');
            chosen.setAttribute('draggable', false);
        } else {
            element = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(element));
            var temp = document.getElementById(element).id.split(" ");
            document.getElementById(element).id = temp[0] + " last in box " + data[1];
        }
    }
}

function selectBox(item) {
    if (data[1] == null) {
        data[1] = $(item).attr("id");
        console.log(data[0]);
        console.log(data[1]);
        //var url = "experiment.php?text_id=" + data[0] + "&box_id=" + data[1];
        $.ajax({
            url: 'experiment.php',
            type: 'POST',
            data: {
                'text_id': data[0],
                'box_id': data[1]
            },
            success: function (response) {
                //alert(response)
            },
            error: function(xhr, textStatus, error){
                //console.log(xhr.statusText);
                //console.log(textStatus);
                //console.log(error);
            }});
    }
}

function dropBack(ev) {
    var id = data[0].substr(0, data[0].indexOf(' '));
    $(document.getElementById(id)).css('opacity','1.0');
    document.getElementById(id).setAttribute('draggable', true);
    data[1] = 0;
    console.log(data[0]);
    console.log(data[1]);
    //var url = "experiment.php?text_id=" + data[0] + "&box_id=" + data[1];
    $.ajax({
        url: 'experiment.php',
        type: 'POST',
        data: {
            'text_id': data[0],
            'box_id': data[1]
        },
        success: function (response) {
            //alert(response)
        },
        error: function(xhr, textStatus, error){
            //console.log(xhr.statusText);
            //console.log(textStatus);
            //console.log(error);
        }});
}

/*var data
var text
var chosen

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    text = ev.target.innerHTML;
    ev.dataTransfer.setData("text", ev.target.id);
}

function selectText(item) {
    data = new Array(2);
    data[0] = $(item).attr("id");
    chosen = item;
}

function drop(ev) {
    if (chosen.draggable) {
        ev.preventDefault();
        var content = text.split(" ");
        var element;
        if (content.length > 4) {
            var changed = content[0] + " " + content[1] + " " + content[2] + " ..." + "<br />";
            element = ev.dataTransfer.getData("text");
            var nodeCopy = document.getElementById(element).cloneNode(true);
            nodeCopy.id += " last in " + data[1];
            nodeCopy.innerHTML = changed;
            ev.target.appendChild(nodeCopy);
            $(chosen).css('opacity','0.5');
            chosen.setAttribute('draggable', false);
        } else {
            element = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(element));
            var temp = document.getElementById(element).id.split(" ");
            document.getElementById(element).id = temp[0] + " last in box " + data[1];
        }
    }
}

function selectBox(item) {
    if (data[1] == null) {
        data[1] = $(item).attr("id");
        console.log(data[0]);
        console.log(data[1]);
        //var url = "experiment.php?text_id=" + data[0] + "&box_id=" + data[1];


        $.ajax({
            url: 'experiment.php',
            type: 'POST',
            data: {
                'text_id': data[0],
                'box_id': data[1]
            },
            success: function (response) {
                //alert(response)
            },
            error: function(xhr, textStatus, error){
                //console.log(xhr.statusText);
                //console.log(textStatus);
                //console.log(error);
            }});


    }
}

function dropBack(ev) {
    var id = data[0].substr(0, data[0].indexOf(' '));
    $(document.getElementById(id)).css('opacity','1.0');
    document.getElementById(id).setAttribute('draggable', true);
    data[1] = 0;
    console.log(data[0]);
    console.log(data[1]);
    var url = "experiment.php?text_id=" + data[0] + "&box_id=" + data[1];
    $.ajax({
        method: "GET",
        url: url,
        success: function (data) {
            console.log(data);
        },
        error: function (error) {
            console.log(error);
        }
    }, "json");
}

/*var data
var text
var chosen

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    text = ev.target.innerHTML;
    ev.dataTransfer.setData("text", ev.target.id);
}

function selectText(item) {
    data = new Array(2);
    data[0] = $(item).attr("id");
    chosen = item;
}

function drop(ev) {
    if (chosen.draggable) {
        ev.preventDefault();
        var content = text.split(" ");
        var element;
        if (content.length > 4) {
            var changed = content[0] + " " + content[1] + " " + content[2] + " ..." + "<br />";
            element = ev.dataTransfer.getData("text");
            var nodeCopy = document.getElementById(element).cloneNode(true);
            nodeCopy.id += " last in " + data[1];
            nodeCopy.innerHTML = changed;
            ev.target.appendChild(nodeCopy);
            $(chosen).css('opacity','0.5');
            chosen.setAttribute('draggable', false);
        } else {
            element = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(element));
            var temp = document.getElementById(element).id.split(" ");
            document.getElementById(element).id = temp[0] + " last in box " + data[1];
        }
    }
}

function selectBox(item) {
    if (data[1] == null) {
        data[1] = $(item).attr("id");
        console.log(data[0]);
        console.log(data[1]);
        //var url = "experiment.php?text_id=" + data[0] + "&box_id=" + data[1];
        $.ajax({
            url: 'experiment.php',
            type: 'POST',
            data: {
                'text_id': data[0],
                'box_id': data[1]
            },
            success: function (response) {
                //alert(response)
            },
            error: function(xhr, textStatus, error){
                //console.log(xhr.statusText);
                //console.log(textStatus);
                //console.log(error);
            }});
    }
}

function drop(ev) {
    if (chosen.draggable) {
        ev.preventDefault();
        var content = text.split(" ");
        var element;
        if (content.length > 4) {
            var changed = content[0] + " " + content[1] + " " + content[2] + " ..." + "<br />";
            console.log(content[0]);
            console.log(content[1]);
            console.log(content[2]);
            element = ev.dataTransfer.getData("text");
            var nodeCopy = document.getElementById(element).cloneNode(true);
            nodeCopy.id += " last in " + data[1];
            nodeCopy.innerHTML = changed;
            ev.target.appendChild(nodeCopy);
            $(chosen).css('opacity','0.5');
            chosen.setAttribute('draggable', false);
        } else {
            element = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(element));
            var temp = document.getElementById(element).id.split(" ");
            document.getElementById(element).id = temp[0] + " last in box " + data[1];
        }
    }
}
*/