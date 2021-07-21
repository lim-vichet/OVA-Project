@extends('master')
@section('body')
    <div class="container mission">
        <div class="row">
            <div class="col-xl-12">
                {!! $missionData->detail ?? '' !!}
            </div>
        </div>
    </div>
@endsection