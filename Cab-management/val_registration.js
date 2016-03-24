<html>
<body>
<script type="text/javascript">
function validate()
{
 var x=document.forms["registration"]["email"].value;
 var email=/^([A-Za-z0-9_\-\.])*\@([A-Za-z0-9_\-\.])*\.([A-Za-z]{2,4})$/;
 var ans=email.test(x);
 var username=/^([A-Za-z])+([0-9$_@.])*$/;
 var ans2=username.test(document.forms["registration"]["user"].value);
 var name=/^([a-zA-Z])+$/;
 if(document.forms["registration"]["name"].value=="")
 {
 alert('Please enter the name');
 return false;
 }
 if(name.test(document.forms["registration"]["name"].value))
 {
	 return true;
 }
 else{
	 alert('Invalid name');
	 return false;
 }
	 
 if(document.forms["registration"]["user"].value=="")
 {
 alert('Please enter the username');
 return false;
 }
 if(document.forms["registration"]["pass"].value=="")
 {
 alert('Please enter the password');
 return false;
 }
 if(ans2==false)
 {
 alert('The username is invalid');
 return false;
 }
 if( x=="")
 {
 alert('Please enter the email id');
 return false;
 }
 if(ans==false)
 {
 alert('Invalid Email Id');
 return false;
 }
 if(document.forms["registration"]["city"].value=="")
 {
 alert('Please enter the city');
 return false;
 }
 else{
 alert('Successful submission of form');
 return true;
}
}
</script>
</body>
</html>