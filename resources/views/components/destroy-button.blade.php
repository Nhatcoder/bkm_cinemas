@props(['route', 'id'])

<form action="{{ route($route, $id) }}" method="POST" style="display:inline;" class="destroy-form">
  @csrf
  @method('DELETE')
  <button onclick="return confirm('Bạn có chắc chắn muốn xóa mục này?')"
    class="btn btn-danger shadow btn-xs sharp me-1 btn-remove">
    <i class="fa fa-trash"></i>
  </button>
</form>