@extends('master')
@section('body')
    <div class="container box-body">
        <div class="row">
            <div class="col-xl-12">
                <div class="box-activity">
                    <h1>សកម្មភាពថ្មីៗ</h1>
                </div>

                <div class="row box-body-item">
                    @if(!empty($activityDatas))
                        @foreach($activityDatas as $activity)
                            <div class=" box-item col-xl-3" >
                                <a href="{{route('page-detail', [$activity->id])}}" style="text-decoration: none;">
                                    <div class="image-box">
                                        <img src="{{asset('storage/backend/activity/'.$activity->thumbnail)}}" alt="{{$activity->thumbnail}}">
                                    </div>
                                    <div class="title-box">
                                        <h1>{{substr($activity->title, 0, 20)}}...</h1>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
{{--        partner-sponsor--}}
        <div class=" row">
            <div class="col-xl-12">
                <div class="partner-sponsor">
                    <div class="partner-box">
                        <h1>ដៃគូនិងម្ចាស់ជំនួយ</h1>
                    </div>
                    <div class="slider">
                        <div class="slide-track">
                            @if(!empty($partnerDatas))
                                @foreach($partnerDatas as $partner)
                                    <div class="slides">
                                        <img src="{{asset('storage/backend/partner/'.$partner->logo)}}" alt="">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection