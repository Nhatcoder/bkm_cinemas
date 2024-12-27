@extends('admin.layouts.main')

@section('title', $title['create'] ?? null)

@section('css')
@endsection
@vite(['resources/js/app.js', 'resources/css/app.css'])

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-12">
      <div class="row">
        <x-page-titles />
      </div>
      <form onsubmit="return false" x-data="SeatLayout" method="post" action="" class="product-vali"
        enctype="multipart/form-data">
        <div class="row">
          <div class="col-xl-12">
            <div class="card h-auto">
              <div class="card-body">
                <div class="row mb-4">
                  <div class="mb-3">
                    <label class="me-sm-2 form-label mb-2">Tên sơ đồ ghế</label>
                    <input type="text" x-model="formData.name" class="form-control"
                      placeholder="Nhập tên sơ đồ ghế">
                    <span class="text-danger" x-text="errors.name"></span>
                  </div>
                  <div class="col-6 mb-3">
                    <label class="form-label mb-2">Số cột</label>
                    <input type="number" x-model="formData.col_count" @input="renderSeatLayout; formData.seats = []"
                      @change="formData.seats = []" class="form-control" id="slug" name="slug"
                      placeholder="Nhập số cột">
                    <span class="text-danger" x-text="errors.col_count"></span>
                  </div>
                  <div class="col-6 mb-3">
                    <label class="form-label mb-2">Số hàng</label>
                    <input type="number" x-model="formData.row_count" @input="renderSeatLayout; formData.seats = []"
                      @change="formData.seats = []" class="form-control" id="slug" name="slug"
                      placeholder="Nhập số hàng">
                    <span class="text-danger" x-text="errors.row_count"></span>
                  </div>
                  <div id="seatingArea" class="tw-inline-flex tw-items-center tw-mb-3 tw-text-white"></div>
                  <div class="mb-3">
                    <button type="button" @click="toggleModal()" class="btn btn-sm btn-primary">Chọn
                      từ sơ đồ ghế có sẵn</button>
                  </div>
                  <div class="tw-flex tw-justify-end">
                    <button @click="onSubmit" class="btn btn-md btn-success">Tạo mới</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div x-show="showModal"
          class="tw-fixed tw-inset-0 tw-z-50 tw-flex tw-items-center tw-justify-center tw-bg-black tw-bg-opacity-50" x-cloak>
          <div @click.outside="toggleModal()"
            class="tw-bg-black tw-bg-opacity-60 tw-rounded-lg tw-shadow-lg tw-w-full tw-max-w-7xl tw-min-h-[500px] tw-p-6 tw-relative">
            <div class="tw-flex tw-justify-between tw-items-center tw-border-b tw-pb-3">
              <h5 class="tw-text-2xl tw-font-bold tw-text-black">Chọn từ sơ đồ ghế có sẵn</h5>
              <button type="button" @click="toggleModal()"
                class="tw-text-white tw-text-2xl tw-bg-transparent">&times;</button>
            </div>
            <div
              class="tw-mt-4 tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 md:tw-grid-cols-3 lg:tw-grid-cols-4 xl:tw-grid-cols-5 tw-gap-4 tw-overflow-y-auto tw-max-h-[400px]">
              <template x-for="seatLayout in seatLayouts" :key="seatLayout.id">
                <label @click="selectLayout(seatLayout)"
                  :class="{'tw-border-blue-500': formData.seats && formData.id === seatLayout.id, 'tw-border-2 tw-border-solid tw-p-2 tw-rounded-lg tw-shadow hover:tw-shadow-lg tw-transition-shadow tw-duration-300 tw-cursor-pointer tw-flex tw-flex-col': true}">
                  <img :src="seatLayout.image" :alt="seatLayout.name"
                    class="tw-w-full tw-h-auto tw-mb-1 tw-rounded">
                  <div class="tw-mt-auto">
                    <h3 class="tw-text-lg tw-font-semibold tw-text-black" x-text="seatLayout.name"></h3>
                    <p class="tw-m-0">Columns: <span x-text="seatLayout.col_count"></span>
                    </p>
                    <p class="tw-m-0">Rows: <span x-text="seatLayout.row_count"></span>
                    </p>
                  </div>
                </label>
              </template>
            </div>
            <div class="tw-flex tw-justify-end tw-p-4 tw-border-t tw-border-gray-200">
              <button type="button" @click="toggleModal()"
                class="tw-btn tw-btn-sm tw-btn-secondary hover:tw-bg-red-600 tw-transition tw-duration-300">Close</button>
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