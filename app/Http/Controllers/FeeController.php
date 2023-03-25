<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Feestructure;
use Illuminate\Support\Facades\DB;

class FeeController extends Controller
{
    public function index(){
    
        $student=auth('students')->user();
        $feestructure=DB::table('feestructures')->where('course_id',$student->course->id)->where('year','<=',$student->year)->get();
        $feetransaction=DB::table('feetransactions')->where('student_id',$student->id)->get();
        $totalFees=0;
        $totalPaidFees=0;

        foreach($feestructure as $fee){
            $totalFees=$totalFees+$fee->Full_amount;
        }

        foreach($feetransaction as $fee){
            $totalPaidFees=$totalPaidFees+$fee->Credit_amount;
        }

        $balance=$totalFees-$totalPaidFees;
        
        return view('students.feetransaction',[
            'student'=>$student,
            'balance'=>$balance,

        ]);
    }

    public function show(){
        $student=auth('students')->user();
        $table_heads=['year','semester','fullAmount','50% Deposit','Due Date','First Installment','Due Date','Second Instalment','Due Date'];
        // $year='year';
        // $semester='semester';
        // $fullAmount='fullAmount';
        // $halfDeposit='50% Deposit';
        // $DueDate1='Due Date';
        // $first_installment='First Installment';
        // $DueDate2='DueDe'
        $feestructure=$feestructure=DB::table('feestructures')->where('course_id',$student->course->id)->get();


        return view('students.feestructure',[
            'student'=>$student,
            'feestructure'=>$feestructure,
            'table_heads'=>$table_heads,
        ]);
    }
}
