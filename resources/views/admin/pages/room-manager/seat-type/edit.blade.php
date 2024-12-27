@extends('admin.layouts.main')

@section('title', $title['create'] ?? null)

@section('css')
@endsection
@vite(['resources/js/app.js', 'resources/css/app.css'])

@section('content')
<div class="container-fluid" x-data="SeatTypeComponent({{ $seatType->id }})">
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <x-page-titles />
            </div>
            <form @submit.prevent="onSubmit" method="post" action="" class="product-vali"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card h-auto">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="mb-3">
                                                <label class="me-sm-2 form-label mb-2">Mã loại ghế <span class="tw-text-slate-500 tw-text-sm tw-font-normal">( viết liền không dấu ngăn cách bằng dấu -|_ )</span></label>
                                                <input type="text" x-model="formData.code" class="form-control"
                                                    placeholder="Nhập code">
                                                <span class="text-danger" x-text="errors.code"></span>
                                            </div>
                                            <div class="mb-3">
                                                <label class="me-sm-2 form-label mb-2">Giá tiền thêm</label>
                                                <input type="number" step="0.01" x-model="formData.bonus_price" class="form-control"
                                                    placeholder="Nhập giá tiền thêm">
                                                <span class="text-danger" x-text="errors.bonus_price"></span>
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label class="me-sm-2 form-label mb-2">Màu sắc icon</label>
                                                <input type="color" x-model="formData.color" class="form-control"
                                                    placeholder="Chọn color">
                                                <span class="text-danger" x-text="errors.color"></span>
                                            </div>
                                            <div class="mb-3 col-6">
                                                <label class="me-sm-2 form-label mb-2">Xem trước</label>
                                                <div class="tw-text-white tw-bg-[#2d3748] hover:tw-bg-[#4a5568] tw-p-4 tw-cursor-pointer tw-flex tw-items-center tw-gap-2 tw-transition-all tw-duration-300 tw-line-height-[1.7] tw-text-[0.9rem] tw-border tw-border-[var(--border)] tw-h-[3rem] tw-rounded-[0.5rem]">
                                                    <div :style="{'color': formData.color}" x-html="formData.icon"></div>
                                                    <div class="tw-text-white" x-text="formData.text"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label class="me-sm-2 form-label mb-2">Tiêu đề menu</label>
                                            <input type="text" x-model="formData.text" class="form-control"
                                                placeholder="Nhập tiêu đề menu">
                                            <span class="text-danger" x-text="errors.text"></span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="me-sm-2 form-label mb-2">Icon menu <span class="tw-text-slate-500 tw-text-sm tw-font-normal">( bootstrap icon )</span></label>
                                            <textarea x-model="formData.icon" class="form-control"
                                                placeholder="Nhập icon"></textarea>
                                            <span class="text-danger" x-text="errors.icon"></span>
                                        </div>
                                        <div class="mb-3">
                                            <input type="checkbox" x-model="formData.is_system" class="form-check-input">
                                            <label class="me-sm-2 form-label mb-2">Là loại ghế hệ thống</label>
                                            <span class="text-danger" x-text="errors.is_system"></span>
                                        </div>
                                    </div>
                                    <div class="tw-flex tw-justify-end">
                                        <button class="btn btn-md btn-success">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection