

var encendido = document.getElementById('btn_encendido');
var apagado = document.getElementById('btn_apagado');

// Description: Contiene las funciones para leer un codigo QR
const video = document.createElement("video");

//nuestro camvas
const canvasElement = document.getElementById("qr-canvas");
const canvas = canvasElement.getContext("2d");

//div donde llegara nuestro canvas
const btnScanQR = document.getElementById("btn-scan-qr");

//lectura desactivada
let scanning = false;

//funcion para encender la camara
const encenderCamara = () => {
  apagado.style.display = "block";
  encendido.style.display = "none";
  navigator.mediaDevices
    .getUserMedia({ video: { facingMode: "environment" } })
    .then(function (stream) {
      scanning = true;
      btnScanQR.hidden = true;
      canvasElement.hidden = false;
      video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen
      video.srcObject = stream;
      video.play();
      tick();
      scan();
    });
};

//funciones para levantar las funiones de encendido de la camara
function tick() {
  canvasElement.height = video.videoHeight;//alto del video
  canvasElement.width = video.videoWidth;//ancho del video
  canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);
  scanning && requestAnimationFrame(tick);
}

function scan() {
  try {
    qrcode.decode();
  } catch (e) {
    setTimeout(scan, 300);// tiempo de espera para volver a leer el codigo
  }
}

//apagara la camara
const cerrarCamara = () => {
  apagado.style.display = "none";
  encendido.style.display = "block";
  
  video.srcObject.getTracks().forEach((track) => {
    track.stop();
  });
  canvasElement.hidden = true;
  btnScanQR.hidden = false;
};

const activarSonido = () => {
  var audio = document.getElementById('audioScaner');
  audio.play();
}

//callback cuando termina de leer el codigo QR
qrcode.callback = (respuesta) => {
  if (respuesta) {
    console.log(respuesta);
    window.location.href = respuesta;
    Swal.fire(respuesta)
    activarSonido();
    //encenderCamara();    
    cerrarCamara();

  }
};
//evento para mostrar la camara sin el boton 
// window.addEventListener('load', (e) => {
//   encenderCamara();
// })




