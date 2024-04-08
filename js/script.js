function versenha(){
    let verSenhaBtn = document.querySelector('.eyeBtn');
    let InputSenha = document.getElementById('senha');

    if(verSenhaBtn.innerHTML == '<span class="material-symbols-outlined eyeBtn">visibility</span>'){
        verSenhaBtn.innerHTML = '<span class="material-symbols-outlined eyeBtn">visibility_off</span>';
        InputSenha.type = "password";
    }
    else if(verSenhaBtn.innerHTML == '<span class="material-symbols-outlined eyeBtn">visibility_off</span>'){
        verSenhaBtn.innerHTML = '<span class="material-symbols-outlined eyeBtn">visibility</span>';
        InputSenha.type = "text";
    }
}

/* -------------------------------- registro -------------------------------- */

function teste(){
    alert("Bem sucedido!");
}