const form=document.forms['iscriviti2'];
form.addEventListener("submit", validazione);
document.getElementById('username').addEventListener('blur', checkUsername);

function validazione(event){
    if(form.nome.value.length==0 || form.cognome.value.length==0 || form.username.value.length==0 || form.password.value.length==0)
    {
        event.preventDefault();
        alert("Inserisci tutti i parametri per completare l'accesso");
    }   
   
}
function checkUsername(event){
    target=event.currentTarget;
    fetch("checkUsername.php?username="+target.value).then(fetchResponse)
        .then(function (json){
            console.log(json[0].username);
            if(json[0].username)  
            {
                document.getElementById('iscrizione').disabled=true;
                const username_in_uso=document.createElement("span");
                username_in_uso.textContent="*Username già in uso";
                username_in_uso.classList.add("error");
                const spazio=document.createElement("br");
                const container=document.createElement("div");
                container.id="username_in_uso";
                container.appendChild(username_in_uso);
                container.appendChild(spazio);
                form.insertBefore(container,document.getElementById("username_label"));
            }else{
                if(document.body.contains(document.getElementById('username_in_uso'))){
                    document.getElementById('username_in_uso').remove();
                }
                document.getElementById('iscrizione').disabled=false;
            }
    })
}
function fetchResponse(response){
    if (!response.ok) {return null};
    return response.json();
}
