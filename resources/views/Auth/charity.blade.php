@extends('master')
@section('body')
    <div class="container charity">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                {!! $charityData->detail ?? '' !!}
            </div>
        </div>
    </div>
@endsection