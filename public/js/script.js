$(document).ready(function () {
    var table = $('#search-results');
    $('#tablaBuscar').hide();
    $('#like').click(function (e) {

        e.preventDefault();
        var form = $(this).parents('form');
        var url = form.attr('action');

        $('#like', '#cont').show();
        $.post(url, form.serialize(), function (result) {
            $('#cont').html(result.total);
            $('#like').html(result.message);
        });

    });

    $('.follow').click(function (e) {
        e.preventDefault();
        var form = $(this).parents('form');
        var url = form.attr('action');
        $.post(url, form.serialize(), function (result) {
            $('.follower').html(result.total);
            $('.follow').html(result.message);

        });
    });
    $('#search').keyup(function (e) {
        e.preventDefault();
        $('.content').hide();
        var form = $(this).parents('form');
        var url = form.attr('action');
        $.get(url, form.serialize(), function (result) {
            $('#tablaBuscar').show();
            $('.image').show();
            table.html('');
            if (result.users.length > 0) {
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
            }

            if (result.comments.length > 0) {
                result.comments.forEach(function (comment) {
                    table.append('<a class="searchPhoto" href="photo/' + comment.id + '">' +
                        '<table id="search-results "class="table table-borderless">' +
                        '<tbody>' + '' +
                        '<tr>\n' +
                        '<th colspan="2" id="image"><img src="' + comment.imagen + '" width="90px" alt=""></th>\n' +

                        '<td class="comment">' + comment.comment + '<br></td>\n' +
                        '</tr>' +
                        '</tbody>' +
                        '</table>' +
                        '</a>'
                    );

                });
            }

        });
    });

});
