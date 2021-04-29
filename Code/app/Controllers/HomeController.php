<?php

class HomeController
{
    public function show()
    {
        require './app/Views/home.view.php';
    }

    public function countExpired():string
    {
        return count(Loan::getExpired());
    }

    public function countOngoing()
    {
        return count(Loan::getAll());
    }
}