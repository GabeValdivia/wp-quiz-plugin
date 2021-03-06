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
        
        var data = {
            action: 'quizbook_results',
            data: id_answers
        }

        $.ajax({
            url: admin_url.ajax_url,
            type: 'post',
            data: data
        }).done(function(answer) {
            var course;
            if(answer.score > 60) {
                course = 'approved';
            } else {
                course = 'not-approved';
            }

            $('#quizbook-result').append('Total: ' + answer.score).addClass(course);
            $('#quizbook_btn_submit').remove();
        });

        

    });


})(jQuery);