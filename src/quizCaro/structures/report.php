<?php
    include '../config.php';

    if (isset($_GET ['qid'])) {
        $quizID = $_GET['qid'];
    }else{
        $quizID = 1;
    }

    $_SESSION['quizID'] = $quizID;
 

    // Get quiz data
    //$quizData = ();
    $pageData = reportDataFromDB($quizID);
    $questionNum = questionNumbers($quizID);
   
    // Session object: Update number of achieved points
    // var_dump($_POST);
    if (isset($_POST['radio'])){
        $_SESSION['achievedPoints'] = $_SESSION['achievedPoints'] + $_POST['radio'];
    }
    //print_r ($_SESSION);

    $percent = ($_SESSION['achievedPoints'] / count($questionNum) * 100);
    round($percent);
   // echo $percent . '% <br>';
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
        <div class="content"
            <div class="caption">
                <span class="border">
                <?php
                    echo '<a href="/index.php">' . $pageData['title'] . '</a><br>';
                    echo $pageData['text'] . '<br>';
                
                    if ($percent >= 80) {
                        echo $pageData['feedback_80'];
                    } elseif ($percent >= 60) {
                        echo $pageData['feedback_60'];
                    } elseif ($percent >= 40) {
                        echo $pageData['feedback_40'];
                    }

                    echo '<p>You have answered ' . $_SESSION['achievedPoints'] . ' question(s) correctly.</p>';
                ?>
                </span>
            </div>
        </div>
    </div>
</body>

</html>