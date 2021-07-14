@extends('backend.master.masterpage')

@section('title', 'Partner')

@section('style')
@endsection

@section('content')
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-4">
                <form action="#" id="frmPartner" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <label for="txtPartnerName">Khmer name</label>
                        <input class="form-control mb-2" type="text" id="txtKhmerName" name="txtKhmerName" placeholder="Khmer name">
                        <label for="txtPartnerName">English name</label>
                        <input class="form-control mb-2" type="text" id="txtEnglishName" name="txtEnglishName" placeholder="English name">

                        <label for="txtOVALogo">OVA logo</label>
                        <input type="file" class="form-control" id="txtOVALogo" accept=".png,.jpg,.jpeg" name="txtOVALogo">
                        <div class="col-xl-12 p-0">
                            <input type="button" id="btnSave" class="btn btn-primary mt-2" value="Save">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-8">
                <table id="LogoTable" class="table table-bordered table-striped" width="100%">
                    <thead>
                    <tr>
                        <th >Khmer Name</th>
                        <th >English Name</th>
                        <th >Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
