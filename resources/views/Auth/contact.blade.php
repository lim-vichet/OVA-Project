@extends('master')
@section('body')
    <div class="container contact">
        <div class="row">
            <div class="col-xl-12">
               <div class="location-box">
                   <a href="https://goo.gl/maps/1nDVQ7UcRQ66Uc3n8" target="_blank">
                       <div class="location-image">
                           @if(!empty($contactData))
                                <img src="{{asset('storage/upload/'.$contactData ? $contactData->img : '')}}" alt="">
                           @endif
                       </div>
                   </a>
               </div>
                <div class="contact-box">
                    <div class="contact-item-box">
                        <div class="contact-item">
                            <h1>ទាក់ទងមកកាន់យើងខ្ញុំ</h1>
                            <p>មានចម្ងល់នានា? ពួកយើងនៅទីនេះដើម្បីជួយលោកអ្នក!</p>
                        </div>
                        <div class="contact-item">
                            <div class="icon-box">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="address-box">
                                <p style="font-weight: bold">ទីស្នាក់ការកណ្តាល</p>
                                <p>{{$contactData->address ?? ''}}</p>
                            </div>
                        </div>
                        <div class="contact-item" style="margin-top: 10px;">
                            <div class="icon-box">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="address-box">
                                <p style="font-weight: bold">លេខទូរស័ព្ទ</p>
                                <p>{{$contactData->phone ?? ''}}</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="icon-box">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="address-box">
                                <p style="font-weight: bold">អ៊ីម៉ែល</p>
                                <p>{{$contactData->email ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection