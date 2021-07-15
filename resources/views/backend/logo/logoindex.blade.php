@extends('backend.master.masterpage')

@section('title', 'Partner')

@section('style')
@endsection

@section('content')
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-4 offset-4" style="background-color: yellowgreen; padding: 30px; border-radius: 5px;">
                <form action="{{route('logo_insert')}}" id="frmLogo" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <label for="txtKhmerName">Khmer Name</label>
                        <input class="form-control mb-2" type="text" id="khmer_name" name="khmer_name" placeholder="Khmer name">
                        <label for="txtEnglishName">English name</label>
                        <input class="form-control mb-2" type="text" id="english_name" name="english_name" placeholder="English name">
                        <label for="txtOVALogo">Photo</label>
                        <input type="file" class="form-control" id="img" accept=".png,.jpg,.jpeg" name="img">
                        <br>
                        <div class="col-xl-12 p-0">
                            <input type="submit" id="btnSave" class="btn btn-primary mt-2" value="Save">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
