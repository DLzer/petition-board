$(document).ready(function() {
    
    $('.upvote').click(function(e) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var petition_id = $(this).data('petition_id');
        var $vote_node = $('#petition_vote_'+petition_id);
        var $votes = $vote_node.text();
        $votes = parseInt($votes);
        $votes = $votes+1;
        $vote_node.text($votes);

        $.ajax({
            url: '/petition_vote',
            type: 'POST',
            data: {'_token':csrf_token, 'petition_id': petition_id, 'petition_votes':$votes},
            dataType: 'json',
            success: function(resp) {
                console.log(resp);
            }
        });

        e.preventDefault();
        e.stopPropagation();
    });

    $('.downvote').click(function(e) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var petition_id = $(this).data('petition_id');
        var $vote_node = $('#petition_vote_'+petition_id);
        var $votes = $vote_node.text();
        $votes = parseInt($votes);
        if($votes > 0) {
            $votes = $votes-1;
            $vote_node.text($votes);
            $.ajax({
                url: '/petition_vote',
                type: 'POST',
                data: {'_token':csrf_token, 'petition_id': petition_id, 'petition_votes':$votes},
                dataType: 'json',
                success: function(resp) {
                    console.log(resp);
                }
            });
        } else {
            $votes = 0;
            $vote_node.text($votes);
            $.ajax({
                url: '/petition_vote',
                type: 'POST',
                data: {'_token':csrf_token, 'petition_id': petition_id, 'petition_votes':$votes},
                dataType: 'json',
                success: function(resp) {
                    console.log(resp);
                }
            });
        }
        


        e.preventDefault();
        e.stopPropagation();
    });

    $('.delete').hide();

    $('.admin').click(function() {
        $('.delete').show();
    })

    $('.delete').click(function(e) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var petition_id = $(this).data('petition_id');
        if(confirm('Are you sure you want to delete this petition ?')) {
            $.ajax({
                url: '/delete',
                type: 'post',
                data: {'_token':csrf_token, 'petition_id': petition_id},
                dataType: 'json',
                success: function(resp) {
                    console.log(resp);
                    window.location.href = '/';
                }
            });
        }

        window.location.href = '/';
        console.log('Deleted..');

        e.preventDefault();
        e.stopPropagation();
    });

});