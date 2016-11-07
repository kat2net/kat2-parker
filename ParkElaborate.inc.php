<?php
$call = kat2APICall('http://intern.kat2.net/api/parker/?domain='.$domain);
$arr = json_decode($call, true);

echo $arr['html'];