$(document).ready(function () {
    var table = $('#search-results');
    $('#tablaBuscar').hide();
   /** $('#like').click(function (e) {

        e.preventDefault();
        var form = $(this).parents('form');
        var url = form.attr('action');

        $('#like', '#cont').show();
        $.post(url, form.serialize(), function (result) {
            $('#cont').html(result.total);
            $('#like').html(result.message);
        });

    });
*/

    $('#search').keyup(function (e) {
        e.preventDefault();
        $('.content').hide();
        var form = $(this).parents('form');
        var url = form.attr('action');
        $.get(url, form.serialize(), function (result) {
            $('#tablaBuscar').show();
            $('.image').show();
            table.html('');
            if (result.users.length > 0||result.publicaciones.length > 0) {
                result.users.forEach(function (user) {
                    table.append('<a id="searchProfile" href="user/' + user.id + '">' +
                        '<table id="search-results" class="table table-borderless">' +
                        '<tbody>' +
                        '<tr>\n' +
                        '<a href="' + user.image + '" class="searchProfile">' +
                        '        <th scope="row"  id="imagen" ><img src="' + user.image + '" width="90px" alt=""></th>' +
                        '        <td  class="name">' + user.name + '</td>\n' +
                        '        <td class="email">' + user.email + '</td>\n' +
                        '</a>\n' +
                        '</tr>' +
                        '</tbody>' +
                        '</table>' +
                        '</a>'
                    );
                });
                result.publicaciones.forEach(function (publicacion) {
                    table.append('<a id="searchPhoto" href="photo/' + publicacion.id + '">' +
                        '<table id="search-results" class="table table-borderless">' +
                        '<tbody>' +
                        '<tr>\n' +
                        '<a href="' + publicacion.imagen + '" class="searchProfile">' +
                        '        <th scope="row"  id="image" ><img src="' + publicacion.imagen + '" width="90px" alt=""></th>' +
                        '        <td  class="nombre_p">'+ publicacion.nombre_p + '</td>\n' +
                        '        <td class="precio">'+ publicacion.precio + '</td>\n' +
                        '        <td class="descripcion">' + publicacion.descripcion + '</td>\n' +
                        '</a>\n' +
                        '</tr>' +
                        '</tbody>' +
                        '</table>' +
                        '</a>'
                    );
                });
            }else{
                $('#tablaBuscar').hide();
                $('.content').show();
            }
        });
    });

});
