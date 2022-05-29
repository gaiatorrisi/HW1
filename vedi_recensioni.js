function fetchResponse(response){
    console.log('Tutto ok fetch');
    return response.json();
    console.log(response);
}

function onJson_VediRece(json){
    console.log('JSON ricevuto!');
    console.log(json);
    box_recensione=document.querySelector('#box_recensione');

    for(recensione of json){
        const reviewer=recensione.utente;
        const review=recensione.commento;
    
        const nome_utente=document.createElement('h1');
        nome_utente.textContent=reviewer;
        const commento_utente=document.createElement('p');
        commento_utente.textContent=review;

        box_recensione.appendChild(nome_utente);
        box_recensione.appendChild(commento_utente);
    }

}

function preleva_recensione(event){
    fetch('vedi_recensioni.php').then(fetchResponse).then(onJson_VediRece);
}

const form2=document.querySelector('#recensioni');
form2.addEventListener('click', preleva_recensione);

