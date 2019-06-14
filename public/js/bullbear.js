// recarga de la página despues de 3 segundos
function reloadPage(url) {
  setTimeout(function (){
    window.location.href = url
  }, 3000)
}

//Una vez que se ha corregido el error, que desaparezca la advertencia
function quitarError(dato){
   document.getElementById(dato).style.borderColor="#aacfe4"
}


// Validación formularios de añadir y editar categorías
function validarCategoria(){

   var categoria=document.getElementById("categoria")
   var esCorrecto=true

   if (categoria.value.length == 0){

     categoria.style.borderColor="#f00"
     esCorrecto=false
   }

     return esCorrecto
}

// Validación formularios de añadir y editar productos
function validarProducto(){

   var nombreProducto=document.getElementById("nombreProducto")
   var descripcion=document.getElementById("descripcion")
   var precio=document.getElementById("precio")
   var imagen=document.getElementById("imagen")
   var categoriaSelect=document.getElementById("categoriaSelect")
   var esCorrecto=true
   var dosDecimales = /^\d+(?:\.\d{0,2})$/;

   //Validación del campo nombre
   if (nombreProducto.value.length == 0){

     nombreProducto.style.borderColor="#f00"
     esCorrecto=false
   }

   // validación del campo descripción
   if (descripcion.value.length == 0){

     descripcion.style.borderColor="#f00"
     esCorrecto=false
   }

    //Validación del campo precio
    if (!dosDecimales.test(precio) && (precio.value.length == 0)){
      precio.style.borderColor="#f00"
      esCorrecto=false
    }

    //Validación del campo imagen
    if (imagen.value.length == 0){

      imagen.style.borderColor="#f00"
      esCorrecto=false
    }

    // Validación del select de categorías
    if (categoriaSelect.value == "") {
      categoriaSelect.style.borderColor="#f00"
      esCorrecto=false
    }

     return esCorrecto
}

// Validación formularios de añadir y editar usuarios
function validarAddUsuario(){

   var nombreDeUsuario=document.getElementById("nombreDeUsuario")
   var nombrePersona=document.getElementById("nombrePersona")
   var pass1=document.getElementById("pass1")
   var pass2=document.getElementById("pass2")
   var apellidos=document.getElementById("apellidos")
   var email=document.getElementById("email")
   var fechNac=document.getElementById("fechNac")
   var esCorrecto=true

   // validación del campo nombre de usuario
   if (nombreDeUsuario.value.length <6 || nombreDeUsuario.value.length > 30){

     nombreDeUsuario.style.borderColor="#f00"
     esCorrecto=false
   }

   // validación del campo nombre de la persona
   if (nombrePersona.value.length < 4){

     nombrePersona.style.borderColor="#f00"
     esCorrecto=false
   }

   // validación del campo apellidos
   if (apellidos.value.length < 4){

     apellidos.style.borderColor="#f00"
     esCorrecto=false
   }

   // validación del email
   if (!(/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(email.value))) {

     email.style.borderColor="#f00"
     esCorrecto=false
   }

   //Validación de la contraseña
  if (pass1.value.length<4||pass1.value.length>30||
    !/[a-zñ]/.test(pass1.value)||
    !/[A-ZÑ]/.test(pass1.value)||
    !/[0-9]/.test(pass1.value)) {

    pass1.style.borderColor="#f00"
    pass2.style.borderColor="#f00"
    esCorrecto=false
 }

  // Comprobación de que las dos contraseñas son iguales ehkdsfhsdf
  if (pass1.value != pass2.value) {

    pass2.style.borderColor="#f00"
    esCorrecto=false

  }
 
 // Validación de la fecha de nacimiento
 if (fechNac.value.length == 0){

     fechNac.style.borderColor="#f00"
     esCorrecto=false
 }

     return esCorrecto
}

function ValidarChangePwd(){

  var pass1=document.getElementById("pass1")
  var pass2=document.getElementById("pass2")
  var esCorrecto=true

  //Validación de la contraseña
  if (pass1.value.length<4||pass1.value.length>30||
    !/[a-zñ]/.test(pass1.value)||
    !/[A-ZÑ]/.test(pass1.value)||
    !/[0-9]/.test(pass1.value)) {

    pass1.style.borderColor="#f00"
    pass2.style.borderColor="#f00"
    esCorrecto=false
 }

  // Comprobación de que las dos contraseñas son iguales
  if (pass1.value != pass2.value) {

    pass2.style.borderColor="#f00"
    esCorrecto=false

  }

  return esCorrecto
}

function validarEditUsuario(){

  var nombreDeUsuario=document.getElementById("nombreDeUsuario")
   var nombrePersona=document.getElementById("nombrePersona")
   var apellidos=document.getElementById("apellidos")
   var email=document.getElementById("email")
   var fechNac=document.getElementById("fechNac")
   var esCorrecto=true

   // validación del campo nombre de usuario
   if (nombreDeUsuario.value.length <6 || nombreDeUsuario.value.length > 30){

     nombreDeUsuario.style.borderColor="#f00"
     esCorrecto=false
   }

   // validación del campo nombre de la persona
   if (nombrePersona.value.length < 4){

     nombrePersona.style.borderColor="#f00"
     esCorrecto=false
   }

   // validación del campo apellidos
   if (apellidos.value.length < 4){

     apellidos.style.borderColor="#f00"
     esCorrecto=false
   }

   // validación del email
   if (!(/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(email.value))) {

     email.style.borderColor="#f00"
     esCorrecto=false
   }
 
 // Validación de la fecha de nacimiento
 if (fechNac.value.length == 0){

     fechNac.style.borderColor="#f00"
     esCorrecto=false
 }

     return esCorrecto
}



///////////////////// SLIDER //////////////////
//Variables
var num=1
var totalFotos=36
var altoFoto=600


//Función para retroceder una imagen
function atras(){
       num--
       if (num==0){
         num=totalFotos
       }
       document.getElementById("foto").src="./public/img/img"+num+".jpg"
}


//Función para pasar a la siguiente imagen
function adelante(){
   num++
   if (num==totalFotos+1){
     num=1
   }
   document.getElementById("foto").src="./public/img/img"+num+".jpg"
}


//Función para que las fotos vayan pasando solas
function automatico(){
  num++
  if (num>totalFotos) {
       num=1
  }
  document.getElementById("foto").src="./public/img/img"+num+".jpg"
  
}