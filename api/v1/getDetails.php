<?php 
header("Content-Type:application/json");

// get T24 server IP and port number
$IP = $_POST["IP_address"];
$PORT = $_POST["Port_number"];

//get request values
$T24_Application = $_POST["Application"];
$T24_VersionName = $_POST["Version"];
$T24_Function = $_POST["Function"];// S, I ,D, H , V ,R - can't do C -COpy and P - PRint ? or PASTE
$T24_ProcessType = $_POST["ProcessType"];// OR VALIDATE
$T24_GTS_CONTROL =  $_POST["GTS_Control"];  // blank or null ,1,2,3,4  >> FOR error handling either reject errors and accept overrides // or store in NAU that is IHLD
$T24_No_of_Authorisers =  $_POST["No_of_Auth"];
$T24_OFSAction = $_POST["OFSAction"]; // For AA or one [1] for REPLACEMENT or UPDATING an existing Record
$T24_username = $_POST["Username"];
$T24_password = $_POST["Password"];
$T24_CompanyCode = $_POST["CompanyCode"]; //GH0010001
$T24_TransactionID = $_POST["T24_TransactionID"];
$T24_MessageID = $_POST["MessageID"];
$T24_MessageDATA =  $_POST["MessageDATA"];

//store 3rd party generated ID in a local ref

$OFS_Transaction_REQUEST_STRING = "$T24_Application,$T24_VersionName/$T24_Function/$T24_ProcessType/$T24_GTS_CONTROL/$T24_No_of_Authorisers/$T24_OFSAction,$T24_username/$T24_password/$T24_CompanyCode,$T24_TransactionID/$T24_MessageID,$T24_MessageDATA";


// raw OFS request
echo "Raw OFS request :".$OFS_Transaction_REQUEST_STRING;
echo "<br>";

//encode spaces in the strings to be sent 
$OFS_Transaction_REQUEST_STRING = urlencode($OFS_Transaction_REQUEST_STRING);


echo "<br>";
echo $OFS_Transaction_REQUEST_STRING;

echo "<br>";

$T24_OFS_BROWSER_URL = "http://$IP:$PORT/TAFJServices/services/OFSService/Invoke?Request=$OFS_Transaction_REQUEST_STRING";

$response = file_get_contents("$T24_OFS_BROWSER_URL");	


// example of OFS string
//CUSTOMER,CUSTOMERVERSION/S/PROCESS/1/2,INPUTT/12345/GH01001,TRANSACTION_ID
echo "Request: ".$T24_OFS_BROWSER_URL;


// echo "Response: ".$response;
echo "<br>";

$FormattedResponse = explode("=", $response);


//commas in the field values has to be handled eg. ADDRESS:1:1=ACCRA,GHANA,NAME:1:1=MEREDITH
// print_r($FormattedResponse);
echo "<br>";




$arraylength = count($FormattedResponse) ;
$theFields = array();
$theValues = array();



echo "<br>";

// loop through the formatted response
for ($i=3; $i < $arraylength; $i++) { 
		
		//$FormattedResponse[$i];
		//find the last occurence of the ","
		$commaPosition = strrpos($FormattedResponse[$i], ",");

		//then split the array into two

		$valueResponse = substr($FormattedResponse[$i], 0, $commaPosition);
		//$valueResponse = $field_value[0];
		$theValues[] = $valueResponse;

		
		//get the starting point of the comma position by StringLength - Comma Position and read from the back
		$commaPosition = strlen($FormattedResponse[$i]) - $commaPosition - 1;

		//to get the Field , move one step forware (+1) to skip the ","
		$FieldResponse = substr($FormattedResponse[$i],  -1 * ($commaPosition) );

		//convert the : to _ in the fields
		$FieldResponse = str_replace(":", "_", $FieldResponse);

		//finally convert the . to double underscore __ in the fields
		$FieldResponse = str_replace(".", "__", $FieldResponse);

		// echo $FieldResponse = $field_value[1];
		$theFields[] = $FieldResponse;

		
		//to get the last value element
		//theres a default 0 response attached to the last value element
		//remove it
		//because we start the loop from the 3rd index to get the last index subtract 4 from arraylength
		if ($i == ($arraylength - 1)) {
			//theres a default 0 response attached to the last value element
			//remove it
			$theValues[] = $FormattedResponse[$arraylength - 1];
		}


}



// now update the associative array
//remove the xml in response values

echo "<br>";
// echo "The values 70:".$theValues[-4];
echo "<br>";
// remove the last element
$theFields = array_splice($theFields, 0, -1);
// print_r($theFields);

//start from array index 1
// $newFields = array_splice($theFields, 1);

echo "<br>";

// print_r($theValues);
echo "<br>";
// echo "<br> VALUES >>";
//start from array index 1
$newValues = array_splice($theValues, 1);
//replace the last element with the last but 2 element 
$newValues[count($newValues) - 2] = $newValues[count($newValues) - 1];
//REMOVE the last element 
// To-do 69 characters of xml trailing
$newValues = array_splice($newValues, 0, -1);
// print_r($newValues);

//associative array for the field and values
$field_value_pairs = array();

//then populate an associative array with the FIELD or KEY - VALUE pairs
$theFields_count = count($theFields);
// echo "the fields $theFields_count";

for ($i=0; $i < $theFields_count  ; $i++) { 
	
	//eg (MNEMONIC_1_1 => SSARPONG1)
	$field_value_pairs[$theFields[$i]] = $newValues[$i];

}




$T24_response = json_encode($field_value_pairs);

echo "<pre>".$T24_response."</pre>";


 ?>