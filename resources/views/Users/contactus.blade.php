@extends('layouts.default')
@section('content')
<section class="cus-support">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="page-header">
          <h2 class="text-uppercase h1">Contact Us</h2>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="cus-leftdiv">
          <h1>Thank you for using <strong>Blehx!</strong></h1>
        </div>

        <div class="google-div">
          <div class="page-header">
            <h4>Here We Are</h4>
          </div>
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d188820.8050415982!2d-71.11037070142213!3d42.314264698825404!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1516628925983" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div>

      <div class="col-md-6">
        <div class="cus-formdiv">
          <h5>Fill Here</h5>

          <form action="#" method="get">
            <div class="form-group">
              <input type="text" name="txt" class="form-control" placeholder="Name" />
            </div>

            <div class="form-group">
              <input type="email" name="mail" class="form-control" placeholder="Email" />
            </div>

            <div class="form-group">
              <input type="tel" name="contact" class="form-control" placeholder="Phone" />
            </div>

            <div class="form-group">
              <input type="text" name="contact" class="form-control" placeholder="Title" />
            </div>

            <div class="form-group">
              <textarea class="form-control" rows="7" placeholder="Message"></textarea>
            </div>

            <div class="form-group">
              <a href="#" class="btn btn-success text-center text-capitalize">Send</a>  
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@stop