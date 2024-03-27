@extends('user.layout.masters')
@section('content')
    <x-error></x-error>
    <!-- ======= Hero Section ======= -->
    <div id="biodata" style="width:100%;
        height:169vh;
        background: rgb(2,0,36);
        background: linear-gradient(90deg, rgb(167, 218, 203) 0%, rgba(167, 218, 203) 35%, rgba(167, 218, 203) 100%);" >
        <div class="container">
            <div class="card">
                <div class="card-header" style="backgound-color:rgb(104, 185, 104);">
                    <h4>Preview</h4>
                </div>
                <div class="card-body">
                    <h4>Personal Details</h4>
                    <hr>
                    @foreach ($personal_details as $row)
                        <div class="row">
                            <div class="col-md-4">Name</div>
                            <div class="col-md-8">{{ $row->full_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">DOB</div>
                            <div class="col-md-8">{{ $row->dob }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Gender</div>
                            <div class="col-md-8">{{ $row->gender }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Contact Number</div>
                            <div class="col-md-8">{{ $row->contact_number }}</div>
                        </div>
                    @endforeach

                    <h4 class="mt-5">Professional Details</h4>
                    <hr>
                    @foreach ($professional_details as $row)
                        <div class="row">
                            <div class="col-md-4">Current Job</div>
                            <div class="col-md-8">{{ $row->current_job }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Organization</div>
                            <div class="col-md-8">{{ $row->organization }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Annual Income</div>
                            <div class="col-md-8">{{ $row->annual_income }}</div>
                        </div>
                    @endforeach

                    <h4 class="mt-5">Family Details</h4>
                    <hr>
                    @foreach ($family_details as $row)
                        <div class="row">
                            <div class="col-md-4">Father Name</div>
                            <div class="col-md-8">{{ $row->father_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Mother Name</div>
                            <div class="col-md-8">{{ $row->mother_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Grand Father Name</div>
                            <div class="col-md-8">{{ $row->grand_father_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Grand Mother Name</div>
                            <div class="col-md-8">{{ $row->grand_mother_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Uncle Name</div>
                            <div class="col-md-8">{{ $row->uncle_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Aunty Name</div>
                            <div class="col-md-8">{{ $row->aunty_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Brother Name</div>
                            <div class="col-md-8">{{ $row->brother_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Sister Name</div>
                            <div class="col-md-8">{{ $row->sister_name }}</div>
                        </div>
                    @endforeach

                    <h4 class="mt-5">Address Details</h4>
                    <hr>
                    @foreach ($address_details as $row)
                        <div class="row">
                            <div class="col-md-4">Permanent Address</div>
                            <div class="col-md-8">{{ $row->permanent_address }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Correspondance Address</div>
                            <div class="col-md-8">{{ $row->correspondance_address }}</div>
                        </div>
                    @endforeach

                    <h4 class="mt-5">Education Details</h4>
                    <hr>
                    @foreach ($education_details as $row)
                        <div class="row">
                            <div class="col-md-4">Education</div>
                            <div class="col-md-8">{{ $row->education }}</div>
                        </div>
                    @endforeach

                    <h4 class="mt-5">Land Details</h4>
                    <hr>
                    @foreach ($land_details as $row)
                        <div class="row">
                            <div class="col-md-4">Land</div>
                            <div class="col-md-8">{{ $row->land }}</div>
                        </div>
                    @endforeach

                    <h4 class="mt-5">Maternal Details</h4>
                    <hr>
                    @foreach ($maternal_details as $row)
                        <div class="row">
                            <div class="col-md-4">Mama Name</div>
                            <div class="col-md-8">{{ $row->mama_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Mami Name</div>
                            <div class="col-md-8">{{ $row->mami_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">Maternal Address</div>
                            <div class="col-md-8">{{ $row->maternal_address }}</div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div><!-- End Hero -->
   
@endsection