@extends('master')
@section('body')
    <div class="container contact">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6 col-6 ​  location-box">
                   <a href="https://goo.gl/maps/1nDVQ7UcRQ66Uc3n8" target="_blank">
                       <div class="location-image">
                           <img src="{{asset('img/location.JPG')}}" alt="">
                       </div>
                   </a>
               </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6  contact-box">
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
                                <p>ផ្ទះលេខ​៨០ ផ្លូវលេខ ៣១៥ ភូមិ៧ សង្កាត់បឹងកក់ទី២ ខណ្ឌទួលគោក រាជធានីភ្នំពេញ</p>
                            </div>
                        </div>
                        <br>
                        <div class="contact-item" style="margin-top: 10px;">
                            <div class="icon-box">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="address-box">
                                <p style="font-weight: bold">លេខទូរស័ព្ទ</p>
                                <p>(+855) 93 999 111</p>
                                <p>(+855) 23 999 033</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="icon-box">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="address-box">
                                <p style="font-weight: bold">លេខទូរស័ព្ទ</p>
                                <p>(+855) 93 999 111</p>
                                <p>(+855) 23 999 033</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection