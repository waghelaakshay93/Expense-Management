@extends('layouts.app', ['page' => __('Add Expense_Group')])

@section('content')
<!-- Akshay Waghela-->

<div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Add Expense To Group') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('group') }}" class="btn btn-sm btn-primary">{{ __('Back to group list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('storeexpensegroup')}}" autocomplete="off">
                            @csrf
                         <h6 class="heading-small text-muted mb-4">{{ __('Group information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <!-- <label class="form-control-label" for="input-name">{{ __('Add Group name') }}</label> -->
                                    @foreach($groupName as $user)
                                    <h3 class="text-primary">{{$user->groupName}}</h3>
                                    @endforeach
                                    <!-- <input type="text" name="name" id="input-name" class=" form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="" required autofocus> -->
                                    <!--<select name="name[]" id="input-name" multiple class="form-control form-control-alternative" required data-size="7" data-style="btn btn-primary"  tabindex="-98"></select> -->
                                    
                                </div>

                                <input type="hidden" name="count" value="{{ $count ?? '' }}">
                                <input type="hidden" name="id" value="{{ $groupID ?? '' }}">
                                <!-- <input type="hidden" name="groupName" value="{{ $groupName ?? '' }}"> -->

                               <div class="form-group">
                                    <label class="form-control-label" for="input-ename">{{ __('Expense Name') }}</label>
                                    <input type="test" name="ename" id="input-ename" class="form-control form-control-alternative" placeholder="{{ __('Expense Name') }}">
                                   
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="input-amount">{{ __('Amount') }}</label>
                                    <input type="number" name="amount" id="input-amount" class="form-control form-control-alternative" placeholder="{{ __('$0.00') }}">
                                   
                                </div>
                                



                               
                    <div class="form-group">
                    <label class="form-control-label" for="input-split">{{ __('Split') }}</label>
                      
                    <select id="dropsearchselect" onchange="func();" class="form-control form-control-alternative" data-size="7" data-style="btn btn-primary" title="Single Select" tabindex="-98" name="split">
                    
                    <option class="bs-title-option" value=""> Select one option</option>
                      <option value="equally">Split Equally</option>
                      <option value="unequally">Split Unequally</option>
                    </select>

                    <!-- Add checkbox code -->
                    <div id="details">
                    <label class="form-control-label" for="input-split">{{ __('Select Members') }}</label>
                    <table cellpadding="10">
                    <tr>
                    @foreach($members as $role)
                        <td><h6><input name="members[]" type="checkbox" value="{{ $role->userID }}" />&nbsp;&nbsp;{{ $role->name }}</h6></td>
                    @endforeach
                    </tr>
                    </table>
                    </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>

var box = document.getElementById('details').style.visibility = 'hidden';
 function func() 
{
    var selectBox = document.getElementById("dropsearchselect");
    var selectedValue = selectBox.options[selectBox.selectedIndex].value;
    // alert(selectedValue);
    if(selectedValue == "unequally")
    {
        var box = document.getElementById('details').style.visibility = 'visible';
    }
    else
    {
        var box = document.getElementById('details').style.visibility = 'hidden';
    }
}

</script>
    
    @endsection