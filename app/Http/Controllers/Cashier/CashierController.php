<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function index(){
        return view('cashier.index');
    }

    public function getTables(){
        $tables =Table::all();
        $html ='';
        foreach($tables as $table){
            $html .='<div class="col-md-2 mb-4">';
            $html .= '<button class="btn btn-primary">
                       <img class="img-fluid" src="/images/table.svg">
                            <br>
                            <span class="badge badge-success">'.$table->name.'</span>
                       </button>';
            $html .='</div>';
        }

        return $html;
    }
}
