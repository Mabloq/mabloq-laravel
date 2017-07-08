
  $(document).ready(function() {

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });

    $('[data-modal="#modal2"]').click(function() {
      $('#modal2').children().toggleClass('fallen');
    });

    $('.modal-close').click(function() {
      $('#modal2').children().toggleClass('fallen');
    });

    $('.cell, .cell img, .cell h2, .cell p').click( function(event) {

      var projectID = $(event.target).data('project')

      $.ajax({
        type: 'POST',
        url: '/portfolio-read',
        data: {
          '_token': $('input[name=_token]').val(),
          'id' : projectID

        },
        success: function(response) {
              console.log(response)
              $('#modal-head').html(response.name)
              $('.modal-bot .modal-dialouge').html(response.description)
              $('.modal-header').css('background', 'url(/images/'+response.image)
              $('#project-visit').attr('href', response.URL)


    }
  });
});
});
