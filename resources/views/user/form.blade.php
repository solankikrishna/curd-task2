@extends('theme.index')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="h3">Add User</div>
        <form id="userForm" name="userForm" action="{{ (request()->segment(count(request()->segments())) == 'add') ? route('saveuser') : '/admin/users/edit/'.$user->id }}" method="post">
            @csrf
            <h3 class="h3">Basic Detail</h3>
            <div class="form-group">
                <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control" value="{{ $user->first_name ?? ''}}" />
            </div>
            <div class="form-group">
                <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-control" value="{{ $user->last_name ?? '' }}"/>
            </div>
            <div class="form-group">
                <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="{{ $user->email ?? '' }}"/>
            </div>
            <div class="form-group">
                <input type="text" name="designation" id="designation" placeholder="Designation" class="form-control" value="{{ $user->designation ?? '' }}"/>
            </div>
            <div class="form-group">
                <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" value="{{ $user->phone ?? '' }}"/>
            </div>
            <div class="form-group">
                <input type="text" name="address1" id="address1" placeholder="Address1" class="form-control" value="{{ $user->address1 ?? '' }}"/>
            </div>
            <div class="form-group">
                <input type="text" name="address2" id="address2" placeholder="Address2" class="form-control" value="{{ $user->address2 ?? '' }}"/>
            </div>
            <div class="form-group">
                <input type="text" name="city" id="city" placeholder="City" class="form-control" value="{{ $user->city ?? '' }}"/>
            </div>
            <div class="form-group">
                <select name="state_id" id="state_id" class="form-control">
                    <option value="0">Select State</option>
                    @foreach(\App\Models\State::all() as $k=>$v)
                        <option value="{{ $v['id'] }}" {{ (isset($user->state_id) && ($v['id'] == $user->state_id)) ? 'selected' : '' }}>{{ $v['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-0">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender1" value="Male"  {{ (isset($user->gender) && ($user->gender == 'Male')) ? 'checked' : '' }}>
                    <label class="form-check-label" for="gender1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="Female" {{ (isset($user->gender) && ($user->gender == 'Female')) ? 'checked' : '' }}>
                    <label class="form-check-label" for="gender2">Female</label>
                </div>
            </div>
            <div class="form-group"><div id="genderErr"></div></div>
            <div class="form-group">
                <input type="text" name="zipcode" id="zipcode" placeholder="Zipcode" class="form-control" value="{{ $user->zipcode ?? '' }}"/>
            </div>
            <div class="form-group">
                <select name="relationship_status" id="relationship_status" class="form-control">
                    <option value="0">Select Relationship Status</option>
                    <option value="Single" {{ (isset($user->relationship_status) && ($user->relationship_status == 'Single')) ? 'selected' : '' }}>Single</option>
                    <option value="Married" {{ (isset($user->relationship_status) && ($user->relationship_status == 'Married')) ? 'selected' : '' }}>Married</option>
                </select>
            </div>
            <div class="form-group">
                <input type="date" name="dob" id="dob" placeholder="Date Of Birth" class="form-control" value="{{ $user->dob ?? '' }}" readonly/>
            </div>
            <h3 class="h3">Education Details</h3>
                <div class="form-group">
                    <input type="text" name="ssc_board_name" id="ssc_board_name" class="form-control" placeholder="SSC board Name"/>
                </div>
                <div class="form-group">
                    <input type="text" name="ssc_year" id="ssc_year" class="form-control" placeholder="SSC Year"/>
                </div>
                <div class="form-group">
                    <input type="text" name="ssc_percentage" id="ssc_percentage" class="form-control"  placeholder="SSC Percentage"/>
                </div>
                <div class="form-group">
                    <input type="text" name="hsc_board_name" id="hsc_board_name" class="form-control" placeholder="HSC/Diploma board Name"/>
                </div>
                <div class="form-group">
                    <input type="text" name="hsc_year" id="hsc_year" class="form-control" placeholder="HSC/Diploma Year"/>
                </div>
                <div class="form-group">
                    <input type="text" name="hsc_percentage" id="hsc_percentage" class="form-control"  placeholder="HSC/Diploma Percentage"/>
                </div>
                <div class="form-group">
                    <input type="text" name="degree_course_name" id="degree_course_name" class="form-control" placeholder="Degree course Name"/>
                </div>
                <div class="form-group">
                    <input type="text" name="degree_university" id="degree_university" class="form-control" placeholder="Degree university"/>
                </div>
                <div class="form-group">
                    <input type="text" name="degree_year" id="degree_year" class="form-control" placeholder="Degree Year"/>
                </div>
                <div class="form-group">
                    <input type="text" name="degree_percentage" id="degree_percentage" class="form-control"  placeholder="Degree Percentage"/>
                </div> 
                <div class="form-group">
                    <input type="text" name="mdegree_course_name" id="mdegree_course_name" class="form-control" placeholder="Master Degree course Name"/>
                </div>
                <div class="form-group">
                    <input type="text" name="mdegree_university" id="mdegree_university" class="form-control" placeholder="Master Degree university"/>
                </div>
                <div class="form-group">
                    <input type="text" name="mdegree_year" id="mdegree_year" class="form-control" placeholder="Master Degree Year"/>
                </div>
                <div class="form-group">
                    <input type="text" name="mdegree_percentage" id="mdegree_percentage" class="form-control"  placeholder="Master Degree Percentage"/>
                </div>    
            <div class="form-group">
                <input type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-block btn-success" value="Submit"/>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
<script>
    $(document).ready(function(){
        jQuery.validator.addMethod('selectcheck', function (value) {
            return (value != '0');
        }, "{{ trans('user.ER_REQUIRED') }}");
        $('#userForm').validate({
            rules:{
                first_name:{required:true},
                last_name:{required:true},
                email:{required:true,email:true},
                designation:{required:true},
                phone:{required:true},
                address1:{required:true},
                city:{required:true},
                state_id:{selectcheck: true},
                gender:{required:true},
                zipcode:{required:true,number:true},
                relationship_status:{selectcheck: true},
                dob:{required: true},
                ssc_year:{ minlength: 4,maxlength: 4,number:true},
                hsc_year:{ minlength: 4,maxlength: 4,number:true},
                degree_year:{ minlength: 4,maxlength: 4,number:true},
                mdegree_year:{ minlength: 4,maxlength: 4,number:true},
            },
            messages:{
                first_name:{required:'{{ trans('user.ER_REQUIRED') }}'},
                last_name:{required:'{{ trans('user.ER_REQUIRED') }}'},
                email:{required:'{{ trans('user.ER_REQUIRED') }}'},
                designation:{required:'{{ trans('user.ER_REQUIRED') }}'},
                phone:{required:'{{ trans('user.ER_REQUIRED') }}'},
                address1:{required:'{{ trans('user.ER_REQUIRED') }}'},
                city:{required:'{{ trans('user.ER_REQUIRED') }}'},
                gender:{required:'{{ trans('user.ER_REQUIRED') }}'},
                zipcode:{required:'{{ trans('user.ER_REQUIRED') }}'},
                dob:{required: '{{ trans('user.ER_REQUIRED') }}'}
            },
            errorPlacement:function(error,element){     
                if (element.attr("name") == "gender") {
                    error.appendTo('#genderErr');
                } else {
                    error.insertAfter(element);
                    
                }
            }
        });
    });
</script>
@endsection