@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 show-forms">
            <span class="show-register-form active">Register</span>
            <span class="show-forms-divider">/</span>
            <span class="show-login-form">Login</span>
        </div>
    </div>

    <div class="row register-form">
        <div class="col-sm-4 col-sm-offset-1">
            <form role="form" action="" method="post" class="r-form">
                <div class="form-group">
                    <label class="sr-only" for="r-form-first-name">First name</label>
                    <input type="text" name="r-form-first-name" placeholder="First name..." class="r-form-first-name form-control" id="r-form-first-name">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="r-form-last-name">Last name</label>
                    <input type="text" name="r-form-last-name" placeholder="Last name..." class="r-form-last-name form-control" id="r-form-last-name">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="r-form-email">Email</label>
                    <input type="text" name="r-form-email" placeholder="Email..." class="r-form-email form-control" id="r-form-email">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="r-form-about-yourself">About yourself</label>
                    <textarea name="r-form-about-yourself" placeholder="About yourself..." class="r-form-about-yourself form-control" id="r-form-about-yourself"></textarea>
                </div>
                <button type="submit" class="btn">Sign me up!</button>
            </form>
        </div>
        <div class="col-sm-6 forms-right-icons">
            <div class="row">
                <div class="col-sm-2 icon"><i class="fa fa-pencil"></i></div>
                <div class="col-sm-10">
                    <h3>Beautiful Forms</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 icon"><i class="fa fa-commenting"></i></div>
                <div class="col-sm-10">
                    <h3>Awesome Login</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 icon"><i class="fa fa-magic"></i></div>
                <div class="col-sm-10">
                    <h3>Great Registration</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="login-form">
        <div class="row">
          <div class="col-md-4">
              <form role="form" action="" method="post" class="l-form">
                  <div class="form-group">
                      <label class="sr-only" for="l-form-username">Username</label>
                      <input type="text" name="l-form-username" placeholder="Username..." class="l-form-username form-control" id="l-form-username">
                  </div>
                  <div class="form-group">
                      <label class="sr-only" for="l-form-password">Password</label>
                      <input type="password" name="l-form-password" placeholder="Password..." class="l-form-password form-control" id="l-form-password">
                  </div>
                  <button type="submit" class="btn">Sign in!</button>
              </form>
              <div class="social-login">
                  <p>Or login with:</p>
                  <div class="social-login-buttons">
                      <a class="btn btn-link-1" href="#"><i class="fa fa-facebook"></i></a>
                      <a class="btn btn-link-1" href="#"><i class="fa fa-twitter"></i></a>
                      <a class="btn btn-link-1" href="#"><i class="fa fa-google-plus"></i></a>
                  </div>
              </div>
          </div>
          <div class="col-md-6 forms-right-icons">
            <div class="row">
                <div class="col-sm-2 icon"><i class="fa fa-pencil"></i></div>
                <div class="col-sm-10">
                    <h3>Beautiful Forms</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 icon"><i class="fa fa-commenting"></i></div>
                <div class="col-sm-10">
                    <h3>Awesome Login</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 icon"><i class="fa fa-magic"></i></div>
                <div class="col-sm-10">
                    <h3>Great Registration</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                </div>
            </div>
          </div>

        </div>
    </div>

</div>
@endsection
