<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
       .carousel-inner > .item > img,
       .carousel-inner > .item > a > img {
         width: 30%;
         margin: auto;
       }
    </style>

	<!-- Page title -->
    <title>Facial Effect</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
	<!-- JQuery -->
    <script type="text/Javascript" src="js/jquery.js"></script>
    <script type="text/Javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

</head>


<body>

    <!-- Navigation -->
    <?php require 'nav.php';?>


    <!-- core -->
    <header  class="header">
    <div class="text-vertical-center">
    <div class="container" id="top">
        <div class="row">
            <!-- Capturing photo -->
            <div class="col-md-4 text-center">
                <video id="video" width="320" height="240" autoplay><p id="video1"></p></video>
                <button id="snap" class="btn3d btn-warning btn-lg">Snap Photo</button><br><br><br>
                <canvas id="Canvas" width="320" height="240"></canvas>
                <button id="UpLoad" class="btn3d btn-info btn-lg">Upload</button>
            </div>

            <!-- Color picker -->
            <div class="col-md-4 text-center">
                <button  class="btn3d btn-success btn-lg" id="r1">r1</button>
                <button  class="btn3d btn-success btn-lg" id="r2">r2</button>
                <br>
                <br>
                <div id="ajax"><img src="img/faceempty.png" alt="void"></img></div>
                
                
            </div>

            <!-- API -->
            <div class="col-md-4 text-center">
            </div>
        </div>
    </div>
    </div>
    </header>


    <!-- Portfolio -->
    <?php require 'portfolio.php';?>

    <!-- Contact-->
    <?php require 'contact.php';?>




<!---------------------------------Jquery/ajax script---------------------------------->

    <!-- Capture photo -->
    <script>
        // Put event listeners into place
        window.addEventListener("DOMContentLoaded", function () {
            // Grab elements, create settings, etc.
            var canvas = document.getElementById("Canvas"),
                context = canvas.getContext("2d"),
                video = document.querySelector('video'),
                videoObj = { "video": true },
                errBack = function (error) {
                    console.log("Video capture error: ", error.code);
                };

            // Put video listeners into place
            if (navigator.getUserMedia) { // Standard
                navigator.getUserMedia(videoObj, function (stream) {
                    video.src = stream;
                    video.play();
                }, errBack);
            } else if (navigator.webkitGetUserMedia) { // WebKit-prefixed
                navigator.webkitGetUserMedia(videoObj, function (stream) {
                    video.src = window.webkitURL.createObjectURL(stream);
                    video.play();
                }, errBack);
            }
            else if (navigator.mozGetUserMedia) { // Firefox-prefixed
                navigator.mozGetUserMedia(videoObj, function (stream) {
                    video.src = window.URL.createObjectURL(stream);
                    video.play();
                }, errBack);
            }

            //Triger camera
            document.getElementById("snap").addEventListener("click", function () {
                context.drawImage(video, 0, 0, 320, 240);
            })
        }, false);


    </script>

    <!-- Upload Photo -->
    <script>
        $(document).ready(function () {
            $("#UpLoad").click(function () { // trick by a button
                var canVas = $('#Canvas')[0];
                var dataURL = canVas.toDataURL();
                $.ajax({
                    type: "POST",
                    url: 'savePicture.php',
                    data: { 
                        imgBase64: dataURL
                    },
                    cache: false,
                    success: function (data) {
                        console.log("success");
                        console.log(data);
                    },
                    error: function (data) {
                        console.log("error");
                        console.log(data);
                    }
                });
            });
        });
    </script>

    <!-- Facial processing -->
    <script>
        $(document).ready(function () {
            $("#r1").click(function () {
                $.ajax({
                    type: "POST",
                    url: 'rotate.php',
                    data: { action: 'r1' },
                    success: function (data) {
                        console.log("success");
                        console.log(data);
                    },
                    error: function (data) {
                        console.log("error");
                        console.log(data);
                    }
                });
                window.setTimeout($("#ajax").html('<img src="pythonImg/facer1.jpeg" style="height: 240px;width: 320px;"></img>'), 1000);

            });
            $("#r2").click(function () {
                $.ajax({
                    type: "POST",
                    url: 'rotate.php',
                    data: { action: 'r2' },
                    success: function (data) {
                        console.log("success");
                        console.log(data);
                    },
                    error: function (data) {
                        console.log("error");
                        console.log(data);
                    }
                });
                window.setTimeout($("#ajax").html('<img src="pythonImg/facer2.jpeg" style="height: 240px;width: 320px;"></img>'), 1000);
            });
        })

    </script>

    

    <!--$("#ajax").html('<img src="pythonImg/facer1.jpg" style="height: 240px;width: 320x;"></img>');-->

<!---------------------------------WebPage script------------------------------------------>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

</body>

</html>
