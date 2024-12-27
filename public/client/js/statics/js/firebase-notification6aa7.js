$(document).ready(function() {
    var style = document.createElement('style');
    style.type = 'text/css';
    style.innerHTML = '.thumb,.thumb>span{display:inline-block}.nn-alert{overflow-x:hidden;position:relative;margin:20px auto auto;background:rgba(51,59,70,.5);border:1px solid #fff;border-radius:3px;box-shadow:inset 0 24px 0 rgba(255,255,255,.1),inset 0 1px 0 rgba(255,255,255,.4),inset 0 10px 10px rgba(255,255,255,.2),inset 0 -5px 10px rgba(0,0,0,.2),0 3px 3px rgba(0,0,0,.3);width:250px;padding:5px 20px 5px 10px;color:#fff;font-size:12px;text-shadow:0 1px 1px rgba(0,0,0,.8);transition:all .5s ease;backface-visibility:hidden}.nn-alert.pink{background:rgba(255,0,102,.7)}.thumb{width:30px;float:left;background-color:#FFF;height:30px;border-radius:50%;padding:1px;text-align:center}.thumb>span{height:100%;vertical-align:middle}.thumb img{max-width:100%;max-height:100%;vertical-align:middle}.noti-content{float:right;width:180px}.nn-alert p{margin:6px 0}.hide{height:0;padding:0;margin:0}#notification-content{position:fixed;z-index:99999;bottom:20px;left:0;padding-left:20px;padding-right:20px;max-height:430px;overflow-y:hidden;overflow-x:hidden}.close-noti{position:absolute;right:10px;cursor:pointer;top:5px;color:#FFF}.animated{animation-duration:1s;animation-fill-mode:both}@keyframes bounceOutLeft{20%{opacity:1;transform:translate3d(20px,0,0)}to{opacity:0;transform:translate3d(-2000px,0,0)}}.bounceOutLeft{animation-name:bounceOutLeft} .noti-content a {color:#FFF;} .noti-content a:hover {text-decoration:none;}';
    document.getElementsByTagName('head')[0].appendChild(style);
    $('body').append('<div id="notification-content"></div>');
    $('body').on('click', '.close-noti', function() {
        //console.log('click');
        hideAlert($(this).parent('.noti-content').parent('.nn-alert'));
    });

    function hideAlert($alert) {
        $alert.addClass('animated bounceOutLeft');
        setTimeout(function() {
            $alert.remove();
        }, 1000);
    }
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyAOkO6zW2po7cuvrxx-5hnVAclWK4aQu8s",
        authDomain: "touch-cinema-53299.firebaseapp.com",
        databaseURL: "https://touch-cinema-53299.firebaseio.com",
        projectId: "touch-cinema-53299",
        storageBucket: "touch-cinema-53299.appspot.com",
        messagingSenderId: "28635991469",
        appId: "1:28635991469:web:248e95763f927e085c2524",
        measurementId: "G-M35VW967FK"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    messaging.getToken().then(function(token) {
        if (token && localStorage.getItem('fcm_token') !== token) {
            send_first_allow(token);
            update_notification(token);
            $(".setting-noti").addClass('open');
            $(".setting-noti").removeClass('register');
            $(".setting-noti").attr('data-content', "Bạn đã đăng ký thành công!");
        }
        $("#notification").show(); // Hiện nút thông báo sau khi web đã được tải
    }).catch(function(err) {
        $("#notification").show(); // Hiện nút thông báo sau khi web đã được tải
    });
    // Log thông báo ngay trên trang
    messaging.onMessage(function(payload) {
        console.log(payload);
        icon = payload.notification.icon || 'https://touchcinema.com/images/logo-touchcinema.png';
        title = payload.notification.title || 'Thông báo từ Touchcinema';
        body = payload.notification.body || 'Nội dung thông báo';
        link = payload.notification.click_action || 'https://touchcinema.com';
        alertTemplate = '<div class="nn-alert pink"><div class="thumb"><span></span><img src="' + icon + '" /></div><div class="noti-content"><a class="close-noti"><i class="fa fa-times"></i></a><a href="' + link + '"><strong>' + title + '</strong></a><p><a href="' + link + '">' + body + '</a></p></div><audio autoplay="autoplay"><source src="/statics/file-sounds-869-coins.mp3" type="audio/mpeg" /><embed hidden="true" autostart="true" loop="false" src="/statics/file-sounds-869-coins.mp3" /></audio></div>';
        $(alertTemplate).fadeIn().appendTo('#notification-content');
        setTimeout(function() {
            hideAlert($('.nn-alert').eq(0));
        }, 6000);
    });

    function firebase_permission() {
        if (typeof(Storage) !== "undefined") {
            localStorage.removeItem("web_post");
            localStorage.removeItem("web_movie");
        }
        $("#notification").on('click', '.register', function() {
            //console.log("register click");
            $(".setting-noti").attr('data-content', "Đăng ký để nhận thông báo mới nhất về lịch chiếu và các chương trình khuyến mãi");
            //kiểm tra quyền
            messaging.requestPermission().then(function() {
                //console.log('Đã cho phép');
                return messaging.getToken();
            }).then(function(token) {
                //console.log('Đã có token');
                //console.log(token);
                send_first_allow(token);
                update_notification(token);
                $(".setting-noti").removeClass('register');
                $(".setting-noti").removeClass('registerbox');
                $(".setting-noti").removeClass('allow');
                $(".setting-noti").addClass('open');
                $(".setting-noti").attr('data-content', "Bạn đã đăng ký thành công!");
                $("#boxregister").hide(500);
            }).catch(function(err) {
                //console.log('Đăng ký lỗi');
                $(".setting-noti").removeClass('open');
                $(".setting-noti").addClass('allow');
                $(".setting-noti").attr('data-content', "Bạn đã chặn thông báo");
                $(".setting-noti").popover('show');
                setTimeout(function() {
                    $(".setting-noti").popover('hide');
                }, 1500);
            });
        });
    }

    function send_first_allow(token) {
        //thanks for register
        $.ajax({
            type: 'POST',
            url: firebase_first_notification,
            data: {
                'token': token
            },
            success: function(res) {
                //console.log(res);
            },
            error: function() {
                //console.log("Lỗi!");
            }
        });
        if (typeof(Storage) !== "undefined") {
            localStorage.setItem('fcm_token', token);
        }
        subscribeTokenToTopic(token, 'web_post');
        subscribeTokenToTopic(token, 'web_movie');
        subscribeTokenToTopic(token, 'web_touch');
        $("#setting-setup").slideToggle();
    }

    function subscribeTokenToTopic(token, topic) {
        fetch('https://iid.googleapis.com/iid/v1/' + token + '/rel/topics/' + topic, {
            method: 'POST',
            headers: new Headers({
                'Authorization': 'key=' + FIREBASE_SERVER_KEY
            })
        }).then(response => {
            if (response.status < 200 || response.status >= 400) {
                throw 'Lỗi khi đăng ký nhận thông báo : ' + response.status + ' - ' + response.text();
            }
            console.log('Đăng ký nhận thông tin "' + topic + '"');
            save_to_local_storage(topic);
        }).catch(error => {
            //console.error(error);
        })
    }

    function unsubscribeTokenToTopic(token, topic) {
        fetch('https://iid.googleapis.com/iid/v1:batchRemove', {
            method: 'POST',
            headers: new Headers({
                'Authorization': 'key=' + FIREBASE_SERVER_KEY
            }),
            body: JSON.stringify({
                'to': '/topics/' + topic,
                'registration_tokens': [token]
            })
        }).then(response => {
            if (response.status < 200 || response.status >= 400) {
                throw 'Hủy đăng ký thông báo lỗi : ' + response.status + ' - ' + response.text();
            }
            console.log('Đã hủy đăng ký nhận thông báo về "' + topic + '"');
            remove_to_local_storage(topic);
        }).catch(error => {
            //console.error(error);
        })
    }

    function save_to_local_storage(topic) {
        if (typeof(Storage) !== "undefined") {
            localStorage.setItem(topic, "subscribed");
            $("#bell-" + topic).prop('checked', true);
        }
    }

    function remove_to_local_storage(topic) {
        if (typeof(Storage) !== "undefined") {
            localStorage.removeItem(topic);
            $("#bell-" + topic).prop('checked', false);
        }
    }

    function update_notification(token) {
        if (typeof(Storage) !== "undefined") {
            var subscribed_post = localStorage.getItem('web_post');
            var subscribed_movie = localStorage.getItem('web_movie');
            if (subscribed_post == 'subscribed') {
                $("#bell-web_post").prop('checked', true);
            }
            if (subscribed_movie == 'subscribed') {
                $("#bell-web_movie").prop('checked', true);
            }
        }
    }
    $("#notification").on('click', '.register', function() {
        //kiểm tra quyền
        messaging.requestPermission().then(function() {
            //console.log('Đã cho phép');
            return messaging.getToken();
        }).then(function(token) {
            //console.log('Đã có token');
            //console.log(token);
            send_first_allow(token);
            update_notification(token);
            $(".setting-noti").removeClass('register');
            $(".setting-noti").removeClass('registerbox');
            $(".setting-noti").removeClass('allow');
            $(".setting-noti").addClass('open');
            $(".setting-noti").attr('data-content', "Bạn đã đăng ký thành công!");
            $("#boxregister").hide(500);
        }).catch(function(err) {
            //console.log('Đăng ký lỗi');
            $(".setting-noti").removeClass('open');
            $(".setting-noti").addClass('allow');
            $(".setting-noti").attr('data-content', "Bạn đã chặn thông báo");
            $(".setting-noti").popover('show');
            setTimeout(function() {
                $(".setting-noti").popover('hide');
            }, 1500);
        });
    });
    $("#register").click(function() {
        //kiểm tra quyền
        messaging.requestPermission().then(function() {
            //console.log('Đã cho phép');
            return messaging.getToken();
        }).then(function(token) {
            //console.log('Đã có token');
            //console.log(token);
            send_first_allow(token);
            update_notification(token);
            $(".setting-noti").removeClass('register');
            $(".setting-noti").removeClass('registerbox');
            $(".setting-noti").removeClass('allow');
            $(".setting-noti").addClass('open');
            $(".setting-noti").attr('data-content', "Bạn đã đăng ký thành công!");
            $("#boxregister").hide(500);
        }).catch(function(err) {
            //console.log('Đăng ký lỗi');
            $(".setting-noti").removeClass('open');
            $(".setting-noti").addClass('allow');
            $(".setting-noti").attr('data-content', "Bạn đã chặn thông báo");
            $(".setting-noti").popover('show');
            setTimeout(function() {
                $(".setting-noti").popover('hide');
            }, 1500);
        });
    });
    $("#notification").on('click', '.registerbox', function() {
        $("#boxregister").slideToggle();
    });
    $("#notification").on('click', '.open', function() {
        $("#setting-setup").slideToggle('slide');
    });
    $("#notification").on('click', '.allow', function() {
        $("#setallow").slideToggle('slide');
    });
    $("#update-notification").click(function() {
        messaging.getToken().then(function(token) {
            if ($('#bell-web_post:checked').length > 0) {
                subscribeTokenToTopic(token, 'web_post');
            } else {
                unsubscribeTokenToTopic(token, 'web_post');
            }
            if ($('#bell-web_movie:checked').length > 0) {
                subscribeTokenToTopic(token, 'web_movie');
            } else {
                unsubscribeTokenToTopic(token, 'web_movie');
            }
            $(".setting-noti").attr('data-content', "Đang cập nhật cài đặt!");
            $(".setting-noti").popover('show');
            setTimeout(function() {
                $(".setting-noti").attr('data-content', "Cài đặt thông báo đã được cập nhật");
                $(".setting-noti").popover('show');
            }, 1500);
            setTimeout(function() {
                $(".setting-noti").popover('hide');
            }, 5000);
        }).catch(function() {
            $(".setting-noti").attr('data-content', "Lỗi khi hủy câp nhật cài đặt thông báo");
        });
    });
    $("#cancel-notification").click(function() {
        messaging.getToken().then(function(token) {
            unsubscribeTokenToTopic(token, 'web_movie');
            unsubscribeTokenToTopic(token, 'web_post');
            //$("#setallow").show();
            messaging.deleteToken(token).then(function(token) {
                $(".setting-noti").attr('data-content', "Bạn sẽ không nhận được thông báo lần nào nữa!");
                $(".setting-noti").removeClass('open');
                $(".setting-noti").removeClass('allow');
                $(".setting-noti").removeClass('register');
                $(".setting-noti").addClass('registerbox');
                $(".setting-noti").popover('show');
                setTimeout(function() {
                    $(".setting-noti").popover('hide');
                }, 1500);
                $("#setting-setup").slideToggle('slide');
                return messaging.getToken();
            }).catch(function() {
                $(".setting-noti").attr('data-content', "Lỗi khi hủy đăng ký nhận thông báo");
            });
        }).catch(function() {
            $(".setting-noti").attr('data-content', "Lỗi khi hủy đăng ký nhận thông báo");
        });
    })
    $('.setting-noti').popover({
        container: 'body'
    }).on("show.bs.popover", function() {
        $(this).data("bs.popover").tip().addClass('notification-popover')
    });
});