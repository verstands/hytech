const traitement = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "./traitement.ajax.php?phone=<?= $phone ?>&reference=<?= $reference;?>");
    xhr.addEventListener("readystatechange", () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            let reponse = xhr.response;
            if (reponse.success === 1) {
               alert('cool');
            }
            if(reponse.success === 2){
                alert('erreur')
            }
             console.log(reponse);
        }
    });
    xhr.responseType = "json";
    xhr.send();

   }
   window.addEventListener('load',()=>{
            setInterval(()=>{
            traitement()
    },1000)
   })