@extends('client.layouts.main2')

@section('title', 'BKM Cinemas - Rạp chiếu phim 3D công nghệ hàng đầu.')

@section('css')
    <style>
       
    </style>
@endsection

@section('content')
    <div id="content">
        <div id="wrap-datve">
            <div id="note-time">
                <div id="note">
                    * Vui lòng kiểm tra kỹ thông tin vé đã đặt trước khi thanh toán
                </div>
                <div id="time">
                    Thời gian còn lại
                    <span id="count-time">01:51</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="ticket-info">
                        <h3 class="title">Thông tin vé</h3>
                        <div class="info">
                            <p>Phim: <b>Anh Trai Vượt Mọi Tam Tai</b></p>
                            <p>Thời gian: <b>Thứ Ba, ngày 17/9 21:35</b></p>
                            <p>Phòng chiếu: <b>04 </b></p>
                            <p>Ghế đã chọn: <b>D04, D07</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="ticket-info">
                        <h3 class="title">Thông tin đặt vé</h3>
                        <div class="info">
                            <p>Họ tên: <b>Trần Dần</b></p>
                            <p>Số điện thoại: <b>0971131429</b></p>
                            <p>Email: <b>nhatcaca2004@gmail.com</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="ticket-info">
                        <h3 class="title">Thông tin combo bắp nước</h3>
                        <div class="info">
                            <p style="margin-bottom: 0;"><b>Pepsi + Bắp Ngọt </b>
                                <span class="pull-right">
                                    <b>67.000 đ</b> x
                                    <b>1</b>

                                </span>
                            </p>
                            <p><small style="display: block;">1 Bắp rang bơ, 1 Pepsi</small></p>
                            <p style="margin-bottom: 0;"><b>Pepsi + Bắp phô mai </b>
                                <span class="pull-right">
                                    <b>72.000 đ</b> x
                                    <b>1</b>

                                </span>
                            </p>
                            <p><small style="display: block;">1 Bắp phô mai, 1 Pepsi</small></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="ticket-info">
                        <h3 class="title">Lưu ý:</h3>
                        <div class="info">
                            <p> - Vé đã mua không thể đổi hay trả lại.</p>
                            <p> - Khi được yêu cầu, vui lòng xuất trình giấy tờ tùy thân để chứng thực độ tuổi khi xem phim.
                            </p>
                            <p> - Bản sao thông tin vé sẽ được lưu vào mục lịch sử giao dịch trong tài khoản nếu quý khách
                                đã đăng nhập khi mua vé. 1 bản sao khác sẽ gửi đến Email của quý khách. Quý khách vui lòng
                                kiểm tra kỹ cả trong mục spam email. </p>
                            <p> - Quý khách vui lòng lưu lại hoặc chụp ảnh lại để xuất trình khi qua cửa soát vé
                                <strong>(KHÔNG CẦN IN VÉ TẠI QUẦY)</strong>.
                            </p>
                            <p> - Nếu có kèm mua bắp nước online quý khách được ưu tiên khi xếp hàng để lên thẳng quầy vé in
                                hóa đơn, sau đó xếp hàng ở quầy bắp nước để nhận.</p>

                        </div>
                    </div>
                </div>
            </div>
            <div id="main-right">
                <div id="main-right-content">
                    <div class="right-content ps ps--active-y">
                        <div id="member">
                            <div class="avatar">
                                <img src="https://lh3.googleusercontent.com/a/ACg8ocJ0DSz_GDjnfix_87kgjKwDdGpjB_yHFo8f1eDDIy60h2xlaZg=s96-c"
                                    alt="Trần Dần Touchcinema">
                            </div>
                            <div class="info">
                                <p class="name">Trần Dần</p>
                                <p class="diem"><span class="current_point">0</span> ĐIỂM</p>
                            </div>
                        </div>
                        <div id="couponbox">
                            <div id="formCoupon">
                                <button type="button" class="btn-use-coupon" data-toggle="modal"
                                    data-target="#couponModal">
                                    <i class="fa fa-gift " aria-hidden="true"></i> Sử dụng Coupon hoặc Voucher
                                </button>

                            </div>
                            <div id="useCoupon">
                                <p id="coupon-msg">Mã đang dùng: <span id="coupon-code"></span></p>
                                <a href="javascript:;" id="removeCoupon">
                                    Xóa
                                </a>
                            </div>
                        </div>
                        <div id="current-select">
                            <div class="select">
                                Tổng cộng:<span class="price" style="font-size: 30px">
                                    <span id="totalPrice">
                                        269,000</span> đ
                                </span>
                                <span id="decrease"></span>
                            </div>
                            <div class="select seats">
                                Vé ghế:<span class="price">
                                    <span id="price_seat">130,000</span> đ
                                </span>
                            </div>
                            <div class="select combo">
                                <span>Combo </span>
                                <span class="price">
                                    <span id="price_combo">139,000</span> đ
                                </span>
                            </div>
                        </div>
                        <div id="current-select">
                            <div class="select payment">
                                <p>Chọn phương thức thanh toán</p>

                                <div class="input-group">
                                    <input type="radio" name="payment_method" value="zalopay" id="zalopay">
                                    <label for="zalopay">
                                        <span></span>
                                        <span class="card zalopay"></span>Thanh toán qua ZaloPay</label>
                                </div>
                                <div class="input-group">
                                    <input type="radio" name="payment_method" value="vnpay" id="vnpay">
                                    <label for="vnpay">
                                        <span></span>
                                        <span class="card vnpay"></span>Thẻ nội địa/ Thẻ quốc tế/ QRcode</label>
                                </div>
                                <div class="input-group">
                                    <input type="radio" name="payment_method" value="momo" id="momo">
                                    <label for="momo">
                                        <span></span>
                                        <span class="card momo"></span>Ví điện tử MoMo</label>
                                </div>
                                <div class="input-group">
                                    <input type="radio" name="payment_method" value="shopeepay" id="shopeepay">
                                    <label for="shopeepay">
                                        <span></span>
                                        <span class="card shopeepay"></span>Ví ShopeePay</label>
                                </div>
                                <div class="input-group">
                                    <input type="radio" name="payment_method" value="payoo" id="payoo">
                                    <label for="payoo">
                                        <span></span>
                                        <span class="card payoo"></span>Thanh toán tại các cửa hàng tiện lợi</label>
                                </div>
                            </div>
                        </div>
                        <div class="term">
                            <p>Bạn cần đọc kỹ các điều khoản thanh toán trực tuyến sau:</p>
                            <div class="term-box" style="height: 100px">
                                <div class="content" id="term-content">
                                    <p style="text-align: justify;"><strong>Chào mừng quý khách đến với Touch Cinema Gia
                                            Lai</strong></p>
                                    <p style="text-align: justify;"><strong>Chúng tôi là Công ty TNHH MTV Quỳnh Nguyên Gia
                                            Lai, địa chỉ trụ sở chính tại 212 Nguyễn Tất Thành, Phường Phù Đổng, Pleiku, Gia
                                            Lai.</strong></p>
                                    <p style="text-align: justify;">Khi quý khách truy cập vào trang web của TouchCinema có
                                        nghĩa là quý khách đồng ý với các điều khoản này. Trang web có quyền thay đổi, chỉnh
                                        sửa, thêm hoặc lược bỏ bất kỳ phần nào trong Quy định và Điều kiện sử dụng, vào bất
                                        cứ lúc nào. Các thay đổi có hiệu lực ngay khi được đăng trên trang web mà không cần
                                        thông báo trước. Và khi quý khách tiếp tục sử dụng trang web, sau khi các thay đổi
                                        về Quy định và Điều kiện được đăng tải, có nghĩa là quý khách chấp nhận với những
                                        thay đổi đó. Quý khách vui lòng kiểm tra thường xuyên để cập nhật những thay đổi của
                                        TouchCinema.</p>
                                    <p style="text-align: justify;">Xin vui lòng đọc kỹ trước khi quyết định Đặt Vé trực
                                        tuyến.</p>
                                    <p style="text-align: justify;"><strong>1. Phạm vi áp dụng</strong></p>
                                    <p style="text-align: justify;">Điều kiện dưới đây áp dụng riêng cho chức năng mua vé
                                        trực tuyến tại Website. Khi sử dụng chức năng để đặt chỗ và mua vé, Quý khách mặc
                                        nhiên đã chấp thuận và tuân thủ tất cả các chỉ dẫn, điều khoản, điều kiện và lưu ý
                                        đăng tải trên Website, bao gồm nhưng không giới hạn bởi Điều kiện Sử dụng nêu ở đây.
                                        Nếu Quý khách không có ý định mua vé trực tuyến hay không đồng ý với bất kỳ điều
                                        khoản hay điều kiện nào nêu trong Điều kiện Sử dụng, xin hãy DỪNG VIỆC SỬ DỤNG chức
                                        năng này.</p>
                                    <p style="text-align: justify;"><strong>2.Điều kiện sử dụng tính năng mua vé trực
                                            tuyến</strong></p>
                                    <p style="text-align: justify;">Quý khách phải đăng ký tài khoản với thông tin xác thực
                                        về bản thân và phải cập nhật nếu có bất kỳ thay đổi nào. Mỗi người truy cập phải có
                                        trách nhiệm với mật khẩu, tài khoản và hoạt động của mình trên web. Hơn nữa, quý
                                        khách phải thông báo cho chúng tôi biết khi tài khoản bị truy cập trái phép. Chúng
                                        tôi không chịu bất kỳ trách nhiệm nào, dù trực tiếp hay gián tiếp, đối với những
                                        thiệt hại hoặc mất mát gây ra do quý khách không tuân thủ quy định.</p>
                                    <p style="text-align: justify;"><strong>3. Quy định về đặt vé trực tuyến</strong></p>
                                    <ul style="text-align: justify;">
                                        <li>Tính năng đặt vé trực tuyến hiện chỉ áp dụng cho thành viên của TouchCinema. Vui
                                            lòng tham khảo thông tin đăng ký thành viên trên website Touchcinema.com.</li>
                                        <li>Thông thường, TouchCinema mở bán vé trực tuyến trước ngày chiếu phim, tuy nhiên
                                            điều này phụ thuộc vào mỗi phim. Nếu suất chiếu bạn muốn đặt chưa được hiển thị
                                            trên website vào thời điểm khách đặt vé, xin vui lòng quay lại sau, hoặc liên hệ
                                            tới số hotline của TouchCinema để biết thêm thông tin chi tiết.</li>
                                        <li>Thời gian đóng chức năng mua vé trực tuyến là 30 phút trước giờ chiếu phim hoặc
                                            khi suất chiếu đã được bán hết vé. Sau thời gian này quý khách có thể đến liên
                                            hệ trực tiếp tại rạp để mua vé.</li>
                                        <li>TouchCinema không cam kết giữ chỗ ngồi cho quý khách cho đến khi quý khách hoàn
                                            tất thanh toán cho đơn hàng của mình.</li>
                                        <li>Khách hàng có thể đặt chỗ cho tối đa 8 khách (không bao gồm vé trẻ em) trong mỗi
                                            lần thực hiện.</li>
                                        <li>Khi tiến hành các bước thanh toán, cần đọc kĩ các thông tin trên màn hình về rạp
                                            chiếu phim, tên phim, suất chiếu, và chỗ ngồi trước khi hoàn tất việc xác nhận
                                            tất cả các thông tin về vé.</li>
                                        <li>Quý khách thanh toán giao dịch đặt vé theo quy định tại Chính Sách Thanh Toán
                                            đăng tải trên TouchCinema trước khi nhận mã đặt vé của giao dịch đó. Khi quý
                                            khách nhấn (click) vào ô “Thanh toán” để tiến hành thanh toán Đặt chỗ có
                                            nghĩa là đã xác nhận rà soát thông tin Đặt chỗ; và đồng ý là Điều Khoản Và
                                            Điều Kiện sẽ được áp dụng cho giao dịch mua vé trong giao dịch đó.</li>
                                        <li>Email và tin nhắn xác nhận đặt vé sau khi hoàn thành việc thanh toán vé trực
                                            tuyến, quý khách sẽ nhận được thư xác nhận thông tin chi tiết vé đã thanh toán
                                            thông qua địa chỉ thư điện tử (email) mà quý khách đã cung cấp. Email xác nhận
                                            thông tin đặt vé có thể đi vào hộp thư rác (spam mail) của bạn, vì vậy hãy kiểm
                                            tra chúng trước khi liên lạc với TouchCinema.</li>
                                        <li>Bằng việc thanh toán qua website này, quý khách chấp nhận vị trí ghế ngồi mà bạn
                                            đã đặt. Quý khách đồng ý rằng, trong những trường hợp có sự thay đổi về chương
                                            trình phim hoặc bất khả kháng, TouchCinema có quyền hoàn trả lại bất kỳ vé nào
                                            từ việc mua bán qua trang web này hoặc thực hiện việc chuyển vé cho bạn qua suất
                                            chiếu khác theo yêu cầu của quý khách.</li>
                                        <li>Trong suốt quá trình đăng ký, quý khách đồng ý nhận email quảng cáo từ website.
                                            Sau đó, nếu không muốn tiếp tục nhận mail, quý khách có thể từ chối bằng cách
                                            nhấp vào đường link ở dưới cùng trong mọi email quảng cáo.</li>
                                    </ul>
                                    <p style="text-align: justify;"><strong>4. Giá Vé</strong></p>
                                    <ul style="text-align: justify;">
                                        <li>Giá vé được niêm yết tại TouchCinema là giá bán cuối cùng đã bao gồm thuế Giá
                                            trị gia tăng (VAT). Giá vé có thể thay đổi tùy thời điểm và chương trình khuyến
                                            mãi kèm theo và sẽ được hiển thị rõ tại trang Thanh toán khi quý khách tiến hành
                                            đặt hàng.</li>
                                        <li>Giá vé khi đặt vé trực tuyến trên website TouchCinema là giá vé người lớn. Các
                                            loại vé như học sinh - sinh viên, vé trẻ em và người cao tuổi vui lòng mua trực
                                            tiếp tại quầy vé tại các rạp TouchCinema.</li>
                                        <li>Căn cứ Thông tư số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn hóa, Thể thao và Du
                                            lịch có hiệu lực thi hành từ ngày 01/01/2017, Tiêu chí phân loại phim theo lứa
                                            tuổi được quy định như sau:
                                            <ul>
                                                <li>P: Phim được phép phổ biến rộng rãi đến mọi đối tượng</li>
                                                <li>C13: Phim cấm phổ biến đến khán giả dưới 13 tuổi</li>
                                                <li>C16: Phim cấm phổ biến đến khán giả dưới 16 tuổi</li>
                                                <li>C18: Phim cấm phổ biến đến khán giả dưới 18 tuổi</li>
                                            </ul>
                                        </li>
                                        <li>Khán giả khi xem phim thuộc các phân loại trên vui lòng mang theo giấy tờ tùy
                                            thân hoặc hình ảnh của giấy tờ tùy thân có ảnh nhận diện và ngày tháng năm sinh
                                            để đảm bảo việc tuân thủ theo quy định.
                                            <ul>
                                                <li>C13: Thẻ học sinh, thẻ bảo hiểm, thẻ thư viện, Hộ chiếu… còn hiệu lực
                                                </li>
                                                <li>C16: CMND, Thẻ học sinh , Hộ chiếu, Thẻ thư viện,… còn hiệu lực</li>
                                                <li>C18: CMND, Thẻ HSSV, Bằng lái xe, Hộ chiếu,… còn hiệu lực</li>
                                            </ul>
                                        </li>
                                        <li>Khách hàng vui lòng chứng thực được độ tuổi phù hợp với phim được phân loại như
                                            trên. TouchCinema có quyền từ chối việc bán vé hoặc vào phòng chiếu nếu khách
                                            hàng không tuân thủ đúng theo quy định.</li>
                                        <li>Suất chiếu sớm / Suất chiếu đặc biệt: theo quy định của hãng phim và nhà phát
                                            hành thì suất chiếu sớm / suất chiếu đặc biệt có phụ thu 10.000 đồng so với giá
                                            vé của suất chiếu đã khởi chiếu chính thức</li>
                                    </ul>
                                    <p style="text-align: justify;"><strong>5. Giá trị giao dịch và hình thức thanh
                                            toán</strong></p>
                                    <ul style="text-align: justify;">
                                        <li>TouchCinema cung cấp các hình thức thanh toán: thẻ Thanh toán Quốc tế hoặc thẻ
                                            Thanh toán Nội địa, thẻ quà Tặng TouchCinema, TouchCinema Voucher.</li>
                                        <li>Trừ một số trường hợp có ghi chú riêng, thông thường quý khách có thể lựa chọn
                                            một trong các hình thức thanh toán trên khi tiến hành đặt vé.</li>
                                        <li>TouchCinema có quyền từ chối chấp nhận cho Khách Hàng thanh toán bằng thẻ tín
                                            dụng trong một số trường hợp theo quyết định của TouchCinema.</li>
                                    </ul>
                                    <p style="text-align: justify;"><strong>Để đảm bảo an toàn thanh toán, Khách Hàng lưu
                                            ý:</strong></p>
                                    <ul style="text-align: justify;">
                                        <li>Chỉ thực hiện thanh toán trực tuyến tại cửa sổ liên kết từ TouchCinema
                                            chuyển đến;</li>
                                        <li>Sử dụng và bảo quản thẻ (thẻ tín dụng, thẻ ATM, thẻ mua hàng…) và thông tin
                                            tài khoản/thông tin thẻ cẩn thận;</li>
                                        <li>Không cho người khác mượn hoặc sử dụng thẻ thành viên để mua vé tại
                                            TouchCinema. Ngay khi phát hiện giao dịch phát sinh bất thường nào tại
                                            TouchCinema, Khách Hàng cần liên hệ ngay với bộ phận Chăm Sóc Khách Hàng
                                            của TouchCinema để được xử lý kịp thời;</li>
                                        <li>Trong mọi trường hợp, với thẻ tín dụng/ghi nợ quốc tế, Khách Hàng vui lòng
                                            không để lộ số CVV/CVC/CSC (là mã số bảo mật, bộ ba kí tự số được in ở mặt sau
                                            của thẻ) để bảo mật thông tin thẻ;</li>
                                        <li>Kiểm tra tài khoản ngân hàng của mình thường xuyên để đảm bảo tất cả giao dịch
                                            qua thẻ đều nằm trong tầm kiểm soát.</li>
                                    </ul>
                                    <p style="text-align: justify;"><strong>6. Điểm thưởng và đổi điểm</strong></p>
                                    <ul style="text-align: justify;">
                                        <li>Quy định về tích lũy và quy đổi điểm thưởng được thực hiện theo chính sách cụ
                                            thể của TouchCinema tại từng thời điểm.&nbsp;</li>
                                        <li>Các thông tin quy định có thể được thay đổi mà không báo trước nên các khách
                                            hàng thành viên cần kiểm tra kỹ thông tin thường xuyên</li>
                                        <li>TouchCinema khuyến khích Khách Hàng đăng ký tài khoản thành viên trên
                                            TouchCinema để tiện theo dõi lịch sử giao dịch, nhận thông tin cập nhật về hàng
                                            hóa, các chương trình khuyến mãi, hưởng các ưu đãi đối với khách hàng thân
                                            thiết…</li>
                                    </ul>
                                    <p style="text-align: justify;"><strong>7. Giao kết giao dịch tại TouchCinema</strong>
                                    </p>
                                    <p style="text-align: justify;">Khách hàng khi mua vé trực tuyến tại website
                                        TouchCinema phải đăng nhập tài khoản thành viên TouchCinema và thực hiện các thao
                                        tác theo trình tự sau:</p>
                                    <ul style="text-align: justify;">
                                        <li>Bước 1: Khách hàng lựa chọn suất chiếu theo phim hoặc suất chiếu theo rạp.</li>
                                        <li>Bước 2: Khách hàng lựa chọn chỗ ngồi.</li>
                                        <li>Bước 3: Thanh toán bằng các hình thức thanh toán online qua thẻ tín dụng (Visa,
                                            Master card..), thẻ ATM, Thẻ quà tặng TouchCinema, TouchCinema Voucher.</li>
                                        <li>Bước 4: Khách hàng nhận mã đặt chỗ qua tin nhắn SMS và email.</li>
                                        <li>Bước 5: Khách hàng cung cấp mã đặt vé và các thông tin tài khoản thành viên
                                            TouchCinema dùng để đặt vé để nhận vé tại rạp. Khách hàng chỉ có thể nhận vé tại
                                            rạp đã đặt vé coi phim. Nếu khách hàng không cung cấp được thông tin tài khoản
                                            TouchCinema và mã đặt vé, TouchCinema có quyền từ chối xuất vé.</li>
                                    </ul>
                                    <p style="text-align: justify;"><strong>8. Thư và tin nhắn xác nhận đặt vé</strong></p>
                                    <ul style="text-align: justify;">
                                        <li>Sau 5 phút kể từ khi thanh toán thành công, bạn sẽ nhận được thư xác nhận thông
                                            tin chi tiết vé đã thanh toán thông qua địa chỉ thư điện tử (email) mà bạn đã
                                            cung cấp. Ngoài ra, chúng tôi cũng sẽ gửi một tin nhắn miễn phí, xác nhận mã số
                                            đặt vé đến số điện thoại của bạn. Lưu ý rằng tin nhắn này chỉ có tính chất dự
                                            phòng và chúng tôi chỉ chấp nhận số điện thoại di động tại Việt Nam.</li>
                                        <li>Chúng tôi không chịu trách nhiệm trong trường hợp các thông tin về địa chỉ
                                            email/ số điện thoại di động bạn nhập không chính xác dẫn đến không nhận được
                                            thư xác nhận của Chúng tôi. Bạn vui lòng kiểm tra kỹ lại các thông tin này trước
                                            khi thực hiện thanh toán.</li>
                                        <li>Nếu bạn cần hỗ trợ hay thắc mắc, khiếu nại về thư xác nhận mã vé thì vui lòng
                                            gửi email đến địa chỉ <a href="mailto:contact@touch"
                                                rel="dofollow">contact@touchcinema.com</a>. Chúng tôi chỉ chấp nhận khi
                                            khiếu nại được gửi từ email, sau 30 phút kể từ khi giao dịch thanh toán thành
                                            công, nếu chúng tôi không nhận được email nào từ phía bạn thì coi như mọi trách
                                            nhiệm của chúng tôi đã hoàn thành. Chúng tôi không chấp nhận giải quyết bất kỳ
                                            khiếu nại, khiếu kiện nào sau khoảng thời gian trên.</li>
                                        <li>Chúng tôi không hỗ trợ xử lý và sẽ không chịu trách nhiệm trong trường hợp đã
                                            gửi thư xác nhận mã vé đến địa chỉ email của bạn nhưng vì một lý do nào đó mà
                                            bạn không thể đến xem phim (noshow).</li>
                                        <li>Email xác nhận thông tin đặt vé có thể đi vào hộp thư rác (spam mail) của bạn,
                                            vì vậy hãy kiểm tra chúng trước khi liên lạc với chúng tôi.</li>
                                    </ul>
                                    <p style="text-align: justify;"><strong>9. Nhận Vé&nbsp;</strong></p>
                                    <p style="text-align: justify;">Vui lòng kiểm tra lại những xác nhận trực tuyến, trong
                                        e-mail và/hoặc trên di động của bạn một cách cẩn thận vì chúng tôi sẽ cung cấp cho
                                        bạn những thông tin quan trọng để nhận vé cho suất chiếu bạn đã chọn. Hãy ghi nhớ mã
                                        đặt vé đến Quầy vé của Chúng tôi. Khi tới Quầy vé, bạn hãy tìm các bảng chỉ dẫn tới
                                        khu vực dành riêng cho vé mua qua mạng để đổi vé cứng. Bên cạnh đó, bạn cần mang
                                        theo giấy tờ tùy thân có ảnh của bạn như CMND, thẻ sinh viên hoặc passport. Bằng
                                        việc thanh toán qua website này, bạn chấp nhận vị trí ghế ngồi mà bạn đã đặt. Bạn
                                        đồng ý rằng, trong những trường hợp có sự thay đổi về chương trình phim hoặc bất khả
                                        kháng, chúng tôi có quyền hoàn trả lại bất kỳ vé nào từ việc mua bán qua trang web
                                        này hoặc thực hiện việc chuyển vé cho bạn qua suất chiếu khác theo yêu cầu của bạn.
                                    </p>
                                    <p style="text-align: justify;"><strong>10. Thay đổi, hủy bỏ giao dịch đặt vé tại
                                            TouchCinema</strong></p>
                                    <ul style="text-align: justify;">
                                        <li>Hiện tại TouchCinema chưa hỗ trợ dịch vụ hủy hoặc thay đổi thông tin vé đã thanh
                                            toán thành công.</li>
                                        <li>Hệ thống Đặt vé Online của TouchCinema có liên kết với rất nhiều đối tác khác,
                                            bao gồm Cổng thanh toán ONEPAY, các ngân hàng nội địa và các Tổ chức tín dụng
                                            quốc tế. Việc thanh toán thành công hay không phụ thuộc rất nhiều vào kết nối
                                            mạng của quý khách , việc truyền dẫn, nhận và trả tín hiệu của các tổ chức đối
                                            tác trên. TouchCinema chỉ thực hiện hoàn tiền trong trường hợp khi giao dịch,
                                            tài khoản của quý khách đã bị trừ tiền nhưng hệ thống của chúng tôi không ghi
                                            nhận việc đặt vé đó, và quý khách không nhận được xác nhận đặt vé thành công.
                                            Khi đó, quý khách vui lòng liên hệ hotline (từ 8:00 đến 22:00 tất cả các ngày
                                            trong tuần) hoặc bạn có thể liên hệ với chúng tôi qua địa chỉ email
                                            contact@touchcinema.com để được hỗ trợ.</li>
                                        <li>Sau khi đã xác nhận các thông tin của khách hàng cung cấp về giao dịch không
                                            thành công, tùy theo từng loại tài khoản khách hàng sử dụng mà việc hoàn tiền sẽ
                                            có thời gian khác nhau:
                                            <ul>
                                                <li>Thẻ ATM (Nội địa): hoàn tiền trong 7 ngày làm việc.</li>
                                                <li>Thẻ VISA/ MasterCard (Nội địa): hoàn tiền từ 30 đến 45 ngày làm việc.
                                                </li>
                                                <li>Thẻ ATM của ngân hàng Vietcombank: hoàn tiền trong vòng 48 giờ làm việc.
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <p style="text-align: justify;">*Lưu ý: Thời gian hoàn tiền không tính các ngày thứ 7,
                                        Chủ nhật và Lễ Tết.</p>
                                    <ul style="text-align: justify;">
                                        <li>Trước khi thanh toán vé trực tuyến, chúng tôi khuyên quý khách nên xác nhận lại
                                            Tên phim, Độ tuổi, Giờ chiếu và Rạp chiếu của bộ phim muốn xem.</li>
                                    </ul>
                                    <p style="text-align: justify;"><strong>11. Thương hiệu và bản quyền</strong></p>
                                    <p style="text-align: justify;">Mọi quyền sở hữu trí tuệ (đã đăng ký hoặc chưa đăng
                                        ký), nội dung thông tin và tất cả các thiết kế, văn bản, đồ họa, phần mềm, hình ảnh,
                                        video, âm nhạc, âm thanh, biên dịch phần mềm, mã nguồn và phần mềm cơ bản đều là tài
                                        sản của TouchCinema. Toàn bộ nội dung của trang web được bảo vệ theo pháp luật sở
                                        hữu trí tuệ của Việt Nam và các công ước, điều ước quốc tế mà Việt Nam tham gia hoặc
                                        là thành viên.</p>
                                    <p style="text-align: justify;"><strong>12. Luật áp dụng và giải quyết tranh
                                            chấp</strong></p>
                                    <p style="text-align: justify;">Các điều kiện, điều khoản và nội dung của trang web này
                                        được điều chỉnh và giải thích theo luật pháp Việt Nam. Các tranh chấp phát sinh từ
                                        hoặc liên quan đến (các) giao dịch thực hiện tại trang web này sẽ được ưu tiên giải
                                        quyết thông qua thương lượng, hòa giải. Trường hợp các bên không tự giải quyết,
                                        tranh chấp sẽ được đưa ra xét xử tại Tòa án cấp có thẩm quyền của Việt Nam.</p>
                                    <p style="text-align: justify;"><strong>13. Quy định về bảo mật</strong></p>
                                    <p style="text-align: justify;">Trang web của chúng tôi coi trọng việc bảo mật thông
                                        tin và sử dụng các biện pháp tốt nhất bảo vệ thông tin và việc thanh toán của quý
                                        khách. Thông tin của quý khách trong quá trình thanh toán sẽ được mã hóa để đảm bảo
                                        an toàn. Sau khi quý khách hoàn thành quá trình đặt hàng, quý khách sẽ thoát khỏi
                                        chế độ an toàn.</p>
                                    <p style="text-align: justify;">Quý khách không được sử dụng bất kỳ chương trình, công
                                        cụ hay hình thức nào khác để can thiệp vào hệ thống hay làm thay đổi cấu trúc dữ
                                        liệu. Trang web cũng nghiêm cấm việc phát tán, truyền bá hay cổ vũ cho bất kỳ hoạt
                                        động nào nhằm can thiệp, phá hoại hay xâm nhập vào dữ liệu của hệ thống. Cá nhân hay
                                        tổ chức vi phạm sẽ bị tước bỏ mọi quyền lợi cũng như sẽ bị truy tố trước pháp luật
                                        nếu cần thiết. Mọi thông tin giao dịch sẽ được bảo mật trừ trường hợp buộc phải cung
                                        cấp theo yêu cầu của tòa án, (các) cơ quan có thẩm quyền hoặc theo quy định của pháp
                                        luật.</p>
                                    <p style="text-align: justify;"><strong>14. Giải quyết hậu quả do lỗi nhập sai thông
                                            tin thương mại tại TouchCinema</strong></p>
                                    <p style="text-align: justify;">Khách hàng có trách nhiệm cung cấp thông tin đầy đủ và
                                        chính xác khi tham gia giao dịch tại TouchCinema. Trong trường hợp khách hàng nhập
                                        sai thông tin tại trang Account, TouchCinema có quyền từ chối thực hiện giao dịch.
                                        Ngoài ra, trong mọi trường hợp, khách hàng đều có quyền đơn phương chấm dứt giao
                                        dịch nếu đã thực hiện bằng cách thông báo cho TouchCinema qua hotline.</p>
                                    <p style="text-align: justify;"><strong>15. Quy định chấm dứt thỏa thuận</strong></p>
                                    <p style="text-align: justify;">Trong trường hợp có bất kỳ thiệt hại nào phát sinh do
                                        việc vi phạm Quy Định sử dụng trang web, chúng tôi có quyền đình chỉ hoặc khóa tài
                                        khoản của quý khách vĩnh viễn. Nếu quý khách không hài lòng với trang web hoặc bất
                                        kỳ điều khoản, điều kiện, quy tắc, chính sách, hướng dẫn, hoặc cách thức vận hành
                                        của TouchCinema thì biện pháp khắc phục duy nhất là ngưng sử dụng dịch vụ của chúng
                                        tôi.</p>
                                    <p style="text-align: justify;">Xin quý khách lưu ý chỉ mua hàng khi chấp nhận và hiểu
                                        rõ những quy định trên. Nếu cần hỗ trợ thêm thông tin, quý khách vui lòng tham khảo
                                        tại TouchCinema.com</p>
                                </div>
                            </div>
                            <div class="term-check">
                                <input type="checkbox" name="agree" value="1" id="agree">
                                <label for="agree">Tôi đã đọc và Đồng ý với Điều khoản thanh toán</label>
                            </div>

                        </div>

                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; height: 640px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 588px;"></div>
                        </div>
                    </div>
                    <a href="javascript:;" class="btn btn-checkout">
                        <span class="loading hidden">
                            <i class="fa fa-circle-o-notch fa-spin fa-fw"></i>
                            <span class="sr-only">Loading...</span>
                        </span>
                        Thanh Toán
                    </a>
                </div>
            </div>
        </div>
    </div>


    {{-- main right --}}
    <div id="main-right">
        <div id="main-right-content">
            <div class="right-content ps ps--active-y">
                <div id="member">
                    <div class="avatar">
                        <img src="https://lh3.googleusercontent.com/a/ACg8ocJ0DSz_GDjnfix_87kgjKwDdGpjB_yHFo8f1eDDIy60h2xlaZg=s96-c"
                            alt="Trần Dần Touchcinema">
                    </div>
                    <div class="info">
                        <p class="name">Trần Dần</p>
                        <p class="diem"><span class="current_point">0</span> ĐIỂM</p>
                    </div>
                </div>
                <div id="couponbox">
                    <div id="formCoupon">
                        <button type="button" class="btn-use-coupon" data-toggle="modal" data-target="#couponModal">
                            <i class="fa fa-gift " aria-hidden="true"></i> Sử dụng Coupon hoặc Voucher
                        </button>

                    </div>
                    <div id="useCoupon">
                        <p id="coupon-msg">Mã đang dùng: <span id="coupon-code"></span></p>
                        <a href="javascript:;" id="removeCoupon">
                            Xóa
                        </a>
                    </div>
                </div>
                <div id="current-select">
                    <div class="select">
                        Tổng cộng:<span class="price" style="font-size: 30px">
                            <span id="totalPrice">
                                269,000</span> đ
                        </span>
                        <span id="decrease"></span>
                    </div>
                    <div class="select seats">
                        Vé ghế:<span class="price">
                            <span id="price_seat">130,000</span> đ
                        </span>
                    </div>
                    <div class="select combo">
                        <span>Combo </span>
                        <span class="price">
                            <span id="price_combo">139,000</span> đ
                        </span>
                    </div>
                </div>
                <div id="current-select">
                    <div class="select payment">
                        <p>Chọn phương thức thanh toán</p>

                        <div class="input-group">
                            <input type="radio" name="payment_method" value="zalopay" id="zalopay">
                            <label for="zalopay">
                                <span></span>
                                <span class="card zalopay"></span>Thanh toán qua ZaloPay</label>
                        </div>
                        <div class="input-group">
                            <input type="radio" name="payment_method" value="vnpay" id="vnpay">
                            <label for="vnpay">
                                <span></span>
                                <span class="card vnpay"></span>Thẻ nội địa/ Thẻ quốc tế/ QRcode</label>
                        </div>
                        <div class="input-group">
                            <input type="radio" name="payment_method" value="momo" id="momo">
                            <label for="momo">
                                <span></span>
                                <span class="card momo"></span>Ví điện tử MoMo</label>
                        </div>
                        <div class="input-group">
                            <input type="radio" name="payment_method" value="shopeepay" id="shopeepay">
                            <label for="shopeepay">
                                <span></span>
                                <span class="card shopeepay"></span>Ví ShopeePay</label>
                        </div>
                        <div class="input-group">
                            <input type="radio" name="payment_method" value="payoo" id="payoo">
                            <label for="payoo">
                                <span></span>
                                <span class="card payoo"></span>Thanh toán tại các cửa hàng tiện lợi</label>
                        </div>
                    </div>
                </div>
                <div class="term">
                    <p>Bạn cần đọc kỹ các điều khoản thanh toán trực tuyến sau:</p>
                    <div class="term-box" style="height: 100px">
                        <div class="content" id="term-content">
                            <p style="text-align: justify;"><strong>Chào mừng quý khách đến với Touch Cinema Gia
                                    Lai</strong></p>
                            <p style="text-align: justify;"><strong>Chúng tôi là Công ty TNHH MTV Quỳnh Nguyên Gia Lai, địa
                                    chỉ trụ sở chính tại 212 Nguyễn Tất Thành, Phường Phù Đổng, Pleiku, Gia Lai.</strong>
                            </p>
                            <p style="text-align: justify;">Khi quý khách truy cập vào trang web của TouchCinema có nghĩa
                                là quý khách đồng ý với các điều khoản này. Trang web có quyền thay đổi, chỉnh sửa, thêm
                                hoặc lược bỏ bất kỳ phần nào trong Quy định và Điều kiện sử dụng, vào bất cứ lúc nào. Các
                                thay đổi có hiệu lực ngay khi được đăng trên trang web mà không cần thông báo trước. Và khi
                                quý khách tiếp tục sử dụng trang web, sau khi các thay đổi về Quy định và Điều kiện được
                                đăng tải, có nghĩa là quý khách chấp nhận với những thay đổi đó. Quý khách vui lòng kiểm tra
                                thường xuyên để cập nhật những thay đổi của TouchCinema.</p>
                            <p style="text-align: justify;">Xin vui lòng đọc kỹ trước khi quyết định Đặt Vé trực tuyến.</p>
                            <p style="text-align: justify;"><strong>1. Phạm vi áp dụng</strong></p>
                            <p style="text-align: justify;">Điều kiện dưới đây áp dụng riêng cho chức năng mua vé trực
                                tuyến tại Website. Khi sử dụng chức năng để đặt chỗ và mua vé, Quý khách mặc nhiên đã chấp
                                thuận và tuân thủ tất cả các chỉ dẫn, điều khoản, điều kiện và lưu ý đăng tải trên Website,
                                bao gồm nhưng không giới hạn bởi Điều kiện Sử dụng nêu ở đây. Nếu Quý khách không có ý định
                                mua vé trực tuyến hay không đồng ý với bất kỳ điều khoản hay điều kiện nào nêu trong Điều
                                kiện Sử dụng, xin hãy DỪNG VIỆC SỬ DỤNG chức năng này.</p>
                            <p style="text-align: justify;"><strong>2.Điều kiện sử dụng tính năng mua vé trực
                                    tuyến</strong></p>
                            <p style="text-align: justify;">Quý khách phải đăng ký tài khoản với thông tin xác thực về bản
                                thân và phải cập nhật nếu có bất kỳ thay đổi nào. Mỗi người truy cập phải có trách nhiệm với
                                mật khẩu, tài khoản và hoạt động của mình trên web. Hơn nữa, quý khách phải thông báo cho
                                chúng tôi biết khi tài khoản bị truy cập trái phép. Chúng tôi không chịu bất kỳ trách nhiệm
                                nào, dù trực tiếp hay gián tiếp, đối với những thiệt hại hoặc mất mát gây ra do quý khách
                                không tuân thủ quy định.</p>
                            <p style="text-align: justify;"><strong>3. Quy định về đặt vé trực tuyến</strong></p>
                            <ul style="text-align: justify;">
                                <li>Tính năng đặt vé trực tuyến hiện chỉ áp dụng cho thành viên của TouchCinema. Vui lòng
                                    tham khảo thông tin đăng ký thành viên trên website Touchcinema.com.</li>
                                <li>Thông thường, TouchCinema mở bán vé trực tuyến trước ngày chiếu phim, tuy nhiên điều này
                                    phụ thuộc vào mỗi phim. Nếu suất chiếu bạn muốn đặt chưa được hiển thị trên website vào
                                    thời điểm khách đặt vé, xin vui lòng quay lại sau, hoặc liên hệ tới số hotline của
                                    TouchCinema để biết thêm thông tin chi tiết.</li>
                                <li>Thời gian đóng chức năng mua vé trực tuyến là 30 phút trước giờ chiếu phim hoặc khi suất
                                    chiếu đã được bán hết vé. Sau thời gian này quý khách có thể đến liên hệ trực tiếp tại
                                    rạp để mua vé.</li>
                                <li>TouchCinema không cam kết giữ chỗ ngồi cho quý khách cho đến khi quý khách hoàn tất
                                    thanh toán cho đơn hàng của mình.</li>
                                <li>Khách hàng có thể đặt chỗ cho tối đa 8 khách (không bao gồm vé trẻ em) trong mỗi lần
                                    thực hiện.</li>
                                <li>Khi tiến hành các bước thanh toán, cần đọc kĩ các thông tin trên màn hình về rạp chiếu
                                    phim, tên phim, suất chiếu, và chỗ ngồi trước khi hoàn tất việc xác nhận tất cả các
                                    thông tin về vé.</li>
                                <li>Quý khách thanh toán giao dịch đặt vé theo quy định tại Chính Sách Thanh Toán đăng tải
                                    trên TouchCinema trước khi nhận mã đặt vé của giao dịch đó. Khi quý khách nhấn (click)
                                    vào ô “Thanh toán” để tiến hành thanh toán Đặt chỗ có nghĩa là đã xác nhận rà soát
                                    thông tin Đặt chỗ; và đồng ý là Điều Khoản Và Điều Kiện sẽ được áp dụng cho giao dịch
                                    mua vé trong giao dịch đó.</li>
                                <li>Email và tin nhắn xác nhận đặt vé sau khi hoàn thành việc thanh toán vé trực tuyến, quý
                                    khách sẽ nhận được thư xác nhận thông tin chi tiết vé đã thanh toán thông qua địa chỉ
                                    thư điện tử (email) mà quý khách đã cung cấp. Email xác nhận thông tin đặt vé có thể đi
                                    vào hộp thư rác (spam mail) của bạn, vì vậy hãy kiểm tra chúng trước khi liên lạc với
                                    TouchCinema.</li>
                                <li>Bằng việc thanh toán qua website này, quý khách chấp nhận vị trí ghế ngồi mà bạn đã đặt.
                                    Quý khách đồng ý rằng, trong những trường hợp có sự thay đổi về chương trình phim hoặc
                                    bất khả kháng, TouchCinema có quyền hoàn trả lại bất kỳ vé nào từ việc mua bán qua trang
                                    web này hoặc thực hiện việc chuyển vé cho bạn qua suất chiếu khác theo yêu cầu của quý
                                    khách.</li>
                                <li>Trong suốt quá trình đăng ký, quý khách đồng ý nhận email quảng cáo từ website. Sau đó,
                                    nếu không muốn tiếp tục nhận mail, quý khách có thể từ chối bằng cách nhấp vào đường
                                    link ở dưới cùng trong mọi email quảng cáo.</li>
                            </ul>
                            <p style="text-align: justify;"><strong>4. Giá Vé</strong></p>
                            <ul style="text-align: justify;">
                                <li>Giá vé được niêm yết tại TouchCinema là giá bán cuối cùng đã bao gồm thuế Giá trị gia
                                    tăng (VAT). Giá vé có thể thay đổi tùy thời điểm và chương trình khuyến mãi kèm theo và
                                    sẽ được hiển thị rõ tại trang Thanh toán khi quý khách tiến hành đặt hàng.</li>
                                <li>Giá vé khi đặt vé trực tuyến trên website TouchCinema là giá vé người lớn. Các loại vé
                                    như học sinh - sinh viên, vé trẻ em và người cao tuổi vui lòng mua trực tiếp tại quầy vé
                                    tại các rạp TouchCinema.</li>
                                <li>Căn cứ Thông tư số 12/2015/TT-BVHTTDL của Bộ trưởng Bộ Văn hóa, Thể thao và Du lịch có
                                    hiệu lực thi hành từ ngày 01/01/2017, Tiêu chí phân loại phim theo lứa tuổi được quy
                                    định như sau:
                                    <ul>
                                        <li>P: Phim được phép phổ biến rộng rãi đến mọi đối tượng</li>
                                        <li>C13: Phim cấm phổ biến đến khán giả dưới 13 tuổi</li>
                                        <li>C16: Phim cấm phổ biến đến khán giả dưới 16 tuổi</li>
                                        <li>C18: Phim cấm phổ biến đến khán giả dưới 18 tuổi</li>
                                    </ul>
                                </li>
                                <li>Khán giả khi xem phim thuộc các phân loại trên vui lòng mang theo giấy tờ tùy thân hoặc
                                    hình ảnh của giấy tờ tùy thân có ảnh nhận diện và ngày tháng năm sinh để đảm bảo việc
                                    tuân thủ theo quy định.
                                    <ul>
                                        <li>C13: Thẻ học sinh, thẻ bảo hiểm, thẻ thư viện, Hộ chiếu… còn hiệu lực</li>
                                        <li>C16: CMND, Thẻ học sinh , Hộ chiếu, Thẻ thư viện,… còn hiệu lực</li>
                                        <li>C18: CMND, Thẻ HSSV, Bằng lái xe, Hộ chiếu,… còn hiệu lực</li>
                                    </ul>
                                </li>
                                <li>Khách hàng vui lòng chứng thực được độ tuổi phù hợp với phim được phân loại như trên.
                                    TouchCinema có quyền từ chối việc bán vé hoặc vào phòng chiếu nếu khách hàng không tuân
                                    thủ đúng theo quy định.</li>
                                <li>Suất chiếu sớm / Suất chiếu đặc biệt: theo quy định của hãng phim và nhà phát hành thì
                                    suất chiếu sớm / suất chiếu đặc biệt có phụ thu 10.000 đồng so với giá vé của suất chiếu
                                    đã khởi chiếu chính thức</li>
                            </ul>
                            <p style="text-align: justify;"><strong>5. Giá trị giao dịch và hình thức thanh toán</strong>
                            </p>
                            <ul style="text-align: justify;">
                                <li>TouchCinema cung cấp các hình thức thanh toán: thẻ Thanh toán Quốc tế hoặc thẻ Thanh
                                    toán Nội địa, thẻ quà Tặng TouchCinema, TouchCinema Voucher.</li>
                                <li>Trừ một số trường hợp có ghi chú riêng, thông thường quý khách có thể lựa chọn một trong
                                    các hình thức thanh toán trên khi tiến hành đặt vé.</li>
                                <li>TouchCinema có quyền từ chối chấp nhận cho Khách Hàng thanh toán bằng thẻ tín dụng
                                    trong một số trường hợp theo quyết định của TouchCinema.</li>
                            </ul>
                            <p style="text-align: justify;"><strong>Để đảm bảo an toàn thanh toán, Khách Hàng lưu
                                    ý:</strong></p>
                            <ul style="text-align: justify;">
                                <li>Chỉ thực hiện thanh toán trực tuyến tại cửa sổ liên kết từ TouchCinema chuyển đến;
                                </li>
                                <li>Sử dụng và bảo quản thẻ (thẻ tín dụng, thẻ ATM, thẻ mua hàng…) và thông tin tài
                                    khoản/thông tin thẻ cẩn thận;</li>
                                <li>Không cho người khác mượn hoặc sử dụng thẻ thành viên để mua vé tại TouchCinema. Ngay
                                    khi phát hiện giao dịch phát sinh bất thường nào tại TouchCinema, Khách Hàng cần
                                    liên hệ ngay với bộ phận Chăm Sóc Khách Hàng của TouchCinema để được xử lý kịp thời;
                                </li>
                                <li>Trong mọi trường hợp, với thẻ tín dụng/ghi nợ quốc tế, Khách Hàng vui lòng không để
                                    lộ số CVV/CVC/CSC (là mã số bảo mật, bộ ba kí tự số được in ở mặt sau của thẻ) để bảo
                                    mật thông tin thẻ;</li>
                                <li>Kiểm tra tài khoản ngân hàng của mình thường xuyên để đảm bảo tất cả giao dịch qua thẻ
                                    đều nằm trong tầm kiểm soát.</li>
                            </ul>
                            <p style="text-align: justify;"><strong>6. Điểm thưởng và đổi điểm</strong></p>
                            <ul style="text-align: justify;">
                                <li>Quy định về tích lũy và quy đổi điểm thưởng được thực hiện theo chính sách cụ thể của
                                    TouchCinema tại từng thời điểm.&nbsp;</li>
                                <li>Các thông tin quy định có thể được thay đổi mà không báo trước nên các khách hàng thành
                                    viên cần kiểm tra kỹ thông tin thường xuyên</li>
                                <li>TouchCinema khuyến khích Khách Hàng đăng ký tài khoản thành viên trên TouchCinema
                                    để tiện theo dõi lịch sử giao dịch, nhận thông tin cập nhật về hàng hóa, các chương
                                    trình khuyến mãi, hưởng các ưu đãi đối với khách hàng thân thiết…</li>
                            </ul>
                            <p style="text-align: justify;"><strong>7. Giao kết giao dịch tại TouchCinema</strong></p>
                            <p style="text-align: justify;">Khách hàng khi mua vé trực tuyến tại website TouchCinema phải
                                đăng nhập tài khoản thành viên TouchCinema và thực hiện các thao tác theo trình tự sau:</p>
                            <ul style="text-align: justify;">
                                <li>Bước 1: Khách hàng lựa chọn suất chiếu theo phim hoặc suất chiếu theo rạp.</li>
                                <li>Bước 2: Khách hàng lựa chọn chỗ ngồi.</li>
                                <li>Bước 3: Thanh toán bằng các hình thức thanh toán online qua thẻ tín dụng (Visa, Master
                                    card..), thẻ ATM, Thẻ quà tặng TouchCinema, TouchCinema Voucher.</li>
                                <li>Bước 4: Khách hàng nhận mã đặt chỗ qua tin nhắn SMS và email.</li>
                                <li>Bước 5: Khách hàng cung cấp mã đặt vé và các thông tin tài khoản thành viên TouchCinema
                                    dùng để đặt vé để nhận vé tại rạp. Khách hàng chỉ có thể nhận vé tại rạp đã đặt vé coi
                                    phim. Nếu khách hàng không cung cấp được thông tin tài khoản TouchCinema và mã đặt vé,
                                    TouchCinema có quyền từ chối xuất vé.</li>
                            </ul>
                            <p style="text-align: justify;"><strong>8. Thư và tin nhắn xác nhận đặt vé</strong></p>
                            <ul style="text-align: justify;">
                                <li>Sau 5 phút kể từ khi thanh toán thành công, bạn sẽ nhận được thư xác nhận thông tin chi
                                    tiết vé đã thanh toán thông qua địa chỉ thư điện tử (email) mà bạn đã cung cấp. Ngoài
                                    ra, chúng tôi cũng sẽ gửi một tin nhắn miễn phí, xác nhận mã số đặt vé đến số điện thoại
                                    của bạn. Lưu ý rằng tin nhắn này chỉ có tính chất dự phòng và chúng tôi chỉ chấp nhận số
                                    điện thoại di động tại Việt Nam.</li>
                                <li>Chúng tôi không chịu trách nhiệm trong trường hợp các thông tin về địa chỉ email/ số
                                    điện thoại di động bạn nhập không chính xác dẫn đến không nhận được thư xác nhận của
                                    Chúng tôi. Bạn vui lòng kiểm tra kỹ lại các thông tin này trước khi thực hiện thanh
                                    toán.</li>
                                <li>Nếu bạn cần hỗ trợ hay thắc mắc, khiếu nại về thư xác nhận mã vé thì vui lòng gửi email
                                    đến địa chỉ <a href="mailto:contact@touch" rel="dofollow">contact@touchcinema.com</a>.
                                    Chúng tôi chỉ chấp nhận khi khiếu nại được gửi từ email, sau 30 phút kể từ khi giao dịch
                                    thanh toán thành công, nếu chúng tôi không nhận được email nào từ phía bạn thì coi như
                                    mọi trách nhiệm của chúng tôi đã hoàn thành. Chúng tôi không chấp nhận giải quyết bất kỳ
                                    khiếu nại, khiếu kiện nào sau khoảng thời gian trên.</li>
                                <li>Chúng tôi không hỗ trợ xử lý và sẽ không chịu trách nhiệm trong trường hợp đã gửi thư
                                    xác nhận mã vé đến địa chỉ email của bạn nhưng vì một lý do nào đó mà bạn không thể đến
                                    xem phim (noshow).</li>
                                <li>Email xác nhận thông tin đặt vé có thể đi vào hộp thư rác (spam mail) của bạn, vì vậy
                                    hãy kiểm tra chúng trước khi liên lạc với chúng tôi.</li>
                            </ul>
                            <p style="text-align: justify;"><strong>9. Nhận Vé&nbsp;</strong></p>
                            <p style="text-align: justify;">Vui lòng kiểm tra lại những xác nhận trực tuyến, trong e-mail
                                và/hoặc trên di động của bạn một cách cẩn thận vì chúng tôi sẽ cung cấp cho bạn những thông
                                tin quan trọng để nhận vé cho suất chiếu bạn đã chọn. Hãy ghi nhớ mã đặt vé đến Quầy vé của
                                Chúng tôi. Khi tới Quầy vé, bạn hãy tìm các bảng chỉ dẫn tới khu vực dành riêng cho vé mua
                                qua mạng để đổi vé cứng. Bên cạnh đó, bạn cần mang theo giấy tờ tùy thân có ảnh của bạn như
                                CMND, thẻ sinh viên hoặc passport. Bằng việc thanh toán qua website này, bạn chấp nhận vị
                                trí ghế ngồi mà bạn đã đặt. Bạn đồng ý rằng, trong những trường hợp có sự thay đổi về chương
                                trình phim hoặc bất khả kháng, chúng tôi có quyền hoàn trả lại bất kỳ vé nào từ việc mua bán
                                qua trang web này hoặc thực hiện việc chuyển vé cho bạn qua suất chiếu khác theo yêu cầu của
                                bạn.</p>
                            <p style="text-align: justify;"><strong>10. Thay đổi, hủy bỏ giao dịch đặt vé tại
                                    TouchCinema</strong></p>
                            <ul style="text-align: justify;">
                                <li>Hiện tại TouchCinema chưa hỗ trợ dịch vụ hủy hoặc thay đổi thông tin vé đã thanh toán
                                    thành công.</li>
                                <li>Hệ thống Đặt vé Online của TouchCinema có liên kết với rất nhiều đối tác khác, bao gồm
                                    Cổng thanh toán ONEPAY, các ngân hàng nội địa và các Tổ chức tín dụng quốc tế. Việc
                                    thanh toán thành công hay không phụ thuộc rất nhiều vào kết nối mạng của quý khách ,
                                    việc truyền dẫn, nhận và trả tín hiệu của các tổ chức đối tác trên. TouchCinema chỉ thực
                                    hiện hoàn tiền trong trường hợp khi giao dịch, tài khoản của quý khách đã bị trừ tiền
                                    nhưng hệ thống của chúng tôi không ghi nhận việc đặt vé đó, và quý khách không nhận được
                                    xác nhận đặt vé thành công. Khi đó, quý khách vui lòng liên hệ hotline (từ 8:00 đến
                                    22:00 tất cả các ngày trong tuần) hoặc bạn có thể liên hệ với chúng tôi qua địa chỉ
                                    email contact@touchcinema.com để được hỗ trợ.</li>
                                <li>Sau khi đã xác nhận các thông tin của khách hàng cung cấp về giao dịch không thành công,
                                    tùy theo từng loại tài khoản khách hàng sử dụng mà việc hoàn tiền sẽ có thời gian khác
                                    nhau:
                                    <ul>
                                        <li>Thẻ ATM (Nội địa): hoàn tiền trong 7 ngày làm việc.</li>
                                        <li>Thẻ VISA/ MasterCard (Nội địa): hoàn tiền từ 30 đến 45 ngày làm việc.</li>
                                        <li>Thẻ ATM của ngân hàng Vietcombank: hoàn tiền trong vòng 48 giờ làm việc.</li>
                                    </ul>
                                </li>
                            </ul>
                            <p style="text-align: justify;">*Lưu ý: Thời gian hoàn tiền không tính các ngày thứ 7, Chủ nhật
                                và Lễ Tết.</p>
                            <ul style="text-align: justify;">
                                <li>Trước khi thanh toán vé trực tuyến, chúng tôi khuyên quý khách nên xác nhận lại Tên
                                    phim, Độ tuổi, Giờ chiếu và Rạp chiếu của bộ phim muốn xem.</li>
                            </ul>
                            <p style="text-align: justify;"><strong>11. Thương hiệu và bản quyền</strong></p>
                            <p style="text-align: justify;">Mọi quyền sở hữu trí tuệ (đã đăng ký hoặc chưa đăng ký), nội
                                dung thông tin và tất cả các thiết kế, văn bản, đồ họa, phần mềm, hình ảnh, video, âm nhạc,
                                âm thanh, biên dịch phần mềm, mã nguồn và phần mềm cơ bản đều là tài sản của TouchCinema.
                                Toàn bộ nội dung của trang web được bảo vệ theo pháp luật sở hữu trí tuệ của Việt Nam và các
                                công ước, điều ước quốc tế mà Việt Nam tham gia hoặc là thành viên.</p>
                            <p style="text-align: justify;"><strong>12. Luật áp dụng và giải quyết tranh chấp</strong></p>
                            <p style="text-align: justify;">Các điều kiện, điều khoản và nội dung của trang web này được
                                điều chỉnh và giải thích theo luật pháp Việt Nam. Các tranh chấp phát sinh từ hoặc liên quan
                                đến (các) giao dịch thực hiện tại trang web này sẽ được ưu tiên giải quyết thông qua thương
                                lượng, hòa giải. Trường hợp các bên không tự giải quyết, tranh chấp sẽ được đưa ra xét xử
                                tại Tòa án cấp có thẩm quyền của Việt Nam.</p>
                            <p style="text-align: justify;"><strong>13. Quy định về bảo mật</strong></p>
                            <p style="text-align: justify;">Trang web của chúng tôi coi trọng việc bảo mật thông tin và sử
                                dụng các biện pháp tốt nhất bảo vệ thông tin và việc thanh toán của quý khách. Thông tin của
                                quý khách trong quá trình thanh toán sẽ được mã hóa để đảm bảo an toàn. Sau khi quý khách
                                hoàn thành quá trình đặt hàng, quý khách sẽ thoát khỏi chế độ an toàn.</p>
                            <p style="text-align: justify;">Quý khách không được sử dụng bất kỳ chương trình, công cụ hay
                                hình thức nào khác để can thiệp vào hệ thống hay làm thay đổi cấu trúc dữ liệu. Trang web
                                cũng nghiêm cấm việc phát tán, truyền bá hay cổ vũ cho bất kỳ hoạt động nào nhằm can thiệp,
                                phá hoại hay xâm nhập vào dữ liệu của hệ thống. Cá nhân hay tổ chức vi phạm sẽ bị tước bỏ
                                mọi quyền lợi cũng như sẽ bị truy tố trước pháp luật nếu cần thiết. Mọi thông tin giao dịch
                                sẽ được bảo mật trừ trường hợp buộc phải cung cấp theo yêu cầu của tòa án, (các) cơ quan có
                                thẩm quyền hoặc theo quy định của pháp luật.</p>
                            <p style="text-align: justify;"><strong>14. Giải quyết hậu quả do lỗi nhập sai thông tin thương
                                    mại tại TouchCinema</strong></p>
                            <p style="text-align: justify;">Khách hàng có trách nhiệm cung cấp thông tin đầy đủ và chính
                                xác khi tham gia giao dịch tại TouchCinema. Trong trường hợp khách hàng nhập sai thông tin
                                tại trang Account, TouchCinema có quyền từ chối thực hiện giao dịch. Ngoài ra, trong mọi
                                trường hợp, khách hàng đều có quyền đơn phương chấm dứt giao dịch nếu đã thực hiện bằng cách
                                thông báo cho TouchCinema qua hotline.</p>
                            <p style="text-align: justify;"><strong>15. Quy định chấm dứt thỏa thuận</strong></p>
                            <p style="text-align: justify;">Trong trường hợp có bất kỳ thiệt hại nào phát sinh do việc vi
                                phạm Quy Định sử dụng trang web, chúng tôi có quyền đình chỉ hoặc khóa tài khoản của quý
                                khách vĩnh viễn. Nếu quý khách không hài lòng với trang web hoặc bất kỳ điều khoản, điều
                                kiện, quy tắc, chính sách, hướng dẫn, hoặc cách thức vận hành của TouchCinema thì biện pháp
                                khắc phục duy nhất là ngưng sử dụng dịch vụ của chúng tôi.</p>
                            <p style="text-align: justify;">Xin quý khách lưu ý chỉ mua hàng khi chấp nhận và hiểu rõ những
                                quy định trên. Nếu cần hỗ trợ thêm thông tin, quý khách vui lòng tham khảo tại
                                TouchCinema.com</p>
                        </div>
                    </div>
                    <div class="term-check">
                        <input type="checkbox" name="agree" value="1" id="agree">
                        <label for="agree">Tôi đã đọc và Đồng ý với Điều khoản thanh toán</label>
                    </div>

                </div>

                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; height: 292px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 122px;"></div>
                </div>
            </div>
            <a href="javascript:;" class="btn btn-checkout">
                <span class="loading hidden">
                    <i class="fa fa-circle-o-notch fa-spin fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                </span>
                Thanh Toán
            </a>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('client/js/checkout.js') }}"></script>
@endsection
