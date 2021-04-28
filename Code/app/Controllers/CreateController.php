<?php
 class CreateController
 {
     function show()
     {
         $CreditPackages = CreditPackage::getAll();
         $ShowErrors = false;
         require './app/Views/create.view.php';
     }
     public function validate(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET'){
            abort(404);
        }
        $Data = validateRequest($_POST,[
            'prename' => 'required|NoNumber',
            'lastname' => 'required|NoNumber',
            'email' => 'required|email',
            'tel' => 'phone',
            'rate' => 'required|integer:1:10',
            'package' => 'required|integer:1:40',
        ]);
        if ($Data['hasErrors']){
            $Errors = $Data['Errors'];
            $OldValues = $Data['Fields'];
            $ShowErrors = true;
            $CreditPackages = CreditPackage::getAll();
            require './app/Views/create.view.php';
        }
        else{
            $Validated = $Data['Validated'];
            $CreatedLoan = new Loan($Validated['prename'],$Validated['lastname'],$Validated['email'],$Validated['rate'],$Validated['package']);
            $CreatedLoan->phone = $Validated['tel'];
            $CreatedLoan->save();

            Header("Location: /list");
        }
        var_dump($Data);
        die();
     }
 }