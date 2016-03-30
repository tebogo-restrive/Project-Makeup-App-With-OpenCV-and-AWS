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

    <!-- Capture phote -->
    <script>
        // Put event listeners into place
        window.addEventListener("DOMContentLoaded", function () {
            // Grab elements, create settings, etc.
            var canvas = document.getElementById("canvas"),
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
            else if (navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia(videoObj)
                .then (function (stream) {
                    video.src = window.URL.createObjectURL(stream);
                    video.play();
                }).catch(errback);
            }

            //Triger camera
            document.getElementById("snap").addEventListener("click", function () {
                context.drawImage(video, 0, 0, 320, 240);
            });
        }, false);


    </script>

</head>



<body>

    <!-- Navigation -->
    <?php require 'nav.php';?>


    <!-- core -->
    <header  class="header">
    <div class="container" id="top">
        <div class="row">
            <!-- Capturing photo -->
            <div class="col-md-4 text-center">
                <video id="video" width="320" height="240" autoplay><p id="video1"></p></video>
                <button id="snap" class="btn3d btn-warning btn-lg">Snap Photo</button><br><br><br>
                <canvas id="canvas" width="320" height="240"></canvas>
            </div>

            <!-- Color picker -->
            <div class="col-md-4 text-center">
            </div>

            <!-- API -->
            <div class="col-md-4 text-center">
            </div>
        </div>
    </div>
    </header>


    <!-- Portfolio -->
    <?php require 'portfolio.php';?>

    <!-- Contact-->
    <?php require 'contact.php';?>


<!-------------------------------------------------------------------------------------->

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

    <!-- camera -->
    




</body>

</html>
