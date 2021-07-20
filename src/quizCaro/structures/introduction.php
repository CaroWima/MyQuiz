<?php
    include '../config.php';

    //get quiz id and register it in the session
    if (isset($_GET ['qid'])) {
        $quizID = $_GET['qid'];
    }else{
        $quizID = 1;
    }

    
    // Get quiz data
    //$quizData = qchris_data();
    //$pageData = $quizData['introduction'];

    // Initialize achieved number of points
    $_SESSION['quizID'] = $quizID;

    $pageData = introductionDataFromDB($quizID);

    $_SESSION['achievedPoints'] = 0;

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/quizCaro/css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">


</head>

<body>
    <div class="bgimg-1">
        <div class="content">
            <div class="caption">
                <h1> The Bestiary Quiz </h1>
                <span class="border">
                <?php
                    echo '<a href="/src/index.php">' . $pageData['title'] . '</a>';
                ?>
                <p> I hope you have fun and get curious about mythical creatures along the way. </p>
                <br>
                <p> Please make sure to select an answer before continuing on to the next question.</p>
                </span>

                <form action= "<?php echo $pageData['nextAction']; ?>" method="post">
                    <button type="hidden" name="nextQuestionID" 
                        value="<?php echo $pageData['nextQuestionID']; ?> ">
                        <h2>Begin</h2>
                        <label type="submit" value="START">
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>