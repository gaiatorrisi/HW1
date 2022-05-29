function onJson_Ricerca(json){
    console.log('JSON ricevuto!');
    console.log(json);
    box_ricerca=document.querySelector('#box_ricerca');

    for(regalo of json){
        const tipologia=regalo.tipologia;
        const costo=regalo.costo;

        const tipo_carta=document.createElement('h1');
        tipo_carta.textContent=tipologia;
        const costo_carta=document.createElement('p');
        costo_carta.textContent=costo;

        box_ricerca.appendChild(tipo_carta);
        box_ricerca.appendChild(costo_carta);
    }
    
}

function eseguiricerca(event){
    event.preventDefault();
    const regalo=document.querySelector('#ricerca_regalo').value;

    console.log('Carta regalo da ricercare:'+regalo);

    fetch('cerca.php?&ricerca='+regalo).then(fetchResponse).then(onJson_Ricerca);

}

function fetchResponse(response){
    console.log('Tutto ok fetch!');
    return response.json();
    console.log(response);
}

const form3=document.querySelector('#barra-ricerca');
form3.addEventListener('submit',eseguiricerca);
