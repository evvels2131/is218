<?php

//phpinfo();

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://www.google.co.in');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
print $result;

$curl = curl_init('http://www.techflirt.com');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
$info = curl_getinfo($curl);
echo '<pre>';
print_r($info);
echo '</pre>';
curl_close($curl);

$curl = curl_init('http://404.techflirt.com');
$result = curl_exec($curl);
if ($result == false)
{
  echo curl_error($curl);
}
curl_close($curl);

?>
