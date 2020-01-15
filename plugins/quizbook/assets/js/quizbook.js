(function($) {
    $('#quizbook ul li .answer').on('click', function(){
        $(this).siblings().removeAttr('data-selected');
        $(this).siblings().removeClass('selected');
        $(this).addClass('selected');
        $(this).attr('data-selected', true);
    });
})(jQuery);