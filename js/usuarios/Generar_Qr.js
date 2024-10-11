window.onload = function () {
    const informacion = document.getElementById('input-link').value;
    const canvas = document.getElementById('qrcode');
    const imagen_2d = canvas.getContext('2d');

    // Configuración para generar el QR en el canvas
    const qrtamaño = 300;  // Cambiar el tamaño aquí
    canvas.width = qrtamaño;
    canvas.height = qrtamaño;

    // Generar el código QR con mayor resolución
    const qrCode = new QRCode(document.createElement('div'), {
        text: informacion,
        width: qrtamaño,  // Tamaño ajustado del QR
        height: qrtamaño,
        colorDark: "#ffffff", // Color  para el QR
        colorLight: "#121A1C" // Fondo 
    });

    // Esperar a que el QR se genere
    setTimeout(() => {
        // Obtener el canvas generado por QRCode.js
        const qrCanvas = qrCode._oDrawing._elCanvas;

        // Dibujar el QR en el canvas principal
        imagen_2d.drawImage(qrCanvas, 0, 0);

        // Cargar y dibujar la imagen en el centro del QR

    }, 500); // Timeout para asegurarse de que el QR está generado
};
