$(document).ready(function() {
    const encabezado_btn = document.querySelectorAll('#encabezado-div button'); //creo un variable constante que selecciona y almacena todos ls elementos botones dentro de mi encabezado div

    const add_btn=document.getElementById('#btn-addproducto-encabezado');//variable que selecciona el boton para agregar productos
    const dlt_bn=document.getElementById('#btn-dltproducto-encabezado');//variable que selecciona el boton para eliminar productos
    const edt_btn=document.getElementById('#btn-edtproducto-encabezado');//variable que selecciona el boton para editar productos

    const froms_footer=document.getElementById('forms');//Variable selecciona todas las forms del footer
    const add_form=document.getElementById('add-producto-form');//Variable selecciona la froms de agregar producto
    const edt_form=document.getElementById('edt-producto-form');//Variable selecciona la froms de agregar producto
    const dlt_form=document.getElementById('dlt-producto-form');//Variable selecciona la froms de agregar producto

    ///////////////////////////////////////////////
    // ANIMACIONES DE LOS BOTONES DEL ENCABEZADO //
    ///////////////////////////////////////////////

    encabezado_btn.forEach(btn =>{//funcion flecha para dar los parametros de modificaccion a mi for loop
        btn.addEventListener('mouseenter',() =>{//indica que lo que hace solo pasa cuando el event "mouseenter", el "() =>" es una funcion flecha que indica lo que va a hacerse
            encabezado_btn.forEach(b => {
                if (b !== btn){//este foreach + el if afecta todo menos el boton que esta actualment seleccionado por el event listener.
                    b.style.transform = 'scale(0.90)';//achica los botones no enfocados
                    b.style.opacity = 0.5;//hace los botones no enfocados un poco transparentes
                }
            });

            btn.style.transform = 'scale(1.10)';//incrementa el tamaño del boton seleccionado
        });

        btn.addEventListener('mouseleave', () => { //event listener para cuando el puntero deja de estar sobre un boton
            encabezado_btn.forEach(b => {
                b.style.transform = 'scale(1)';
                b.style.opacity = 1;
            });

        });
    });

    ///////////////////////////////////////////////////////////////////
    // MOSTRAR Y OCULTAR LOS FORMULARIOS CON LOS BOTONES DEL ENCABEZADO //
    ///////////////////////////////////////////////////////////////////
    encabezado_btn.forEach(btn => {
        // ANIMAR LOS BOTONES CUANDO SE HACE CLICK //
        btn.addEventListener('click',() =>{
            encabezado_btn.forEach(b =>{
                if (b !== btn){
                    b.style.transform = 'scale(0.90)';
                    b.style.opacity = 0.5;
                }
            });
            btn.style.transform = 'scale(1.10)';
        // MOSTRAR LAS FORMS //
            if (btn && btn.id == 'btn-addproducto-encabezado'){
                froms_footer.style.height='5vh';
                add_form.style.display='flex';
                edt_form.style.display='none';
                dlt_form.style.display="none";
            }else if (btn && btn.id == 'btn-edtproducto-encabezado'){
                froms_footer.style.height='5vh';
                edt_form.style.display='flex';
                add_form.style.display='none';
                dlt_form.style.display="none";
            }else if (btn && btn.id == 'btn-dltproducto-encabezado'){
                froms_footer.style.height='5vh';
                dlt_form.style.display="flex";
                edt_form.style.display='none';
                add_form.style.display='none';
            }
        });
    })

    ////////////////////////////////////////////////
    //MANEJO DE LA FUNCION Y EL BOTON PARA AGREGAR //
    /////////////////////////////////////////////////
    $('#add-producto-form').submit(function(event) {
        event.preventDefault();

        // 
        var nombre = $('#producto-nombre').val();
        var precio = $('#producto-precio').val();
        var cantidad = $('#producto-cantidad').val();

        // 
        $.ajax({
            type: 'POST',
            url: 'index.php',  
            data: {
                nombre: nombre,
                precio: precio,
                cantidad: cantidad,
                Guardar: true
            },
            success: function(data) {
                location.reload();
            },
            error: function(err) {
                // 
                console.error('Error: ' + JSON.stringify(err));
            }
        });
    });

     ////////////////////////////////////////////////
    //MANEJO DE LA FUNCION Y EL BOTON PARA EDITAR //
    /////////////////////////////////////////////////
    $('#edt-producto-form').submit(function(event) {
        event.preventDefault();

        // 
        var nombre = $('#producto-nombre-e').val();
        var precio = $('#producto-precio-e').val();
        var cantidad = $('#producto-cantidad-e').val();
        var id = $('#producto-id-e').val();
        console.log(nombre);
        console.log(precio);
        console.log(cantidad);
        console.log(id);

        // 
        $.ajax({
            type: 'POST',
            url: 'index.php',  
            data: {
                nombre: nombre,
                precio: precio,
                cantidad: cantidad,
                id: id,
                Editar: true
            },
            
            success: function(data) {
                location.reload();
            },
            error: function(err) {
                // 
                console.error('Error: ' + JSON.stringify(err));
            }
        });
    });

     ////////////////////////////////////////////////
    //MANEJO DE LA FUNCION Y EL BOTON PARA BORRAR //
    /////////////////////////////////////////////////
    $('#dlt-producto-form').submit(function(event) {
        event.preventDefault();

        // 
        var id = $('#producto-id-d').val();

        // 
        $.ajax({
            type: 'POST',
            url: 'index.php',  
            data: {
                id: id,
                Eliminar: true
            },
            
            success: function(data) {
                location.reload();
            },
            error: function(err) {
                // 
                console.error('Error: ' + JSON.stringify(err));
            }
        });
    });
});

