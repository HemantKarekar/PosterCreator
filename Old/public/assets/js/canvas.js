var posterCanvas = {
    background: document.getElementById("posterBg"),
    image: document.getElementById("companyBrand"),
    text: document.getElementById("addText")
    /* heading: document.getElementById("postHeading"),
    title: document.getElementById("postTitle"),
    description: document.getElementById("postDescription"),
    doctor: {
        name: document.getElementById("doctorName"),
        image: document.getElementById("doctorImg"),
        message: document.getElementById("postMessage")
    } */
};

var brandings = {
    brand1: "../images/brands/brand1.png",
    brand2: "../images/brands/brand2.png",
    brand3: "../images/brands/brand3.png",
    brand4: "../images/brands/brand4.png",
    brand5: "../images/brands/brand5.png",
    brand6: "../images/brands/brand6.png",
}

var hcanvas = document.getElementById('preview');
var editable = {
    height: hcanvas.height - 30,
    width: hcanvas.width - 30,
}

//INIT Canvas
var canvas = new fabric.Canvas('preview', {
    preserveObjectStacking: true
});
canvas.selection = false;
canvas.backgroundColor = "white";

/* SET CANVAS DIMENSIONS 
 iRM.addEventListener("change", () => {
    if (iRM.checked) {
        cW.disabled = true;
    } else {
        maintainRatio = false;
        cW.disabled = false;
    }
});

cH.addEventListener("change", () => {


    if (iRM.checked) {
        maintainRatio = true;
        console.log("checked");
        cW.value = parseInt(cH.value) / 1.562;

    }
    canvas.setHeight(parseInt(cH.value));
    canvas.setWidth(parseInt(cW.value));
    canvas.calcOffset();
});

cW.addEventListener("input", () => {
    canvas.setHeight(parseInt(cH.value));
    canvas.setWidth(parseInt(cW.value));
    canvas.calcOffset();
}); */


/* DELETE SELECTED ELEMENT */
$('html').keydown(function (e) {
    if (e.keyCode == 46) {
        canvas.remove(canvas.getActiveObject());
    }
});

var bgPanel = document.getElementById("createBg");
var drImg = document.getElementById("doctorImg");

var str = window.location.href.split("?")[1];
if (str == '' || str === undefined) {
    canvas.setHeight(1000);
    canvas.setWidth(640);
} else {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    var url = "assets/images/templates/edit/" + urlParams.get('template');
    console.log(url);
    fabric.Image.fromURL(url, function (t_img) {
        t_img.set({
            transparentCorners: false,
            cornerColor: 'white',
            cornerStrokeColor: 'black',
            borderColor: 'black',
            cornerSize: 20,
            padding: 5,
            cornerStyle: 'circle',
            top: 0,
            left: 0,
        });
        canvas.add(t_img);
        canvas.renderAll();
        canvas.setHeight(t_img.height);
        canvas.setWidth(t_img.width);
        cW.value = canvas.width;
        cH.value = canvas.height;
        e.target = null;
    });
}

/* ADD IMAGE */
var URL = window.webkitURL || window.URL;
posterCanvas.image.addEventListener('change', placeImg, false);
posterCanvas.background.addEventListener('change', placeBg, false);
posterCanvas.text.addEventListener('change', placeText, false);






function placeImg(e) {
    var url = URL.createObjectURL(e.target.files[0]);
    var clip = new fabric.Circle({
        fill: 'white',
        radius: 70,
        left: 436,
        top: 780,
        absolutePositioned: true
    });
    fabric.Image.fromURL(url, function (img) {
        img.clipPath = clip;
        img.scaleToWidth(150);
        img.set({
            transparentCorners: false,
            cornerColor: 'white',
            cornerStrokeColor: 'black',
            borderColor: 'black',
            cornerSize: 20,
            padding: 5,
            cornerStyle: 'circle',
            top: 781,
            left: 436,

        });
        canvas.selection = false;
        canvas.backgroundColor = "white";
        canvas.add(img);
        canvas.renderAll();

        e.target = null;
    });
}

function placeBg(e) {
    var url = URL.createObjectURL(e.target.files[0]);
    fabric.Image.fromURL(url, function (img) {
        if (img.height == 1000 && img.width == 640) {
            img.set({
                transparentCorners: false,
                cornerColor: 'white',
                cornerStrokeColor: 'black',
                borderColor: 'black',
                cornerSize: 20,
                padding: 5,
                cornerStyle: 'circle',
                top: 0,
                left: 0,
            });
            canvas.add(img);
            canvas.renderAll();
        } else {
            alert("Uploaded Image dimensions Should be 640 x 1000 (width x height)")
        }
        canvas.selection = false;
        canvas.backgroundColor = "white";
        e.target = null;
    });
}

/* PLACE TEXT */
var bold = document.getElementById("bold");
var italic = document.getElementById("italic");
var underline = document.getElementById("underline");
var fontSize = document.getElementById("fontSize");
var fontColor = document.getElementById("fontColor");
var fontfamily = document.getElementById("fontFace");
var editor = document.getElementById("fontEditor");

function setTextDecoration(action) {
    var a = action;
    var ao = canvas.getActiveObject();
    var t;
    if (ao) {
        t = ao.get('type');
        if (t == "textbox" || t == "i-text") {
            switch (a) {
                case 'bold':
                    var isBold = dtGetStyle(ao, 'fontWeight') === 'bold';
                    dtSetStyle(ao, 'fontWeight', isBold ? '' : 'bold');
                    break;

                case 'italic':
                    var isItalic = dtGetStyle(ao, 'fontStyle') === 'italic';
                    dtSetStyle(ao, 'fontStyle', isItalic ? '' : 'italic');
                    break;

                case 'underline':
                    var isUnderline = dtGetStyle(ao, 'textDecoration') === 'underline';
                    dtSetStyle(ao, 'textDecoration', isUnderline ? '' : 'underline');
                    break;

            }
            canvas.renderAll();
        }
    }
}

bold.addEventListener("click", () => {
    setTextDecoration('bold');
});
italic.addEventListener("click", () => {
    setTextDecoration('italic');
});
underline.addEventListener("click", () => {
    setTextDecoration('underline');
});
fontSize.addEventListener("change", () => {
    var o = canvas.getActiveObject();
    if (o && (o.get('type') == "textbox" || o.get('type') == "i-text")) {
        o.set("fontSize", fontSize.value);
        canvas.renderAll();
    }
});
fontColor.addEventListener("input", () => {
    var o = canvas.getActiveObject();
    if (o && (o.get('type') == "textbox" || o.get('type') == "i-text")) {
        o.set("fill", fontColor.value);
        canvas.renderAll();
    }
});

function setFontFamily(value) {
    function setTextDecoration(action) {
        var a = action;
        var ao = canvas.getActiveObject();
        var t;
        if (ao) {
            t = ao.get('type');
            if (t == "textbox" || t == "i-text") {
                ao.set("fontFamily", value);
            }
            canvas.renderAll();
        }
    }
}
fontfamily.addEventListener("select", setFontFamily(fontfamily.value));
// Functions
var align = document.getElementById("align");
align.addEventListener("select", () => {
    var ao = canvas.getActiveObject();
    var a = align.value;
    var t;
    if (ao) {
        t = ao.get('type');
        if (t == "textbox" || t == "i-text") {
            switch (a) {
                case 'left':
                    dtSetStyle(ao, 'textAlign', 'left');
                    break;
                case 'right':
                    dtSetStyle(ao, 'textAlign', 'left');
                    break;
                case 'center':
                    dtSetStyle(ao, 'textAlign', 'left');
                    break;
                default:
                    dtSetStyle(ao, 'textAlign', 'left');
                    break;
            }
            canvas.renderAll();
        }
    }
});

function setTextAlignment(action) {
    var a = action;
    var ao = canvas.getActiveObject();
    var t;
    if (ao) {
        t = ao.get('type');
        if (t == "textbox" || t == "i-text") {
            switch (a) {
                case 'bold':
                    var isBold = dtGetStyle(ao, 'fontWeight') === 'bold';
                    dtSetStyle(ao, 'fontWeight', isBold ? '' : 'bold');
                    break;

                case 'italic':
                    var isItalic = dtGetStyle(ao, 'fontStyle') === 'italic';
                    dtSetStyle(ao, 'fontStyle', isItalic ? '' : 'italic');
                    break;

                case 'underline':
                    var isUnderline = dtGetStyle(ao, 'textDecoration') === 'underline';
                    dtSetStyle(ao, 'textDecoration', isUnderline ? '' : 'underline');
                    break;
            }
            canvas.renderAll();
        }
    }
}

// Get the style
function dtGetStyle(object, styleName) {
    return object[styleName];
}

// Set the style
function dtSetStyle(object, styleName, value) {
    object.set(styleName, value);
    canvas.renderAll();
}

function placeText(e) {
    var text = new fabric.Textbox(posterCanvas.text.value, {
        fontSize: 30,
        fontFamily: 'Arial',
        textAlign: align.value,
        left: 211,
        top: 832,
        width: 500,
        transparentCorners: false,
        cornerColor: 'white',
        cornerStrokeColor: 'black',
        borderColor: 'black',
        cornerSize: 20,
        padding: 5,
        cornerStyle: 'circle',
    });
    text.set("width", 300);
    text.set("splitByGrapheme", true);
    console.log("Multiline");
    canvas.add(text);
    posterCanvas.text.value = "";
}

/* DOWNLAOD AS IMAGE */
var downloadbtn = document.getElementById("downloadCanvas");
downloadbtn.addEventListener("click", saveImage, false);

function saveImage(e) {
    this.href = canvas.toDataURL({
        format: 'jpg',
        pixelRatio: 4
    });
    this.download = 'canvas.jpg';
}