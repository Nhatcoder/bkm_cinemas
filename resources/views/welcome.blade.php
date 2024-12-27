<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  @vite(['resources/js/app.js', 'resources/css/app.css'])
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body x-data="{ showModal: false }">
  <div class="max-w-7xl mx-auto p-8">
    <form id="form" onsubmit="return false" class="space-y-4 text-black">
      <label class="block">
        <span class="block text-sm font-medium text-white">Tên sơ đồ ghế</span>
        <input type="text" name="name" class="input input-sm input-bordered input-primary text-black" />
      </label>
      <label class="block">
        <span class="block text-sm font-medium text-white">Số cột</span>
        <input type="number" name="col_count" class="input input-sm input-bordered input-primary text-black" />
      </label>
      <label class="block">
        <span class="block text-sm font-medium text-white">Số hàng</span>
        <input type="number" name="row_count" class="input input-sm input-bordered input-primary text-black" />
      </label>
      <div id="seatingArea" class="inline-flex items-center mb-3 text-white">
      </div>
      <div class="mb-3">
        <button class="btn btn-sm btn-info" @click="showModal = true">Chọn từ sơ đồ ghế có sẵn</button>
      </div>
      <div class="mb-3">
        <button id="submit" class="btn btn-sm btn-primary">Lưu</button>
      </div>
    </form>
  </div>
  <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" x-cloak>
    <div @click.outside="showModal = false" class="bg-white rounded-lg shadow-lg w-full max-w-7xl min-h-[500px] p-6 relative">
      <div class="flex justify-between items-center border-b pb-3">
        <h5 class="text-2xl font-bold text-black">Chọn từ sơ đồ ghế có sẵn</h5>
        <button @click="showModal = false" class="text-black text-2xl">&times;</button>
      </div>
      <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 overflow-y-auto max-h-[400px]">
        @foreach ($seatLayouts as $seatLayout)
        <div class="border p-2 rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
          <img class="w-full object-cover" src="{{ Storage::url($seatLayout->image) }}" alt="{{ $seatLayout->name }}" class="w-full h-auto mb-4 rounded">
          <h3 class="text-lg font-semibold text-black">{{ $seatLayout->name }}</h3>
          <p class="text-gray-600">Columns: {{ $seatLayout->col_count }}</p>
          <p class="text-gray-600">Rows: {{ $seatLayout->row_count }}</p>
        </div>
        @endforeach
      </div>
      <div class="absolute bottom-4 right-4">
        <button @click="showModal = false" class="btn btn-secondary bg-red-500 text-white px-4 py-2 rounded">Close</button>
      </div>
    </div>
  </div>
</body>
<script type="module">
  const {
    dataUrlToBlob,
    domToImage,
    domToBlob,
    downloadBlob
  } = utils;
  let seats = [];
  let seatTable = null;
  const formData = new FormData();
  formData.append('name', 'Test');
  formData.append('col_count', 10);
  formData.append('row_count', 10);
  formData.append('image', null);
  formData.append('seats', null);
  updateFormInputs(formData);
  $(document).ready(function() {
    $("#seatingArea").seatmanager({
      col_count: formData.get('col_count'),
      row_count: formData.get('row_count'),
    }, (data) => {
      formData.set('seats', JSON.stringify(data.seats));
      seatTable = data.seatTable;
    });
  });

  $("#form").on('input', 'input', function() {
    formData.set($(this).attr('name'), $(this).val());
    $("#seatingArea").seatmanager({
      col_count: formData.get('col_count'),
      row_count: formData.get('row_count'),
    }, (data) => {
      formData.set('seats', JSON.stringify(data.seats));
      seatTable = data.seatTable;
    });
  });

  $("#submit").click(async function() {
    formData.set('image', await domToBlob(seatTable[0]));
    axios.post('http://bookmon.test/api/seat-layouts', formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    }).then(function(response) {
      console.log('success');
    });
  });

  function updateFormInputs(formData) {
    formData.forEach((value, key) => {
      $(`input[name="${key}"]`).val(value);
    });
  }
</script>

</html>