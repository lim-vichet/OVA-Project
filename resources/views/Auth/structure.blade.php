@extends('master')
@section('body')
    <div class="container structure">
        <div class="row">
            <div class="col-xl-12">
                {!! $structureData->detail ?? '' !!}
            </div>
        </div>
    </div>
@endsection