<?php
 class EditController
 {
     public function show()
     {
         $id = $_GET['id'];

         $loan = Loan::getById($id);

         $CreditPackages = CreditPackage::getAll();

         require './app/Views/edit.view.php';
     }


     public function validate()
     {
         if ($_SERVER['REQUEST_METHOD'] === 'GET'){
             abort(404);
         }
         $Data = validateRequest($_POST,[
             'id' => 'required|integer',
             'prename' => 'required|NoNumber',
             'lastname' => 'required|NoNumber',
             'email' => 'required|email',
             'tel' => 'phone',
             'package' => 'required|integer:1:40',
             'state' => ''
         ]);
         if ($Data['hasErrors']){
             $Errors = $Data['Errors'];
             $OldValues = $Data['Fields'];
             $ShowErrors = true;
             $CreditPackages = CreditPackage::getAll();
             $id = $Data['Validated']['id'] ?? intval($Data['Fields']['id']) ?? abort(404);
             $loan = Loan::getById($id);
             require './app/Views/edit.view.php';
         }
         else{

             $Validated = $Data['Validated'];

             $Loan = Loan::getById($Validated['id']);
             $Loan->prename = $Validated['prename'];
             $Loan->lastname = $Validated['lastname'];
             $Loan->email = $Validated['email'];
             $Loan->phone = $Validated['tel'];
             $Loan->creditPackageId = intval($Validated['package']);
             $Loan->paidback = (bool)$Validated['state'];

             $Loan->update();
             Header("Location: list");
         }
         die();
     }

     public function changeState()
     {
         foreach($_POST as $post)
         {
             $Loan = Loan::getById($post);
             $Loan->paidback = true;
             $Loan->update();
         }

         Header('Location: list');
     }
 }