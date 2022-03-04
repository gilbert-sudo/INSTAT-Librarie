<?php
include 'secure_access.php';
include '../php/connexion.php';

$reqresp = $bdd->prepare("SELECT * FROM carousel");
$reqresp->execute();
$carousel = $reqresp->fetchAll();
$count = count($carousel);
?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Snippet - BBBootstrap</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap");

        body {
            background-color: #d6d2d2;
            font-family: "Poppins", sans-serif;
            font-weight: 300
        }

        .card {
            border: none;
            border-radius: 10px
        }

        .percent {
            padding: 5px;
            background-color: red;
            border-radius: 5px;
            color: #fff;
            font-size: 14px;
            height: 35px;
            width: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer
        }

        .wishlist {
            height: 40px;
            width: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            background-color: #eee;
            padding: 10px;
            cursor: pointer
        }

        .img-container {
            position: relative
        }

        .img-container .first {
            position: absolute;
            width: 100%
        }

        .img-container img {
            border-top-left-radius: 5px;
            border-top-right-radius: 5px
        }

        .product-detail-container {
            padding: 10px
        }

        .ratings i {
            color: #a9a6a6
        }

        .ratings span {
            color: #a9a6a6
        }

        label.radio {
            cursor: pointer
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }

        label.radio span {
            height: 25px;
            width: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px solid #dc3545;
            color: #dc3545;
            font-size: 10px;
            border-radius: 50%;
            text-transform: uppercase
        }

        label.radio input:checked+span {
            border-color: #dc3545;
            background-color: #dc3545;
            color: #fff
        }
    </style>
    <style>
        #myImg {

            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }


        #myImg2 {

            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg2:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
</head>

<body oncontextmenu='return false' class='snippet-body'>
    <div class="container-fluid mt-3 mb-3">
        <div class="row g-2">
            <?php foreach ($carousel as $photo) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="img-container">
                            <div class="d-flex justify-content-between align-items-center p-2 first"> <span class="wishlist"><i onclick="delFromCarousel(<?= $photo['id'] ?>);" class="fa fa-trash"></i></span>
                            </div><img id="myImg" src="../images/carousel/<?= $photo['img'] ?>" class="img-fluid">
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($count == 0) { ?>
                <div class="alert alert-primary alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fa fa-frown-o"></i> Aucune photo!</h5>
                   Veuillez d'abord ajouter des photos.
                </div>
            <?php } ?>
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img id="modal-img" class="modal-content" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQS2ol73JZj6-IqypxPZXYS3rRiPwKteoD8vezk9QsRdkjt3jEn&usqp=CAU">
                <div id="caption"></div>
            </div>
        </div>
        <!-- Button trigger modal -->

    </div>
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src=''></script>
    <script type='text/javascript'>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        // var img = document.getElementById("myImg");
        var modalImg = document.getElementById("modal-img");
        var captionText = document.getElementById("caption");
        // img.onclick = function(){
        //   modal.style.display = "block";
        //   modalImg.src = this.src;
        //   captionText.innerHTML = this.alt;
        // }


        document.addEventListener("click", (e) => {
            const elem = e.target;
            if (elem.id === "myImg") {
                modal.style.display = "block";
                modalImg.src = elem.dataset.biggerSrc || elem.src;
                captionText.innerHTML = "INSTAT Madagascar";
            }
        })

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
    <script>
        function delFromCarousel(id) {
            location.href = "../php/delFromCarousel.php?id=" + id;
        }
    </script>
</body>

</html>