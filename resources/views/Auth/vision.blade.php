@extends('master')
@section('body')
    <div class="container vision">
        <div class="row">
            <div class="col-xl-12">
                {!! $visionData->detail ?? '' !!}
            </div>
        </div>
    </div>
@endsection