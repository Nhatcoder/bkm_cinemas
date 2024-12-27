<form method="post"
    action="{{ isset($combo) ? route('admin.food-combos.update', ['id' => $combo->id]) : route('admin.food-combos.store') }}"
    id="form-combo" class="product-vali" enctype="multipart/form-data">
    @csrf
    @if (isset($combo))
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-xl-12">
            <div class="card h-auto">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label mb-2">Tên</label>
                            <input type="text" id="name" name="food_combo[name]" class="form-control"
                                placeholder="Nhập tên" value="{{ $combo->name ?? '' }}">
                            <div id="food_combo_name_error" class="mt-2"></div>
                        </div>
                        <div class="col-6">
                            <label class="form-label mb-2">Giá</label>
                            <input type="text" class="form-control" id="price" name="food_combo[price]"
                                placeholder="Nhập giá" value="{{ number_format($combo->price ?? 0, 0, '.', ',') }}">
                            <div id="food_combo_price_error" class="mt-2"></div>
                        </div>
                    </div>
                    <div>
                        <label class="form-label mb-2">Đồ ăn</label>
                        <div class="mb-3">
                            <select class="js-example-disabled-multi" style="width:100%;" name="food"
                                multiple="multiple" id="food">
                                @foreach ($listFoods as $food)
                                    <option value="{{ $food->id }}" @selected(isset($combo) && $combo->items->contains('food_id', $food->id))
                                        data-image="{{ asset($food->image) }}">
                                        {{ $food->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div id="food_error" class="mt-2"></div>
                        </div>
                    </div>
                    <div id="list-food" class="row">
                        @if (!empty($combo->items))
                            @foreach ($combo->items as $item)
                                <div id="food-{{ $item->food_id }}" class="col-4 p-1 food-item"
                                    data-index="{{ $loop->iteration }}">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <h5 class="me-3" style="width: 75px">{{ $item->food->name }}</h5>
                                        <img src="{{ asset($item->food->image) }}" alt=""
                                            style="width: 75px; height:75px;" class="me-3">
                                        <div class="me-3">
                                            <label for="">Số lượng</label>
                                            <input type="number" name="old_item[{{ $loop->iteration }}][quantity]"
                                                class="form-control" placeholder="Số lượng" min="1"
                                                value="{{ $item->quantity }}" style="width: 100px;">
                                            <input type="text" hidden value="{{ $item->food_id }}"
                                                name="old_item[{{ $loop->iteration }}][food_id]">
                                            <input type="text" hidden value="{{ $item->id }}"
                                                name="old_item[{{ $loop->iteration }}][id]">
                                        </div>
                                        <button type="button"
                                            class="btn btn-danger shadow btn-xs sharp me-3 btn-remove"
                                            data-id="{{ $item->food_id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>

                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label mb-2">Mô tả</label>
                            <textarea class="form-control ckeditor" cols="20" rows="5" name="food_combo[description]">{{ $combo->description ?? '' }}</textarea>
                            <div id="food_combo_description_error" class="mt-2"></div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-4">
                                    <div class="cm-content-body publish-content form excerpt">
                                        <label class="form-label mb-2">Ảnh</label>
                                        <div class="avatar-upload d-flex align-items-center">
                                            <div class=" position-relative" style="width: 120px;">
                                                <div class="avatar-preview">
                                                    <div class="imagePreview"
                                                        style="background-image: url({{ asset($combo->image ?? 'images/no-img-avatar.png') }});">
                                                    </div>
                                                    @if (isset($combo) && !empty($combo->image))
                                                        <button type="button" class="removeImage"
                                                            data-id="{{ $combo->id }}"
                                                            data-url="{{ route('admin.food-combos.removeAvatarImage') }}"
                                                            data-image="{{ asset('images/no-img-avatar.png') }}">
                                                            <i class="fa-solid fa-xmark"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                                <div class="change-btn d-flex align-items-center flex-wrap">
                                                    <input type="file" class="form-control d-none uploadImage"
                                                        id="imageUpload" name="food_combo[image]"
                                                        accept=".png, .jpg, .jpeg, .webp">
                                                    <label for="imageUpload"
                                                        class="btn btn-sm btn-primary light ms-0">Chọn
                                                        ảnh</label>
                                                </div>
                                                <div id="food_combo_image_error" class="mt-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <label class="form-label">Số thứ tự</label><br>
                                        <input class="form-control" value="{{ $combo->order ?? 0 }}" type="number"
                                            min="0" id="order" name="food_combo[order]">
                                        <div id="food_combo_order_error" class="mt-2"></div>
                                    </div>
                                    <div class="mt-4">
                                        <label class="form-label">Trạng thái</label><br>
                                        <div class="row mt-2">
                                            <div class="col-sm-7">
                                                <input class="form-check-input" type="radio" id="active"
                                                    name="food_combo[active]" value="1" @checked(($combo->active ?? 1) == 1)>
                                                <label class="form-check-label" for="active">
                                                    Hiển thị
                                                </label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input class="form-check-input" value="0" type="radio"
                                                    id="active" name="food_combo[active]" @checked(($combo->active ?? 1) == 0)>
                                                <label class="form-check-label" for="active">
                                                    Ẩn
                                                </label>
                                            </div>
                                        </div>
                                        <div id="food_combo_active_error" class="mt-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">
                            {{ isset($combo) ? 'Sửa' : 'Thêm mới' }}
                        </button>
                        <a href="{{ route('admin.food-combos.index') }}" class="btn btn-warning">
                            Trở về trang danh sách
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
