function fMasc(objeto, mascara) {
    obj = objeto
    masc = mascara
    setTimeout("fMascEx()", 1)
}

function fMascEx() {
    obj.value = masc(obj.value)
}

function mCPF(cpf) {
    cpf = cpf.replace(/\D/g, "")
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
    return cpf
}

var tel = document.getElementById("tel");

function tMasc() {
    tel.value = mtel(tel.value)
}

function mtel(tel) {
    tel = tel.replace(/\D/g,"");
    tel = tel.replace(/^(\d{2})(\d)/g,"($1) $2");
    tel = tel.replace(/(\d)(\d{4}$)/,"$1-$2");
    return tel;
}

var cnpj = document.getElementById("cnpj");

function cMasc() {
    console.log(cnpj.value = mCnpj(cnpj.value))
}

function mCnpj(cnpj){
    cnpj=cnpj.replace(/\D/g,"");                           //Remove tudo o que não é dígito
    cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2");             //Coloca ponto entre o segundo e o terceiro dígitos
    cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3"); //Coloca ponto entre o quinto e o sexto dígitos
    cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2");           //Coloca uma barra entre o oitavo e o nono dígitos
    cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2");              //Coloca um hífen depois do bloco de quatro dígitos
    return cnpj;
}