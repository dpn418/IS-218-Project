
const username = document.getElementById('username');
const password = document.getElementById('password');
const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit',(e)=>{
    let messages =[]

    //let userCheck = username.value.match(regexU);
    e.preventDefault();
    checkInputs();

    /*
    if(messages.length>0){
        e.preventDefault()
        errorElement.innerText = messages.join(', ')
    }
    */
});
function checkInputs(){
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();
    let regexU= /^[a-zA-Z\d]+(\.?((?<=\.)[a-zA-Z\d]+$)|[a-zA-Z\d]*$)/;

    if(!regexU.test(usernameValue)){
        setError(username,'invalid username');
    }else{
        setSuccessFor(username);
    }




}

function regexCheck(input, regex, inputName){

}

function setError(input, message){
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = 'form-control error';
    small.innerText = message;
}

function setSuccessFor(input){
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}