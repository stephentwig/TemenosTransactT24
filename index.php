<html>
<head>
    <meta charset="utf-8">
    <title>Submit to T24</title>
<!--  Contains the header CSS -->
<?php include("includes/headerCSS.php"); ?>

</head>


<body>
	<div class="container">
		<div class="alert alert-success" role="alert">
				<h2><b>Bare-bones Temenos T24 RESTful API</b> 

				<a href="https://github.com/stephentwig" class="btn btn-success btn-md" style="float: right;border:#e8fdff59 1px solid ; margin-right: 30px; ">
				<span class="glyphicon glyphicon-plus"></span> Mein Geschenk für dich </a>
				</h2>    

		</div>
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
					 		<input type="" name="Application" placeholder="eg.CUSTOMER , ACCOUNT">
					 	</div>
					 	
					 	<div>
					 		<label>Version: </label>
					 		<input type="" name="Version" placeholder="eg. INPUTT">
					 	</div>

					 	<div>
					 		<label>Function: </label>
					 		<input type="" name="Function" placeholder="eg. S,I,A,R,H">
					 	</div>

					 	<div>
					 		<label>Process Type: </label>
					 		<input type="" name="ProcessType" value="PROCESS" placeholder="eg. VALIDATE">
					 	</div>
						
					 	<div>
					 		GTS Control : 
					 		<input type="" name="GTS_Control" placeholder="eg. 1,2,3,4">
					 	</div>
						
						<div>
					 		<label>Number of Authorisers: </label>
					 		<input type="" name="No_of_Auth" placeholder="eg. 0,1">
					 	</div>
					 	
					 	<div>
					 		<label>OFS Action: </label>
					 		<input type="" name="OFSAction" placeholder="eg. 1 for REPLACEMENT/UPDATE">
					 	</div>
						

						<hr>
					 	


					 	<div>
					 		<label>T24 Username: </label>
					 		<input type="" name="Username" value="INPUTT">
					 	</div>

					 	<div>
					 		<label>T24 Password: </label>
					 		<input type="password" name="Password" value="123456">
					 	</div>
						

						<hr>

					 	<div>
					 		 <label>Company Code: </label> 
					 		 <input type="" name="CompanyCode" placeholder="eg. GB0010001">
					 	</div>

					 	<div>
					 		 <label>T24 Record ID: </label> 
					 		 <input type="" name="T24_TransactionID">
					 	</div>

					 	<div>
					 		<label>Message ID:</label> 
					 		<input type="" name="MessageID" placeholder="eg. MSG-2021-08-07">
					 	</div>

					 	<div>
					 		<label>Message Data:</label>
					 		<textarea name="MessageDATA" placeholder="eg. MNEMONIC:1:1=TONY99,SHORT.NAME:1:1=TONY ,SHORT.NAME:2:1=ANTHONY,NAME.1:1:1=Tony Stark"></textarea>
					 	</div>
						
						<button class="btn btn-primary" name="submit">Submit to Temenos Transact (T24)</button>

		 </form>



		<br>
<!-- 		<pre>

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
		$T24_MessageDATA = "MNEMONIC:1:1=TONY99,SHORT.NAME:1:1=TONY ,SHORT.NAME:2:1=ANTHONY,NAME.1:1:1=Tony Stark,NAME.2:1:1=Tony Stark,STREET:1:1=OXFORD II STREER,STREET:2:1=WALL STREET,ADDRESS:1:1=ADUM NEYORK,ADDRESS:1:2=OFORIKROM,ADDRESS:2:1=BANTAMA ,HIGH STREET ,ADDRESS:3:1=ADUM 3,SECTOR:1:1=1000,ACCOUNT.OFFICER:1:1=1,INDUSTRY:1:1=1007,TARGET:1:1=1,NATIONALITY:1:1=AG,CUSTOMER.STATUS:1:1=1,RESIDENCE:1:1=GH,LANGUAGE:1:1=1,TITLE:1:1=Dr,GIVEN.NAMES:1:1=Tony,FAMILY.NAME:1:1=Stark,GENDER:1:1=MALE";

</pre> -->

</div>
</body>

</html>