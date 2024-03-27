@extends('user.layout.masters')
@section('content')
    <x-error></x-error>
    <!-- ======= Hero Section ======= -->
    <div id="biodata" style="width:100%;
        height:100vh;
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgb(167, 218, 203) 0%, rgba(167, 218, 203) 35%, rgba(167, 218, 203) 100%);" >
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top:10%">
                <div class="card shadow">
                    <div class="row m-4 justify-content-center">
                        <div style="border:1px solid black; border-radius:50%; margin-left:2%; width:5%;
                            @if($personal_details>0) {{ "background-color:green;" }} @endif "></div>
                        <div style="width:7%"><hr></div>
                        <div style="border:1px solid black; border-radius:50%; margin-left:2%; width:5%;
                            @if($professional_details>0) {{ "background-color:green;" }} @endif "></div>
                        <div style="width:7%"><hr></div>
                        <div style="border:1px solid black; border-radius:50%; margin-left:2%; width:5%;
                            @if($family_details>0) {{ "background-color:green;" }} @endif "></div>
                        <div style="width:7%"><hr></div>
                        <div style="border:1px solid black; border-radius:50%; margin-left:2%; width:5%;
                            @if($education_details>0) {{ "background-color:green;" }} @endif "></div>
                        <div style="width:7%"><hr></div>
                        <div style="border:1px solid black; border-radius:50%; margin-left:2%; width:5%;
                            @if($address_details>0) {{ "background-color:green;" }} @endif "></div>
                        <div style="width:7%"><hr></div>
                        <div style="border:1px solid black; border-radius:50%; margin-left:2%; width:5%;
                            @if($land_details>0) {{ "background-color:green;" }} @endif "></div>
                        <div style="width:7%"><hr></div>
                        <div style="border:1px solid black; border-radius:50%; margin-left:2%; width:5%;
                            @if($maternal_details>0) {{ "background-color:green;" }} @endif "></div>
                    </div>
                    @if($personal_details==0)
                        <div class="card-header"><h5 class="text-center">Personal Details</h5></div>
                        <div class="card-body">
                            <form action="{{ url('storePersonalDetails') }}" method="POST">
                                @csrf
                                <x-input label="Name *" type="text" name="full_name" ></x-input>
                                <x-input label="Date of Birth *" type="date" name="dob" ></x-input>
                                <x-input label="Contact Number *" type="tel" name="contact_number" ></x-input>
                                <div class="mt-3">
                                    <div class="row">
                                        <div class="col-md-4"><label for="" class="form-label">Gender *</label></div>
                                        <div class="col-md-4">
                                            <input type="radio" name="gender" value="male">Male
                                        </div>
                                        <div class="col-md-4"><input type="radio" name="gender" value="male">Female</div>
                                    </div>
                                </div>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="ip_address" value="{{ request()->ip() }}">
                                <input type="hidden" name="created_at" value="{{ now() }}">
                                <x-submit></x-submit>
                            </form>
                        </div>
                    @elseif($professional_details==0)
                        <div class="card-header"><h5 class="text-center">Professional Details</h5></div>
                        <div class="card-body">
                            <form action="{{ url('storeProfessionalDetails') }}" method="POST">
                                @csrf
                                <x-input label="Current Job Title *" type="text" name="current_job" ></x-input>
                                <x-input label="Organization" type="text" name="organization" ></x-input>
                                <x-input label="Annual Income" type="tel" name="annual_income" ></x-input>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="ip_address" value="{{ request()->ip() }}">
                                <input type="hidden" name="created_at" value="{{ now() }}">
                                <x-submit></x-submit>
                            </form>
                        </div>
                    @elseif($family_details==0)
                        <div class="card-header"><h5 class="text-center">Family Details</h5></div>
                        <div class="card-body">
                            <form action="{{ url('storeFamilyDetails') }}" method="POST">
                                @csrf
                                <x-input label="Father Name *" type="text" name="father_name" ></x-input>
                                <x-input label="Mother Name *" type="text" name="mother_name" ></x-input>
                                <x-input label="Grand Father Name" type="text" name="grand_father_name" ></x-input>
                                <x-input label="Grand Mother Name" type="text" name="grand_mother_name" ></x-input>
                                <x-input label="Uncle Name" type="text" name="uncle_name" ></x-input>
                                <x-input label="Aunty Name" type="text" name="aunty_name" ></x-input>
                                <x-input label="Brother Name" type="text" name="brother_name" ></x-input>
                                <x-input label="Sister Name" type="text" name="sister_name" ></x-input>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="ip_address" value="{{ request()->ip() }}">
                                <input type="hidden" name="created_at" value="{{ now() }}">
                                <x-submit></x-submit>
                            </form>
                        </div>
                    @elseif($education_details==0)
                        <div class="card-header"><h5 class="text-center">Education Details</h5></div>
                        <div class="card-body">
                            <form action="{{ url('storeEducationDetails') }}" method="POST">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-md-4">Education * </div>
                                    <div class="col-md-8"><textarea name="education" class="form-control"  rows="5"></textarea></div>
                                </div>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="ip_address" value="{{ request()->ip() }}">
                                <input type="hidden" name="created_at" value="{{ now() }}">
                                <x-submit></x-submit>
                            </form>
                        </div>
                    @elseif($address_details==0)
                        <div class="card-header"><h5 class="text-center">Address Details</h5></div>
                        <div class="card-body">
                            <form action="{{ url('storeAddressDetails') }}" method="POST">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-md-4">Permanent Address * </div>
                                    <div class="col-md-8"><textarea name="permanent_address" class="form-control"  rows="5"></textarea></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">Correspondance Address</div>
                                    <div class="col-md-8"><textarea name="correspondance_address" class="form-control" rows="5"></textarea></div>
                                </div>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="ip_address" value="{{ request()->ip() }}">
                                <input type="hidden" name="created_at" value="{{ now() }}">
                                <x-submit></x-submit>
                            </form>
                        </div>
                    @elseif($land_details==0)
                        <div class="card-header"><h5 class="text-center">Land Details</h5></div>
                        <div class="card-body">
                            <form action="{{ url('storeLandDetails') }}" method="POST">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-md-4">Land * </div>
                                    <div class="col-md-8"><textarea name="land" class="form-control"  rows="5"></textarea></div>
                                </div>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="ip_address" value="{{ request()->ip() }}">
                                <input type="hidden" name="created_at" value="{{ now() }}">
                                <x-submit></x-submit>
                            </form>
                        </div>
                    @elseif($maternal_details==0)
                        <div class="card-header"><h5 class="text-center">Maternal Details</h5></div>
                        <div class="card-body">
                            <form action="{{ url('storeMaternalDetails') }}" method="POST">
                                @csrf
                                <x-input label="Mama Name" type="text" name="mama_name"></x-input>
                                <x-input label="Mami Name" type="text" name="mami_name"></x-input>
                                <div class="row mt-3">
                                    <div class="col-md-4">Address * </div>
                                    <div class="col-md-8"><textarea name="maternal_address" class="form-control"  rows="5"></textarea></div>
                                </div>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="ip_address" value="{{ request()->ip() }}">
                                <input type="hidden" name="created_at" value="{{ now() }}">
                                <x-submit></x-submit>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div><!-- End Hero -->
   
@endsection