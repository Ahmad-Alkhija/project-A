let input_password = document.getElementById('input_password');
let icon = document.getElementById('icon');

input_password.oninput = function(){
    if(input_password.value == ''){
        icon.style.display = 'none' ;
    }else{
        icon.style.display = 'block' ;
    }
    
}

icon.onclick = function(){
    icon.classList.toggle('fa-eye-slash');

    if(input_password.type == 'password'){
        input_password.type = 'text' ;
    }else{
        input_password.type = 'password' ;
    }
}