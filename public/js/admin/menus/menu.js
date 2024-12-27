$(document).ready(function () {
    function createSlug(name) {
        if (!name) return ''; // Trả về chuỗi rỗng nếu không có tên

        let slug = name.toLowerCase();

        const vnAccents = [
            'à', 'á', 'ạ', 'ả', 'ã', 'â', 'ầ', 'ấ', 'ậ', 'ẩ', 'ẫ', 'ă', 'ằ', 'ắ', 'ặ', 'ẳ', 'ẵ',
            'è', 'é', 'ẹ', 'ẻ', 'ẽ', 'ê', 'ề', 'ế', 'ệ', 'ể', 'ễ',
            'ì', 'í', 'ị', 'ỉ', 'ĩ',
            'ò', 'ó', 'ọ', 'ỏ', 'õ', 'ô', 'ồ', 'ố', 'ộ', 'ổ', 'ỗ', 'ơ', 'ờ', 'ớ', 'ợ', 'ở', 'ỡ',
            'ù', 'ú', 'ụ', 'ủ', 'ũ', 'ư', 'ừ', 'ứ', 'ự', 'ử', 'ữ',
            'ỳ', 'ý', 'ỵ', 'ỷ', 'ỹ',
            'đ',
            'À', 'Á', 'Ạ', 'Ả', 'Ã', 'Â', 'Ầ', 'Ấ', 'Ậ', 'Ẩ', 'Ẫ', 'Ă', 'Ằ', 'Ắ', 'Ặ', 'Ẳ', 'Ẵ',
            'È', 'É', 'Ẹ', 'Ẻ', 'Ẽ', 'Ê', 'Ề', 'Ế', 'Ệ', 'Ể', 'Ễ',
            'Ì', 'Í', 'Ị', 'Ỉ', 'Ĩ',
            'Ò', 'Ó', 'Ọ', 'Ỏ', 'Õ', 'Ô', 'Ồ', 'Ố', 'Ộ', 'Ổ', 'Ỗ', 'Ơ', 'Ờ', 'Ớ', 'Ợ', 'Ở', 'Ỡ',
            'Ù', 'Ú', 'Ụ', 'Ủ', 'Ũ', 'Ư', 'Ừ', 'Ứ', 'Ự', 'Ử', 'Ữ',
            'Ỳ', 'Ý', 'Ỵ', 'Ỷ', 'Ỹ',
            'Đ'
        ];

        const vnNoAccents = [
            'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a',
            'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e', 'e',
            'i', 'i', 'i', 'i', 'i',
            'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o', 'o',
            'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u', 'u',
            'y', 'y', 'y', 'y', 'y',
            'd',
            'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A',
            'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E', 'E',
            'I', 'I', 'I', 'I', 'I',
            'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O',
            'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U', 'U',
            'Y', 'Y', 'Y', 'Y', 'Y',
            'D'
        ];


        for (let i = 0; i < vnAccents.length; i++) {
            slug = slug.replace(new RegExp(vnAccents[i], 'g'), vnNoAccents[i]);
        }

        slug = slug.replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-');

        return slug;
    }

    $(document).on('input', '.title_url', function() {
        let title = $(this).val();
        let dataId = $(this).data('id');
        let slug = createSlug(title);

        // Kiểm tra phần tử slug_menu
        let $slugMenu = $('.slug_menu[data-id="' + dataId + '"]');

        if ($slugMenu.length) {
            $slugMenu.val(slug); // Cập nhật giá trị
        }

        // Kiểm tra phần tử btnLabel
        let $btnLabel = $('.btnLabel[data-id="' + dataId + '"]');

        if ($btnLabel.length) {
            $btnLabel.html(title); // Cập nhật nội dung
        }
    });


    function updateEmptyState() {
        if ($('#menu-items').children().length == 0) {
            if ($('.dd-empty').length === 0) {
                $('<div class="dd-empty"></div>').html('<div class="dd-empty-message">' +
                    '<h5>Thêm các mục từ cột bên trái.</h5>' +
                    '</div>').appendTo('.nestable');
                $('.nestable').find('.dd-message').remove();
            } else {
                $('.dd-empty').html('<div class="dd-empty-message">' +
                    '<h5>Thêm các mục từ cột bên trái.</h5>' +
                    '</div>');
            }
        } else {
            $('.dd-empty').remove();
            if ($('.nestable .dd-message').length === 0) {
                $('.nestable').prepend(`
                            <div class="dd-message" style="text-align: justify">
                                <h5 class="mb-4 font-w400">Kéo các mục tới vị trí bạn mong muốn. Nhấp chuột vào mũi tên bên phải để thiết lập tuỳ chỉnh cho mỗi mục.</h5>
                            </div>
                        `);
            }
        }

        var menuItems = $('#menu-items').find('li').length;

        if(menuItems === 0) {
            // Hiển thị thông báo khi danh sách trống
            $('#empty-state').show();
        } else {
            // Ẩn thông báo khi có mục trong danh sách
            $('#empty-state').hide();
        }
    }

    // Khi thay đổi checkbox "Chọn toàn bộ"
    $('.checkbox_all').on('change', function() {
        // Lấy tab hiện tại
        var currentTab = $(this).closest('.tab-pane').find('.menu-tabs');

        // Kiểm tra trạng thái của checkbox "Chọn toàn bộ"
        if ($(this).is(':checked')) {
            // Check tất cả các checkbox trong tab hiện tại
            currentTab.find('input[type="checkbox"]').prop('checked', true);
        } else {
            // Uncheck tất cả các checkbox trong tab hiện tại
            currentTab.find('input[type="checkbox"]').prop('checked', false);
        }
    });

    var itemCounter = $('#menu-items').find('li').length;

    $('.btn-add-menu').on('click', function(e) {
        e.preventDefault();

        var $button = $(this);

        var container = $button.closest('.filter'); // Lấy container bao quanh nút được bấm

        container.find('input:checkbox:checked').not('.checkbox_all').each(function() {
            // Loại bỏ checkbox "Chọn toàn bộ"
            container.find('.checkbox_all').prop('checked', false);

            var checkbox = $(this);
            var itemName = $.trim(checkbox.next('label').text());
            var type = checkbox.data('type');
            var recordId = checkbox.data('id');

            itemCounter++; // Tự động tăng itemCounter khi thêm mới mục

            // Tạo item mới từ template và thay thế id và name
            var newItem = $('#menu-item-template').html()
                .replace(/__id__/g, itemCounter) // Thay thế id bằng itemCounter hiện tại
                .replace(/__name__/g, itemName)
                .replace(/__type__/g, type) // Type của các mục menu
                .replace(/__recordId__/g, recordId);

            // Thêm mục mới vào danh sách
            $('#menu-items').append(newItem);

            // Tạo slug từ name và gán vào input slug tương ứng
            var slug = createSlug(itemName);
            $('#menu-items').find('#slug_menu' + itemCounter).val(slug);

            checkbox.prop('checked', false); // Bỏ check cho checkbox sau khi thêm
        });

        updateEmptyState(); // Cập nhật trạng thái sau khi thêm phần tử
    });


    $(document).on('click', '.remove-menu-item', function () {
        $(this).closest('li').remove();
        updateEmptyState();
    });

    updateEmptyState();

    // Thông báo delete menu
    $('.btnDeleteMenu').on('click', function(event) {
        event.preventDefault();

        var href = $(this).attr('href');

        Swal.fire({
            title: 'Bạn chắc chắn muốn xóa menu này?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = href;
            }
        });
    });



    // $('.btn-add-menu').on('click', function(e) {
    //     e.preventDefault();
    //
    //     var itemCounter = $(this).data('item');
    //
    //     var container = $(this).closest('.filter'); // Lấy container bao quanh nút được bấm
    //     container.find('input:checkbox:checked').not('.checkbox_all').each(function() {
    //         // Loại bỏ checkbox "Chọn toàn bộ"
    //
    //         container.find('.checkbox_all').prop('checked', false);
    //         var checkbox = $(this);
    //         var itemName = $.trim(checkbox.next('label').text());
    //         var itemId = itemCounter++; // Cập nhật bộ đếm
    //
    //         var newItem = $('#menu-item-template').html()
    //             .replace(/__id__/g, itemId) // Thay thế id bằng bộ đếm
    //             .replace(/__name__/g, itemName); // Thay thế tên bằng tên mục
    //
    //         $('#menu-items').append(newItem);
    //
    //         // Tạo slug từ name và gán vào input slug tương ứng
    //         var slug = createSlug(itemName);
    //         $('#menu-items').find('#slug_menu' + itemId).val(slug);
    //
    //         checkbox.prop('checked', false);
    //     });
    //     updateEmptyState(); // Cập nhật trạng thái trọng sau khi thêm phần tử
    // });
});
