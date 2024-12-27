$(document).ready(function() {
    $(document).on('click', '.btn-redeem', function () {
        var url = $(this).data('url');
        var reward_id = $(this).data('id');
        var points_spent = $(this).data('points');
        let image = $(this).data("image");
        let error = $(this).data("error");

        Swal.fire({
            title: 'Bạn muốn đổi món quà này?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: "Xác nhận",
            cancelButtonText: "Hủy",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: $('meta[name="csrf_token"]').attr('content'),
                        reward_id: reward_id,
                        points_spent: points_spent
                    },
                    success: function (response) {
                        console.log(response);
                        
                        if (response.status) {
                            Swal.fire({
                                position: "center",
                                imageUrl: image,
                                imageWidth: 100,
                                imageHeight: 100,
                                width: "400px",
                                title: response.message,
                                text: "Bạn có thể sử dụng quà tặng vừa đổi khi đến rạp.",
                                showConfirmButton: true,
                            });

                            $('.reward-tab-tichluydiem').text(response.points + ' điểm');
                            $('.reward-tab-thanhvien').text(response.points + ' điểm');
                            $('.rewardsUser-count').text(response.userRewardsCount);
                            $('.reward-no-item').css('display','none');
                            let bodyModalQuaTang = $('.reward-options-tab-quatang');
                            let html = `
                                <div class="reward-item">
                                    <div class="reward-image">
                                        <img src="${response.reward.image}" alt="${response.reward.name}">
                                        <div class="d-flex flex-column">
                                            <p>Mã quà tặng: ${response.reward.code}</p>
                                            <p>${response.reward.name}</p>
                                            <p>Trạng thái: ${response.reward.status == 1 ? 'Đã sử dụng' : 'Chưa sử dụng'}</p>
                                        </div>
                                    </div>
                                </div>
                            `;

                            bodyModalQuaTang.append(html);
                        } else {
                            Swal.fire({
                                position: "center",
                                imageUrl: error,
                                imageWidth: 100,
                                imageHeight: 100,
                                width: "400px",
                                title: response.message,
                                showConfirmButton: true,
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            position: "center",
                            imageUrl: error,
                            imageWidth: 100,
                            imageHeight: 100,
                            width: "400px",
                            title: response.message,
                            showConfirmButton: true,
                        });
                    }
                });
            }
        })
    });
})