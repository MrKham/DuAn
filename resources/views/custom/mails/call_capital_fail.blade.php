<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Gội vốn thành công</title>
</head>
<body>
<h5>Thông báo Dự án gọi vốn thất bại | Update about unsuccessful crowdfunding campaign</h5>
<div class="row">
    <div class="col-4">
        <div style="width: 145px; height: 40px; background-color: #007bff">
            <img src="{{asset('/uploads/logo/logo.png')}}" style="margin: 5px; height: 30px;">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <p>Thân gửi Người Ủng hộ,<br/>
            <i>Dear our valued backers,</i></p>

    </div>
</div>
<div class="row">
    <div class="col-12">
        <p>Cám ơn bạn đã đồng hàng và hỗ trợ cho các dự án sáng sạo. FundStart xin thông báo đã hết thời gian gọi vốn cộng đồng, tuy nhiên dự án <a style="font-weight: bold; color: red" href="{{ url('du-an/'.$user->project_url) }}">{{$user->project_name}}</a> không đạt số vốn mục tiêu đề ra. Bạn sẽ được hoàn lại số tiền đã ủng hộ. Chi tiết vui lòng đọc <a href="#"> Chính sách hoàn tiền</a> của FundStart.  <br/>
            <i>Thank you for your contribution to our creative projects. FundStart regrets to inform you that  <a style="font-weight: bold; color: red" href="{{ url('du-an/'.$user->project_url) }}">{{$user->project_name}}</a>  has been crowdfunded unsuccessfully and couldn't reach their capital goal before the expiration date. FundStart will process refund shortly following our <a href="#">Refund Policy</a>.</i></p>
    </div>

</div>
<div class="row">
    <div class="col-12">
        <p>Trân trọng,<br/>
            <i>Your Sincerely,</i></p>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <u><b>Lưu ý:</b></u><br/>
        <u><b>Notice:</b></u>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <p>
            • Để theo dõi thông tin mới nhất về dự án, vui lòng truy cập trang kêu gọi vốn của dự án trên
            <a href="www.fundstart.vn"> www.fundstart.vn</a><br/>
            <i>For latest updates about projects, please take a visit to project's page on: <a href="www.fundstart.vn"> www.fundstart.vn</a></i>
        </p>
        <p>
            • Nếu hết thời hạn gọi vốn cộng đồng, dự án không đạt số vốn mục tiêu đề ra, Người Ủng Hộ sẽ được
            hoàn lại
            số tiền đã ủng hộ. Chi tiết vui lòng đọc Chính sách hoàn tiền của FundStart [Kèm hyperlink trang
            tiếng
            Việt].<br/>
            <i>If a project is crowdfunded unsuccessfully, Backers will be re-funded. Please visit our Refund
                Policy
                page for more information.</i></p>
        <p>
            • Mọi thắc mắc về dự án, vui lòng liên hệ với chủ dự án trên trang kêu gọi vốn của dự án.<br/>
            <i>You can contact project owners directly on project's page.</i></p>
        <p>• Mọi thắc mắc về FundStart, vui lòng đọc FAQs hoặc liên hệ với chúng tôi: info@fundstart.vn<br/>
            <i>If you have any questions, please don't hesitate to visit FAQs' page or email us via:
                info@fundstart.vn</i></p>
        <p>• Đây là e-mail hệ thống gửi tự động, vui lòng không trả lời e-mail này.<br/>
            <i>This is an automatic email, please do not reply this email.</i></p>
    </div>
</div>
<div class="row">
    <div class="col-12">
        Website: <a href="www.fundstart.vn"> www.fundstart.vn</a>&emsp;|&emsp;Email: info@fundstart.vn&emsp;|&emsp;Facebook:
        Fundstart - Khởi nghiệp từ vốn cộng đồng
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>