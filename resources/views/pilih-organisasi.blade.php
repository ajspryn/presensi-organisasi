<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pilih Organisasi</title>

    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="color-theme-blue mont-font">

    <div class="preloader"></div>


    <div class="main-wrapper">
        <!-- main content -->
        <div class="main-content pt-0 bg-white ps-0 pe-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 text-center default-page vh-100 align-items-center d-flex">
                        <div class="card border-0 text-center d-block p-0">
                            <img src="images/bg-43.png" alt="icon" class="w200 mb-4 ms-auto me-auto pt-md-5">
                            <h1 class="fw-700 text-grey-900 display3-size display4-md-size">Oops! It looks like you're lost.</h1>
                            <p class="text-grey-500 font-xsss">The page you're looking for isn't available. Try to search again or use the go to.</p>
                            <a href="index.html" class="p-3 w175 bg-current text-white d-inline-block text-center fw-600 font-xssss rounded-3 text-uppercase ls-3">Home Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content -->
    </div>



    <script src="js/plugin.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/scripts.js"></script>

    <script>
        $(function() {

            $('.timer').countdown('2021/6/31', function(event) {
                var $this = $(this).html(event.strftime(''
                    // + '<span>%w</span> weeks '
                    +
                    '<div class="time-count"><span class="text-time">%d</span> <span class="text-day">Day</span></div> ' +
                    '<div class="time-count"><span class="text-time">%H</span> <span class="text-day">Hours</span> </div> ' +
                    '<div class="time-count"><span class="text-time">%M</span> <span class="text-day">Min</span> </div> ' +
                    '<div class="time-count"><span class="text-time">%S</span> <span class="text-day">Sec</span> </div> '));
            });
        });
    </script>

</body>

</html>
