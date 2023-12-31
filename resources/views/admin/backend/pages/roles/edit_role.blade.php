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

                        <h6 class="card-title">Edit Roles</h6>
                        <br>

                        <form id="myForm" class="forms-sample" method="POST" action="{{route('update.roles')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$roles->id}}">
                           

                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Role Name</label>
                                <input type="text" name="name"  class="form-control" id="name" autocomplete="off" value="{{$roles->name}}"
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


    

@endsection
