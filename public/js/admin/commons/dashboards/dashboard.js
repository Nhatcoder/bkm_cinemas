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

    $(document).on('change', '#filter', function() {
        var filter = $(this).val();

        $('#dayFilter').hide().find('input').val('');
        $('#monthFilter').hide().find('select').val('').trigger('change.select2');
        $('#yearFilter').hide().find('select').val('').trigger('change.select2');
        $('#rangeFilter').hide().find('input').val('');
        $('#rangeFilterEnd').hide().find('input').val('');

        if (filter === 'day') {
            $('#dayFilter').show().find('input').val('');
        } else if (filter === 'month') {
            $('#monthFilter').show();
            $('#monthFilter select').val('').selectpicker('refresh');
        } else if (filter === 'year') {
            $('#yearFilter').show();
            $('#yearFilter select').val('').selectpicker('refresh');
        } else if (filter === 'range') {
            $('#rangeFilter').show().find('input').val('');
            $('#rangeFilterEnd').show().find('input').val('');
        }
    });

    const ctx = $('#myChart')[0].getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [
                {
                    label: 'Doanh thu (VNĐ)',
                    backgroundColor: 'rgba(255, 165, 0, 0.2)',
                    borderColor: 'rgba(255, 165, 0, 1)',
                    borderWidth: 1,
                    data: [],
                    barThickness: 70,
                    maxBarThickness: 80,
                },
                {
                    label: 'Số vé',
                    data: [],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    type: 'line',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Số vé'
                    },
                    ticks: {
                        callback: function(value, index, values) {
                            const label = this.getLabelForValue(value);
                            return label.length > 15 ? label.substring(0, 25) + "..." : label;
                        }
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Doanh thu (VNĐ)'
                    }
                }
            }
        }
    });

    const ctxStatusBookingCinemaChart = $('#statusBookingCinemaChart')[0].getContext('2d');
    const statusBookingCinemaChart = new Chart(ctxStatusBookingCinemaChart, {
        type: 'doughnut',
        data: {
            labels: ['Số vé hoàn thành', 'Số vé chờ hủy', 'Số vé đã hủy', 'Số vé từ chối hủy'],
            datasets: [
                {
                    label: 'Trạng thái vé',
                    data: [],
                    backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0'],
                    hoverOffset: 4
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: '#333',
                        font: {
                            size: 14
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            const value = tooltipItem.raw;
                            return `Số lượng: ${value}`;
                        }
                    }
                }
            }
        }
    });

    $('#btnFilter').on('click', function () {
        var filter = $('#filter').val();
        var date = $('#dateFilter').val();
        var month = $('#monthSelect').val();
        var yearMonth = $('#yearSelect').val();
        var year = $('#yearSelect2').val();
        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();
        var cinema_id = $('#cinema_id').val();

        var data = {
            filter: filter,
            date: date,
            month: month,
            yearMonth: yearMonth,
            year_filter: year,
            start_date: startDate,
            end_date: endDate,
            cinema_id: cinema_id,
            _token: $('input[name="_token"]').val()
        };

        $.ajax({
            url: $('#revenueAndTicketForm').attr('action'),
            method: 'GET',
            data: data,
            dataType: 'json',
            success: function (response) {
                console.log(response);
                const chartData = response.chart;

                if (response.cinemaId !== null) {
                    var revenueCinemaBox = $('.revenue_cinema');
                    revenueCinemaBox.css('display', 'block');
                }

                // $('.totalTicketsInMonth_number').text(response.totalTicketsInMonth);
                $('.totalTicketsCompleted_number').text(response.totalTicketsCompleted);
                $('.totalTicketsWaitingForCancellation_number').text(response.totalTicketsWaitingForCancellation);
                $('.totalTicketsCancelled_number').text(response.totalTicketsCancelled);
                $('.totalTicketsRejected_number').text(response.totalTicketsRejected);

                const labels = chartData.map(item => item.movie_name_and_date);
                const revenues = chartData.map(item => item.total_revenue);
                const movieCounts = chartData.map(item => item.movie_count);

                myChart.data.labels = labels;
                myChart.data.datasets[0].data = revenues;
                myChart.data.datasets[1].data = movieCounts;
                myChart.update();

                const statusCounts = [
                    response.totalTicketsCompleted,              // Số vé hoàn thành
                    response.totalTicketsWaitingForCancellation, // Số vé chờ hủy
                    response.totalTicketsCancelled,              // Số vé đã hủy
                    response.totalTicketsRejected                // Số vé từ chối hủy
                ];

                statusBookingCinemaChart.data.datasets[0].data = statusCounts;
                statusBookingCinemaChart.update();
            },
            error: function (xhr, status, error) {
                console.error('Lỗi khi tải dữ liệu biểu đồ:', error);
            }
        });
    });


    $.ajax({
        url: $('#revenueAndTicketForm').attr('action'),
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            const chartData = response.chart;
            const topMovies = response.topMovies; 
            
            const revenuaData = $('.revenuaData');
            let totalRevenue = 0;

            for (let i = 0; i < chartData.length; i++) {
                totalRevenue += chartData[i].total_revenue;
            }

            revenuaData.text(totalRevenue.toLocaleString('vi-VN') + ' VNĐ');

            const labels = topMovies.map(item => item.movie_name);
            const revenues = topMovies.map(item => item.total_revenue);
            const movieCounts = topMovies.map(item => item.total_tickets);

            myChart.data.labels = labels;
            myChart.data.datasets[0].data = revenues;
            myChart.data.datasets[1].data = movieCounts;
            myChart.update();

            const statusCounts = [
                response.totalTicketsCompleted,              // Số vé hoàn thành
                response.totalTicketsWaitingForCancellation, // Số vé chờ hủy
                response.totalTicketsCancelled,              // Số vé đã hủy
                response.totalTicketsRejected                // Số vé từ chối hủy
            ];

            statusBookingCinemaChart.data.datasets[0].data = statusCounts;
            statusBookingCinemaChart.update();
        },
        error: function(xhr, status, error) {
            console.error('Lỗi khi tải dữ liệu biểu đồ:', error);
        }
    });

});