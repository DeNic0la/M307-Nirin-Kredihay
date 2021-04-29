<?php

class ListController
{
    public function show()
    {
        $loans = Loan::getAll();

        uasort($loans,function ($a,$b){
            //Return 1 if A First, -1 if B First
            if (strtotime($a->getExpirationDate()) > strtotime($b->getExpirationDate())) {
                return -1;
            }
            if (strtotime($a->getExpirationDate()) < strtotime($b->getExpirationDate())){
                return 1;
            }
            if (strtotime($a->startdate) > strtotime($b->startdate)){
                return -1;
            }
            if (strtotime($a->startdate) < strtotime($b->startdate)){
                return 1;
            }
            return 0;

        });

        require './app/Views/list.view.php';

    }

    public function get_status($loan):string
    {

        $Date = $loan->startdate;

        $Days = $loan->rate * 15;

        $Rate_Date = date('Y-m-d', strtotime($Date . ' + ' . $Days . ' days'));

        if (strtotime($Rate_Date) < strtotime("today")) {
            return "bolt";
        } elseif (strtotime($Rate_Date) < strtotime("today")) {
            return "bolt";
        } else {
            return "light_mode";
        }
    }

    public function getExpirityDate($loan):string
    {
        $Date = $loan->startdate;

        $Days = $loan->rate * 15;

        return date('Y-m-d', strtotime($Date . ' + ' . $Days . ' days'));
    }
}
