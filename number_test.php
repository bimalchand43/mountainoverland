<?php


function MyNumber(){
    $number = "2069-05-12";
    //echo "";
    $len = strlen($number);
    $msg = "Given Number is : <b>$number </b><br />";
    for($i=0;$i<$len;$i++){
       //echo $number[$i]." - ";
       $msg.= engtounicodenepali($number[$i]);
    }
    //$msg .= "Number in word is : $msg ";
    return $msg;
}


function engtounicodenepali($no){
    //echo $no." ffff ";
    switch($no){
        case "-": $myno = "-"; break;
        case 0: $myno = "०"; break;
        case 1: $myno = "१"; break;
        case 2: $myno = "२"; break;
        case 3: $myno = "३"; break;
        case 4: $myno = "४"; break;
        case 5: $myno = "५"; break;
        case 6: $myno = "६"; break;
        case 7: $myno = "७"; break;
        case 8: $myno = "८"; break;
        case 9: $myno = "९"; break;
        default: $myno = $no;
    }
    //echo $myno." ssss ";
    return $myno;
}

$MyWord = MyNumber();

echo  "<br /><br />".$MyWord;

?>
