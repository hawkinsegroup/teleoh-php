# teleoh-php
PHP class for communicating with the Teleoh Voice &amp; SMS API. Also includes Teleoh XML functions to utilize during your call flow.

# Initialize the Class
Change 'xml' (fourth parameter) to "json" to return json results instead of xml.

```php
  $teleohapi = new teleohapi('YOUR_API_USER_ID','YOUR_API_KEY','YOUR_HEG_ACCOUNT_ID','xml'); //Initiate Teleoh API Class 
  $teleohxml = new teleohxml('YOUR_API_USER_ID','YOUR_API_KEY','YOUR_HEG_ACCOUNT_ID','xml'); //Initiate Teleoh XML Class
```

# API Examples
```php
     // Get call history between the start and end date.
     $params = array("start_date" => "2018-09-31","end_date" => "2019-01-31");  
     $r = $teleohapi->Call('CallHistory',$params); //Call/CallHistory/
     print_r($r); 
```
 
```php
     // Get a list of all applications in your Teleoh account.
     $r = $teleohapi->Application('GetAll',''); //Application/GetAll
     print_r($r);
```

# Teleoh XML Examples

```php     
     //Play an audio file to the caller.
     header("Content-type: text/xml");
     $r = $teleohxml->play('http://yoursite.com/nextaction.php','POST','1','http://yoursite.com/music.mp3');
     echo $r;
```    
     
```php
    //Dial - Connects the caller to a SIP endpoint(s) or phone number(s)
    header("Content-type: text/xml");
    $numbers = array(12145551212,'','','','','','','','',''); //Numbers to ring
    $users = array(you@yoursipdomain.com,'','','','','','','','',''); //SIP endpoints to ring
    $r = $teleohxml->dial("http://yoursite.com/nextaction.php",'POST','Name on Caller ID','Phone NUmber on Caller ID','','','',$digitsMatch,$digitsMatchBLeg,$callbackUrl,'N','N' ,'50000','50000',$numbers,$users); 
        echo $r;
```


Full API documentation is available at https://docs.hawkinsegroup.com/teleoh/
