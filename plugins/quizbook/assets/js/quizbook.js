(function($) {
    $('#quizbook ul li .answer').on('click', function(){
        $(this).siblings().removeAttr('data-selected');
        $(this).siblings().removeClass('selected');
        $(this).addClass('selected');
        $(this).attr('data-selected', true);
    });

    $('#quizbook_send').on('submit', function(e) {
        e.preventDefault();

        var answer = $('[data-selected]');

        var id_answers = [];
        $.each(answer, function(key, value) {
            id_answers.push(value.id);
        });

        console.log(id_answers);
    });
})(jQuery);