function Calcular(altura, peso) {
    var resultado = document.getElementById('Resultado')
    var valorh1 = document.getElementById('#valor')
    var valor = document.getElementById('valor')
    var indice = document.getElementById('indice')
    if (isNaN(altura) || isNaN(peso) || altura <= 0 || peso <= 0) {
        var myModal = new bootstrap.Modal(document.getElementById('miModal'));
        myModal.show();
        return;
    }
    let imc = peso / altura ** 2;
    if (resultado.style.display === 'none') {
        valor.innerHTML = `Tu IMC es: ${imc.toFixed(2)}`;
        indice.innerHTML = IMC(imc);
        resultado.style.display = 'block';
        valorh1.style.animation = "resultados 2s";
    }
    else {
        valor.innerHTML = `Tu IMC es: ${imc.toFixed(2)}`;
        indice.innerHTML = IMC(imc);
        valorh1.style.animation = "resultados 2s";
    }

}

function IMC(valor) {
    if (valor < 18.5) {
        return "<center><h2><b>Bajo Peso</b> </h2></center>  <br> <br> <p> &rarr;<b>Aumenta la ingesta calórica:</b>  Intenta comer más calorías de las que quemas, incluyendo alimentos ricos en nutrientes como frutos secos, aguacates y batidos con proteínas." +
            "<br> &rarr;<b>Frecuencia de comidas:</b>  Come pequeñas porciones varias veces al día. Intenta no saltarte ninguna comida.<br>&rarr; <b>Añade proteínas:</b> Incrementa la cantidad de proteínas en tu dieta para ganar masa muscular.Alimentos como huevos, carne, pescado y legumbres son excelentes opciones.<br> &rarr; <b>Consulta a un nutricionista:</b> Es fundamental que un profesional te guíe en el aumento de peso saludable para evitar ganar grasa de manera desproporcionada.<br> &larrEjercicio de resistencia: Practica ejercicios de fuerza o resistencia para ayudar a desarrollar masa muscular, en lugar de solo grasa.     </p > "
    }
    else if (valor >= 18.5 && valor < 24.9) {
        return "<center><h2><b>Normal</b></h2></center> <br> <br> <p> &rarr;<b>Dieta equilibrada:</b>  Mantén una dieta equilibrada y variada, rica en frutas, verduras, proteínas y grasas saludables.<br> &rarr;<b>Controla las porciones:</b>  Evita comer en exceso y controla las porciones de tus comidas.<br> &rarr;<b>Realiza ejercicio:</b>  Mantén una rutina de ejercicio regular para mantener tu peso y mejorar tu salud.<br> &rarr;<b>Consulta a un nutricionista:</b>  Si tienes dudas sobre tu alimentación o necesitas ayuda para mantener un peso saludable, no dudes en consultar a un profesional.</p>"
    }
    else if (valor >= 25 && valor < 29.9) {
        return "<center><h2><b>Sobrepeso</b></h2></center> <br> <br> <p>&rarr;<b>Reduce alimentos procesados:</b> Limita el consumo de alimentos ultraprocesados, que tienden a ser ricos en calorías vacías y grasas saturadas. <br> &rarr;<b>Incrementa la actividad física:</b> Intenta hacer al menos 30 minutos de ejercicio al día, enfocándote en actividades cardiovasculares como caminar, nadar o correr. <br> &rarr;<b>Controla el tamaño de las porciones:</b> Asegúrate de que tus porciones no sean demasiado grandes. Come despacio y escucha a tu cuerpo cuando estés satisfecho. <br> &rarr;<b>Incluye más fibras:</b> Aumenta el consumo de alimentos ricos en fibra como frutas, vegetales, y granos integrales, que ayudan a mejorar la digestión y controlar el apetito. <br>&rarr;<b>Limita el consumo de azúcar:</b> El exceso de azúcar puede contribuir al aumento de peso. Reduce el consumo de refrescos, golosinas y postres procesados.</p>"
    }
    else if (valor >= 30 && valor < 34.9) {
        return "<center><h2><b>Obesidad I</b></h2></center><br><br><p>&rarr;<b>Consulta a un profesional de la salud:</b> Es recomendable que un médico o nutricionista te ayude a desarrollar un plan adecuado para la pérdida de peso. <br> &rarr;<b>Establece objetivos alcanzables:</b> Comienza con metas pequeñas, como perder un 5-10% de tu peso corporal en un periodo razonable. <br> &rarr;<b>Aumenta la actividad física:</b> Haz al menos 150 minutos de ejercicio moderado o 75 minutos de ejercicio intenso a la semana. <br> &rarr;<b>Controla el estrés:</b> El estrés puede llevar a comer en exceso. Considera practicar meditación o ejercicios de respiración para reducirlo. <br>&rarr;<b>Planifica tus comidas:</b> Prepara tus comidas con anticipación para evitar opciones poco saludables cuando tengas hambre.</p>"
    }
    else if (valor >= 35 && valor < 39.9) {
        return "<center><h2><b>Obesidad II</b></h2></center><br><br> <p>&rarr;<b>Trabaja con un equipo médico:</b> Es fundamental contar con el apoyo de un equipo médico para controlar tu salud y planificar la pérdida de peso de forma segura. <br> &rarr;<b>Considera terapias alternativas:</b> En algunos casos, tu médico puede sugerir opciones como la cirugía bariátrica o tratamientos farmacológicos para ayudar con la pérdida de peso. <br> &rarr;<b>Modifica tu entorno alimentario:</b> Elimina alimentos poco saludables de tu entorno y mantén opciones nutritivas y fáciles de preparar al alcance. <br> &rarr;<b>Evita el sedentarismo:</b> Haz pausas activas durante el día si trabajas sentado, y busca formas de moverte más, incluso en casa. <br>&rarr;<b>Registra tu progreso:</b> Mantén un registro de tus comidas, actividades y peso para monitorear tu progreso y mantenerte motivado.</p>"
    }
    else {
        return "<center><h2><b>Obesidad III</b></h2></center><br><br> <p>&rarr;<b>Trabaja con un equipo médico:</b> Es fundamental contar con el apoyo de un equipo médico para controlar tu salud y planificar la pérdida de peso de forma segura. <br> &rarr;<b>Considera terapias alternativas:</b> En algunos casos, tu médico puede sugerir opciones como la cirugía bariátrica o tratamientos farmacológicos para ayudar con la pérdida de peso. <br> &rarr;<b>Modifica tu entorno alimentario:</b> Elimina alimentos poco saludables de tu entorno y mantén opciones nutritivas y fáciles de preparar al alcance. <br> &rarr;<b>Evita el sedentarismo:</b> Haz pausas activas durante el día si trabajas sentado, y busca formas de moverte más, incluso en casa. <br>&rarr;<b>Registra tu progreso:</b> Mantén un registro de tus comidas, actividades y peso para monitorear tu progreso y mantenerte motivado.</p>"
    }
}