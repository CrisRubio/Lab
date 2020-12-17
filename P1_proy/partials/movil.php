<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsenui.css">
  <link rel="stylesheet" href="https://unpkg.com/onsenui/css/onsen-css-components.min.css">
  <script src="https://unpkg.com/onsenui/js/onsenui.min.js"></script>

  <style>
    .miItem {
      margin:10px;
    }

    .elimina {
        background-color:red;
        width: 80px;
        height: 27px;
        padding: 1px;
        text-align: center;
    }

    .imgMovil{
      width: 40px;
      height: 40px;
    }
  </style>
</head>
<body>
  
<ons-navigator id="appNavigator" swipeable swipe-target-width="80px">
  <ons-page>
    <ons-splitter id="appSplitter">
      <ons-splitter-side id="sidemenu" page="sidemenu.html" swipeable side="right" collapse="" width="260px"></ons-splitter-side>
      <ons-splitter-content page="tabbar.html"></ons-splitter-content>
    </ons-splitter>
  </ons-page>
</ons-navigator>

<template id="sidemenu.html">
   <ons-page>
    <ons-list-title>Menú</ons-list-title>
</template>

<template id="tabbar.html">
  <ons-page id="tabbar-page">
    <ons-toolbar>
      <div class="left">
        <img class="imgMovil" src="./img/Logo.png" id="logo" alt="logo" />
      </div>
      <div class="center">
      CETRÓNICO
      </div>
      <div class="right">
        <ons-toolbar-button onclick="fn.toggleMenu()">
          <ons-icon icon="ion-navicon, material:md-menu"></ons-icon>
        </ons-toolbar-button>
      </div>
    </ons-toolbar>

    <ons-tabbar swipeable id="appTabbar" position="auto"> 
      <ons-tab label="Productos" icon="ion-home" page="page1.html" active></ons-tab>
      <ons-tab label="Cesta" icon="ion-edit" page="page2.html"></ons-tab>
    </ons-tabbar>

  </ons-page>
</template>

<template id="page1.html">
  <ons-page id="page1">
   
   <ons-toolbar>
    <div class="left">
      <ons-toolbar-button onclick="prev()">
        <ons-icon icon="md-chevron-left"></ons-icon>
      </ons-toolbar-button>
    </div>
    <div class="center" onclick="">Productos</div>
    <div class="right">
      <ons-toolbar-button onclick="next()">
        <ons-icon icon="md-chevron-right"></ons-icon>
      </ons-toolbar-button>
    </div>
  </ons-toolbar>
  <ons-carousel fullscreen swipeable auto-scroll overscrollable id="carousel">
  </ons-carousel>
  </ons-page>
</template>

<template id="page2.html">
  <ons-page id="page2">
    <ons-toolbar>
      <div class="center">Cesta</div>
    </ons-toolbar>
   
    <ons-list id="productsList">
    </ons-list>

    <ons-button modifier="large">Comprar</ons-button>
  </ons-page>

</template>
  
<script>

  /* =========================CARRUSEL======================================== */

  /* Funciones para mover el carrusel */
  var prev = function() {
    var carousel = document.getElementById('carousel');
    carousel.prev();
  };

  var next = function() {
    var carousel = document.getElementById('carousel');
    carousel.next();
  };

  /* Ejemplo para añadir elementos al carrusel cuando se carga una página */
  document.addEventListener("init", function(event) {
        var page = event.target;
        if( page.matches('#page1') ) { 
            insertarOpcionesMovil()
        }
  })

  function insertarOpcionesMovil(){
    fetch('/P1_proy/partials/datos.php')
    .then(response=>{
                    if(response.ok)
                        return response.json()
                    else
                        throw response.statusText
    })
    .then(data=>insertarListaMovil(data))
    .catch(err=>console.log('Fetch error: ', err));
}

function insertarListaMovil(Lista){
    Lista.forEach( x => {
        var nombreProducto = x.nombre
        var imagenProducto = x.imagen
        var precioProducto = x.precio
        addItem('#1DD2ED', nombreProducto, imagenProducto, precioProducto)
    })
}

/* Función para añadir un elemento al carrusel */
function addItem(color, text, img, precio){
    let nodo = document.createElement('ons-carousel-item')
    nodo.style.backgroundColor = color
    nodo.innerHTML = `<div style="text-align: center; font-size: 30px; margin-top: 20px; color: black;">
                      ${text}
                      <br>
                      <br>
                      <img src=${img}>
                      <br>
                      <br>
                      Precio : ${precio} €
                      <br>
                      <br>
                      <button onclick=addItemList("${text}")>Comprar</button>
                      </div>`
    document.getElementById('carousel').appendChild(nodo)
  }

/*================================================================================== */

function addItemList(text){
    let node = document.createElement('ons-list-item')
    node.nodeName="monitor"
    node.innerHTML = `<span id="itemProducto" class="miItem">${text}</span>
                      <ons-button class="elimina" onclick=eliminarProducto()>Eliminar</ons-button>`
    document.getElementById('productsList').appendChild(node)
  }

function eliminarProducto(){
  //document.getElementById('productsList').childNodes
}
</script>
  
</body>
</html>