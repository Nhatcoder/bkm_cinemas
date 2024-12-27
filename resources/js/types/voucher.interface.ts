export interface IVoucher {
  id: string; // ID của voucher
  code: string; // Mã voucher duy nhất
  image?: string | null; // Hình ảnh của voucher (optional)
  name: string; // Tên voucher
  description?: string | null; // Mô tả voucher (optional)
  discount_value: string; // Giá trị giảm giá
  discount_condition: 'all' | 'condition'; // Điều kiện áp dụng: tất cả hoặc có điều kiện
  condition_type?: 'new_member' | 'birthday' | 'level_up' | null; // Loại điều kiện: new_member, birthday, level_up (optional)
  level_type?: 'vip' | 'vvip' | null; // Loại cấp bậc (optional)
  discount_type: 'money' | 'percentage'; // Loại giảm giá: cố định hoặc phần trăm
  start_date: string; // Ngày bắt đầu áp dụng (dưới dạng chuỗi ISO 8601)
  end_date: string; // Ngày hết hạn áp dụng (dưới dạng chuỗi ISO 8601)
  quantity?: number | null; // Số lượt có thể tặng (null: vô hạn, số > 0: số lượng cụ thể) (optional)
  created_at: string; // Thời gian tạo voucher
  updated_at: string; // Thời gian cập nhật voucher
  deleted_at?: string | null; // Thời gian xóa (soft delete) (optional)
}
