<?php

//define DB constants
if (strpos($_SERVER['HTTP_HOST'], 'localhost:') !== false) {
       //use soft connnection for constant names:capital letters + '_'
        define('DB_NAME', getenv('DB_NAME'));
        define('DB_USER', getenv('DB_USER'));
        define('DB_PASSWORD', getenv('DB_PASSWORD'));
        define('DB_HOST', getenv('DB_HOST'));
} else { 

    define('DB_HOST', 'ipiluwig.mysql.db.internal');
        define('DB_NAME', 'ipiluwig_cw');
        define('DB_USER', 'ipiluwig_04');
        define('PASSWORD', 'Opport2021');

}
     


        //switch tracing on/off
       define('TRACE_DB_ACCESS', false);


        /**
         * creates or reuses a single PDO object.
         */
        function DBConnection(){
            //reuse single connection object if already available.
            //if (isset($_dbconnection)) return $_dbconnection;
        

        //PHP data objects extension (PDO)
        //htps://www.php.net/manual/de/book.pdo.php
        $connection = new PDO(
            'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8',
             DB_USER,
             DB_PASSWORD
            );

        return $connection;
        }

        function introductionDataFromDB($quizID){

            // build query object: select all items from table "Question"
            // '*' stands for 'all items' 
            $query  = DBConnection() -> prepare("SELECT * FROM introduction WHERE quizID = ?");
            $query -> bindValue(1, $quizID); //results/issues "SELECT + FROM introduction WHERE quizID =1"
            $query -> execute();


            //fetch the introduction's record (whole row) as assoc array
            $introduction = $query -> fetch(PDO::FETCH_ASSOC);

            if(TRACE_DB_ACCESS){
                
                echo '<p> ------------------------------------- </p>'; //echo separator line
            }

            
            
            return $introduction;
        }

        function questionDataFromDB($quizID, $questionID){
            if (TRACE_DB_ACCESS) print "<h1>question DATA</h1>";

            // build query object: select all items from table "Question"
            // '*' stands for 'all items' 
            $query  = DBConnection() -> prepare("SELECT * FROM bestiaryQuiz WHERE quizID = ? AND ID = ?");
            $query -> bindValue(1, $quizID);
            $query -> bindValue(2, $questionID);
            $query -> execute();


            //fetch the question's record (whole row) as assoc array
            $data = $query -> fetch(PDO::FETCH_ASSOC);

            //associate the answers to the other question Data
            $data['bestiaryQuizansw'] = answerDataFromDB($questionID);

            if (TRACE_DB_ACCESS) {
                
                echo '<p> -------------------------------------- </p>';
            }
            
            
            return $data;
        }

        function answerDataFromDB($questionID){
            //if (TRACE_DB_ACCESS) print "<h1>ANSWER DATA</h1>";

        //prepare, bind and execute SELECT statement
        $query = DBConnection() -> prepare("SELECT text , isCorrect FROM bestiaryQuizansw WHERE questionID = ?");
        $query -> bindValue(1, $questionID);
        $query -> execute();
        
        //fetsch all answers
        $answers = $query -> fetchALL(PDO::FETCH_ASSOC);

        
        
        

        return $answers;
        }
        
        function questionNumbers($quizID) {
            //print "<h1>REPORT DATA</h1>";
            //var_dump($quizID);
        
            //Prepare, bind, execute SELECT statement
            $query =  DBConnection() -> prepare("SELECT ID FROM bestiaryQuiz WHERE quizID = ?");
            $query -> bindValue(1, $quizID);
            $query -> execute();
        
            $questionIds = $query -> fetchAll(PDO::FETCH_ASSOC);
            //print_r($questionIds);
        
            return $questionIds;
        
        }
        
        function reportDataFromDB($quizID){
            
            //Prepare, bind, execute SELECT statement
            $query =  DBConnection() -> prepare("SELECT * FROM report WHERE quizID = ?");
            $query -> bindValue(1, $quizID);
            $query -> execute();
        
            $report = $query -> fetch(PDO::FETCH_ASSOC);
            //print_r($report);
        
            return $report;
        }
?>