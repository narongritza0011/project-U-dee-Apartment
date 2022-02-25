<?php

use App\Models\Bill;
use App\Models\Roomer;

function count_cash_no()
{


    $alert_count_cash_no = Bill::where('status', 1)->get()->count();


    return $alert_count_cash_no;
}



function count_cash_success()
{


    $alert_count_cash_success = Bill::where('status', 2)->get()->count();


    return $alert_count_cash_success;
}




function count_livings()
{


    $alert_count_livings = Roomer::where('status', 1)->get()->count();


    return $alert_count_livings;
}




function count_out_livings()
{


    $alert_count_out_livings = Roomer::where('status', 2)->get()->count();


    


    return $alert_count_out_livings;
}


