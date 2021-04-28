<?php
 class EditController
 {
     public function show()
     {
         $id = $_GET['id'];

         $loan = Loan::getById($id);

         require './app/Views/edit.view.php';
     }
 }