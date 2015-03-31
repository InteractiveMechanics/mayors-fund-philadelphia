$(function(){
    var filter = false;

    $(document).on('click', '.icon', function(){
        var id = $(this).attr('id');
        var $area = $('.icon');
        var $summary = $('.initiative-summary');

        if ($('#' + id).hasClass('active') && filter === true) {
            // Show all filters
            $area.addClass('active');

            // Show all initiative blocks on the page
            $summary.parent().removeClass('hidden');

            // Store our filter variable
            filter = false;
        } else {
            // Hide and show active states in the filters
            $area.removeClass('active');
            $('#' + id).addClass('active');

            // Filter out the blocks that don't have the right priority
            $summary.parent().removeClass('hidden');
            $summary.each(function(i){
                var priorities = $(this).attr('data-priorities');

                if ( priorities.indexOf(id) === -1 ){
                    $(this).parent().addClass('hidden');
                }
            });

            // Store our filter variable
            filter = true;
        }
    });

    if( $('#priority-querystring').val() != null ){
        var priority = $('#priority-querystring').val();
        console.log(priority);

        if (priority){ 
            $('.icon').removeClass('active');
            $('#' + priority).addClass('active'); 
        }

        $('.initiative-summary').each(function(i){
            var priorities = $(this).attr('data-priorities');

            if ( priorities.indexOf(priority) === -1 ){
                $(this).parent().addClass('hidden');
            }
        });
    }

    $('.slideshow').slick({
        dots: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: false
    });
});