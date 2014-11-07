<?php
/**
 * Get states based on COUNTRY
 * input XML file - counties.xml
 * @author Prajyot Khandeparkar
 * @param country
 * @return states json array 
 */
$country = $_GET['country'];
$xmlDoc = new DOMDocument();
$xmlDoc->load('xml/countries.xml');
$states = $xmlDoc->getElementsByTagName('STATES');

$states_array = array();
for($i=0; $i < $states->length; $i++) {

    if ( (string)$states->item($i)->parentNode->childNodes->item(1)->nodeValue == (string)$country) {
        for ($y=0; $y < $states->item($i)->childNodes->length; $y++) { 
            if ( ($y % 2) != 0) {
                array_push($states_array,  $states->item($i)->childNodes->item($y)->nodeValue);
            }
        }
    }
}
echo json_encode($states_array);