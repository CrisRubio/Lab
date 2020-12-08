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
    fetch('/P1_proy/partials/datos.php')
    .then(response=>{
                    if(response.ok)
                        return response.json()
                    else
                        throw response.statusText
    })
    .then(data=>console.log(JSON.stringify(data)))
    .catch(err=>console.log('Fetch error: ', err));
}

function visorProductos(){
    var hijo = document.createElement('div');
    hijo.className = "item";
    document.getElementById("visorProductos").appendChild("hijo");
}

function insertarEnVisor(L){
    L.forEach( x => {
        var nombre = x.nombre
        var precio = x.precio
        var url = x.imagen

        var visor = document.getElementById('visorProductos');
        var n = document.createElement('div');
        n.className = "item";   

        var p = document.createElement('p');
        var nombreProducto = document.createTextNode(nombre);
        p.appendChild(nombreProducto);

        var p2 = document.createElement('p');
        var precioProducto = document.createTextNode("precio : " + precio + " €");
        p2.appendChild(precioProducto);

        var imagen = document.createElement('img');
        imagen.className = "imgVisor";
        imagen.src = url;

        var boton = document.createElement('button');
        boton.innerText = "Comprar";

        n.appendChild(imagen);
        n.appendChild(p);
        n.appendChild(p2);
        n.appendChild(boton);
        visor.appendChild(n);
    })
}

function insertarOpciones(L){
    L.forEach( x => {
        var nombre = x.nombre
        var precio = x.precio
        var url = x.imagen

        var visor = document.getElementById('visorProductos');
        var n = document.createElement('div');
        n.className = "item";   

        var p = document.createElement('p');
        var nombreProducto = document.createTextNode(nombre);
        p.appendChild(nombreProducto);

        var p2 = document.createElement('p');
        var precioProducto = document.createTextNode("precio : " + precio + " €");
        p2.appendChild(precioProducto);

        var imagen = document.createElement('img');
        imagen.className = "imgVisor";
        imagen.src = url;

        var boton = document.createElement('button');
        boton.innerText = "Comprar";

        n.appendChild(imagen);
        n.appendChild(p);
        n.appendChild(p2);
        n.appendChild(boton);
        visor.appendChild(n);
    })
}

function insertarProductos(){
    fetch('/P1_proy/partials/datos.php')
    .then(response=>{
                    if(response.ok)
                        return response.json()
                    else
                        throw response.statusText
    })
    .then(data=>insertarEnVisor(data))
    .catch(err=>console.log('Fetch error: ', err));
}

function insertarOpcionesLista(Lista){
    Lista.forEach( x => {
        var input = document.getElementById("listaProductos");
        var nombreProducto = x.nombre
        console.log(nombreProducto)
        var opcion = document.createElement('option');
        var nombreOpcion = document.createTextNode(nombreProducto)
        opcion.appendChild(nombreOpcion)

        input.appendChild(opcion)
    })
}

function insertarOpciones(){
    fetch('/P1_proy/partials/datos.php')
    .then(response=>{
                    if(response.ok)
                        return response.json()
                    else
                        throw response.statusText
    })
    .then(data=>insertarOpcionesLista(data))
    .catch(err=>console.log('Fetch error: ', err));
}