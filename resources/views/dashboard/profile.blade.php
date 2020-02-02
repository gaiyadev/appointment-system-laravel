@extends('layouts.master')
@section('content')
<div class="row">
        
    <div class="col-md-6">
            <div class="card">
                    <div class="card- text-white bg-info text-uppercase" style="padding:20px;">
                         {{ __('Update Account') }}</div>
                         <div class="dropdown-divider"></div>
            
                    <div class="card-body ">
                            <form action="#" method="post" style="padding:20px;">
                                    <div class="form-group">
                                      <label class="text-info" for="name">Surname:</label>
                                      <input type="text" placeholder="Surname"  class="form-control" id="name" required>
                                    </div>
            
                                    <div class="form-group">
                                        <label class="text-info" for="mname">Middle Name:</label>
                                        <input type="text" placeholder="Middle Name" class="form-control" name="middleName" id="mname" required>
                                    </div>
            
                                    <div class="form-group">
                                            <label class="text-info" for="lname">Last Name:</label>
                                            <input type="text" placeholder="Last Name" class="form-control" name="lastName" id="lname" required>
                                        </div>
                    
                                    <div class="form-group">
                                      <label class="text-info" for="date">Date:</label>
                                      <input type="date" class="form-control" id="date" required>
                                    </div>
            
                                    <div class="form-group">
                                            <label class="text-info" for="email">Username:</label>
                                            <input type="email" placeholder="Email" class="form-control" id="email" name="email" required>
                                        </div>
                        
            
                                    <div class="form-group">
                                        <label class="text-info" for="username">Username:</label>
                                        <input type="text" class="form-control input-lg" placeholder="Username" id="username" name="username" required>
                                    </div>
                    
                                   
                                    
                                  
                          </div>
                          <div class="modal-footer">
                                <button type="submit" class="btn btn-info btn-block" >Update</button>
                            </form>
                      
                    </div>
                </div> 
    </div>
    <div class="col-md-6">
        <div class="card" >
                <div class="modal-header bg-info">
                        <h4 class="modal-title text-uppercase text-white ml-10" >Change Password</h4>
                      </div><br/>
                <form style="padding:15px;" action="{{ route('changePassword') }}" method="post">
                        @csrf
                    <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-key"></i></span>
                            </div>
                            <input id="oldPassword" type="password" value="{{ old('oldPassword') }}"
                             class=" @error('oldPassword') is-invalid @enderror form-control 
                             form-control-lg" placeholder="Current Password" aria-label="oldPassword"
                              aria-describedby="basic-addon1"  name="oldPassword" 
                              required autocomplete="oldPassword" autofocus>
                                @error('oldPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                      <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-lock"></i></span>
                            </div>
                            <input id="newPassword" type="password" class="@error('newPassword') is-invalid @enderror form-control 
                             form-control-lg" placeholder="New Password"
                              aria-label="newPassword" aria-describedby="basic-addon1"
                                name="newPassword" required autocomplete="new-password">
                             @error('newPassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                          <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-lock"></i></span>
                                </div>
                                <input id="password-confirm" type="password"
                                 class="form-control form-control-lg" placeholder="Retype new Password" 
                                 aria-label="retypePassword" aria-describedby="basic-addon1" 
                                  name="retypePassword" required autocomplete="new-password">
                                 
                            </div>
      
                      
                      
                    
            </div>
            <div class="modal-footer">
                  <button  type="submit" class="btn btn-block btn-info" >Update</button>
              </form>
      
              {{-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> --}}
            </div>
          </div>
        </div>

    </div>
</div>
@endsection