
//--------------form------------------
//----firstName---------//
$('#registrationForm').submit(function () {
    return false;
});

//$('#firstName').keyup(function () {
function checkfirstName() {
    var firstName = $('#firstName').val();
    var first = /^[a-zA-Z-_ ]{4,10}$/;
    first.test(firstName);

    //if (firstName.length >=4 && firstName.length <=10){
    if (first.test(firstName)){
        $('#firstNameError').text(' ');
    }
    else
    {
        $('#firstNameError').text('First Name Must be 4 to 10 Character');
    }
}
$('#firstName').keyup(function (){
    checkfirstName();
});



//--------Last Name------------///
//$('#lastName').keyup(function () {
function checklastName() {
    var lastName = $('#lastName').val();
    var last = /^[a-zA-Z-_ ]{2,30}$/;
    last.test(lastName);

    //if (lastName.length >=4 && lastName.length <=10){
    if (last.test(lastName)){
        $('#lastNameError').text(' ');
    }
    else
    {
        $('#lastNameError').text('Last Name Must be 4 to 10 Character');
    }
}
$('#lastName').keyup(function () {
    checklastName();
});


//----------email--------------------//
function checkEmail() {
    var email = $('#email').val();
    var pattern =/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/
    if (pattern.test(email)){
        $('#emailError').text(' ');
    }
    else
    {
        $('#emailError').text('Please Enter a valid Email Address');
    }
}
$('#email').keyup(function (){
    checkEmail();
});

//-----------------------------------password---------------------//

function checkPassword() {
    var password = $('#password').val();
    if (password.length >=7){
        $('#passwordError').text(' ');
    }
    else
    {
        $('#passwordError').text('Password must be 7 digit');
    }
}


$('#password').keyup(function () {
    checkPassword();
});

//------------password show----------------//
$('#showhide').click(function () {
    var typevalue = $('#password').attr('type');
    if (typevalue == 'password'){
        $('#password').attr('type', 'text');
    }
    else
    {
        $('#password').attr('type', 'password');
    }
});



//------------NID -------------//


function checkNid() {
    var nid = $('#nid').val();
    if (nid.length >=16){
        $('#nidError').text(' ');
    }
    else
    {
        $('#nidError').text('Nid Must Be 16 Digit');
    }
}


$('#nid').keyup(function () {
    checkNid();
});













