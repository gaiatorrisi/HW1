function onJson_Recensione(json){
    console.log('JSON ricevuto!');
    console.log(json);
}

function fetchResponse(response){
    console.log('Ricevuto!');
    return response.json();
    console.log(response);
}

//carico risorsa
function carico_recensione(event) {
    event.preventDefault(); 
    const commento = document.querySelector('#commento').value; 

    console.log('Commento insierito : ' + commento);

    
    fetch('aggiungi_recensione.php?&rece='+commento).then(fetchResponse).then(onJson_Recensione);    
}

const form=document.querySelector('#spazio-recensioni');
form.addEventListener('submit', carico_recensione);
