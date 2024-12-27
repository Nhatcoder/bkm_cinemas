$(document).ready(function () {
    function collectMenuData() {
        let menuItems = [];

        $('#menu-items .dd-item').each(function () {
            let id = $(this).data('id');
            let name = $(this).find('.title_url').val();
            let slug = $(this).find('.slug_menu').val();
            let url = $(this).find('.url_menu').val();
            let type = $(this).find('.type_menu').val();
            let recordId = $(this).find('.record_id').val();

            menuItems.push({
                id: id,
                name: name,
                slug: slug,
                url: url,
                type: type,
                record_id: recordId,
                // Nếu có con, thu thập làm đệ quy
                children: collectMenuChildren($(this))
            });
        });

        return menuItems;
    }

    // Hàm để thu thập dữ liệu con của menu
    function collectMenuChildren(parentElement) {
        let children = [];
        parentElement.find('.dd-list .dd-item').each(function () {
            let id = $(this).data('id');
            let name = $(this).find('.title_url').val();
            let slug = $(this).find('.slug_menu').val();
            let url = $(this).find('.url_menu').val();
            let type = $(this).find('.type_menu').val();
            let recordId = $(this).find('.record_id').val();

            children.push({
                id: id,
                name: name,
                slug: slug,
                url: url,
                type: type,
                record_id: recordId,
                children: collectMenuChildren($(this))
            });
        });
        return children;
    }

    function removeDuplicateIds(menuItems) {
        let ids = new Set();

        function filterMenuItems(items) {
            return items.filter(item => {
                if (ids.has(item.id)) {
                    return false;
                } else {
                    ids.add(item.id);
                    item.children = filterMenuItems(item.children);
                    return true;
                }
            });
        }

        return filterMenuItems(menuItems);
    }

    function listName() {

        let nameItem = [];

        $('#menu-items .dd-item').each(function () {
            let name = $(this).find('.title_url').val();

            nameItem.push({
                name: name
            });
        });

        return nameItem;
    }

    $('.btn-save-menu').on('click', function (e) {
        e.preventDefault();
        let menuData = collectMenuData();

        let nameData = listName();

        menuData = removeDuplicateIds(menuData); // Xóa bỏ các mục trùng lặp

        let url = $(this).data('url');

        let image = $(this).data('image');

        let imageError = $(this).data('error');

        $.ajax({
            url: url, // Đường dẫn đến phương thức store trong MenuController
            method: 'POST',
            data: {
                menu: menuData,
                name: nameData,
                _token: $('meta[name="csrf-token"]').attr('content') // Token CSRF
            },
            success: function (response) {
                if (response.status) {
                    Swal.fire({
                        title: 'Menu đã được lưu',
                        text: 'Bạn có thể tiếp tục tùy chỉnh menu.',
                        imageUrl: `${image}`,
                        imageWidth: 100,
                        imageHeight: 100,
                        imageAlt: 'Custom icon',
                        confirmButtonText: 'OK'
                    });
                } else {
                    Swal.fire({
                        title: 'Đã xảy ra lỗi!',
                        text: 'Vui lòng liên hệ bộ phận kĩ thuật để kiểm tra.',
                        imageUrl: `${imageError}`,
                        imageWidth: 100,
                        imageHeight: 100,
                        imageAlt: 'Custom icon',
                        confirmButtonText: 'OK'
                    });
                    console.log(response);
                    return false;
                }
            },
            error: function (xhr) {
                Swal.fire({
                    title: 'Đã xảy ra lỗi!',
                    text: `${xhr.responseText}`,
                    imageUrl: `${imageError}`,
                    imageWidth: 100,
                    imageHeight: 100,
                    imageAlt: 'Custom icon',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
