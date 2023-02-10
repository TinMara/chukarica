<?php
    function getVisitCounter(){
        return file_get_contents("./php/pages/visit-counter.txt");
      }
      function addVisitCounter(){
        if(!isset($_SESSION['views'])){
          $visit_counter = getVisitCounter() + 1;
          $_SESSION['views']="yes";
          file_put_contents("./php/pages/visit-counter.txt", $visit_counter, LOCK_EX);
        }
      }
      addVisitCounter();
?>