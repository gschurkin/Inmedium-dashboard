<?php 

function getCounter($result)
{
    $counter = 1;

    foreach ($result['monitors'] as $monitor) 
    {
        if ($monitor["status"] == 8 || $monitor["status"] == 9) {
            $counter = $counter + 1;
        }
    }

    return $counter;
}

?>