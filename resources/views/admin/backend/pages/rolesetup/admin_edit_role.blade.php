@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <style type="text/css">
    .form-check-label{
        text-transform: capitalize;
    }
    </style>

    <div class="page-content">
        <div class="row profile-body">

            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">

                    <div class="card-body">

                        <h6 class="card-title">Edit Roles Permissions</h6>
                        <br>

                        <form id="myForm" class="forms-sample" method="POST" action="{{ route('admin.roles.update',$role->id) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Role Name</label>
                               <h3>{{$role->name}}</h3>

                            </div>

                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input" id="checkDefaultmain">
                                <label class="form-check-label" for="checkDefaultmain">
                                    Permissions All
                                </label>
                            </div>
                            <hr>
                            {{-- start div row --}}
                            @foreach ($permission_group as $group)
                                <div class="row">
                                    <div class="col-3">

                                     @php
                                        $permissions = App\Models\User::GetPermissionByGroupName($group->group_name);
                                    @endphp


                                        <div class="form-check mb-2">
                                            <input type="checkbox" class="form-check-input" id="checkDefault"
                                            {{App\Models\User::roleHasPermission($role,$permissions)?'checked':''}}>
                                            <label class="form-check-label" for="checkDefault">
                                                {{ $group->group_name }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-9">
                                      

                                        @foreach ($permissions as $permission)
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" name="permission[]"
                                                    id="checkDefault {{ $permission->id }}" value="{{ $permission->id }}"
                                                    {{$role->hasPermissionTo($permission->name)?'checked':''}}>
                                                <label class="form-check-label" for="checkDefault {{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <br>
                                    </div>
                                </div>
                            @endforeach

                            {{-- start div row --}}

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
    $('#checkDefaultmain').click(function(){
        if($(this).is(':checked')){
            $('input[type=checkbox]').prop('checked',true);
        }else{
            $('input[type=checkbox]').prop('checked',false);
        }
    })

    </script>
@endsection
