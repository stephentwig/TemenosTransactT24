# TemenosTransactT24
Bare Bones Temenos Transact RESTful API

This is supposed to expose the data in the Temenos Transact (T24) Core-banking application in JSON format.
the endpoint is found here : api/v1/getDetails.php
- This endpoint is for Transactional Request only.

 ![Picture of the front-end ]( https://github.com/stephentwig/TemenosTransactT24/blob/master/img/homeScreenOfs.JPG) 
- JSON formatted response: 
 ![JSON formatted response](https://github.com/stephentwig/TemenosTransactT24/blob/master/img/ofsResponse.JPG)

REQUIREMENTS
* R16 + Model Bank with TAFJServices.war deployed and configured in the TAFJEE_EAR.ear
* The T24 endpoint URL:  http://localhost:8085/TAFJServices/services/OFSService/Invoke?Request=CUSTOMER,/S/PROCESS,INPUTT/123456,190097
* Alternatively, you can use TAFJRestServices.war. To connect check out this link: https://github.com/willemgorter/T24TransactTranslation/wiki/02.-Introduction

Code free routes to go: SOAP - Temenos Web Services (TWS) and REST - (IRIS) - Information, Reporting and Information service - Interaction Framework 

Improvements to be made:
* Error handling
* Authentication / Authorization

The underlying API is Temenos' Open Financial Services (OFS)

* Sample OFS request:
````
CUSTOMER,/S/PROCESS,INPUTT/123456,190097
````
* Using cURL to POST a request, or generate a code snippet of your choice in Postman
````
curl --location --request POST 'http://localhost/TemenosTransactT24/api/v1/getDetails.php' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'IP_address=localhost' \
--data-urlencode 'Port_number=8085' \
--data-urlencode 'Application=CUSTOMER' \
--data-urlencode 'Version=' \
--data-urlencode 'Function=S' \
--data-urlencode 'ProcessType=PROCESS' \
--data-urlencode 'GTS_Control=' \
--data-urlencode 'OFSAction=' \
--data-urlencode 'Username=INPUTT' \
--data-urlencode 'Password=123456' \
--data-urlencode 'CompanyCode=' \
--data-urlencode 'T24_TransactionID=190097' \
--data-urlencode 'MessageID=' \
--data-urlencode 'MessageDATA='
````
* Sample OFS response:
* The response comes with XML tags
````
<ns:InvokeResponse xmlns:ns="http://services.tafj.temenos.com/xsd">
<link type="text/css" rel="stylesheet" id="dark-mode-custom-link"/>
<link type="text/css" rel="stylesheet" id="dark-mode-general-link"/>
<style lang="en" type="text/css" id="dark-mode-custom-style"/>
<style lang="en" type="text/css" id="dark-mode-native-style"/>
<ns:return xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:type="ns:ServiceResponse">
<ns:responses>190097//1,MNEMONIC:1:1=AARONF,SHORT.NAME:1:1=Aaron Fleming,NAME.1:1:1=Aaron Fleming,STREET:1:1=98 MAIN ST,TOWN.COUNTRY:1:1=SEATTLE WA 28236 USA,SECTOR:1:1=1001,ACCOUNT.OFFICER:1:1=26,INDUSTRY:1:1=1000,TARGET:1:1=999,NATIONALITY:1:1=US,CUSTOMER.STATUS:1:1=2,RESIDENCE:1:1=US,LANGUAGE:1:1=1,COMPANY.BOOK:1:1=GB0010001,CLS.CPARTY:1:1=NO,DATE.OF.BIRTH:1:1=19780812,AML.CHECK:1:1=NULL,AML.RESULT:1:1=NULL,INTERNET.BANKING.SERVICE:1:1=NULL,MOBILE.BANKING.SERVICE:1:1=NULL,BACKUP.WITHHOLD:1:1=NO,PRIVACY.STATUS:1:1=OPT-IN,PRIVACY.DATE:1:1=20200313,CURR.NO:1:1=1,INPUTTER:1:1=46272_OFFICER__OFS_SEAT,DATE.TIME:1:1=2004281447,AUTHORISER:1:1=46272_OFFICER_OFS_SEAT,CO.CODE:1:1=GB0010001,DEPT.CODE:1:1=1</ns:responses>
<ns:returnCode>0</ns:returnCode>
</ns:return>
</ns:InvokeResponse>
````

* The actual OFS response:
````
190097//1,MNEMONIC:1:1=AARONF,SHORT.NAME:1:1=Aaron Fleming,NAME.1:1:1=Aaron Fleming,STREET:1:1=98 MAIN ST,TOWN.COUNTRY:1:1=SEATTLE WA 28236 USA,SECTOR:1:1=1001,ACCOUNT.OFFICER:1:1=26,INDUSTRY:1:1=1000,TARGET:1:1=999,NATIONALITY:1:1=US,CUSTOMER.STATUS:1:1=2,RESIDENCE:1:1=US,LANGUAGE:1:1=1,COMPANY.BOOK:1:1=GB0010001,CLS.CPARTY:1:1=NO,DATE.OF.BIRTH:1:1=19780812,AML.CHECK:1:1=NULL,AML.RESULT:1:1=NULL,INTERNET.BANKING.SERVICE:1:1=NULL,MOBILE.BANKING.SERVICE:1:1=NULL,BACKUP.WITHHOLD:1:1=NO,PRIVACY.STATUS:1:1=OPT-IN,PRIVACY.DATE:1:1=20200313,CURR.NO:1:1=1,INPUTTER:1:1=46272_OFFICER__OFS_SEAT,DATE.TIME:1:1=2004281447,AUTHORISER:1:1=46272_OFFICER_OFS_SEAT,CO.CODE:1:1=GB0010001,DEPT.CODE:1:1=1
````


* Sample JSON response:
* - formatted using PHP
````
{"ofsRequest":"CUSTOMER,\/S\/PROCESS\/\/\/,INPUTT\/123456\/,190097\/,","MNEMONIC_1_1":"AARONF","SHORT__NAME_1_1":"Aaron Fleming","NAME__1_1_1":"Aaron Fleming","STREET_1_1":"98 MAIN ST","TOWN__COUNTRY_1_1":"SEATTLE WA 28236 USA","SECTOR_1_1":"1001","ACCOUNT__OFFICER_1_1":"26","INDUSTRY_1_1":"1000","TARGET_1_1":"999","NATIONALITY_1_1":"US","CUSTOMER__STATUS_1_1":"2","RESIDENCE_1_1":"US","LANGUAGE_1_1":"1","COMPANY__BOOK_1_1":"GB0010001","CLS__CPARTY_1_1":"NO","DATE__OF__BIRTH_1_1":"19780812","AML__CHECK_1_1":"NULL","AML__RESULT_1_1":"NULL","INTERNET__BANKING__SERVICE_1_1":"NULL","MOBILE__BANKING__SERVICE_1_1":"NULL","BACKUP__WITHHOLD_1_1":"NO","PRIVACY__STATUS_1_1":"OPT-IN","PRIVACY__DATE_1_1":"20200313","CURR__NO_1_1":"1","INPUTTER_1_1":"46272_OFFICER__OFS_SEAT","DATE__TIME_1_1":"2004281447","AUTHORISER_1_1":"46272_OFFICER_OFS_SEAT","CO__CODE_1_1":"GB0010001","DEPT__CODE_1_1":"1<\/ns:responses><ns:returnCode>0<\/ns:returnCode><\/ns:return><\/ns:InvokeResponse>"}
````

* Simply decode the JSON , and spool using the keys
* in PHP, to view the name : Aaron Fleming
````
echo $response["NAME__1_1_1"];

````

