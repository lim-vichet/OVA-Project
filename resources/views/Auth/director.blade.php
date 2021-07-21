@extends('master')
@section('body')
    <div class="container director">
        <div class="row">
            <div class="col-xl-12">
                <div class="director-detail">
                    <div class="letter-box">
                        {!! $directorData->detail ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection