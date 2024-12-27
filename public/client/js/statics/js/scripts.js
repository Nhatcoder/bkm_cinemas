$(document).ready(function() {
    $(".btn-search").on('click', function(e) {
        if ($(".form-search").hasClass('search-effect')) {
            $(".form-search").removeClass('search-effect');
            $(".btn-search i").addClass('fa-search').removeClass('fa-times');
            $(".form-search").width("0px");
        } else {
            $(".form-search").addClass('search-effect');
            $(".btn-search i").addClass('fa-times').removeClass('fa-search');
            $(".form-search").width((e.pageX - 15) + "px");
        }
    });
    $('#noti_Button').click(function() {
        $('#notifications').fadeToggle('fast');
    });
    $(window).scroll(function() {
        if ($(window).scrollTop() > $('#header').height()) {
            $('#touchcinema-fixed-top').addClass("navbar-fixed-top").css({
                "margin-top": "0px"
            });
            $("#primary-menu").addClass('container')
            $('body').css({
                "padding-top": "62px"
            })
        } else {
            $('#touchcinema-fixed-top').removeClass("navbar-fixed-top");
            $("#primary-menu").removeClass('container')
            $('body').css({
                "padding-top": "0px"
            })
        }
    })
    $(".buy-ticket").on('click', function() {
        $(".widget-ticket").addClass('fixed')
    })
    $(".close-modal").on('click', function() {
        $(".widget-ticket").removeClass('fixed')
    })
    $(".btn-subscribe").on('click', function() {
        var email = $("#email-subscribe").val()
        if (email == '') {
            return
        }
        $.ajax({
            url: '/subscribe',
            data: {
                email: email
            },
            type: 'POST',
            success: function(data) {
                if (data.status == 0) {
                    $("#subscribe-msg p").text(data.message.email)
                    $("#subscribe-msg").removeClass('hidden')
                } else {
                    $("#modal-subscribe .modal-body").html('<p>' + data.message)
                    $("#modal-subscribe .modal-footer").remove()
                }
            },
            error: function() {
                alert('Có lỗi xảy ra, vui lòng thử lại')
            }
        })
    })
    if (typeof orderDistance !== 'undefined') {
        var x = setInterval(function() {
            --orderDistance
            if (orderDistance < 0) {
                clearInterval(x);
                $.ajax({
		            url: cancel_transaction,
		            data: {
		                transactionID: transactionID
		            },
		            type: 'POST',
		            success: function() {
		                $("#popup-transaction").remove();
		            }
		        })
            }
            var minutes = Math.floor((orderDistance % (60 * 60)) / 60)
            var seconds = Math.floor(orderDistance % 60)
            if (minutes < 10) minutes = '0' + minutes
            if (seconds < 10) seconds = '0' + seconds
            $("#count-time").text(minutes + ":" + seconds)
        }, 1000);
    }
    $("#cancel-transaction").click(function() {
        $("#popup-transaction").remove();
        $.ajax({
            url: cancel_transaction,
            data: {
                transactionID: transactionID
            },
            type: 'POST',
            success: function() {
                $("#popup-transaction").remove();
                if (typeof cancel_redirect !== 'undefined') {
                    window.location = cancel_redirect
                }
            },
            errors: function(Ơ) {
                alert('Lỗi hệ thống! Không thể hủy vé! Hãy thử lại sau!')
            }
        })
    })
})