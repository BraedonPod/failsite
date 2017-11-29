function vote(e) {
    var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    var store = $(e).parent().find('button');
    //console.log(store);
    $(e).parent().addClass('animated flip').one(animationEnd, function() {
        $(e).parent().removeClass('animated flip');
    });
    $(e).addClass('not-active');
    
    if ($(e).parent().find('button').hasClass('vote-up')) {
        $(e).parent().find('button').toggleClass('vote-up vote-up-flip');
    } else if ($(e).parent().find('button').hasClass('vote-down')) {
        $(e).parent().find('button').toggleClass('vote-down vote-down-flip');
    }
    
    axios({
      method: 'patch',
      url: $(e).data("route"),
      data: {
        vote: $(e).data("vote")
      }
    }).then(function (response) {
        //console.log(response);
        store.html(response.data);
    }).catch(function (error) {
        console.log(error);
    });
}
function smile(e){
    //console.log($(e).children('div').html('hello'));
    axios({
      method: 'patch',
      url: $(e).data("route"),
      data: {
        smile: $(e).data("vote")
      }
    }).then(function (response) {
        //console.log(response);
        $(e).children('div').html(response.data);
        $(e).parent().find('button').addClass('disabled').prop('onclick',null).off('click');;
    }).catch(function (error) {
        console.log(error);
    });
}

function commentVote(e)
{
    axios({
      method: 'patch',
      url: $(e).data("route"),
    }).then(function (response) {
        //console.log(response);
        if(response.data[1] != 'report') {
            $(e).children('span').html(response.data[0]);
            $(e).addClass('disabled').prop('onclick',null).off('click');
            if(response.data[1] == 'up') {
                $(e).parent().find('.thumb-down').addClass('disabled').prop('onclick',null).off('click');
            } else {
                $(e).parent().find('.thumb-up').addClass('disabled').prop('onclick',null).off('click'); 
            }    
        } else {
            $(e).addClass('disabled').prop('onclick',null).off('click');
        }
    }).catch(function (error) {
        console.log(error);
    });
}

function reply(id){
    $('#replyto').removeAttr("style");
    $('#replytoid').html(id);
    $('#replyid').val(id);
}

$("#status").fadeOut(2000, function() { $(this).remove(); });