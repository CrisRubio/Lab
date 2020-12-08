function mostrar() {
    document.getElementById('insert').style.display="block";
}

function cerrar(){
    document.getElementById('insert').style.display="none";
}

function upload(){
    alert(window.location.href);
}

function handleFiles(e){
    let ctx = document.getElementById('canvas').getContext('2d');
    let img = new Image;
    img.src = URL.createObjectURL(e.target.files[0]);
    img.onload=function(){
        ctx.drawImage(img, 10, 10);
    }
}

function mostrarDatosProductos(){
    fetch('/partials/datos.php')
    .then(response=>{
                    if(response.ok)
                        return response.json()
                    else
                        throw response.statusText
    })
    .then(data=>console.log(JSON.stringify(data)))
    .catch(err=>console.log('Fetch error: ', err));
}