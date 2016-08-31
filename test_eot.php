<?php

$id = "COSTAM";

$sql = <<<EOT
SELECT e.EventNazwa as Nazwa, e.EventStart as Start, e.EventEnd as Koniec, u.UserName as User 
FROM Events e, Events_Rozdanie b, Rozdanie r, Users u 
WHERE e.ID_Event = $id
AND e.ID_Event = b.ID_Event AND b.ID_Rozdanie = r.ID_Rozdanie AND r.UserID = u.UserID
EOT;

echo $sql;

?>
