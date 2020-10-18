<?php 
    function calculate($data){
        $takencourse=[];
        $takencoursescore=[];
        $takencoursecredit=[];
        $takencoursegpa=[];

        $result=[];
        $lines= explode("\n",$data);
        for($i=0;$i<count($lines);$i++){
            $col = explode("\t", $lines[$i]);
            if($col[0]=='Items'){
                continue;
            }
            if ($col[0] == '筆') {
                continue;
            }
            if(count($col)===13){
                if(strlen($col[7])!=0 && $col[7]!='W'){
                    try{
                        $score= floatval($col[7]);
                    }
                    catch(Exception $e){
                        $score=0;
                    }
                    $coursename= $col[4];
                    $credit= floatval(explode(".", $col[6])[0]);
                    $alphabet= $col[8];
                    $takencourse[]= $coursename;
                    $takencoursescore[]= $score;
                    $takencoursecredit[]= $credit;
                    $takencoursegpa[]= gpa($alphabet);
                }
            }
        }
        $totalscore=0.0;
        $totalgpa= 0.0;
        $totalcredit=0.0;
        for($i=0;$i<count($takencourse);$i++){
            $totalscore= $totalscore+ $takencoursescore[$i]*$takencoursecredit[$i];
            $totalgpa= $totalgpa+ $takencoursegpa[$i]*$takencoursecredit[$i];
            $totalcredit= $totalcredit+$takencoursecredit[$i];
        }
        $avgscore= round($totalscore/$totalcredit,2);
        $avggpa= round($totalgpa/$totalcredit,2);
        
        $result[]= $totalcredit;
        $result[]= $avgscore;
        $result[]= $avggpa;

        return $result;
    }

    function gpa($data){
        if($data == 'A+'){
            return 4.3;
        }
        elseif ($data=='A') {
            return 4;
        }
        elseif ($data== 'A-') {
            return 3.7;
        }
        elseif ($data=='B+') {
            return 3.3;
        }
        elseif ($data=='B') {
            return 3;
        }
        elseif ($data=='B-') {
            return 2.7;
        }
        elseif ($data=='C+') {
            return 2.3;
        }
        elseif ($data=='C') {
            return 2.0;
        }
        elseif ($data=='C-') {
            return 1.7;
        }
        elseif ($data=='D') {
            return 1.0;
        }
        elseif ($data=='E') {
            return 0;
        }
        else{
            return 0;
        }
    }
?>