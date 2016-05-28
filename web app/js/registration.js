$(document).ready(function() {
$("#register").click(function() {
var name = $("#name").val();
var batch = $("#batch").val();
var email = $("#email").val();
var password = $("#password").val();
var cpassword = $("#cpassword").val();
if (name == '' || batch == '' || email == '' || password == '' || cpassword == '') {
alert("Please fill all fields...!!!!!!");
} else if ((batch.length) < 8) {
alert("Please type your batch correctly ...!!!!!!");
}else if ((password.length) < 8) {
alert("Password should atleast 8 character in length...!!!!!!");
} else if (!(password).match(cpassword)) {
alert("Your passwords don't match. Try again?");
} else {
$.post("register.php", {
name1: name,
batch1: batch,
email1: email,
password1: password
}, function(data) {
if (data == 'You have Successfully Registered..& Please Login to get papers') {
$("form")[0].reset();
}
alert(data);
});
}
});
});