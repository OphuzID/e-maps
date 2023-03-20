<?php 
        foreach ($Data->getResultArray() as $row){
        $location[] = $row['Latitude'].",".$row['Logitude'].",'".$row['NameLocation'].",".$row['Provinsi']."'";
        }
        print_r(json_encode($location));
    ?>