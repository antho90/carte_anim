const form = document.querySelector('form');
const message = document.getElementById('response');

form.addEventListener('submit',function(e){
    e.preventDefault();
    const formData=new FormData(form);
    // Affichage des paires clefs/valeurs
for(var pair of formData.entries()) {
    console.log(pair[0]+ ', '+ pair[1]);
 }
    console.log(formData);
    fetch('email.php',{
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if(data.message !== undefined){
            // ok
            message.textContent= data.message;
            message.style.color="#008000";
            
            form.reset();
        }
        if(data.error !== undefined){
            // error
            message.textContent= data.error;
            message.style.color="#000000";
        }
    })
})
