function onJson_Ricerca(json){
    console.log('JSON ricevuto!');
    console.log(json);
    box1=document.querySelector('.flex-container');

    for(servizio of json){
        const intestazione=servizio.intestazione;
        const descrizione=servizio.descrizione;
        const foto=servizio.foto;

        box2=document.createElement('div');
        box2.classList.add('base');
        const generico=document.createElement('div');

        const intestazione_servizio=document.createElement('h1');
        intestazione_servizio.textContent=intestazione;
        const descrizione_servizio=document.createElement('p');
        descrizione_servizio.textContent=descrizione;
        const foto_servizio=document.createElement('img');
        foto_servizio.src=foto;

       
        generico.appendChild(intestazione_servizio);
        generico.appendChild(descrizione_servizio);
        generico.appendChild(foto_servizio);
        box2.appendChild(generico);
        box1.appendChild(box2);

    }
    
}


fetch('load_dinamico.php').then(fetchResponse).then(onJson_Ricerca);



function fetchResponse(response){
    console.log('Tutto ok fetch!');
    return response.json();
    console.log(response);
}

