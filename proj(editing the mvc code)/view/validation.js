const username = document.getElementById('username');
const password = document.getElementById('password');
const loginForm = document.getElementById('loginForm');
const errorElement = document.getElementById('error');

loginForm.addEventListener('submit',(e)=>{
    let messages =[]
    let regexusername= /[a-zA-Z\\d]+(\\.?((?<=\\.)[a-zA-Z\\d]+)|[a-zA-Z\\d]*)/gm;
    if(username.value.search(regexusername)===-1){
        messages.push('Username Invalid');
    }
    if(messages.length>0){
        e.preventDefault()
        errorElement.innerText = messages.join(', ')
    }
})