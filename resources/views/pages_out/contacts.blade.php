@extends('pages_out.master')

@section('title', 'Contacts')

@section('content')
<div id="contactus" ng-controller="ctrlContactus">
	<div class="ttl">
      <h3>Contact Us</h3>
      <div class="btmbrdr"><hr /></div>
 	</div>
 	<div class="no-gutter">
 		<div class="col-lg-6">
 			<div class="mrgn mpggl">
 				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.3065289348824!2d-73.99567478494097!3d40.75528237932729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259ad6a616cf7%3A0x1a0ef0d2c41fe81e!2s330+W+38th+St+%23808%2C+New+York%2C+NY+10018%2C+USA!5e0!3m2!1sen!2sph!4v1484622055368" frameborder="0" style="border:0" allowfullscreen></iframe>
 			</div>
 		</div>
 		<div class="col-lg-6">
 			<div class="mrgn mpstrt">
 				<iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1sen!2sph!4v1484622459805!6m8!1m7!1sbqaiFmuLoaqXLdJmmjrNXw!2m2!1d40.75529908792205!2d-73.99302828206368!3f276.41998424613894!4f-11.35775709958466!5f0.7820865974627469" frameborder="0" style="border:0" allowfullscreen></iframe>
 			</div>
 		</div>
 	</div>
</div>
@endsection