// FUncion para al iniciar la pagina

document.addEventListener('DOMContentLoaded', function(){
    
    /* 1 */ eventListener();
    /* 2 */ /* darkMode(); */

});

function darkMode(){
    // Codigo para modo oscuro
    const systemDarkmode = window.matchMedia('(prefers-color-scheme: dark)');

    if(systemDarkmode.matches){
        document.body.classList.add('dark-mode');
    }
    else{
        document.body.classList.remove('dark-mode');
    }

    systemDarkmode.addEventListener('change',function(){
        if(systemDarkmode.matches){
            document.body.classList.add('dark-mode');
        }
        else{
            document.body.classList.remove('dark-mode');
        }
    })

    const modoOscuro = document.querySelector('.nav-darkmode');
    modoOscuro.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');        
    })
} 

/* =================================== */

function eventListener(){
    const barraNavegacion = document.querySelector('.mobile-menu');
    barraNavegacion.addEventListener('click', abrirNavegacion);

    // Mostrar campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contactar]"]');
    metodoContacto.forEach( function (input) {
        input.addEventListener('click', mostrarMetodosContactos);
    })

}

function abrirNavegacion(){
    const navegacion = document.querySelector('.navegacion-header');
    
    if(navegacion.classList.contains('mostrar')){
        navegacion.classList.remove('mostrar');
    }
    else{
        navegacion.classList.add('mostrar');
    }
}

function mostrarMetodosContactos(e){

    const divContactos = document.querySelector('#contacto');

    if(e.target.value === 'telefono'){
        divContactos.innerHTML = `

            <label for="telefono">Ingrese su telefono</label>
            <input type="tel" placeholder="(+54)" id="telefono" name="contacto[telefono]" >

            <p>Indique la fecha y horario en el que desea ser contactado.</p>
            <div class="marginForm">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="contacto[fecha]">

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
            </div>

        `;
    }
    else if(e.target.value === 'email'){
        divContactos.innerHTML = `
            <label for="email">Ingrese E-mail</label>
            <input type="email" placeholder="Ej: administrador@bienesraices.com" id="email" name="contacto[email]" >
        `;
    }


    /* 
        <p>Si eligió telefono, selecciona fecha y hora</p>
            <div class="marginForm">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="contacto[fecha]">

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
            </div>
    */
}