@extends('admin.layouts.main')

@section('title', 'Danh sách liên hệ')

@section('css')

@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page-titles">
                            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                @include('admin.components.breadcrumbs', [
                                    'breadcrumbs' => $breadcrumbs,
                                ])
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="filter cm-content-box box-primary">
                            <div class="content-title SlideToolHeader">
                                <div class="cpa">
                                    <i class="fa-sharp fa-solid fa-filter me-2"></i>Bộ lọc
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="filter cm-content-box box-primary">
                                    <div class="cm-content-body form excerpt" style="">
                                        <form action="{{ route('admin.contacts.index') }}" method="GET">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-3 col-sm-6">
                                                        <label class="form-label">Tên hoặc email</label>
                                                        <input id="" value="{{ request()->name }}" name="name"
                                                            type="text" class="form-control mb-xl-0 mb-3"
                                                            placeholder="Nhập tên tên/email">
                                                    </div>
                                                    <div class="col-xl-3 col-sm-6">
                                                        <label class="form-label">Số điện thoại</label>
                                                        <input id="" value="{{ request()->phone_number }}"
                                                            name="phone_number" type="text"
                                                            class="form-control mb-xl-0 mb-3"
                                                            placeholder="Nhập số điện thoại">
                                                    </div>
                                                    <div class="col-xl-2  col-sm-2 mb-3 mb-xl-0">
                                                        <label class="form-label">Sắp xếp</label>
                                                        <div id="order" class="dropdown bootstrap-select form-control">
                                                            <select name="order_with" class="form-control">
                                                                <option value="">
                                                                    --chọn--
                                                                </option>
                                                                <option @selected(request()->order_with == 'dateASC') value="dateASC">
                                                                    Ngày tạo tăng dần
                                                                </option>
                                                                <option @selected(request()->order_with == 'dateDESC') value="dateDESC">
                                                                    Ngày tạo giảm dần
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-sm-4 align-self-end">
                                                        <div class="">
                                                            <button class="btn btn-primary me-2"
                                                                title="Click here to Search" type="submit"><i
                                                                    class="fa-sharp fa-solid fa-filter me-2"></i>
                                                                Tìm kiếm nâng cao
                                                            </button>
                                                            <button type="reset" class="btn btn-danger light"
                                                                title="Click here to remove filter">Xóa trống</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Danh sách liên hệ</h4>
                            </div>
                            <div class="card-body">
                                @if ($data->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-responsive-md" id="data-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tên người liên hệ</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Tiêu đề</th>
                                                    <th>Nội dung</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $key => $contact)
                                                    <tr>
                                                        <td>
                                                            <strong
                                                                class="text-black">{{ ($data->currentPage() - 1) * $data->perPage() + $key + 1 }}</strong>
                                                        </td>
                                                        <td>
                                                            <b class="text-black">
                                                                {{ $contact->full_name }}
                                                            </b>
                                                        </td>
                                                        <td>
                                                            {{ $contact->email }}
                                                        </td>
                                                        <td>
                                                            {{ $contact->phone_number }}
                                                        </td>
                                                        <td>
                                                            {{ \Illuminate\Support\Str::limit($contact->title, 50, '...') }}
                                                        </td>
                                                        <td>
                                                            {{ \Illuminate\Support\Str::limit($contact->content, 50, '...') }}
                                                        </td>
                                                        <td>
                                                            <div
                                                                style="padding-right: 20px; display: flex; justify-content: end">
                                                                <a href="#"
                                                                    class="btn btn-primary shadow btn-xs sharp me-1"
                                                                    data-full-name="{{ $contact->full_name }}"
                                                                    data-email="{{ $contact->email }}"
                                                                    data-phone="{{ $contact->phone_number }}"
                                                                    data-title="{{ $contact->title }}"
                                                                    data-content="{{ $contact->content }}">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                @can('delete', \App\Models\Contact::class)
                                                                    <form
                                                                        action="{{ route('admin.contacts.delete', $contact->id) }}"
                                                                        class="formDelete" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button
                                                                            class="btn btn-danger shadow btn-xs sharp me-1 call-ajax btn-remove btnDelete"
                                                                            data-type="DELETE" href="">
                                                                            <i class="fa fa-trash"></i>
                                                                        </button>
                                                                    </form>
                                                                @endcan
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-center">
                                                {{ $data->links('pagination::bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewModalLabel">Chi tiết liên hệ</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>Tên:</strong> <span id="modal-full-name"></span></p>
                                                    <p><strong>Email:</strong> <span id="modal-email"></span></p>
                                                    <p><strong>Số điện thoại:</strong> <span id="modal-phone"></span></p>
                                                    <p><strong>Tiêu đề:</strong> <span id="modal-title"></span></p>
                                                    <p><strong>Nội dung:</strong> <span id="modal-content"></span></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex justify-content-center align-items-center p-5">
                                        <div>
                                            <h3 class="text-center">
                                                {{ request()->name ? 'Không có kết quả với từ khóa:' . request()->name : 'Không có dữ liệu' }}
                                            </h3>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="module">
        $(document).on('click', '.btn-primary.shadow', function(e) {
            e.preventDefault();

            const fullName = $(this).data('full-name');
            const email = $(this).data('email');
            const phone = $(this).data('phone');
            const title = $(this).data('title');
            const content = $(this).data('content');

            $('#modal-full-name').text(fullName);
            $('#modal-email').text(email);
            $('#modal-phone').text(phone);
            $('#modal-title').text(title);
            $('#modal-content').text(content);

            $('#viewModal').modal('show');
        });
    </script>
@endsection
