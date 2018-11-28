$(document).ready(function() {
    $('.js-like-article').on('click', function(e) {
        e.preventDefault();

        var $link = $(e.currentTarget);
        $link.toggleClass('fa-heart-o').toggleClass('fa-heart');

        var parameters = {
             likes: parseInt($('.js-like-article-count').html()),
             operation: ($link.hasClass("fa-heart") ? "add" : "reduce")
        };

        $.ajax({
            data: parameters,
            method: 'POST',
            url: $link.attr('href')
        }).done(function(data) {
            $('.js-like-article-count').html(data.hearts);
        })
    });
});
