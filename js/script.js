function versenha(){
    let verSenhaBtn = document.querySelector('.eyeBtn');
    let InputSenha = document.getElementById('senha');

    if(verSenhaBtn.innerHTML == '<span onclick="versenha()" class="material-symbols-outlined eye">visibility</span>'){
        verSenhaBtn.innerHTML = '<span onclick="versenha()" class="material-symbols-outlined eye">visibility_off</span>';
        InputSenha.type = "password";
    }
    else if(verSenhaBtn.innerHTML == '<span onclick="versenha()" class="material-symbols-outlined eye">visibility_off</span>'){
        verSenhaBtn.innerHTML = '<span onclick="versenha()" class="material-symbols-outlined eye">visibility</span>';
        InputSenha.type = "text";
    }
}

/* -------------------------------- dropdown mobile -------------------------------- */



/* -------------------------------- teste -------------------------------- */
function teste(){
    alert("Bem sucedido!");
}



function toggleSideHeader() {
    let buttonPull = document.getElementById('sideHeader');
    if (buttonPull.style.left !== "0px") {
        buttonPull.style.left = "0px";
    } else {
        buttonPull.style.left = "-270px";
    }
}

function openLoginDropbox() {
    var dropdown = document.getElementById("loginDrop-content");
    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
        document.getElementById("loginDrop-btn").style.color = "white";
    } else {
        dropdown.style.display = "block";
        document.getElementById("loginDrop-btn").style.color = "gray";
    }
}
var userBtn = document.getElementById("loginDrop-btn");
userBtn.addEventListener("click", openLoginDropbox);

window.onclick = function(event) {
    var dropdown = document.getElementById("loginDrop-content");
    var userBtn = document.getElementById("loginDrop-btn");
    if (!event.target.matches('#loginDrop-btn') && dropdown.style.display === "block") {
        dropdown.style.display = "none";
        userBtn.style.color = "white"
    }
}


// ---------------------------------------------- aparecer e sumir mobile ----------------------------------------------
function aparecer(element) {
    element.style.opacity = "1";}
function desaparecer(element) {
    element.style.opacity = "0";}

function turnHide(){
    var sobreporList = document.querySelectorAll('.sobreporProduto');
    sobreporList.forEach(function(sobrepor) {
        sobrepor.addEventListener('click', function(event) {
            event.stopPropagation();
            aparecer(sobrepor);
            sobreporList.forEach(function(outroElemento) {
                if (outroElemento !== sobrepor) {
                    desaparecer(outroElemento);
                }
            });
        });
    });
    
    document.addEventListener('click', function(event) {
        var exposto = false;
        sobreporList.forEach(function(sobrepor) {
            if (sobrepor.contains(event.target)) {
                exposto = true;
            }
        });

        if (!exposto) {
            sobreporList.forEach(function(sobrepor) {
                desaparecer(sobrepor);
            });
        }
    });
}
function verificarDispositivoMovel() {
    var isMobile = /iPhone|iPad|iPod|Android|Windows Phone/i.test(navigator.userAgent);
    if (isMobile) {
        turnHide();
    }
}
verificarDispositivoMovel();