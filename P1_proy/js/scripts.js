function mostrar() {
    document.getElementById('insert').style.display="block";
}

function cerrar(){
    document.getElementById('insert').style.display="none";
}

function handleFiles(e){
    let ctx = document.getElementById('canvas').getContext('2d');
    let img = new Image;
    img.src = URL.createObjectURL(e.target.files[0]);
    img.onload=function(){
        ctx.drawImage(img, 10, 10);
    }
}