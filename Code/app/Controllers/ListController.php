<?php

class ListController
{
    public function show()
    {
        $loans = Loan::getAll();
        if ($loans !== null){
        uasort($loans,function ($a,$b){
            if (strtotime($a->startdate) > strtotime($b->startdate)){
                return 1;
            }
            if (strtotime($a->startdate) < strtotime($b->startdate)){
                return -1;
            }
            return 0;

        });
        }
        require './app/Views/list.view.php';

    }

    public function getStatus($loan):string
    {
        $ExpirationDate = $loan->getExpirationDate();

        if (strtotime($ExpirationDate) < strtotime("today")) {
            return "bolt";
        } else {
            return "light_mode";
        }
    }

    public function getExpirityDate($loan):string
    {
        return $loan->getExpirationDate();
    }

    public function state()
    {

    }
}
