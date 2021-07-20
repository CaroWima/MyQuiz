<?php
        include '../config.php';


    // Get quiz data
    //$quizData = qchris_data();

    // Get the ID of the question from the post object
    // Get the question data for the given ID
    if (isset($_POST['nextQuestionID'])) {
        $questionID = $_POST['nextQuestionID'];
        $pageData = questionDataFromDB ($_SESSION ['quizID'], $questionID);
    }


    
    // Session object: Update number of achieved points
    // var_dump($_POST);
    //$_SESSION['achievedPoints'] = $_SESSION['achievedPoints'] + $_POST['radio'];
    if (isset($_POST['radio'])){
        $_SESSION['achievedPoints'] = $_SESSION['achievedPoints'] + $_POST['radio'];
    }
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
                <span class="border">
                <?php
                    echo '<a href="/src/index.php">' . $pageData['text'] . '</a>'; 
                ?>
                </span>
                
                <form action="<?php echo $pageData['nextAction']; ?>" method="post">
                    <div class="choice">
                        <input type="radio" id="answer0" name="radio" 
                            value="<?php echo $pageData['bestiaryQuizansw'][0]['isCorrect']; ?>">
                        <label for="answer0"><?php echo $pageData['bestiaryQuizansw'][0]['text']; ?></label><br>
                    </div>

                    <div class="choice">
                        <input type="radio" id="answer1" name="radio" 
                            value="<?php echo $pageData['bestiaryQuizansw'][1]['isCorrect']; ?>">
                        <label for="answer1"><?php echo $pageData['bestiaryQuizansw'][1]['text']; ?></label><br>
                    </div>

                    <div class="choice">
                        <input type="radio" id="answer2" name="radio" 
                            value="<?php echo $pageData['bestiaryQuizansw'][2]['isCorrect']; ?>">
                        <label for="answer2"><?php echo $pageData['bestiaryQuizansw'][2]['text']; ?></label><br>
                    </div>

                    <div class="choice">
                        <input type="radio" id="answer2" name="radio" 
                            value="<?php echo $pageData['bestiaryQuizansw'][3]['isCorrect']; ?>">
                        <label for="answer3"><?php echo $pageData['bestiaryQuizansw'][3]['text']; ?></label><br><br>
                    </div> 
                    
                    <button type="hidden" id="submit" name="nextQuestionID" 
                        value="<?php if (isset ($pageData['nextQuestionID'])) echo $pageData['nextQuestionID']; ?>">
                            <h2>Continue</h2>
                        <label type="submit" value="NEXT">
                    </button>
                </form>

                       
                </div>
            </div>
        </div>
    </div>
</body>

</html>