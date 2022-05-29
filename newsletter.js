// API KEY = 3086e7c9829545d48f981f22c27d8588
function onJson_newsletter(json) {
    console.log('JSON ok!');
//Svuotiamo il campo
    const email = document.querySelector('#box_email');
    email.innerHTML = '';

    console.log(json);
//validation conterrà il valore che descrive la qualità della mail submitted
    const validation = json.quality_score;
    console.log('validation is '+validation);

    if(validation<0.50)
    {
        console.log('minore di 0.50')
        const not_good = document.createElement('h2');
        not_good.textContent = "EMAIL NON VALIDA✘";
        box_email.appendChild(not_good);

    }
    if(validation>=0.50) {
        console.log('maggiore o uguale di 0.50')
        const good = document.createElement('h3');
        good.textContent = "EMAIL VALIDA✔";
        box_email.appendChild(good);
    }
}

function onResponse_newsletter(response) {
    console.log('Ricevuto!');
    return response.json();
}

//carico risorsa esterna
function Search_newsletter(event) {
        event.preventDefault(); 
        const email_input = document.querySelector('#email_input').value;  

        console.log('Eseguo ricerca: ' + email_input);
        // PARTE JS rest_url = "https://emailvalidation.abstractapi.com/v1/?api_key=3086e7c9829545d48f981f22c27d8588&email=" + email_input;
        
        fetch('newsletter.php?email='+email_input).then(onResponse_newsletter).then(onJson_newsletter);    
}
      
const form_email = document.querySelector('#form_newsletter');
form_email.addEventListener('submit', Search_newsletter);
