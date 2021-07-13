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
                        <label for="txtPartnerName">Partner name</label>
                        <input class="form-control mb-2" type="text" id="txtPartnerName" name="txtPartnerName" placeholder="Partner name">

                        <label for="txtPartnerLogo">Partner logo</label>
                        <input type="file" class="form-control" id="txtPartnerLogo" accept=".png,.jpg,.jpeg" name="txtPartnerLogo">
                        <div class="col-xl-12 p-0">
                            <input type="button" id="btnSave" class="btn btn-primary mt-2" value="Save">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xl-8">
                <table id="partnerTable" class="table table-bordered table-striped" width="100%">
                    <thead>
                    <tr>
                        <th width="60%">Name</th>
                        <th width="40%">Action</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @endsection

@section('script')
    <script src="{{asset('backend/js/partner/partner.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#partnerTable').DataTable( {
                ajax: {
                    url: '{{route('partner.ajaxtable')}}',
                    dataSrc: 'data'
                },
                columns: [
                    {name: 'name', data: 'name'},
                    {name: 'action', data: 'action'}
                ],
            } );
        });
    </script>
    @endsection