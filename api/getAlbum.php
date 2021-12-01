<?php

include_once "../components/php/variables.php";
$filteredResponse = [];
if (count($_GET) > 0) {
    foreach ($cdResponse["response"] as $cd) {
        $toInsert = true;
        foreach ($_GET as $filterKey => $filterValue) {
            // var_dump($cdResponse);
            //     var_dump($cd);
            if (isset($cd[$filterKey]) && $cd[$filterKey] != $filterValue) {
                $toInsert = false;
            }
        }
        if ($toInsert) {
            $filteredResponse[] = $cd;
        }
    }
} else {
    $filteredResponse = $cdResponse["response"];
}

// $new_array = array_filter($cdResponse["response"], function ($obj) {

//     $toReturn = true;
//     foreach ($_GET as $key => $value) {

//         if ($value != "") {

//             if (is_array($obj)) {

//                 foreach ($obj as $field => $cd) {

//                     if ($field == $key) {
//                         if ($cd != $value) {
//                             $toReturn = false;
//                         };
//                     }
//                 }
//             }
//         }
//     }
//     return $toReturn;
// });
$cdResponse["response"] = $filteredResponse;
header('Content-Type: application/json');
echo json_encode($cdResponse);
