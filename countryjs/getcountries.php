<?php
/**
 * Get country
 * input XML file - counties.xml
 * @author Prajyot Khandeparkar
 * @param 
 * @return countries json array 
 */ 
$xmlDoc = new DOMDocument();
$xmlDoc->load('xml/countries.xml');
$countries = $xmlDoc->getElementsByTagName('COUNTRY');
$countries_arr = array();

for($i=0; $i < $countries->length; $i++) {

    array_push($countries_arr, $countries->item($i)->childNodes->item(1)->nodeValue);
}
echo json_encode($countries_arr);