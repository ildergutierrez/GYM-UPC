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
    const s_hora = document.getElementById('s_hora');
    const opc = document.getElementById('opc_hora');
    const horaSelect = document.getElementById('horaSelect');

    if(horaSelect == null){
        // mostrar modal de bootstrap con el id "mi_modal"
        var myModal = new bootstrap.Modal(document.getElementById('miModal'));
        myModal.show();

    }else{


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
    });}
}

function Horarios() {
    opcion = document.querySelectorAll('input[name="op"]');
    const recargar = document.getElementById('opc_hora');

    opcion.forEach(radio => {
        radio.addEventListener('change', () => {
            if (radio.checked) {
                console.log(radio.value);
                let valor = radio.value;
                if (valor == 0) {
                    recargar.innerHTML = `
                    <select class="form-select-2" multiple aria-label="multiple select example" id="horaSelect">
                                                    <option  value="6:00">6:00 am</option>
                                                    <option value="7:00">7:00 am</option>
                                                     <option value="8:00">8:00 am</option>
                                                    <option value="9:00">9:00 am</option>
                                                </select>
                    `;
                } else if (valor == 1) {
                    recargar.innerHTML = `
                    <select class="form-select-2" multiple aria-label="multiple select example" id="horaSelect">
                                                    <option value="16:00">4:00 pm</option>
                                                    <option value="17:00">5:00 pm</option>
                                                    <option value="18:90">6:00 pm</option>
                                                    
                                                </select>
                    `;
                } else {
                    recargar.innerHTML = `
                    <select class="form-select-2" multiple aria-label="multiple select example" id="horaSelect">
                                                    <option value="19:00">7:00 pm</option>
                                                    <option value="20:00">8:00 pm</option>
                                                </select>
                    `;
                }
            }
        }
        );
    });

}