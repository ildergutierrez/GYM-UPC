function Lugares() {
    const lugar = document.getElementById('lugar');
    const s_lugar = document.getElementById('s_lugar');
    const opc = document.getElementById('opc');
    const lugarSelect = document.getElementById('lugarSelect');
    if (opc.style.display === 'none') {
        opc.style.display = 'block';
    } else {
        opc.style.display = 'none';
    }
    s_lugar.value = '';
    lugarSelect.addEventListener('change', () => {
        const selectedOptions = Array.from(lugarSelect.selectedOptions).map(option => option.text);
        //seleccionar solo un valor
        s_lugar.value = selectedOptions[0];

        opc.style.display = 'none';
    });
} 

function Hora() {
    const hora = document.getElementById('hora');
    const s_hora = document.getElementById('s_hora');
    const opc = document.getElementById('opc_hora');
    const horaSelect = document.getElementById('horaSelect');
    if (opc.style.display === 'none') {
        opc.style.display = 'block';
    } else {
        opc.style.display = 'none';
    }
    s_hora.value = '';
    horaSelect.addEventListener('change', () => {
        const selectedOptions = Array.from(horaSelect.selectedOptions).map(option => option.text);
        s_hora.value = selectedOptions[0];
        opc.style.display = 'none';
    });
}