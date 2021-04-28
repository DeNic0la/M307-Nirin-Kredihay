<?php

class ListController
{
    public function show()
    {
        $loans = Loan::getAll();
        require './app/Views/list.view.php';
    }
}
