<?php

function qchris_data() {
    return array(
        'introduction' => qchris_introductionData(),
        'questions' => qchris_questionData(),
        'report' => qchris_reportData()
    );
}

function qchris_introductionData() {
    return array(
        'title' => "My First Quiz",
        'description' => "Just do it ...",
        'imageURL' => "/quizCaro/images/bild.jpg",
        'nextAction' => 'question.php',
        'questionID' => 'q0'
    );
}

function qchris_questionData() {
    return array(
        'q0' => qchris_q0(),
        'q1' => qchris_q1(),
        'q2' => qchris_q2(),
        'q3' => qchris_q3(),
        'q4' => qchris_q4()
    );
}

function qchris_q0() {
    return array(
        'text' => "What is the largest animal on earth?",
        'answers' => array(
            array("Elephant", 0),
            array("Blue Whale", 1),
            array("Giraffe", 0),
            array("None of the above", 0)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q1'
    );
}

function qchris_q1() {
    return array(
        'text' => "What kind of human intervention effectively caused the extinction of the Dodo bird?",
        'answers' => array(
            array("The introduction of domesticated animals and pets", 1),
            array("Overhunting for food", 0),
            array("Pollution of the environment", 0),
            array("All of the above", 0)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q2'
    );
}

function qchris_q2() {
    return array(
        'text' => "What is the Tyrannosaurus Rex's closest living relative today?",
        'answers' => array(
            array("Alligator", 0),
            array("Chicken", 1),
            array("Iguana", 0),
            array("None of the above", 0)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q3'
    );
}

function qchris_q3() {
    return array(
        'text' => "How tall was the talles horse ever recorded, named Sampson?",
        'answers' => array(
            array("21.25 hands/219 cm at the shoulder", 1),
            array("23.75 hands/241.3 cm at the shoulder", 0),
            array("18.75 hands/190.5 cm at the shoulder", 0),
            array("19.80 hands/201.17 cm at the shoulder", 0)
        ),
        'nextAction' => 'question.php',
        'questionID' => 'q4'
    );
}

function qchris_q4() {
    return array(
        'text' => "Which animal lays the largest egg relative to body size?",
        'answers' => array(
            array("Kaiman", 0),
            array("Platypus", 0),
            array("Ostrich", 0),
            array("Kiwi bird", 1)
        ),
        'nextAction' => 'report.php'
    );
}

function qchris_reportData() {
    return array(
        'title' => "Congratulations",
        'text' => "{$feedback}",
        'feedback_40' => "There was an effort, I guess?",
        'feedback_60' => "You did great!",
        'feedback_80' => "Amazing!",
        'imageURL' => "/src/images/well done.jpg"
    );
}

?>