@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
              <a href="{{route('export')}}" class="btn btn-inverse-danger"> Download Excel File</a>
               
                </ol>
          </nav>


        <div class="row profile-body">
            <!-- left wrapper start -->
           
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">

                    <div class="card-body">

                        <h6 class="card-title">Import Permissions</h6>
                        <br>

                        <form id="myForm" class="forms-sample" method="POST" action="{{route('import')}}" enctype="multipart/form-data">
                            @csrf
                           

                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Xlsx Import File</label>
                                <input type="file" name="import_file"  class="form-control" id="import_file" autocomplete="off"
                                   >

                                   
                            </div>


                            
                          



                           
                           
                          
                            <button type="submit" class="btn btn-inverse-warning"> Upload</button>
                           
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
