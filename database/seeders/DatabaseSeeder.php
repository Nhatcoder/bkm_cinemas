<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Constants\PermissionConstant;
use App\Constants\RoleConstant;
use App\Constants\SeatType;
use App\Models\Area;
use App\Models\Banner;
use App\Models\Cinema;
use App\Models\City;
use App\Models\Food;
use App\Models\FoodType;
use App\Models\Image;
use App\Models\Movie;
use App\Models\RefreshToken;
use App\Models\Room;
use App\Models\Seat;
use App\Models\Showtime;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'cinema_id' => 1,
            'name' => 'admin',
            'email' => 'demo@gmail.com',
            'password' => bcrypt('1111'),
            'type' => 'admin',
            'balance' => 9000000,
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::create([
            'cinema_id' => 1,
            'name' => 'duynnz',
            'email' => 'duynnz@gmail.com',
            'password' => bcrypt('1111'),
            'type' => 'admin',
            'balance' => 9000000,
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $data = [
            'Hà Nội' => [
                'Cầu Giấy' => [
                    'name' => 'CGV Vincom Center Nguyễn Chí Thanh',
                    'image' => 'images/cinemas/cgv-vincom-nguyen-chi-thanh.jpg',
                    'address' => '54A Nguyễn Chí Thanh, Đống Đa, Hà Nội',
                    'phone' => '024-3562-1100',
                    'email' => 'cgv.nguyenchithanh@cgv.vn',
                    'map' => 'https://goo.gl/maps/example1',
                    'description' => 'Rạp CGV nằm trong trung tâm thương mại Vincom, hiện đại và tiện nghi.',
                ],
                'Hoàn Kiếm' => [
                    'name' => 'Lotte Cinema Lotte Center',
                    'image' => 'images/cinemas/lotte-lotte-center.jpg',
                    'address' => '54 Liễu Giai, Ba Đình, Hà Nội',
                    'phone' => '024-3831-8000',
                    'email' => 'lotte.lottecenter@lotte.vn',
                    'map' => 'https://goo.gl/maps/example2',
                    'description' => 'Rạp Lotte Cinema mang lại trải nghiệm giải trí tuyệt vời.',
                ],
                'Hai Bà Trưng' => [
                    'name' => 'Galaxy Nguyễn Du',
                    'image' => 'images/cinemas/galaxy-nguyen-du.jpg',
                    'address' => '116 Nguyễn Du, Hai Bà Trưng, Hà Nội',
                    'phone' => '024-3822-3000',
                    'email' => 'galaxy.nguyendu@galaxy.vn',
                    'map' => 'https://goo.gl/maps/example3',
                    'description' => 'Rạp Galaxy với không gian sang trọng và dịch vụ chu đáo.',
                ],
            ],
            'TP Hồ Chí Minh' => [
                'Bình Thạnh' => [
                    'name' => 'CGV Landmark 81',
                    'image' => 'images/cinemas/cgv-landmark-81.jpg',
                    'address' => '208 Nguyễn Hữu Cảnh, Bình Thạnh, TP Hồ Chí Minh',
                    'phone' => '028-2222-1100',
                    'email' => 'cgv.landmark81@cgv.vn',
                    'map' => 'https://goo.gl/maps/example4',
                    'description' => 'Rạp CGV tại Landmark 81, tòa nhà cao nhất Việt Nam.',
                ],
                'Phú Nhuận' => [
                    'name' => 'Lotte Cinema Nowzone',
                    'image' => 'images/cinemas/lotte-nowzone.jpg',
                    'address' => '235 Nguyễn Văn Cừ, Quận 3, TP Hồ Chí Minh',
                    'phone' => '028-3830-9000',
                    'email' => 'lotte.nowzone@lotte.vn',
                    'map' => 'https://goo.gl/maps/example5',
                    'description' => 'Rạp Lotte tại Nowzone với công nghệ chiếu phim tiên tiến.',
                ],
                'Gò Vấp' => [
                    'name' => 'Galaxy Nguyễn Văn Trỗi',
                    'image' => 'images/cinemas/galaxy-nguyen-van-troi.jpg',
                    'address' => '30 Nguyễn Văn Trỗi, Phú Nhuận, TP Hồ Chí Minh',
                    'phone' => '028-3999-3000',
                    'email' => 'galaxy.nguyenvantroi@galaxy.vn',
                    'map' => 'https://goo.gl/maps/example6',
                    'description' => 'Rạp Galaxy hiện đại với không gian thoải mái.',
                ],
            ],
            'Đà Nẵng' => [
                'Sơn Trà' => [
                    'name' => 'CGV Vincom Đà Nẵng',
                    'image' => 'images/cinemas/cgv-vincom-danang.jpg',
                    'address' => '910A Ngô Quyền, Sơn Trà, Đà Nẵng',
                    'phone' => '0236-377-7999',
                    'email' => 'cgv.danang@cgv.vn',
                    'map' => 'https://goo.gl/maps/example7',
                    'description' => 'Rạp CGV Vincom tại Đà Nẵng với hệ thống âm thanh hiện đại.',
                ],
                'Thanh Khê' => [
                    'name' => 'Lotte Cinema Đà Nẵng',
                    'image' => 'images/cinemas/lotte-danang.jpg',
                    'address' => '46 Nguyễn Tri Phương, Thanh Khê, Đà Nẵng',
                    'phone' => '0236-372-1111',
                    'email' => 'lotte.danang@lotte.vn',
                    'map' => 'https://goo.gl/maps/example8',
                    'description' => 'Rạp Lotte tại Đà Nẵng với không gian sang trọng.',
                ],
                'Liên Chiểu' => [
                    'name' => 'Galaxy Hòa Khánh',
                    'image' => 'images/cinemas/galaxy-hoa-khanh.jpg',
                    'address' => '10 Âu Cơ, Liên Chiểu, Đà Nẵng',
                    'phone' => '0236-385-5555',
                    'email' => 'galaxy.hoakhanh@galaxy.vn',
                    'map' => 'https://goo.gl/maps/example9',
                    'description' => 'Rạp Galaxy Hòa Khánh với dịch vụ tiện ích.',
                ],
            ],
        ];

        foreach ($data as $cityName => $areas) {
            $city = City::create([
                'name' => $cityName,
            ]);

            foreach ($areas as $areaName => $cinemaData) {
                $area = Area::create([
                    'city_id' => $city->id,
                    'name' => $areaName,
                ]);

                Cinema::create(array_merge($cinemaData, [
                    'area_id' => $area->id,
                    'active' => 1,
                ]));
            }
        }
        $movies = [
            [
                'title' => 'Avengers: Endgame',
                'slug' => 'avengers-endgame',
                'image' => 'https://th.bing.com/th/id/R.ccc41be9199b6d79eaf7a12ab145b228?rik=B4zmkSl8X6PhSA&pid=ImgRaw&r=0',
                'banner_movie' => 'https://th.bing.com/th/id/R.f164bab6d1490b70ba84e8ef33cf2cda?rik=mVVtq9MFTMHkQA&pid=ImgRaw&r=0',
                'description' => 'Hành trình cuối cùng của các siêu anh hùng Avengers nhằm đảo ngược hậu quả từ cú búng tay của Thanos.',
                'content' => 'Sau sự kiện Infinity War, các siêu anh hùng còn lại cùng nhau tìm cách để đưa mọi người trở lại.',
                'duration' => 181,
                'director' => 'Anthony Russo, Joe Russo',
                'trailer_url' => 'https://www.youtube.com/watch?v=TcMBFSGVi1c',
                'format' => '3D',
                'age' => 13,
                'release_date' => '2019-04-26',
                'premiere_date' => '2019-04-24',
                'country' => 'USA',
                'language' => 'Vietsub',
                'order' => 1,
                'hot' => 1,
                'active' => 1,
            ],
            [
                'title' => 'Parasite',
                'slug' => 'parasite',
                'image' => 'https://th.bing.com/th/id/R.f7bde687192c0bb0fb7e11409c44aa96?rik=pIJLpidaZJWGKQ&pid=ImgRaw&r=0',
                'banner_movie' => 'https://2.bp.blogspot.com/-cEQeUks_StU/XwE3FhwQlgI/AAAAAAAAQt0/VFumafIgU_kRycr4uKiaj0JtGmIJtlSFQCK4BGAYYCw/w1200-h630-p-k-no-nu/Diapositiva1.JPG',
                'description' => 'Một câu chuyện đầy bất ngờ về sự chênh lệch giàu nghèo và gia đình.',
                'content' => 'Gia đình Kim nghèo khó tìm cách xâm nhập vào gia đình Park giàu có và mọi chuyện dần trở nên rối ren.',
                'duration' => 132,
                'director' => 'Bong Joon-ho',
                'trailer_url' => 'https://www.youtube.com/watch?v=5xH0HfJHsaY',
                'format' => '2D',
                'age' => 16,
                'release_date' => '2019-05-30',
                'premiere_date' => '2019-05-21',
                'country' => 'South Korea',
                'language' => 'Vietsub',
                'order' => 2,
                'hot' => 1,
                'active' => 1,
            ],
            [
                'title' => 'Doraemon: Nobita và Mặt Trăng Phiêu Lưu Ký',
                'slug' => 'doraemon-nobita-va-mat-trang-phieu-luu-ky',
                'image' => 'https://upload.wikimedia.org/wikipedia/vi/2/2e/Nobita_no_Getsumen_Tansa-ki_poster.jpg',
                'banner_movie' => 'https://cdn.popsww.com/blog/sites/2/2023/05/doraemmon-movie-39-nobita-va-mat-trang-phieu-luu-ky.jpg',
                'description' => 'Nobita và Doraemon cùng khám phá những bí ẩn của Mặt Trăng.',
                'content' => 'Bị hấp dẫn bởi những sinh vật kỳ lạ trên Mặt Trăng, Nobita cùng bạn bè lên đường để khám phá.',
                'duration' => 111,
                'director' => 'Shinnosuke Yakuwa',
                'trailer_url' => 'https://www.youtube.com/watch?v=WVGpl0MkHcY',
                'format' => '2D',
                'age' => 6,
                'release_date' => '2019-03-01',
                'premiere_date' => '2019-03-10',
                'country' => 'Japan',
                'language' => 'Vietsub',
                'order' => 3,
                'hot' => 0,
                'active' => 1,
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
        $cinemas = Cinema::all();

        foreach ($cinemas as $cinema) {
            User::create([
                'cinema_id' => $cinema->id,
                'name' => "demo$cinema->id",
                'email' => "demo$cinema->id@gmail.com",
                'password' => bcrypt('1111'),
                'type' => 'admin',
                'role_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            foreach (range(1, 2) as $index) {
                $room = Room::create([
                    'cinema_id' => $cinema->id, // Liên kết phòng với rạp chiếu phim
                    'room_name' => 'Phòng ' . $index . ' - ' . $cinema->name, // Tên phòng
                    'image' => 'path/to/image.jpg', // Đường dẫn hình ảnh phòng
                    'base_price' => 50000, // Giá cơ bản
                    'col_count' => 10, // Số cột
                    'row_count' => 10, // Số hàng
                ]);
                $seatLetter = range('A', chr(64 + $room->col_count)); // Mảng các chữ cái từ A đến số lượng cột (ví dụ: A, B, C,..., L)
                $seatNumber = 1; // Số ghế trong mỗi cột

                foreach ($seatLetter as $col) {
                    foreach (range(1, $room->row_count) as $row) {
                        $seatNumberFormatted = str_pad($row, 2, '0', STR_PAD_LEFT); // Đảm bảo số ghế có 2 chữ số (01, 02, ...)
                        $seatCode = $col . $seatNumberFormatted; // Tạo mã ghế (A01, B02, ...)

                        Seat::create([
                            'room_id' => $room->id,
                            'seat_number' => $seatCode, // Số ghế có dạng A01, B02, ...
                            'price' => 50000, // Giá ghế
                            'slot' => 1, // 1 ghế đơn
                            'visible' => 1, // Hiển thị ghế
                            'merged_seats' => null, // Chưa có ghế ghép (có thể có nếu bạn muốn hỗ trợ ghế đôi)
                            'order' => $seatNumber++, // Số thứ tự ghế
                        ]);
                    }
                }
            }
        }
        $fileLayoutSeats = ['heart.json', 'seats.json'];
        foreach ($fileLayoutSeats as $file) {
            DB::table('seat_layouts')->insert([
                'name' => $file,
                'col_count' => 11,
                'row_count' => 10,
                'seats' => file_get_contents(storage_path('app/public/schemas/' . $file)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $seatTypes = [
            [
                'code' => SeatType::EMPTY_SEAT,
                'bonus_price' => 0,
                'text' => 'Trống',
                'color' => '#000000',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/></svg>',
                'is_system' => true,
            ],
            [
                'code' => SeatType::STANDARD_SEAT,
                'bonus_price' => 0,
                'text' => 'Ghế mặc định',
                'color' => '#FFFFFF',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM2 14s-1 0-1-1 1-4 7-4 7 3 7 4-1 1-1 1H2z"/></svg>',
                'is_system' => true,
            ],
            [
                'code' => SeatType::COUPLE_SEAT,
                'bonus_price' => 15000.00,
                'text' => 'Ghế cặp',
                'color' => '#FFB6C1',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16"><path d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.414-2.368 5.327-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01z"/></svg>',
                'is_system' => true,
            ],
            [
                'code' => SeatType::VIP_SEAT,
                'bonus_price' => 10000.00,
                'text' => 'Ghế VIP',
                'color' => '#FFD700',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.32-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.63.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>',
                'is_system' => true,
            ],
            [
                'code' => SeatType::ACCESSIBLE_SEAT,
                'bonus_price' => 20000.00,
                'text' => 'Ghế cho người khuyết tật',
                'color' => '#32CD32',
                'icon'  => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-wheelchair" viewBox="0 0 16 16"><path d="M12 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3m-.663 2.146a1.5 1.5 0 0 0-.47-2.115l-2.5-1.508a1.5 1.5 0 0 0-1.676.086l-2.329 1.75a.866.866 0 0 0 1.051 1.375L7.361 3.37l.922.71-2.038 2.445A4.73 4.73 0 0 0 2.628 7.67l1.064 1.065a3.25 3.25 0 0 1 4.574 4.574l1.064 1.063a4.73 4.73 0 0 0 1.09-3.998l1.043-.292-.187 2.991a.872.872 0 1 0 1.741.098l.206-4.121A1 1 0 0 0 12.224 8h-2.79zM3.023 9.48a3.25 3.25 0 0 0 4.496 4.496l1.077 1.077a4.75 4.75 0 0 1-6.65-6.65z"/></svg>'
            ],
        ];
        foreach ($seatTypes as $seatType) {
            DB::table('seat_types')->insert([
                'code' => $seatType['code'],
                'bonus_price' => $seatType['bonus_price'],
                'text' => $seatType['text'],
                'color' => $seatType['color'],
                'icon' => $seatType['icon'],
                'is_system' => $seatType['is_system'] ?? false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $timeSlots = [
            'morning' => ['08:00', '10:00'],
            'afternoon' => ['13:00', '15:00'],
            'evening' => ['18:00', '20:00'],
        ];

        // Lấy tất cả các bộ phim
        $movies = Movie::all();

        foreach (range(0, 4) as $dayOffset) {
            $date = Carbon::now()->addDays($dayOffset);
            $cinemas = Cinema::all();

            foreach ($cinemas as $cinema) {
                $rooms = $cinema->rooms;

                foreach ($rooms as $room) {
                    foreach ($movies as $movie) {
                        // Tạo thời gian start_time và end_time cho mỗi bộ phim
                        $startTime = $date->copy()->setTime(rand(8, 20), rand(0, 59));  // Lấy thời gian ngẫu nhiên trong ngày
                        $endTime = $startTime->copy()->addHours(2);  // Thời gian kết thúc là 2 giờ

                        // Kiểm tra nếu Showtime đã tồn tại
                        $existingShowtime = Showtime::where('room_id', $room->id)
                            ->where('cinema_id', $cinema->id)
                            ->where('movie_id', $movie->id)
                            ->where('start_time', $startTime)
                            ->first();

                        // Nếu không tồn tại showtime thì tạo mới
                        if (!$existingShowtime) {
                            Showtime::create([
                                'room_id' => $room->id,
                                'cinema_id' => $cinema->id,
                                'movie_id' => $movie->id,
                                'start_time' => $startTime,
                                'end_time' => $endTime,
                            ]);
                        }
                    }
                }
            }
        }


        $foodTypes = [
            [
                'name' => 'Combo Bắp Rang Bơ',
                'order' => 1,
                'active' => 1,
                'foods' => [
                    ['name' => 'Combo Bắp Rang Bơ Lớn', 'price' => 70000],
                    ['name' => 'Combo Bắp Rang Bơ Nhỏ', 'price' => 50000],
                    ['name' => 'Bắp Rang Bơ Mặn', 'price' => 60000],
                ]
            ],
            [
                'name' => 'Nước Ngọt',
                'order' => 2,
                'active' => 1,
                'foods' => [
                    ['name' => 'Coca Cola', 'price' => 25000],
                    ['name' => 'Pepsi', 'price' => 25000],
                    ['name' => 'Sprite', 'price' => 25000],
                ]
            ],
            [
                'name' => 'Kẹo',
                'order' => 3,
                'active' => 1,
                'foods' => [
                    ['name' => 'Kẹo Dẻo', 'price' => 15000],
                    ['name' => 'Kẹo Socola', 'price' => 20000],
                    ['name' => 'Kẹo Lollipop', 'price' => 10000],
                ]
            ],
            [
                'name' => 'Popcorn Combo',
                'order' => 4,
                'active' => 1,
                'foods' => [
                    ['name' => 'Combo Bắp Rang Bơ & Nước', 'price' => 90000],
                    ['name' => 'Combo Bắp Rang Bơ & Kẹo', 'price' => 85000],
                ]
            ],
            [
                'name' => 'Nước Ép',
                'order' => 5,
                'active' => 1,
                'foods' => [
                    ['name' => 'Nước Ép Cam', 'price' => 30000],
                    ['name' => 'Nước Ép Táo', 'price' => 35000],
                    ['name' => 'Nước Ép Dưa Hấu', 'price' => 30000],
                ]
            ],
            [
                'name' => 'Bánh Ngọt',
                'order' => 6,
                'active' => 1,
                'foods' => [
                    ['name' => 'Bánh Socola', 'price' => 25000],
                    ['name' => 'Bánh Bông Lan', 'price' => 20000],
                    ['name' => 'Bánh Đậu Xanh', 'price' => 22000],
                ]
            ]
        ];

        foreach ($foodTypes as $foodTypeData) {
            $foodType = FoodType::create([
                'name' => $foodTypeData['name'],
                'order' => $foodTypeData['order'],
                'active' => $foodTypeData['active']
            ]);

            foreach ($foodTypeData['foods'] as $food) {
                Food::create([
                    'food_type_id' => $foodType->id,
                    'name' => $food['name'],
                    'price' => $food['price']
                ]);
            }
        }
        DB::table('vouchers')->insert([
            [
                'code' => 'DISCOUNT10',
                'image' => 'https://example.com/voucher1.jpg',
                'name' => 'Giảm 10%',
                'description' => 'Giảm 10% cho đơn hàng từ 100k',
                'discount_value' => 10,
                'discount_condition' => 'all',
                'condition_type' => null,
                'level_type' => null,
                'discount_type' => 'percentage',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
                'quantity' => 500,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'code' => 'DISCOUNT500',
                'image' => 'https://example.com/voucher2.jpg',
                'name' => 'Giảm 500k',
                'description' => 'Giảm 500k cho đơn hàng từ 500k',
                'discount_value' => 500000,
                'discount_condition' => 'all',
                'condition_type' => null,
                'level_type' => null,
                'discount_type' => 'money',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
                'quantity' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'code' => 'NEWUSER30',
                'image' => 'https://example.com/voucher3.jpg',
                'name' => 'Giảm 30% cho thành viên mới',
                'description' => 'Giảm 30% cho thành viên mới đăng ký',
                'discount_value' => 30,
                'discount_condition' => 'condition',
                'condition_type' => 'new_member',
                'level_type' => null,
                'discount_type' => 'percentage',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
                'quantity' => 200,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ],
            [
                'code' => 'VIPDISCOUNT',
                'image' => 'https://example.com/voucher4.jpg',
                'name' => 'Giảm 20% cho VIP',
                'description' => 'Giảm 20% cho tài khoản VIP',
                'discount_value' => 20,
                'discount_condition' => 'condition',
                'condition_type' => null,
                'level_type' => 'vip',
                'discount_type' => 'percentage',
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addDays(30),
                'quantity' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null
            ]
        ]);
    }
}
