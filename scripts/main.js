(function($) {

  $('.mypost').on('click', function(e) {
    var post_id = $(this).data('id'),
        $postContent = $("#post-" + post_id);

    $postContent.html('');

    var data = {
      'action'  : 'PostAjaxme',
      'post-id' : post_id
    };

    var request = $.ajax({
      url      : wpAjax.ajaxurl,
      data     : data,
      method   : "POST",
      dataType : 'json'
    });

    request.success(function(r) {
      var html = '<div class="entry-content">'+r.html+'</div>';
      $postContent.html(html);
    });

    e.preventDefault();
  });

})(jQuery);