@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Users Edit')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection

{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-users.css')}}">
@endsection

@section('content')
<!-- users edit start -->
<section class="users-edit">
  <div class="card">
    <div class="card-content">
      <div class="card-body">
        <ul class="nav nav-tabs mb-2" role="tablist">
          <li class="nav-item">
              <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
                  href="#account" aria-controls="account" role="tab" aria-selected="true">
                  <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Account</span>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab"
                  href="#information" aria-controls="information" role="tab" aria-selected="false">
                  <i class="bx bx-info-circle mr-25"></i><span class="d-none d-sm-block">Information</span>
              </a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
            <!-- users edit media object start -->
            <div class="media mb-2">
                <a class="mr-2" href="#">
                    <img src="{{asset('/adm/app-assets/images/portrait/small/avatar-s-26.jpg')}}" alt="users avatar"
                        class="users-avatar-shadow rounded-circle" height="64" width="64">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Avatar</h4>
                    <div class="col-12 px-0 d-flex">
                        <a href="#" class="btn btn-sm btn-primary mr-25">Change</a>
                        <a href="#" class="btn btn-sm btn-light-secondary">Reset</a>
                    </div>
                </div>
            </div>
            <!-- users edit media object ends -->
            <!-- users edit account form start -->
            <form novalidate>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <div class="controls">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Username"
                                    value="dean3004" required
                                    data-validation-required-message="This username field is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name"
                                    value="Dean Stanley" required
                                    data-validation-required-message="This name field is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="controls">
                                <label>E-mail</label>
                                <input type="email" class="form-control" placeholder="Email"
                                    value="deanstanley@gmail.com" required
                                    data-validation-required-message="This email field is required">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control">
                                <option>User</option>
                                <option>Staff</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control">
                                <option>Active</option>
                                <option>Banned</option>
                                <option>Close</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Company</label>
                            <input type="text" class="form-control" placeholder="Company name">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mt-1">
                                <thead>
                                    <tr>
                                        <th>Module Permission</th>
                                        <th>Read</th>
                                        <th>Write</th>
                                        <th>Create</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Users</td>
                                        <td>
                                            <div class="checkbox"><input type="checkbox"
                                                    id="users-checkbox1" class="checkbox-input" checked>
                                                <label for="users-checkbox1"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox"><input type="checkbox"
                                                    id="users-checkbox2" class="checkbox-input"><label
                                                    for="users-checkbox2"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox"><input type="checkbox"
                                                    id="users-checkbox3" class="checkbox-input"><label
                                                    for="users-checkbox3"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox"><input type="checkbox"
                                                    id="users-checkbox4" class="checkbox-input" checked>
                                                <label for="users-checkbox4"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Articles</td>
                                        <td>
                                            <div class="checkbox"><input type="checkbox"
                                                    id="users-checkbox5" class="checkbox-input"><label
                                                    for="users-checkbox5"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox"><input type="checkbox"
                                                    id="users-checkbox6" class="checkbox-input" checked>
                                                <label for="users-checkbox6"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox"><input type="checkbox"
                                                    id="users-checkbox7" class="checkbox-input"><label
                                                    for="users-checkbox7"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox"><input type="checkbox"
                                                    id="users-checkbox8" class="checkbox-input" checked>
                                                <label for="users-checkbox8"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Staff</td>
                                        <td>
                                            <div class="checkbox"><input type="checkbox"
                                                    id="users-checkbox9" class="checkbox-input" checked>
                                                <label for="users-checkbox9"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox"><input type="checkbox"
                                                    id="users-checkbox10" class="checkbox-input" checked>
                                                <label for="users-checkbox10"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox"><input type="checkbox"
                                                    id="users-checkbox11" class="checkbox-input"><label
                                                    for="users-checkbox11"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="checkbox"><input type="checkbox"
                                                    id="users-checkbox12" class="checkbox-input"><label
                                                    for="users-checkbox12"></label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                            changes</button>
                        <button type="reset" class="btn btn-light">Cancel</button>
                    </div>
                </div>
            </form>
            <!-- users edit account form ends -->
          </div>
          <div class="tab-pane fade show" id="information" aria-labelledby="information-tab" role="tabpanel">
            <!-- users edit Info form start -->
            <form novalidate>
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h5 class="mb-1"><i class="bx bx-link mr-25"></i>Social Links</h5>
                  <div class="form-group">
                      <label>Twitter</label>
                      <input class="form-control" type="text" value="https://www.twitter.com/">
                  </div>
                  <div class="form-group">
                      <label>Facebook</label>
                      <input class="form-control" type="text" value="https://www.facebook.com/">
                  </div>
                  <div class="form-group">
                      <label>Google+</label>
                      <input class="form-control" type="text">
                  </div>
                  <div class="form-group">
                      <label>LinkedIn</label>
                      <input class="form-control" type="text">
                  </div>
                  <div class="form-group">
                      <label>Instagram</label>
                      <input class="form-control" type="text" value="https://www.instagram.com/">
                  </div>
                </div>
                <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                  <h5 class="mb-1"><i class="bx bx-user mr-25"></i>Personal Info</h5>
                  <div class="form-group">
                    <div class="controls position-relative">
                      <label>Birth date</label>
                      <input type="text" class="form-control birthdate-picker" required
                          placeholder="Birth date"
                          data-validation-required-message="This birthdate field is required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Country</label>
                    <select class="form-control" id="accountSelect">
                        <option>USA</option>
                        <option>India</option>
                        <option>Canada</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Languages</label>
                    <select class="form-control" id="users-language-select2" multiple="multiple">
                        <option value="English" selected>English</option>
                        <option value="Spanish">Spanish</option>
                        <option value="French">French</option>
                        <option value="Russian">Russian</option>
                        <option value="German">German</option>
                        <option value="Arabic" selected>Arabic</option>
                        <option value="Sanskrit">Sanskrit</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <div class="controls">
                      <label>Phone</label>
                      <input type="text" class="form-control" required placeholder="Phone number"
                          value="(+656) 254 2568"
                          data-validation-required-message="This phone number field is required">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="controls">
                      <label>Address</label>
                      <input type="text" class="form-control" placeholder="Address"
                          data-validation-required-message="This Address field is required">
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label>Website</label>
                    <input type="text" class="form-control" placeholder="Website address">
                  </div>
                  <div class="form-group">
                    <label>Favourite Music</label>
                    <select class="form-control" id="users-music-select2" multiple="multiple">
                      <option value="Rock">Rock</option>
                      <option value="Jazz" selected>Jazz</option>
                      <option value="Disco">Disco</option>
                      <option value="Pop">Pop</option>
                      <option value="Techno">Techno</option>
                      <option value="Folk" selected>Folk</option>
                      <option value="Hip hop">Hip hop</option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Favourite movies</label>
                        <select class="form-control" id="users-movies-select2" multiple="multiple">
                            <option value="The Dark Knight" selected>The Dark Knight
                            </option>
                            <option value="Harry Potter" selected>Harry Potter</option>
                            <option value="Airplane!">Airplane!</option>
                            <option value="Perl Harbour">Perl Harbour</option>
                            <option value="Spider Man">Spider Man</option>
                            <option value="Iron Man" selected>Iron Man</option>
                            <option value="Avatar">Avatar</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                        changes</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                </div>
              </div>
            </form>
            <!-- users edit Info form ends -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- users edit ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/validation/jqBootstrapValidation.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/page-users.js')}}"></script>
<script src="{{asset('js/scripts/navs/navs.js')}}"></script>
@endsection