$(document).ready(function() {

    $('body').on('click', 'button.navigation', function(){
      let page = $(this).attr('_id');
      $.post('/' + page)
          .done(function(result) {
              // on update le div.update avec le resultat (list_xhr.php)
              $('.update').html(result);
      }).fail(function(err) {
          console.warn('err', err);
      });
    });

    $('button.save').on('click', function() {
        //req post vers notre index
        $.post('/bookings/store/', pokemon).done(function(result) {
            console.log('success save', result);
            //on update le div.update avec le resultat (list_xhr.php)
            $('.update').html(result);
        }).fail(function(err) {
            console.warn('fail err', err);
        });
    });

    $('body').on('click', 'button.delete', function() {
        let id = $(this).attr('_id');
        let folder = $(this).attr('_current_folder');
        //requete de suppression
        $.post('/' + folder + '/destroy/'+id, {id: id, delete: true})
            .done(function(result) {
                //on update le div.update avec le resultat (list_xhr.php)
                $('.update').html(result);
        }).fail(function(err) {
            console.warn('err', err);
        });
    });

    $('body').on('click', 'button.single', function() {
        let id = $(this).attr('_id');
        let folder = $(this).attr('_current_folder');

        $.post('/' + folder + '/show/'+ id, {id: id, show: true})
            .done(function(result) {
                //on update le div.update avec le resultat (list_xhr.php)
                $('.update').html(result);
        }).fail(function(err) {
            console.warn('err', err);
        });
    });

    $('body').on('click', 'button.add', function() {
        let folder = $(this).attr('_current_folder');

        $.post('/' + folder + '/create')
            .done(function(result) {
                //on update le div.update avec le resultat (list_xhr.php)
                $('.update').html(result);
        }).fail(function(err) {
            console.warn('err', err);
        });
    });
});
