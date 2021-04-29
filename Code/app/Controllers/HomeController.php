<?php

class HomeController
{
    public function show()
    {
        $DoneCount = Loan::getDoneCount() ?? '';
        $RunningCount = Loan::getAll() === null ? '0':count(Loan::getAll());
        require './app/Views/home.view.php';
    }
}