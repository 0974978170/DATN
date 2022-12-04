<!DOCTYPE html>
<html lang="en">
<head>
    @include('head')
</head>
<body>

<!-- Header -->

@include('header')

@include('cart')


<div class="container p-t-80">
    <div class="bread-crumb p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="/" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>
        </a>

        <span class="stext-109 cl4">
				{{ $title }}
        </span>
        @if(Session::has('contact'))
            <div class="alert alert-success">
                {{ Session::get('contact') }}
            </div>
        @endif
        <div class="col-sm-12 col-xs-12 iContent mt-5 mb-5">
            <form method="POST" action="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <div class="page_checkout__form">
                                <div class="heading_layout_other">
                                    <h2 class="mb-3 mt-3">COZA STORE</h2>
                                </div>
                                <div class="form_checkout">
                                    <label class="label">
                                        Thông tin liên hệ
                                    </label>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="Name" value="" required="required" placeholder="Họ tên đầy đủ *">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="Phone" value="" required="required" placeholder="Số điện thoại liên hệ *">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="Email" value="" placeholder="Địa chỉ email">
                                            </div>
                                        </div>
                                    </div>
                                    <label class="label">
                                        Ghi chú
                                    </label>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="Content" rows="2" placeholder="Nội dung gửi"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-outline-primary" name="_net_action[AddPOST]">
                                                    GỬI ĐI
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="box_order_cart">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.376014562384!2d105.77880701488318!3d21.01763558600438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454ab30540137%3A0x35ac90387f094f93!2zU8O0bmcgxJDDoCBUb3dlcg!5e0!3m2!1sen!2s!4v1572231466594!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border: 0;" allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>

@include('footer')

</body>
</html>
