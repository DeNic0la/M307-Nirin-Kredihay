<?php

class HomeController
{
    public function show()
    {
        $DoneCount = Loan::getDoneCount();
        $RunningCount = count(Loan::getAll());
        require './app/Views/home.view.php';
    }
}