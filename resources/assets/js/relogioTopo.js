var dataAtual = new Date();
var h = parseInt(dataAtual.getHours());
var m = parseInt(dataAtual.getMinutes()); 
var s = parseInt(dataAtual.getSeconds());
var i = 0;
var atualiza = setInterval(atualizaRelogio, 1000);

/*
   FUNCIONAMENTO:
   Se seg/min/hora < 10 coloca um zero a esquerda para ficar com 2 caracteres
   Se seg/min/hora chega a 60 o valor do mesmo é zerado
   Se hora for igual a 24 ele zera o valor da mesma
*/
function atualizaRelogio() {

    if (m < 10 && i < 1) {
        m = '0' + m;
    }  
    i++;

    s++;
    if (s < 10) {
        s = '0' + s;
    }
    if (s == 60) {
        s = '00';
        m++;
        if (m < 10) {
            m = '0' + m;
        }
        if (m == 60) {
            m = '00';
            h++;
            if (h < 10) {
                h = '0' + h;
            }
            if (h == 24) {
                h = '00';
            }   
        }
    }
    $("#horaAtual").html(h);
    $("#minAtual").html(m);
    $("#secAtual").html(s);
}