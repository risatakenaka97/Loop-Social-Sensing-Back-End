<html lang="en">
<head>
    <meta charset="utf-8">
    <!--    <link rel="icon" href="/favicon.ico" />-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#000000">
    <meta name="description" content="Web site created using create-react-app">
    <meta name="viewport" content="minimum-scale=1, initial-scale=1, width=device-width">
    <!--    <link rel="apple-touch-icon" href="" />-->

    <title>Social Loop</title>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">
    <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
</head>
<body>
<div id="root">
    <i class="fa fa-bars fa-3x burger">
    </i>
    <div class="header">
        <i class="fa fa-times fa-3x cross" aria-hidden="true">
        </i>
        <div class="sub-header">
            <a href="#">
                <div class="sub-header-link">Loop</div>
            </a>
        </div>
        <div class="sub-header">
            <a href="#products">
                <div class="sub-header-link">Products</div>
            </a>
        </div>
        <div class="sub-header">
            <a href="#pricing">
                <div class="sub-header-link">Pricing</div>
            </a>
        </div>
        <div class="sub-header">
            <a href="http://localhost:3000/sign-up" target="_blank">
                <button class="header-button">Sign Up</button>
            </a>
        </div>
        <div class="sub-header">
            <a href="http://localhost:3000/sign-in" target="_blank">
                <button style="background-color: rgb(3, 155, 229); color: white;">Sign
                    In
                </button>
            </a>
        </div>
    </div>
    <div>
        <div class="page-wrapper first-block"><h3>Connecting Police Departments <br>With
                Realtime Community Feedback.
            </h3>
            <h3>Providing Transparency to the Community.</h3></div>
        <div class="page-wrapper">
            <div class="content-wrapper">
                <h3>Stay Updated On Community Pulse.</h3>
                <p>Access Realtime Feedback from the General Public and Partnered
                    Community Groups. Visualized For Easy
                    Review and For Informing an Action-Oriented-Plan.</p>
            </div>
            <div class="button-wrapper">
                <button>Learn More</button>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content-wrapper">
                <h3>A platform to give feedback quickly.</h3>
                <p>Fill out a quick form to give feedback, and see what the rest of the
                    community is saying about your
                    local law enforcement.</p>
            </div>
            <div class="button-wrapper">
                <button>Learn More</button>
            </div>
        </div>
        <div class="page-wrapper">
            <div class="content-wrapper">
                <h3>Transparency, for both parties.</h3>
                <p>Police departments receive feedback, and community members gain insight
                    on officers perceptions on
                    feedback.</p>
            </div>
            <div class="button-wrapper">
                <button>Learn More</button>
            </div>
        </div>
    </div>
</div>
<script src="{{url('/js/index.js')}}"></script>
</body>
</html>
