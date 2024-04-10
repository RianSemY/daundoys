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
/* -------------------------------- mascara numero de celular -------------------------------- */
document.getElementById('telefone').addEventListener('input', function(event){
    let input = event.target;
    let numCelular = input.value.replace(/\D/g, '');
    
    if (numCelular.length > 11) {
        numCelular = numCelular.slice(0, 11);
    }

    numCelular = numCelular.replace(/^(\d{2})(\d)/g, '($1) $2');
    numCelular = numCelular.replace(/(\d{1})(\d{4})(\d{4})$/, '$1 $2-$3');

    input.value = numCelular
});

/* -------------------------------- mascara numero de cpf -------------------------------- */
document.getElementById('cpf').addEventListener('input', function(event){
    let input = event.target;
    let cpf = input.value.replace(/\D/g, '');
    
    if (cpf.length > 11) {
        cpf = cpf.slice(0, 11);
    }

    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

    input.value = cpf;
});


function toggleSideHeader() {
    let buttonPull = document.getElementById('sideHeader');
    if (buttonPull.style.left !== "0px") {
        buttonPull.style.left = "0px";
    } else {
        buttonPull.style.left = "-300px";
    }
}
