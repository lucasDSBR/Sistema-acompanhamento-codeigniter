
function tipoServ(){
    var select = document.getElementById('tipoServico');
    var tipoServicoValue = select.options[select.selectedIndex].value;
    switch (parseInt(tipoServicoValue)) {
        case 1:
            document.getElementById('tipoTraducao').style.display="block";
            document.getElementById('tipoRevisao').style.display="none";
            break;
        case 2:
            document.getElementById('tipoRevisao').style.display="block";
            document.getElementById('tipoTraducao').style.display="none";
            break;
            
        default:
            document.getElementById('tipoRevisao').style.display="none";
            document.getElementById('tipoTraducao').style.display="none";
            break;
    }
}

function nomePeriodicoEvento(){
    var select = document.getElementById('periodicoOrEvento');
    var periodicoOrEvento = select.options[select.selectedIndex].value;
    console.log(periodicoOrEvento)
    switch (parseInt(periodicoOrEvento)) {
        case 1:
            document.getElementById('periOrEvent').innerHTML="Periódico";
            document.getElementById('nomePeriodicoEvento').style.display="block";
            break;
        case 2:
            document.getElementById('periOrEvent').innerHTML="Evento";
            document.getElementById('nomePeriodicoEvento').style.display="block";
            break;
            
        default:
            document.getElementById('nomePeriodicoEvento').style.display="none";
            break;
    }
}