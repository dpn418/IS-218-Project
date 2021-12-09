
const username = document.getElementById('username');
const password = document.getElementById('password');
const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit',(e)=>{
    //let messages =[]
    checkInputs(e);


    /*
    if(messages.length>0){
        e.preventDefault()
        errorElement.innerText = messages.join(', ')
    }
    */
});

const usernameR = document.getElementById('usernameR');
const passwordR = document.getElementById('passwordR');
const passwordRepeatR = document.getElementById('passwordRepeatR');
const emailR = document.getElementById('emailR')
const fName = document.getElementById('fName');
const lName = document.getElementById('lName');
const registrationForm = document.getElementById('registrationForm');
//no constant for remember

//---regex checks--
//username
const regexU= /^[a-zA-Z\d]+(\.?((?<=\.)([.]*[a-zA-Z\d]+)+$)|[a-zA-Z\d]*$)/;
//password
const regexP= /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,30}$/;
//email
const regexE =/^[^@]+@[^@]+\.[^@]+$/;
//name
const regexN =/[A-Za-z]+/;

registrationForm.addEventListener('submit', (e)=>{
    checkInputsR(e);

});


function checkInputs(e){

    //check regex of login
    regexCheckIfEmail(username, regexU, 'incorrect Username',e);
    regexCheck(password, regexP, 'incorrect password',e);
}

function checkInputsR(e){

    //check regex of Registration
    regexCheck(usernameR, regexU, 'Username can only contain letters and 1 period(in between letters), it cannot contain special characters',e);
    regexCheck(passwordR, regexP, 'password must be 8-30 characters long, have a number, and have an Upper and Lower case character',e);
    regexCheck(emailR, regexE, 'email must have an @ and a .',e);
    regexCheck(fName, regexN, 'Name should have no numbers or special characters',e);
    regexCheck(lName, regexN, 'Name should have no numbers or special character',e);

    //check for passwords if they match
    if(passwordRepeatR.value===passwordR.value){
        setSuccessFor(passwordRepeatR);
    }else{
        setError(passwordRepeatR,"passwords don't match");
    }
}

function regexCheck(input, regex, message,e){
    if(!regex.test(input.value.trim())){
        setError(input,message,e);
    }
    else{
        setSuccessFor(input);
    }
}
function regexCheckIfEmail(input, regex, message){

    if(regexE.test(input.value.trim()) ||  regex.test(input.value.trim())){ //checks if input is an email or works with teh usual input
        setSuccessFor(input);
    }
    else{
        setError(input,message);
    }
}

function setError(input, message,e){
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = 'form-control error';
    small.innerText = message;
    e.preventDefault();
}

function setSuccessFor(input){
    const formControl = input.parentElement;
    formControl.className = 'form-control success';

}