const username = document.getElementById('username');
const password = document.getElementById('password');
const loginForm = document.getElementById('loginForm');
const errorElement = document.getElementById('error');

loginForm.addEventListener('submit',(e)=>{
    let messages =[]
    let regexU= /[a-zA-Z\\d]+(\\.?((?<=\\.)[a-zA-Z\\d]+)|[a-zA-Z\\d]*)/gm;
    let userCheck = username.value.match(regexU);

    console.log("hello")

    if(messages.length>0){
        e.preventDefault()
        errorElement.innerText = messages.join(', ')
    }
})