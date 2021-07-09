<html>
<head>
    <meta charset="utf-8">
    <title>Submit to T24</title>
<!--  Contains the header CSS -->
<?php include("includes/headerCSS.php"); ?>

</head>


<body>
	<div class="container">
		 <form  method="POST" action="api/v1/getDetails.php">

					 	<div>
					 		<label>T24 Web Server IP: </label>
					 		<input type="" name="IP_address" value="localhost">
					 	</div>
					 	
					 	<div>
					 		<label>T24 Web Server Port: </label>
					 		<input type="" name="Port_number" value="8085">
					 	</div>
						
							<hr>


					 	<div>
					 		<label>Application: </label>
					 		<input type="" name="Application">
					 	</div>
					 	
					 	<div>
					 		<label>Version: </label>
					 		<input type="" name="Version">
					 	</div>

					 	<div>
					 		<label>Function: </label>
					 		<input type="" name="Function">
					 	</div>

					 	<div>
					 		<label>Process Type: </label>
					 		<input type="" name="ProcessType" value="PROCESS">
					 	</div>
						
					 	<div>
					 		GTS Control : 
					 		<input type="" name="T24_TransactionID">
					 	</div>
						
						<div>
					 		<label>Number of Authorisers: </label>
					 		<input type="" name="No_of_Auth">
					 	</div>
					 	
					 	<div>
					 		<label>OFS Action: </label>
					 		<input type="" name="OFSAction">
					 	</div>
						

						<hr>
					 	


					 	<div>
					 		<label>Username: </label>
					 		<input type="" name="Username" value="INPUTT">
					 	</div>

					 	<div>
					 		<label>Password: </label>
					 		<input type="password" name="Password" value="123456">
					 	</div>
						

						<hr>

					 	<div>
					 		 <label>Company Code: </label> 
					 		 <input type="" name="CompanyCode">
					 	</div>

					 	<div>
					 		 <label>T24 Record ID: </label> 
					 		 <input type="" name="T24_TransactionID">
					 	</div>

					 	<div>
					 		<label>Message ID</label> 
					 		<input type="" name="MessageID">
					 	</div>

					 	<div>
					 		<label>Message Data</label>
					 		<textarea name="MessageDATA"></textarea>
					 	</div>
						
						<input type="submit" name="submit" value="Submit to Temenos Transact (T24)">

		 </form>



		<br>
		<pre>

		$T24_Application = "CUSTOMER";
		$T24_VersionName = "";
		$T24_Function = "S"; // S, I ,D, H , V ,R - can't do C -COpy and P - PRint ? or PASTE
		$T24_ProcessType = "PROCESS"; // OR VALIDATE
		$T24_GTS_CONTROL = "1";  // blank or null ,1,2,3,4  >> FOR error handling either reject errors and accept overrides // or store in NAU that is IHLD
		$T24_No_of_Authorisers = "0";
		$T24_OFSAction = "1"; // For AA or one [1] for REPLACEMENT
		$T24_username = "INPUTT";
		$T24_password = "123456";
		$T24_CompanyCode = ""; //GH0010001
		$T24_TransactionID = "190097";
		$T24_MessageID = "";
		$T24_MessageDATA = "MNEMONIC:1:1=TONY99,SHORT.NAME:1:1=TONY ,SHORT.NAME:2:1=ANTHONY,NAME.1:1:1=Tony Stark,NAME.2:1:1=Tony Stark,STREET:1:1=OXFORD II STREER,STREET:2:1=WALL STREET,ADDRESS:1:1=ADUM NEYORK,ADDRESS:1:2=DOMEe,ADDRESS:2:1=ADiM 2,ADDRESS:3:1=ADUM 3,SECTOR:1:1=1100,ACCOUNT.OFFICER:1:1=1,INDUSTRY:1:1=1007,TARGET:1:1=1,NATIONALITY:1:1=AG,CUSTOMER.STATUS:1:1=1,RESIDENCE:1:1=GH,LANGUAGE:1:1=1,TITLE:1:1=Alhaji,GIVEN.NAMES:1:1=Tony,FAMILY.NAME:1:1=Stark,GENDER:1:1=MALE";

</pre>

</div>
</body>

</html>