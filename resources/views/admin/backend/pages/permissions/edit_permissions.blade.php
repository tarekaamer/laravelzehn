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

                        <h6 class="card-title">Edit Permissions</h6>
                        <br>

                        <form id="myForm" class="forms-sample" method="POST" action="{{route('update.permissions')}}" enctype="multipart/form-data">
                            @csrf
                           <input type="hidden" name="id" value="{{$permission->id}}">

                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Permissions Name</label>
                                <input type="text" name="name"  class="form-control" id="name" autocomplete="off"
                                   value="{{$permission->name}}" >

                                   
                            </div>


                            
                            <div class="form-group mb-3">
                                <label for="group_name" class="form-label">Group Name</label>
                                <select class="form-select" name="group_name" id="group_name">
                                    <option selected="" disabled="">Select Group</option>
                                    <option value="type" {{$permission->group_name=='type'?'selected': ''}} >Property Type</option>
                                    <option  value="state" {{$permission->group_name=='state'?'selected': ''}}>State</option>
                                    <option  value="amenties" {{$permission->group_name=='amenties'?'selected': ''}}>Amenties</option>
                                    <option  value="property" {{$permission->group_name=='property'?'selected': ''}}>Property</option>
                                    <option  value="history" {{$permission->group_name=='history'?'selected': ''}}>Package history</option>
                                    <option  value="message" {{$permission->group_name=='message'?'selected': ''}}>Property message</option>
                                    <option  value="testomonials" {{$permission->group_name=='testomonials'?'selected': ''}}>Testomonials</option>
                                    <option  value="agent" {{$permission->group_name=='agent'?'selected': ''}}>Manage agent</option>
                                    <option  value="category" {{$permission->group_name=='category'?'selected': ''}}>Blog Category</option>
                                    <option  value="post" {{$permission->group_name=='post'?'selected': ''}}>Blog Post</option>
                                    <option  value="comment" {{$permission->group_name=='comment'?'selected': ''}}>Blog Comment</option>
                                    <option  value="smtp" {{$permission->group_name=='smtp'?'selected': ''}}>SMTP settings</option>
                                    <option  value="site" {{$permission->group_name=='site'?'selected': ''}}>site settings</option>
                                    <option value="role" {{$permission->group_name=='role'?'selected': ''}}>Role & Permissions</option>
                                   
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
