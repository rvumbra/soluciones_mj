//#region Inicio de carga de JQuery tras cargar el HTML completo
jQuery(document).ready( function () {
    expandContent();

    switch(getEndPoint()){
        case "home":
            initHome();
            break;
        case "list-fest":
            initFestList();
            break;
        case "list-users":
            initUserList();
            break;
        default:break;
    }
});
//#endregion

//#region Funcionamiento global.
/**
 * Adapta el contenido del body en relación con el menú lateral.
 */
function expandContent(){
    if($("#menuBtn")){
        $("#menuBtn").on('click', function () {
            if ($('.sidebar'))
                $('.sidebar').toggleClass('collapsed');
            if ($('#app'))
                $('#app').toggleClass('shifted');
        });
    }
}

/**
 * Obtiene el endpoint de la URL
 * 
 * @returns {String} Endpoint como cadena de texto.
 */
function getEndPoint(){
    var pathname = window.location.pathname;
    var endpoint = '';

    if(pathname.includes("/")){
        parts = pathname.split("/");
        endpoint = parts[parts.length-1];
    }

    return endpoint;
}

/**
 * Genera la tabla correspondiente con la librería datatable.
 * 
 * @param {String} idTabla Id de la tabla a la que se le aplica la librería.
 */
function setDataTable(idTabla){
    $(`#${idTabla}`).DataTable({
        responsive:true,
        select: true,
        paging: true,
        searching: true,
        info: true,
        pagingType: 'full_numbers',
        boundaryNumbers:true
    });
}

/**
 * Permite seleccionar una única fila de la tabla al hacerle click.
 */
function setRowSelected(){
    $('.row-selectable').on('click', function(){
        var checkbox = $(this).find('td > input[type=checkbox]');

        $('.row-selectable').find('td > input[type=checkbox]').not(checkbox).prop('checked', false);
        checkbox.prop('checked', !checkbox.is(':checked'));
    })

    $('.row-selectable > td > input[type=checkbox]').on('change', function(){
        var c = $(this);

        $('.row-selectable > td > input[type=checkbox]').not(c).prop('checked', false);
        c.prop('checked', !c.is(':checked'));
    });
}

/**
 * Comprueba si el año recibido es o no un año bisiesto.
 * 
 * @param {int} year Año a comprobar.
 * @returns {Boolean} Confirmación si es un año bisiesto.
 */
function isLeapYear(year) {
    return ((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0);
}

/**
 * Obtiene el número de días que hay en un mes.
 * 
 * @param {Number} month Mes del año. 
 * @param {Number} year Año en el que se encuentra.
 * @returns 
 */
function getDaysInMonth(month, year) {
    switch(month) {
        case 2:
            return isLeapYear(year) ? 29 : 28;
        case 4: case 6: case 9: case 11:
            return 30;
        default:
            return 31;
    }
}

/**
 * Permite ajustar el valor máximo del input de día cuando se cambia el mes.
 * 
 * @param {String} modal Nombre del modal en el que se encuentran los inputs.
 */
function adjustDayInput(modal) {
    var dayValue = $(`#${modal}_day`).val();
    var monthValue = $(`#${modal}_month`).val();
    var yearValue = $(`#${modal}_year`).val() || new Date().getFullYear();
    var maxDays = getDaysInMonth(monthValue, yearValue);

    if (dayValue >= maxDays)
        $(`#${modal}_day`).val(maxDays);
}
//#endregion

//#region Home
/**
 * Inicializa la funcionalidad de la pantalla de inicio.
 */
function initHome(){
    setCalendar();
}

/**
 * Genera el calendario con year-calendar.
 */
function setCalendar(){
    var data = [];

    $.ajax({
        url: `${window.location.pathname}/get-fests`,
        method: 'GET',
        success: function(response) {
            response.map(event => {
                data.push({
                    name: event.name,
                    startDate: new Date(event.startDate),
                    endDate: new Date(event.endDate),
                    color: event.color
                });
            });
            var calendar = new Calendar(document.querySelector('#year-calendar'), {
                dataSource: data,
                language:'en',
                style: 'border',
                clickDay:function(e){
                },
                mouseOnDay:function(e){
                    if($(e.element).css('box-shadow') !== 'none'){
                        var offset = $(e.element).offset();
                        $('#colorOfEvent').css('box-shadow', $(e.element).css('box-shadow'))
                        $('#contentOfEvent').html('');
                        e.events.map(ev=>{
                            $('#contentOfEvent').append(
                                `<p>
                                    ${ev.name}
                                </p>`);
                        })

                        $('#event-window').css({
                            top: offset.top + $(e.element).height(),
                            left: offset.left
                        }).toast('show');
                    }
                },
                mouseOutDay:function(e){
                    $('#event-window').toast('hide');
                },
                mouseleave:function(e){
                    $('#event-window').toast('hide');
                }
            });
            calendar.setDataSource(data);
        },
        error: function(xhr, status, error) {
            console.error('Error al obtener los días festivos:', error);
        }
    });
}
//#endregion

//#region fest-list
/**
 * Inicializa la funcionalidad de la lista de días festivos.
 */
function initFestList(){
    setDataTable('festList_table');
    setRowSelected();
    setAddFest();
    setUpdateFest();
    setDeleteFest();
}

/**
 * Permite añadir la paleta de colores a un input.
 * 
 * @param {String} modal Id del elemento HTML input al que se le añadirá Spectrum.
 */
function setSpectrum(modal){
    $(`#${modal}_color`).spectrum({
        color: "#f00",
        chooseText: "Alright",
        showInput: true,
        showAlpha: true,
        preferredFormat: "hex",
        change: function(color) {
            $(`#${modal}_color`).val(color.toHexString());
        }
    });
    $(`#${modal}_color`).show();
}

/**
 * Prepara el modal para añadir un día festivo.
 */
function setAddFest(){
    var modal = 'modalCreateFest';

    setSpectrum(modal);

    /**
     * Crea un nuevo día festivo.
     */
    $('#btnCreateFest').on('click', function() {
        var formData = {
            name: $(`#${modal}_name`).val(),
            color: $('.sp-input').val(),
            date: $(`#${modal}_date`).val(),
            month: $(`#${modal}_month`).val(),
            recurrent: $(`#${modal}_recurrent`).is(':checked') ? 1 : 0,
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url: `${window.location.pathname}`,
            method: 'POST',
            data: formData,
            success: function(response) {
                $(`#${modal}`).modal('hide');
                window.location.reload();
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    });
}

/**
 * Prepara el modal para editar un día festivo.
 */
function setUpdateFest(){
    var modal = 'modalEditFest';

    setSpectrum(modal);

    /**
     * Settear modal.
     */
    $('#btnEditFest').on('click', function(e){
        var row = $('.row-selectable input[type="checkbox"]:checked');

        if(row.length <= 0){
            e.stopImmediatePropagation();
            alert('Se debe seleccionar un día festivo.');
            $(`#${modal}_id`).val('');
            $(`#${modal}_name`).val('');
            $(`#${modal}_color`).val('');
            $(`#${modal}_date`).val('');
            $(`#${modal}_recurrent`).prop('checked', false);
            return;
        }
        else{
            var fest = $('.row-selectable input[type="checkbox"]:checked').closest('tr');

            $(`#${modal}_id`).val(fest.find('td').eq(1).text());
            $(`#${modal}_name`).val(fest.find('td').eq(2).text());
            $(`#${modal}_color`).val(fest.find('td').eq(3).text());
            $(`#${modal}_color`).spectrum('set', fest.find('td').eq(3).text());
            $(`#${modal}_date`).val(fest.find('td').eq(4).text());
            $(`#${modal}_recurrent`).prop('checked', fest.find('td').eq(7).text() === '1');
        }   
    });

    /**
     * Actualizar campos.
     */
    $('#btnUpdateFest').on('click', function() {
        var formData = {
            name: $(`#${modal}_name`).val(),
            color: $(`#${modal}_color`).val(),
            date: $(`#${modal}_date`).val(),
            recurrent: $(`#${modal}_recurrent`).is(':checked') ? 1 : 0,
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url: `${window.location.pathname}/${$(`#${modal}_id`).val()}`,
            method: 'POST',
            data: formData,
            success: function(response) {
                $(`${modal}`).modal('hide');
                window.location.reload();
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    });
}

/**
 * Prepara el modal de eliminación de días festivos.
 */
function setDeleteFest(){
    var modal = 'modalDeleteFest';

    /**
     * Settear modal.
     */
    $('#btnDeleteFest').on('click', function(e){
        var row = $('.row-selectable input[type="checkbox"]:checked');

        if(row.length <= 0){
            e.stopImmediatePropagation();
            alert('Se debe seleccionar un día festivo.');
            return;
        }
        else{
            var user = $('.row-selectable input[type="checkbox"]:checked').closest('tr');

            $(`#${modal}_id`).val(user.find('td').eq(1).text());
        }
    });

    /**
     * Eliminar día festivo.
     */
    $('#btnDestroyFest').on('click', function() {
        var formData = {
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url: `${window.location.pathname}/${$(`#${modal}_id`).val()}`,
            type: 'DELETE',
            data: formData,
            success: function(response) {
                console.log(response);
                $(`#${modal}`).modal('hide');
                window.location.reload();
            },
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    });
}

//#endregion

//#region user-list
/**
 * Inicializa la funcionalidad de la lista de usuarios.
 */
function initUserList(){
    setDataTable('userList_table');
    setRowSelected();
    setEditUser();
    setDeleteUser();
    setAddUser();
}

/**
 * Prepara el modal para añadir nuevos usuarios.
 */
function setAddUser(){
    var modal = 'modalCreateUser';

    /**
     * Crea un nuevo usuario
     */
    $('#btnCreateUser').on('click', function() {
        var formData = {
            name: $(`#${modal}_name`).val(),
            lastname: $(`#${modal}_lastname`).val(),
            email: $(`#${modal}_email`).val(),
            password: $(`#${modal}_password`).val(),
            password_confirmation: $(`#${modal}_password_confirmation`).val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url: `${window.location.pathname}`,
            method: 'POST',
            data: formData,
            success: function(response) {
                $(`#${modal}`).modal('hide');
                window.location.reload();
            },
            error: function(xhr, status, error) {
                //alert(xhr.responseText);
            }
        });
    });
}

/**
 * Prepara el modal para la edición de usuario.
 */
function setEditUser(){
    var modal = 'modalEditUser';

    /**
     * Settear modal.
     */
    $('#btnEditUser').on('click', function(e){
        var row = $('.row-selectable input[type="checkbox"]:checked');

        if(row.length <= 0){
            e.stopImmediatePropagation();
            alert('Se debe seleccionar un usuario.');
            $(`#${modal}_id`).val('');
            $(`#${modal}_name`).val('');
            $(`#${modal}_email`).val('');
            $(`#${modal}_lastname`).val('');
            return;
        }
        else{
            var user = $('.row-selectable input[type="checkbox"]:checked').closest('tr');

            $(`#${modal}_id`).val(user.find('td').eq(1).text());
            $(`#${modal}_name`).val(user.find('td').eq(2).text());
            $(`#${modal}_lastname`).val(user.find('td').eq(3).text());
            $(`#${modal}_email`).val(user.find('td').eq(4).text());
        }
    });

    /**
     * Actualizar campos.
     */
    $('#btnUpdateUser').on('click', function() {
        var formData = {
            name: $(`#${modal}_name`).val(),
            lastname: $(`#${modal}_lastname`).val(),
            email: $(`#${modal}_email`).val(),
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url: `${window.location.pathname}/${$(`#${modal}_id`).val()}`,
            method: 'POST',
            data: formData,
            success: function(response) {
                $(`${modal}`).modal('hide');
                window.location.reload();
            },
            error: function(xhr, status, error) {
                //alert(xhr.responseText);
            }
        });
    });
}

/**
 * Permite eliminar un usuario de la lista.
 */
function setDeleteUser(){
    var modal = 'modalDeleteUser';

    /**
     * Settear modal.
     */
    $('#btnDeleteUser').on('click', function(e){
        var row = $('.row-selectable input[type="checkbox"]:checked');

        if(row.length <= 0){
            e.stopImmediatePropagation();
            alert('Se debe seleccionar un usuario.');
            return;
        }
        else{
            var user = $('.row-selectable input[type="checkbox"]:checked').closest('tr');

            $(`#${modal}_id`).val(user.find('td').eq(1).text());
        }
    });

    /**
     * Eliminar usuario.
     */
    $('#btnDestroyUser').on('click', function() {
        var formData = {
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $.ajax({
            url: `${window.location.pathname}/${$(`#${modal}_id`).val()}`,
            method: 'DELETE',
            data: formData,
            success: function(response) {
                $(`#${modal}`).modal('hide');
                window.location.reload();
            },
            error: function(xhr, status, error) {
                //alert(xhr.responseText);
            }
        });
    });
}
//#endregion
