<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >

    <title>BSBingo | <?php echo $pageTitle ?></title>
    <link href="https://fonts.googleapis.com/css?family=Baloo+Da" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="shortcut icon"  type"image/x-icon href="icon.ico" />

</head>

<body>

    <div id="page-wrap" >
        <div id="header" >
            <h1><a href="/" class="main-header" >bsb</a></h1>
            
            <div id="control" >
                
                <!-- IF Logged in -->
                <p><a href="/logout.php" class="button" >Log Out</a></p>                    
                <!-- TUTAJ POWINNO BYC TEZ a href z Kontem, zarzadzanie kontem dodam potem -->
                
                <!-- IF Logged out -->
                <p><a href="/signup.php" class="button" >Sign Up</a> &nbsp; <a href="/login.php" class="button" >Log in </a></p>
                
                <!-- End of IF Statement -->
            </div>
        </div>
    </div>

</body>

