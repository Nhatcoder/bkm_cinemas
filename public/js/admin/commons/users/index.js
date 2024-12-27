$(document).ready(function() {
    $(document).on('change', '#city_id', function() {
        const $cityId = $(this).val();
        const url = $(this).data('url');
        let areaId = $('#area_id');
        let cinemaId = $('#cinema_id');

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                'city_id': $cityId,
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                areaId.empty();
                areaId.append('<option value="">-- Chọn khu vực --</option>');
                cinemaId.empty();
                cinemaId.append('<option value="">-- Chọn rạp phim --</option>');

                response.areas.forEach(area => {
                    areaId.append(`<option value="${area.id}">${area.name}</option>`);
                });

                areaId.selectpicker('refresh');
            },
            error: function(xhr, status, error) {
                console.log('Lỗi: ' + xhr.responseText);
            }
        });
    });

    $(document).on('change', '#area_id', function() {
        const $areaId = $(this).val();
        const url = $(this).data('url');
        let cinemaId = $('#cinema_id');

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                'area_id': $areaId,
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                cinemaId.empty();
                cinemaId.append('<option value="">-- Chọn rạp phim --</option>');

                response.cinemas.forEach(cinema => {
                    cinemaId.append(`<option value="${cinema.id}">${cinema.name}</option>`);
                });

                cinemaId.selectpicker('refresh');
            },
            error: function(xhr, status, error) {
                console.log('Lỗi: ' + xhr.responseText);
            }
        });
    });
});
