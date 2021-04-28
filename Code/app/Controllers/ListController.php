<?php

class ListController
{
    public function show()
    {
        $loans = Loan::getAll();

        require './app/Views/list.view.php';

    }

    public function get_status($loan):string
    {

        $Date = $loan->startdate;

        $Days = $loan->rate * 15;

        $Rate_Date = date('Y-m-d', strtotime($Date . ' + ' . $Days . ' days'));

        if (strtotime($Rate_Date) < strtotime("today")) {
            return "light_mode";
        } elseif (strtotime($Rate_Date) < strtotime("today")) {
            return "light_mode";
        } else {
            return "bolt";
        }

    }
}
