$(document).ready(function () {
    const canvas = document.querySelector('#micanvas');

    const contenedor = canvas.getContext('2d');
    
    // Usamos todo el alto y ancho disponible para el canvas
    canvas.height = "200";
    canvas.width = "400";
    const COLOR_FONDO = "white";
    
    const limpiarCanvas = () => {
      // Colocar color blanco en fondo de canvas
      contenedor.fillStyle = COLOR_FONDO;
      contenedor.fillRect(0, 0, canvas.width, canvas.height);
    };
    limpiarCanvas();
    
    // Ancho del Trazo 
    contenedor.lineWidth = 2;
    
    // Trazo redondeado 
    //contenedor.lineCap = 'round';
    
    // Color del trazo del dibujo en el Canvas 
    contenedor.strokeStyle = '#00000';
    
    // No permitir dibujar hasta que no presione el botón del mouse 
    let estaDibujando = false;
    
    // Desde dónde comenzar una línea y luego dónde terminarla
    let vectorX = 0;
    let vectorY = 0;
    
    let direccion = true;
    
    function dibujo(evento) {
    
     //Solo permitir dibujar haciendo clic y arrastrando el puntero del mouse 
     if (!estaDibujando)
       return;
    
     console.log(evento);
    
     contenedor.beginPath();
     // El cursor para comenzar a dibujar se mueve a esta coordenada        
     contenedor.moveTo(vectorX, vectorY);
    
     // Se traza una línea desde el inicio 
     contenedor.lineTo(evento.offsetX, evento.offsetY);
    
     // Dibujamos las líneas 
     contenedor.stroke();
    
     [vectorX, vectorY] = [evento.offsetX, evento.offsetY];
    
    
     if(contenedor.lineWidth >= 80 || contenedor.lineWidth <= 1){
       direccion = !direccion;
     }
    
    
    }
    
    // Eventos del Mouse 
    canvas.addEventListener('mousemove', dibujo);
    canvas.addEventListener('mousedown', (evento)=>{
     // Permitir dibujar cuando se presiona el botón del mouse 
     estaDibujando = true;
    
     [vectorX, vectorY] = [evento.offsetX, evento.offsetY];
    });
    
    // Eventos del Mouse 
    canvas.addEventListener('mouseup', ()=>estaDibujando = false);
    canvas.addEventListener('mouseout', ()=>estaDibujando = false);
    
    
    /* Usar Canvas en Dispositivos Móviles */
    
    // Dibujar al tocar la pantalla del dispositivo móvil
    document.body.addEventListener("touchstart", function(evento) {
     if (evento.target == canvas) {
       evento.preventDefault();
       clienteX = evento.touches[0].clientX;
       clienteY = evento.touches[0].clientY;
       estaDibujando = true;
       dibujo(clienteX, clienteY)
     }
    }, false);
  
    // No Dibujar al dejar de tocar la pantalla del dispositivo móvil
    document.body.addEventListener("touchend", function(evento) {
     if (evento.target == canvas) {
       evento.preventDefault();
       estaDibujando = false;
     }
    }, false);
    
    // Permitir desplazarse en la pantalla del dispositivo móvil
    document.body.addEventListener("touchmove", function(evento) {
     if (evento.target == canvas) {
       evento.preventDefault();
       evento.offsetX = evento.targetTouches[0].clientX;
       evento.offsetY = evento.targetTouches[0].clientY;
       dibujo(evento)
     }
    }, false);
        
});