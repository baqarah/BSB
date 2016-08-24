<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >

    <title>BSBingo | <?php echo $pageTitle ?></title>
    <link href="https://fonts.googleapis.com/css?family=Baloo+Da" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/style.css" />
    <link rel="shortcut icon"  type"image/x-icon href="/icon.ico" />

</head>

<body>

    <div id="page-wrap" >
        <div id="header" >

            <div id="control" >
                <p>
                    <a href="/" class="ikonka left" >bsb</a>
                    
                    <?php if ($_SESSION['LoggedIn'] == 1) { ?>
                        <a href="/logout.php" class="button right" >Log Out</a>                    
                    <?php } else { ?>
                        <a href="/signup.php" class="button right" >Sign Up</a> &nbsp; <a href="/login.php" class="button right" >Log in </a>
                    <?php } ?>

                </p>
            </div>
        </div>
