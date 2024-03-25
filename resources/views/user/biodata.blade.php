@extends('user.layout.masters')
@section('content')
    <!-- ======= Hero Section ======= -->
    <div id="biodata" style="width:100%;
        height:100vh;
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgb(167, 218, 203) 0%, rgba(167, 218, 203) 35%, rgba(167, 218, 203) 100%);" >
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top:10%">
                <div class="card shadow">
                    <div class="row m-4">
                        <div style="border:1px solid black; border-radius:50%; margin-left:2%; width:5%;"></div>
                        <div style="width:20%"><hr></div>
                        <div style="border:1px solid black; border-radius:50%; margin-left:2%; width:5%;"></div>
                        <div style="width:20%"><hr></div>
                        <div style="border:1px solid black; border-radius:50%; margin-left:2%; width:5%;"></div>
                        <div style="width:20%"><hr></div>
                        <div style="border:1px solid black; border-radius:50%; margin-left:2%; width:5%;"></div>
                    </div>
                    <div class="card-header"><h5 class="text-center">Personal Details</h5></div>
                    <div class="card-body">
                        <form action="{{ url('storePersonalDetails') }}" method="POST">
                            @csrf
                            <x-input label="Name" type="text" name="full_name" ></x-input>
                            <x-input label="Date of Birth" type="date" name="dob" ></x-input>
                            <x-input label="Contact Number" type="tel" name="contactNumber" ></x-input>
                            <div class="mt-3">
                                <div class="row">
                                    <div class="col-md-4"><label for="" class="form-label">Gender</label></div>
                                    <div class="col-md-4">
                                        <input type="radio" name="gender" value="male">Male
                                    </div>
                                    <div class="col-md-4"><input type="radio" name="gender" value="male">Female</div>
                                </div>
                            </div>
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="ip_address" value="{{ request()->ip() }}">
                            <x-submit></x-submit>
                        </form>
                    </div>

                    {{-- <div class="card-header bg-warning"><h4 class="">Profession Details</h4></div>
                    <div class="card-body bg-secondary">
                        <form action="{{ url('storePersonalDetails') }}" method="POST">
                            @csrf
                            <x-input label="Current Job Title" type="text" name="name" ></x-input>
                            <x-input label="Organization" type="" name="dob" ></x-input>
                            <x-input label="Annual Income" type="tel" name="contactNumber" ></x-input>
                            <x-input label="Educational Qualifications" type="text" name="education" ></x-input>
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="ip_address" value="{{ request()->ip() }}">
                            <x-submit></x-submit>
                        </form>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div><!-- End Hero -->
   
@endsection