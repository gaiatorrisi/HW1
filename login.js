const form=document.forms['login'];
form.addEventListener("submit", validazione);

function validazione(event){
    if(form.username.value.length==0 || form.password.value.length==0)
    {
        alert("Inserisci tutti i parametri per completare l'accesso");
        event.preventDefault();
    }
    
}