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

                        <h6 class="card-title">Add Permissions</h6>
                        <br>

                        <form id="myForm" class="forms-sample" method="POST" action="{{route('store.permissions')}}" enctype="multipart/form-data">
                            @csrf
                           

                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Permissions Name</label>
                                <input type="text" name="name"  class="form-control" id="name" autocomplete="off"
                                   >

                                   
                            </div>


                            
                            <div class="form-group mb-3">
                                <label for="group_name" class="form-label">Group Name</label>
                                <select class="form-select" name="group_name" id="group_name">
                                    <option selected="" disabled="">Select Group</option>
                                    <option value="type">Property Type</option>
                                    <option  value="state">State</option>
                                    <option  value="amenties">Amenties</option>
                                    <option  value="property">Property</option>
                                    <option  value="history">Package history</option>
                                    <option  value="message">Property message</option>
                                    <option  value="testomonials">Testomonials</option>
                                    <option  value="agent">Manage agent</option>
                                    <option  value="category">Blog Category</option>
                                    <option  value="post">Blog Post</option>
                                    <option  value="comment">Blog Comment</option>
                                    <option  value="smtp">SMTP settings</option>
                                    <option  value="site">site settings</option>
                                    <option value="role">Role & Permissions</option>
                                   
                                </select>

                                   
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
