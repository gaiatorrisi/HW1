function onJson_MANICURE(json) {
    console.log('JSON ricevuto');
    const library = document.querySelector('#box_musica');
  //svuoto campo
    library.innerHTML = '';
  
    console.log(json)
    const results = json.tracks.items;
    let num_results = json.tracks.total;
    if(num_results > 20)
      num_results = 20;
      let totale=Number(0);
    for(let i=0; i<num_results; i++) {
  
      const risultato = results[i];
      const title = risultato.name;
      const selected_image = risultato.album.images[0].url;
      const album = document.createElement('div');
      album.classList.add('album');
      const img = document.createElement('img');
      img.src = selected_image;
      const caption = document.createElement('span');
      caption.textContent = title;
      const separatore= document.createElement('hr');
  
  
  //CONTEGGIO TEMPO ESATTO per rientrare nel range di tempo del trattamento
      const durata=( risultato.duration_ms/60000).toFixed(2);
      console.log('il tempo e:'+durata);
      const tempo=document.createElement('p');
      tempo.textContent='Questa canzone dura:'+durata;
      console.log('DURATA CONVERTITA='+Number(durata));
      let dura=(Number(durata));
      totale=totale+dura;
      console.log('TOTALE='+totale);
  //COSA VISUALIZZO
      album.appendChild(caption);
      album.appendChild(tempo);
      album.appendChild(img);
      album.appendChild(separatore);
      library.appendChild(album);
        if (totale>15 && totale<20) {
          console.log('durata manicure completata!');
              break;
        }
    }
  }
function onJson_MASSAGGI(json) {
    console.log('JSON ricevuto');
    const library = document.querySelector('#box_musica');
    library.innerHTML = '';
  
    console.log(json)
    const results = json.tracks.items;
    let num_results = json.tracks.total;
    if(num_results > 30)
      num_results = 30;
      let totale=Number(0);
    for(let i=0; i<num_results; i++) {
  
      const risultato = results[i];
      const title = risultato.name;
      const selected_image = risultato.album.images[0].url;
      const album = document.createElement('div');
      album.classList.add('album');
      const img = document.createElement('img');
      img.src = selected_image;
      const caption = document.createElement('span');
      caption.textContent = title;
      const separatore= document.createElement('hr');
  
  //CONTEGGIO TEMPO
      const durata=( risultato.duration_ms/60000).toFixed(2);
      console.log('il tempo e:'+durata);
      const tempo=document.createElement('p');
        tempo.textContent='Questa canzone dura:'+durata;
        console.log('DURATA CONVERTITA='+Number(durata));
        let dura=(Number(durata));
        totale=totale+dura;
        console.log('TOTALE='+totale);
  //COSA VISUALIZZO
        album.appendChild(caption);
        album.appendChild(tempo);
        album.appendChild(img);
        album.appendChild(separatore);
        library.appendChild(album);
  
        if (totale>25 && totale<40) {
          console.log('durata massaggio completata!');
              break;
        }
    }
}

function onJson_TRUCCO(json) {
    console.log('JSON ricevuto');
    const library = document.querySelector('#box_musica');
    library.innerHTML = '';
  
    console.log(json)
    const results = json.tracks.items;
    let num_results = json.tracks.total;
    if(num_results > 10)
      num_results = 10;
      let totale=Number(0);
    for(let i=0; i<num_results; i++) {
  
      const risultato = results[i];
      const title = risultato.name;
      const selected_image = risultato.album.images[0].url;
      const album = document.createElement('div');
      album.classList.add('album');
      const img = document.createElement('img');
      img.src = selected_image;
      const caption = document.createElement('span');
      caption.textContent = title;
      const separatore= document.createElement('hr');
  
  //CONTEGGIO TEMPO
      const durata=( risultato.duration_ms/60000).toFixed(2);
      console.log('il tempo e:'+durata);
      const tempo=document.createElement('p');
      tempo.textContent='Questa canzone dura:'+durata;
      console.log('DURATA CONVERTITA='+Number(durata));
      let dura=(Number(durata));
      totale=totale+dura;
      console.log('TOTALE='+totale);
  //COSA VISUALIZZO
      album.appendChild(caption);
      album.appendChild(tempo);
      album.appendChild(img);
      library.appendChild(album);
      album.appendChild(separatore);
        if (totale>35 && totale<40) {
          console.log('durata trucco completata!');
              break;
        }
    }
}
  
  function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }
  
  function search(event) {
    event.preventDefault();
    const musica_input = document.querySelector('#album');
    const musica_value = encodeURIComponent(musica_input.value);
    console.log('Eseguo ricerca: ' + musica_value);
  //LEGGO OPZIONE SELEZIONATA
    const tipo = document.querySelector('#tipo').value;
    console.log('La durata totale delle canzoni deve rientrare nel range di : ' + tipo);
  
    if(tipo==="manicure"){
    fetch('spotify.php?&q=' + musica_value).then(onResponse).then(onJson_MANICURE);
    }
  
    if(tipo==="massaggio"){
      fetch("spotify.php?&q=" + musica_value).then(onResponse).then(onJson_MASSAGGI);
      }
    if(tipo==="trucco"){
      fetch("spotify.php?&q=" + musica_value).then(onResponse).then(onJson_TRUCCO);
      }
  }
  
  /*function onTokenJson(json){
    token = json.access_token;
  }
  
  function onTokenResponse(response){
    return response.json();
  }
  
  const client_id = '554bf23a4ecd4f60886d443ef0da857b';
  const client_secret = '0a7184b98d2f468e94c592b81f8d4e6e';*/
  
  let token;
  
 /* fetch("https://accounts.spotify.com/api/token",
      {
     method: "post",
     body: 'grant_type=client_credentials',
     headers:
     {
      'Content-Type': 'application/x-www-form-urlencoded',
      'Authorization': 'Basic ' + btoa(client_id + ':' + client_secret)
     }
    }
  ).then(onTokenResponse).then(onTokenJson);*/
  
  
  const form_spotify = document.querySelector('#form_musica');
  form_spotify.addEventListener('submit', search)