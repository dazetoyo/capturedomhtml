<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Brasscheck</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--
    <link rel="stylesheet" type="text/css" href="style/style.css" /> -->
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="html2canvas.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas-ie-reapply-styles-fix@1.0.0-rc.5.1/dist/html2canvas.min.js"></script>



</head>

<body id="capture">
    <!--[if lt IE 8]>
    <p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please
    <a href="http://browsehappy.com/">upgrade your browser</a> to improve
    your experience.
</p>
<![endif]-->

<!-- Add your site or application content here -->


<header>
    <div class="text-center">
        <!-- <button class="certbtn" onclick="doCapture();">Capture</button> -->

        <button class="certbtn"  download onclick="doCapture();"> Download your certificate </button>
    </div>

</header>


<main id="my-node">
    <div id="canvas_download" class="container" >
        <div class="row">
            <div class="col justify-content-center d-flex">
                <img class="logo" src="assets/logo.png" alt="Logo" />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <img width="auto" height="auto"
                class="main-image-mobile mb-3em"
                src="assets/50percent_TITEL_01.png"
                alt="50% Completed"
                />
            </div>
        </div>
        <div class="row">
            <div class="col justify-content-center d-flex">
                <p>You're halfway thru the</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1 class="text-center">
                    DailyStoic Habits for Success,

                </h1>
                <h1 class="text-center">

                    Habits For Happiness Challenge.
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col justify-content-center d-flex">
                <img
                class="main-image mb-5em"
                src="assets/50percent_TITEL_02.png"
                alt="50% Completed"
                />

            </div>

        </div>

        <div class="row">
            <div class="col">
                <p class="text-center name-margin">
                    <?php
                    if (!empty($_GET)) {
                        echo $_GET['name'];
                    }
                    ?>
                </p>

                <hr class="separator" />
            </div>
        </div>
        <div class="row">
            <div class="col justify-content-center d-flex">

                <p class="text-center hidemobile showdesktop">
                    Three more weeks to go... can you stick with it?

                </p>


                <p class="text-center hidedesktop ">
                    Three more weeks to go...

                </p>
                <p class="text-center hidedesktop">

                    can you stick with it?
                </p>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <img class="seal" src="assets/seal_01.png" width="400" height="100" alt="" />
            </div>
            <div class="col signature-fix">
                <img
                class="signature-image"
                src="assets/ryan signature.png"
                alt="Signature"
                />
                <hr class="signature-separator" />

                <p class="text-center signature">
                    Ryan Holiday, <br />


                </p>
                <p class="text-center signature">

                    Founder DailyStoic

                </p>


            </div>
        </div>
        <div class="dailystoic-website">
            <a href="https://dailystoic.com" target="_blank"> dailystoic.com </a>
        </div>


    </div>
    <!-- <img id="image"/> -->
</main>



<script>
// A function to convert the required div to image


function doCapture() {
    window.scrollTo(0, 0);

    $(".container").css("boxShadow", "none");

    html2canvas(document.getElementById("my-node")).then(function (canvas) {

        // Create an AJAX object
        var ajax = new XMLHttpRequest();

        // Setting method, server file name, and asynchronous
        ajax.open("POST", "save-capture.php", true);

        // Setting headers for POST method
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        // Sending image data to server
        ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));

        // Receiving response from server
        // This function will be called multiple times
        ajax.onreadystatechange = function () {

            // Check when the requested is completed
            if (this.readyState == 4 && this.status == 200) {

                // Displaying response from server
                console.log(this.responseText);
                var g = document.createElement('div');
                g.id = 'hiddenId';
                document.body.appendChild(g)
                document.getElementById("hiddenId").innerHTML = this.responseText;
                document.getElementById("downloadimg").click();
                var string =  document.getElementById("downloadimg").getAttribute("href"); // sec/IF00.html
                console.log(string);
                var slug = string.split('=').pop();
                console.log(slug);
                var dynamichref = document.createElement('a');
                dynamichref.href="delete.php?img="+slug;
                setTimeout(function(){     dynamichref.click();
                }, 3000);
                console.log(dynamichref);
            }
        };
        $(".container").css("boxShadow", "inset 0 0 25px 10px grey");

    });

}
</script>




<script type="text/javascript">

function doDownload() {

    doCapture();

    // <!--[if IE]-->
    // var xhr = new XMLHttpRequest();
    // xhr.open('GET', 'generated-images/certificate.jpeg', true);
    // xhr.responseType = 'blob';
    // xhr.onload = function(e) {
    //     if (this.status == 200) {
    //         var myBlob = this.response;
    //         console.log(myBlob);
    //         window.navigator.msSaveBlob(myBlob, 'certificate.jpeg'); // The user only has the option of clicking the Save button.
    //         // myBlob is now the blob that the object URL pointed to.
    //     }
    // };
    // xhr.send();
    // <!--[endif]-->


}



</script>

<style media="screen">
@font-face {
    font-family: "Minion Pro";
    src: url("https://db.onlinewebfonts.com/t/6dce067bd237090c3f61701876cad74c.eot");
    src: url("https://db.onlinewebfonts.com/t/6dce067bd237090c3f61701876cad74c.eot?#iefix")
    format("embedded-opentype"),
    url("https://db.onlinewebfonts.com/t/6dce067bd237090c3f61701876cad74c.woff2")
    format("woff2"),
    url("https://db.onlinewebfonts.com/t/6dce067bd237090c3f61701876cad74c.woff")
    format("woff"),
    url("https://db.onlinewebfonts.com/t/6dce067bd237090c3f61701876cad74c.ttf")
    format("truetype"),
    url("https://db.onlinewebfonts.com/t/6dce067bd237090c3f61701876cad74c.svg#Minion Pro")
    format("svg");
}

@font-face {
    font-family: "StonePrintW00SC-SmbdSC";
    src: url("https://db.onlinewebfonts.com/t/858132b0ee6775b50baa3fb2e5d0e9ea.eot");
    src: url("https://db.onlinewebfonts.com/t/858132b0ee6775b50baa3fb2e5d0e9ea.eot?#iefix")
    format("embedded-opentype"),
    url("https://db.onlinewebfonts.com/t/858132b0ee6775b50baa3fb2e5d0e9ea.woff2")
    format("woff2"),
    url("https://db.onlinewebfonts.com/t/858132b0ee6775b50baa3fb2e5d0e9ea.woff")
    format("woff"),
    url("https://db.onlinewebfonts.com/t/858132b0ee6775b50baa3fb2e5d0e9ea.ttf")
    format("truetype"),
    url("https://db.onlinewebfonts.com/t/858132b0ee6775b50baa3fb2e5d0e9ea.svg#StonePrintW00SC-SmbdSC")
    format("svg");
}

html {
    overflow-x: hidden;
    font-size: 1em;
}
body {
    margin: 0;
}
.container {
    border: 15px solid #2f4881;
    -moz-box-shadow: inset 0 0 25px 10px grey;
    -webkit-box-shadow: inset 0 0 25px 10px grey;
    box-shadow: inset 0 0 25px 10px grey;
    border-bottom: 0;
    margin: auto;
    position: relative;
    z-index: 2;
    background: #f3fbfd;
    max-width: 1080px;
}
.container:after {
    content: "";
    border: 2px solid #2f4881;
    height: calc(100% - 65px);
    width: calc(100% - 17px);
    position: absolute;
    top: 7px;
    left: 7px;
    z-index: -1;
}
/*boot
strap row col*/

.col {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
    flex-direction: column;
    align-items: center;
}

.row {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
.d-flex {
    display: flex;
}
.justify-content-center {
    justify-content: center;
}
p {
    margin: 0;
    font-size: 2.1em;
    font-family: "Minion Pro";
}
img {
    width: 100%;
    height: auto;
    display: block;
}
h1 {
    font-family: "StonePrintW00SC-SmbdSC";
    font-size: 3em;
    margin-bottom: 0px;
    margin-top: 5px;
}

hr {
    border: solid 1px #000;
}

/* spacing */
.logo {
    width: 700px;
    /* filter: invert(22%) sepia(97%) saturate(514%) hue-rotate(186deg)
    brightness(91%) contrast(88%); */
    margin: 2.65em 0 2em 0;
}

.logo-completion {
    width: 500px;
    filter: invert(22%) sepia(97%) saturate(514%) hue-rotate(186deg)
    brightness(91%) contrast(88%);
    margin: 2em 0 0.8em 0;
}

.main-image {
    max-width: 957px;
}

.main-image-mobile {
    max-width: 450px;
    margin: auto;
}
.main-image.negative-bottom-margin {
    padding: 0 50px;
}

.mb-5em {
    margin-bottom: 5.5em;
}
.mb-3em {
    margin-bottom: 3.5em;
}
.negative-bottom-margin {
    margin-bottom: -3.5em;
}

.separator {
    max-width: 700px;
    margin: 15px auto;
}
.dailystoic-website {
    font-size: 1.5em;
    background: #2f4881;
    padding: 10px 0;
    text-align: center;
    width: 100%;
}

.text-center {
    text-align: center;
}

.seal {
    max-width: 270px;
    margin: auto;
    margin-left: 2.2em;
    margin-bottom: 2.2em;
    margin-top: 2.2em;
}

.signature {
    font-size: 1.5em;
}

.signature-image {
    max-width: 190px;
    margin: auto;
    margin-top: 2.4em;
}
.signature-separator {
    max-width: 250px;
}

.dailystoic-website > a {
    color: #bcd9e9;
    text-decoration: none;
}
.certbtn{
    background: #f3fbfd;
    border: 3px solid #2f4881;
    padding: 3px 25px;
    font-size: 1.5em;
    cursor:pointer;
    margin-top:25px;
    margin-bottom: 25px;
}
#hiddenId,
#hiddenidd{
    display:none;
}
/*
####################################################
M E D I A  Q U E R I E S
####################################################
*/

/*
::::::::::::::::::::::::::::::::::::::::::::::::::::
Bootstrap 4 reversed breakpoints
*/
/* extra Large devices  */
@media (max-width: 1200px) {
    html {
        font-size: 0.8em;
    }

    .container {
        max-width: 850px;
    }
    .main-image {
        max-width: 90%;
    }
    .logo,
    .logo-completion {
        max-width: 60%;
    }
    .separator {
        max-width: 60%;
    }
    .seal {
        max-width: 45%;
    }
    .signature-image {
        max-width: 30%;
    }
}

/* Large devices  */
@media (max-width: 992px) {
    html {
        font-size: 0.7em;
    }
    .negative-bottom-margin {
        margin-bottom: -2em;
    }

    .container {
        max-width: 700px;
    }
    .main-image {
        max-width: 80%;
    }
    .logo,
    .logo-completion {
        max-width: 50%;
    }
    .separator {
        max-width: 50%;
    }
    .seal {
        max-width: 35%;
    }
    .signature-image {
        max-width: 20%;
    }
    .signature-separator {
        max-width: 30%;
    }
}

/* Medium devices  */
@media (max-width: 768px) {
    html {
        font-size: 0.7em;
    }
    .container {
        max-width: 550px;
    }
    .main-image {
        display: none;
    }
    .logo,
    .logo-completion {
        max-width: 400px;
    }

    .seal {
        max-width: 170px;
    }
    .signature-image {
        max-width: 100px;
    }
    .separator {
        max-width: 70%;
        margin: 0px auto 55px auto;
    }
    .signature-separator {
        max-width: 140px;
    }
    .hidemobile {
        display: none;
    }


    .name-margin {
        margin-top:60px;
        margin-bottom:10px;
    }

    h1{
        padding: 0 15px;
    }
    /* h1 > span {
    font-size: 1.4em;
    } */
}

/* Small devices  */
@media (max-width: 576px) {
    html {
        font-size: 0.6em;
    }
    .main-image-mobile {
        max-width: 300px;
    }
    .logo,
    .logo-completion {
        max-width: 280px;
    }
}

/* extra small devices */
@media (max-width: 450px) {
    html {
        font-size: 0.6em;
    }
    .main-image-mobile {
        max-width: 200px;
    }
    .logo,
    .logo-completion {
        max-width: 150px;
    }
    .separator {
        max-width: 200px;
    }
    .seal {
        max-width: 110px;
    }
    .signature-image {
        max-width: 60px;
    }
    .signature-separator {
        max-width: 100px;
    }

    .container:after {
        height: calc(100% - 55px);
    }
}

/* extra extra Small devices */
@media (max-width: 350px) {
    html {
        font-size: 0.5em;
    }
}

/*
::::::::::::::::::::::::::::::::::::::::::::::::::::
Custom media queries
*/

@media (min-width: 769px) {
    .main-image-mobile {
        display: none;
    }

    .signature-fix {
        margin-right: -60px;
    }
    .showdesktop{
        display:block;
    }
    .hidedesktop{
        display:none;
    }
}

</style>
</body>
</html>
