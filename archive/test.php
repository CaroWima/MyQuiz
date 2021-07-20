<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>php pdo intro</title>
        <style>
            body {
                font-family: "Arial", sans-serif;
                font-size: larger;
            }

            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
            }
        </style>
    </head>
    <body>
        
        <?php
        //define DB constants
        //use soft connnection for constant names:capital letters + '_'
        define('DB_NAME', getenv('DB_NAME'));
        define('DB_USER', getenv('DB_USER'));
        define('DB_PASSWORD', getenv('DB_PASSWORD'));
        define('DB_HOST', getenv('DB_HOST'));

        //PHP data objects extension (PDO)
        //htps://www.php.net/manual/de/book.pdo.php
        $connection = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
             DB_USER,
             DB_PASSWORD
            );

        //define the quiz to play: Set temporarily as a static var
        $quizID = 1;

        // introduction data
        print "<h1>The Beastiary</h1>";

        // build query object: select all items from table "Question"
        // '*' stands for 'all items' 
        $query  = $connection -> prepare("SELECT * FROM introduction WHERE quizID = ?");
        $query -> bindValue(1, $quizID); //results/issues "SELECT + FROM introduction WHERE quizID =1"
        $query -> execute();


        //fetsch the introduction's record (whole row) as assoc array
        $introduction = $query -> fetch(PDO::FETCH_ASSOC);

        var_dump($introduction);
        echo '<p> ------------------------------------- </p>'; //echo separator line


        //--------------------------------questions--------------------------------------------

        //define the question to play: Set temporarily a static var
        $questionID = 1;

        print "<h1>QUESTION DATA</h1>";

        //prepare, bind and execute SELECT statement
        $query = $connection -> prepare("SELECT  * FROM bestiaryQuiz WHERE quizID = ? AND id = ?");
        $query -> bindValue(1, $quizID);
        $query -> bindValue(2, $questionID);
        $query -> execute();
        
        $question = $query -> fetch(PDO::FETCH_ASSOC);

        var_dump($question);
        echo '<p> ------------------------------------- </p>'; //echo separator line



        //---------------------answers-----------------------

        //define the question to play: Set temporarily a static var
        $answerID = 1;

        print "<h1>ANSWER DATA</h1>";

        //prepare, bind and execute SELECT statement
        $query = $connection -> prepare("SELECT text , IsCorrect FROM bestiaryQuizansw WHERE questionID = ?");
        $query -> bindValue(1, $questionID);
        $query -> execute();
        
        //fetsch all answers
        $answers = $query -> fetchALL(PDO::FETCH_ASSOC);

        var_dump($answers);
        echo '<p> ------------------------------------- </p>'; //echo separator line


        //---------------------report-----------------------

        //define the question to play: Set temporarily a static var
        $reportID = 1;

        print "<h1>Report DATA</h1>";

        //prepare, bind and execute SELECT statement
        $query = $connection -> prepare("SELECT * FROM report WHERE quizID = ?");
        $query -> bindValue(1, $quizID);
        $query -> execute();
        
        //fetsch all answers
        $report = $query -> fetchALL(PDO::FETCH_ASSOC);

        var_dump($report);
        echo '<p> ------------------------------------- </p>'; //echo separator line

        exit;

//-------------------------------------Things---------------------------------------------



        /*//Trace the names of all available DB tables
        //build the query object (support object, has NO data yet)
        $query = $connection->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = '" . DB_NAME . "'");

        //Here we go: fetch all table names
        $tables = $query->fetchAll(PDO::FETCH_COLUMN); //get indexed array of table names
        var_dump($tables);
        echo "length of tables: " . count($tables);

        if (empty($tables)) {
            // When $tables is empty: notify user
            echo '<p class="center">There are no tables in database <code>demo</code>.</p>';
        } else {
            // $tables is available: list the names of the tables of my DB
            echo '<p class="center">Database <code>demo</code> contains the following tables:</p>';
            echo '<ul class="center">';

            // for each table inside the parent table, make a list-item to list them
            foreach ($tables as $tableName) {
                echo "<li>{$tableName}</li>"; // use '{$tableName}' placeholder
            }
            echo '</ul>';
        }*/


        /*$questions = $query -> fetchAll(PDO::FETCH_ASSOC);
        //Loop through the found question data
        foreach($questions as $question) {
            print_r("Question id is " . $question['ID'] . "<br>");

            // prepare subquery that will get all answers, associated with the question $question['ID']
            // the subquery uses a '?' s a placeholder for $question['ID']
            $subQuery = $connection->prepare("SELECT * from bestiaryQuizansw WHERE bestiaryQuizansw.QuestionID = ?");

            // replace the first '?' with the value of $question['ID']
            $subQuery->bindValue(1, $question['ID']);

            //which in the end results the following query string:
            //"SELECT * from Answers WHERE Answers.QuestionID = 1"

            // ...now execute!
            $subQuery->execute();

            // ... and fetch all answer items for $question['ID'] and format them as an associative array
            $answers = $subQuery->fetchAll(PDO::FETCH_ASSOC);
            print_r("Answers are " . var_dump($answers) . "<br>");
            /*
            $question['answers'] = $answers;
            print "<pre/>";*/            
            //print_r($question['answers'][0]);
            
/*
        print "<h1>Example with FETCH_NUM</h1>";

        $query  = $connection->query("SELECT * from Question");
        $questions = $query->fetchAll(PDO::FETCH_NUM);
        foreach($questions as $question) {
            print "<pre/>";            
            print_r($question);
        }    

        print "<h1>Example with FETCH_BOTH</h1>";

        $query  = $connection->query("SELECT * from Question");
        $questions = $query->fetchAll(PDO::FETCH_BOTH);
        foreach($questions as $question) {
            print "<pre/>";            
            print_r($question);
        }            
*/
        ?>
    </body>
</html>