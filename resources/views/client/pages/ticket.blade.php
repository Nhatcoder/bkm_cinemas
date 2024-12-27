@extends('client.layouts.main')

@section('title', 'Giá vé')

@section('css')
    <link rel="stylesheet" href="{{ asset('client/css/ticket_price.css') }}">
    <link rel="stylesheet" href="https://touchcinema.com/statics/frontend/plugins/owl-carousel/assets/owl.carousel.min.css"
        type="text/css" media="all" />
@endsection

@section('content')
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
    <div class="page-cinema-list">
        <section class="container">
            <div class="row section">
                <div class="col-md-12">
                    <h1><span style="font-size: 18pt;">Gi&aacute; V&eacute; rạp Touch Cinema - Pleiku Gia
                            Lai</span></h1>
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#2D-price">
                                <h3>Giá vé 2D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#3D-price">
                                <h3>Giá vé 3D</h3>
                            </a></li>
                        <li><a data-toggle="tab" href="#holiday-price">
                                <h3>Ngày Lễ</h3>
                            </a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="2D-price" class="tab-pane fade in active">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-2d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-tv/z4045880677164-1ba77b4619d45e773581092b6319ac62.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="3D-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/05-2018/banggiave-3d.html" alt="" /><img
                                    src="https://touchcinema.com/storage/slider-app/z4986572984860-008d90891c78bc2a0b13b8acd84f9e88.jpg"
                                    alt="" /></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                        </div>
                        <div id="holiday-price" class="tab-pane fade">
                            <p><img src="https://touchcinema.com/storage/slider-tv/bangve-ngayle2.html" alt="" />
                            </p>
                            <p><img src="https://touchcinema.com/storage/slide-web/z4103264955341-3bb1395fb3108359cda4af45aee336f4.jpg"
                                    alt="" width="1300" height="720" /></p>
                            <p><strong><img
                                        src="https://touchcinema.com/storage/slider-app/z4987092572561-73b35dab89fa5c7b14053f8768ea66f4.jpg"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong><img src="https://touchcinema.com/storage/slide-web/bangve-2023-ngayle-1.png"
                                        alt="" width="1300" height="720" /></strong></p>
                            <p><strong>Ghi ch&uacute;:</strong></p>
                            <p>- Gi&aacute; v&eacute; Tết Nguy&ecirc;n Đ&aacute;n 2024 &aacute;p dụng v&agrave;o
                                c&aacute;c ng&agrave;y: Từ 10/02/2024 (M&ugrave;ng 1 &Acirc;m Lịch) đến hết
                                14/02/2024 (M&ugrave;ng 5 &Acirc;m Lịch)</p>
                            <p>- Gi&aacute; v&eacute; Lễ &aacute;p dụng v&agrave;o c&aacute;c ng&agrave;y:
                                01/01, 14/02, 08/03, 10/03 &Acirc;m lịch, 30/04, 01/05, 02/09, 20/10, 24/12
                                v&agrave; ng&agrave;y nghỉ b&ugrave; của người lao động theo quy định của
                                ph&aacute;p luật</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho kh&aacute;ch h&agrave;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n, kh&aacute;ch h&agrave;ng kh&ocirc;ng
                                c&oacute; thẻ th&agrave;nh vi&ecirc;n phụ thu 10.000đ/v&eacute; đối với ghế
                                thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i</p>
                            <p>- Bảng gi&aacute; tr&ecirc;n &aacute;p dụng cho suất chiếu th&ocirc;ng thường,
                                suất chiếu sớm (suất chiếu đặc biệt, suất chiếu sneakshow) phụ thu
                                10.000đ/v&eacute; đối với ghế thường, 20.000đ/v&eacute; đối với ghế đ&ocirc;i
                            </p>
                            <p>- Gi&aacute; v&eacute; khi đặt v&eacute; trực tuyến tr&ecirc;n website v&agrave;
                                ứng dụng Touch Cinema l&agrave; gi&aacute; v&eacute; người lớn</p>
                            <p>- Gi&aacute; v&eacute; học sinh, sinh vi&ecirc;n được &aacute;p dụng cho người từ
                                22 tuổi trở xuống khi mua v&eacute; tại quầy</p>
                            <p>- Gi&aacute; v&eacute; trẻ em, người cao tuổi, đối tượng ưu ti&ecirc;n &aacute;p
                                dụng cho trẻ em, người từ 60 tuổi trở l&ecirc;n, người c&oacute; c&ocirc;ng với
                                c&aacute;ch mạng, người c&oacute; ho&agrave;n cảnh đặc biệt kh&oacute; khăn
                                v&agrave; c&aacute;c đối tượng kh&aacute;c theo quy định của ph&aacute;p luật
                                khi mua v&eacute; tại quầy</p>
                            <p>- Người khuyết tật đặc biệt nặng được miễn gi&aacute; v&eacute;, người khuyết tật
                                nặng được giảm 50% gi&aacute; v&eacute; khi mua v&eacute; tại quầy</p>
                            <p>- Kh&aacute;ch h&agrave;ng khi đến rạp xem phim vui l&ograve;ng chứng thực được
                                độ tuổi ph&ugrave; hợp với phim, được quy định căn cứ v&agrave;o Th&ocirc;ng tư
                                số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn h&oacute;a, Thể thao v&agrave; Du
                                lịch c&oacute; hiệu lực thi h&agrave;nh từ ng&agrave;y 01/01/2017. Touch Cinema
                                c&oacute; quyền từ chối việc b&aacute;n v&eacute; hoặc v&agrave;o ph&ograve;ng
                                chiếu nếu kh&aacute;ch h&agrave;ng kh&ocirc;ng tu&acirc;n thủ đ&uacute;ng theo
                                quy định.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="nowshowing">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <h2 class="title">
                            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
                            <span>Phim đang chiếu</span>
                            <div class="border"></div>
                        </h2>
                        <div class="center">
                            <img src="https://touchcinema.com/images/icons/cinema-movie.png" alt="Phim đang chiếu" />
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div id="nowshowing">
                            <div class="owl-carousel" id="nowshowing-slider">
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/lam-giau-voi-ma.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470x700-1724744783-poster.jpg"
                                                alt="Làm Giàu Với Ma" />
                                        </a>
                                        <div class="hot" style="top: -27px;width: 80px;height: 78px;">
                                            <img src="https://touchcinema.com/images/icons/sneak.png">
                                        </div>
                                        <div class="info">
                                            <a href="phim/lam-giau-voi-ma.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/lam-giau-voi-ma.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 113 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/lam-giau-voi-ma.html">Làm Giàu Với Ma</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/da-nu-bao-thu.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/470wx700h-revolver-poster.jpg"
                                                alt="Đả Nữ Báo Thù" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/da-nu-bao-thu.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/da-nu-bao-thu.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 115 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hành Động, Hồi Hộp, Tội
                                                Phạm</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/da-nu-bao-thu.html">Đả Nữ Báo Thù</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/ma-da.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/449707108-869141951908574-2288391577922390780-n-poster.jpg"
                                                alt="Ma Da" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/ma-da.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/ma-da.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 95 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/ma-da.html">Ma Da</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/shin2024-poster-payoff-poster.jpg"
                                                alt="Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html"
                                                class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 105 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hoạt Hình, Gia Đình, Hài
                                                Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/shin-cau-be-but-chi-nhat-ky-khung-long-cua-chung-minh.html">Shin
                                                Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng
                                                Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/harold-va-cay-but-phep-thuat.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/phim-2021/poster-harold-poster.jpg"
                                                alt="Harold Và Cây Bút Phép Thuật (Lồng Tiếng)" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/harold-va-cay-but-phep-thuat.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/harold-va-cay-but-phep-thuat.html#showtime"
                                                class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 90 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước, Phiêu Lưu</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/harold-va-cay-but-phep-thuat.html">Harold Và Cây Bút
                                                Phép Thuật (Lồng Tiếng)</a></h2>
                                        <p class="release">Khởi chiếu 23/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/quai-vat-khong-gian.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/medias/hinh-phim-2021/rsz-romulus-instagram-payoff-poster-vietnam-poster.jpg"
                                                alt="Quái Vật Không Gian" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/quai-vat-khong-gian.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/quai-vat-khong-gian.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Khoa Học Viễn Tưởng,
                                                Kinh Dị</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/quai-vat-khong-gian.html">Quái Vật Không Gian</a></h2>
                                        <p class="release">Khởi chiếu 16/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/hai-muoi.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/hai-muoi-payoff-poster-khoi-chieu-30082024-poster.jpg"
                                                alt="Hai Muối" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/hai-muoi.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/hai-muoi.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 118 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Gia Đình, Tâm Lý</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/hai-muoi.html">Hai Muối</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                                <div class="movie" style="padding-top: 30px;">
                                    <div class="poster">
                                        <a href="phim/chang-nu-phi-cong.html">
                                            <img class="img-responsive"
                                                src="https://touchcinema.com/uploads/slider-app/pilot-t13-1080x1920-poster.jpg"
                                                alt="Chàng Nữ Phi Công" />
                                        </a>
                                        <div class="info">
                                            <a href="phim/chang-nu-phi-cong.html" class="button detail">
                                                > Chi tiết
                                            </a>
                                            <a href="phim/chang-nu-phi-cong.html#showtime" class="button ticket">
                                                Mua vé <img src="https://touchcinema.com/images/icons/icon-dat-ve.png"
                                                    alt="Mua vé" />
                                            </a>
                                            <p class="button duration"><b>Thời lượng:</b> 110 phút</p>
                                            <p class="button category"><b>Thể loại:</b> Hài Hước</p>
                                            <p class="button format"><b>Định dạng</b> 2D </p>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <h2><a href="phim/chang-nu-phi-cong.html">Chàng Nữ Phi Công</a></h2>
                                        <p class="release">Khởi chiếu 30/08/2024</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="widget-ticket  hidden ">
        <h2>
            <img src="https://touchcinema.com/images/icons/icon-ticket.png" alt="Đặt vé" />
            <span>Đặt vé</span>
            <div class="border"></div>
        </h2>
        <form>
            <div class="close-modal">Đóng</div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-film"></i></span>
                <select class="form-control" id="widget-movie">
                    <option>Chọn Phim</option>
                    <option value="973">Làm Giàu Với Ma</option>
                    <option value="1008">Đả Nữ Báo Thù</option>
                    <option value="993">Ma Da</option>
                    <option value="1012">Shin Cậu Bé Bút Chì: Nhật Ký Khủng Long Của Chúng Mình (Lồng Tiếng)
                    </option>
                    <option value="963">Harold Và Cây Bút Phép Thuật (Lồng Tiếng)</option>
                    <option value="992">Quái Vật Không Gian</option>
                    <option value="1013">Hai Muối</option>
                    <option value="991">Chàng Nữ Phi Công</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar-plus-o"></i></span>
                <select class="form-control" id="widget-date">
                    <option>Chọn Ngày</option>
                </select>
            </div>
            <div class="select-group">
                <span class="addon"><i class="fa fa-calendar"></i></span>
                <select class="form-control" id="widget-time">
                    <option>Chọn Suất</option>
                </select>
            </div>
            <div class="center">
                <button type="button" class="btn btn-success widget-buy">Mua vé</button>
            </div>
            <div class="loading hidden">
                <img src="https://touchcinema.com/images/loader.gif" alt="Loading..." />
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $(".nav-tabs li a").click(function() {
                var tab = $(this).attr('href');
                window.history.pushState("Gia vé - Touchcinema", "Gia vé - Touchcinema", tab);
            })
            var current_url = window.location.href;
            tab = current_url.split('#');
            if (tab[1]) {
                $('.nav-tabs a[href="#' + tab[1] + '"]').tab('show');
                $('html,body').animate({
                    scrollTop: $(".nav.nav-tabs").offset().top - 85
                }, 100);
            }
        })

        $("#nowshowing-slider").owlCarousel({
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            loop: true,
            responsive: {
                0: {
                    items: 2,
                },
                768: {
                    items: 2,
                },
                980: {
                    items: 2
                },
                1010: {
                    items: 3
                },
                1100: {
                    items: 3
                }
            },
            nav: true,
            dots: false
        });
    </script>
@endsection
