<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Introduction</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/quizCaro/css/main.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    </head>

    <body>
    <?php
    // Preset path to include folder 
    //echo $_SERVER['DOCUMENT_ROOT'];
    set_include_path($_SERVER['DOCUMENT_ROOT'] . '/quizCaro/config.php');

    // Page includes
    //include 'auth.php';
?>
    <div class="bgimg-1">
        <div class="content">
            <div class="caption">
                <span id="title" class="border">
                    <?php 
                    // write hyperlink with GET parameters
                        echo '<a href="/quizCaro/structures/introduction.php?qid=1">The Bestiary Quiz</a>'; 
                    ?>
                </span>
            </div>
        </div>
    </div>
</body>

</html>