@extends('admin.main')

@section('content')
    <form action="/admin/statistics/view" method="POST">
        <div class="card-body">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ number_format($total_revenue, 0, '', '.')}} VNĐ</h3>

                        <p>Tổng Doanh Thu</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer disabled">
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="form-group">
                <label>Start Date</label>
                <div class="input-group date w-25" id="reservationdate" data-target-input="nearest">
                    <input type="text" value="{{ old('startDate') }}" name="startDate" class="form-control datetimepicker-input" data-target="#reservationdate">
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>End Date</label>
                <div class="input-group date w-25" id="reservationdate1" data-target-input="nearest">
                    <input type="text" value="{{ old('endDate') }}" name="endDate" class="form-control datetimepicker-input" data-target="#reservationdate1">
                    <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

            <div class="mt-4 pt-2">
                @if($times->endDate == null)
                    <h3>Doanh Thu Ngày {{ $times->startDate }}: <strong class="text-danger">{{ number_format($count, 0, '', '.')}} VNĐ</strong></h3>
                @endif
                @if($times->endDate != null)
                        <h3>Doanh Thu Ngày {{ $times->startDate }} đến {{ $times->endDate }} : <strong class="text-danger">{{ number_format($count, 0, '', '.')}} VNĐ</strong></h3>
                    @endif
            </div>

            <div class="mt-4 pt-2">
                <button type="submit" class="btn btn-primary">Thống Kê</button>
            </div>

        </div>
        @csrf
    </form>
@endsection

