@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">


        <div class="row profile-body">
            <!-- left wrapper start -->
           
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">

                    <div class="card-body">

                        <h6 class="card-title">Edit Ameneties</h6>
                        <br>

                        <form id="myForm" class="forms-sample" method="POST" action="{{route('update.ameneties')}}" enctype="multipart/form-data">
                            @csrf
                           <input type="hidden" name="id" value="{{$amenties->id}}">

                            <div class="form-group mb-3">
                                <label for="ameneties_name" class="form-label">Amenties Name</label>
                                <input type="text" name="ameneties_name" value="{{$amenties->ameneties_name}}"  class="form-control" id="ameneties_name" autocomplete="off"
                                   >

                                   
                            </div>



                           
                           
                          
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                           
                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- middle wrapper end -->
    <!-- right wrapper start -->

    <!-- right wrapper end -->
    </div>

    </div>


    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    ameneties_name: {
                        required : true,
                    }, 
                    
                },
                messages :{
                    ameneties_name: {
                        required : 'Please Enter Ameneties Name',
                    }, 
                     
    
                },
                errorElement : 'span', 
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
        
    </script>

@endsection
