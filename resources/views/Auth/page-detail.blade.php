@extends('master')
@section('body')
    <div class="container page-detail">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-detail-header">
                    <h1>{{$activityData->title ?? ''}}</h1>
                </div>
                <div class="page-detail-detail">{!! $activityData->detail ?? '' !!}</div>
            </div>
        </div>
    </div>
@endsection