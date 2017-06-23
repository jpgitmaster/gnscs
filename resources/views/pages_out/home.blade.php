@extends('pages_out.master')

@section('title', 'Home')

@section('content')
<div ng-controller="ctrlHome">
	<div id="banners">
		<div id="carousel-banners" class="carousel slide carousel-fade" data-ride="carousel">
		    <div class="carousel-inner" role="listbox">
		      <div class="item active">
		        <img src="img/banners/banner2.jpg" alt="Banner Image">
		      </div>
			</div>
		</div>
	</div>
	
	<div class="clearfix"></div>
	<div id="services">
	  <div class="no-gutter">
	    <div class="col-lg-3 blubx">
	      <div class="bx">
	        <h3>Professional Growth</h3>
	        <p>
	          We recruit efficient and competent professionals. We will help you every step of the way to build your career in healthcare. We offer permanent, part time and per-diem positions.
	        </p>
	      </div>
	    </div>
	    <div class="col-lg-3 blubx">
	      <div class="bx">
	        <h3>Perks & Benefits</h3>
	        <p>
				In return for commitment, hard work and talent, we offer competitive salaries and benefits, high quality training and opportunities.
	        </p>
	      </div>
	    </div>
	    <div class="col-lg-3 blubx">
	      <div class="bx">
	        <h3>Client Services</h3>
	        <p>
	          We cater to the different Nursing Facilities in New York State. We live in our core value of Client Satisfaction giving a professional yet a personal service.
	        </p>
	      </div>
	    </div>
	    <div class="col-lg-3 blubx">
	      <div class="bx">
	        <h3>Staffing & Solutions</h3>
	        <p>
	          We offer Staffing Assistance. We will help you find the right professional for the job. Matching skills with responsibilities that will work for your business. Working with you to give Quality Patient Care.
	        </p>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="clearfix"></div>
	<div id="about">
	  <div class="innr">
	    <h3>24/7 Global Nursing Solution & Consulting Services</h3>
	    <p>
	      We are a licensed and bonded Staffing Agency that offers a comprehensive listing of career opportunities for healthcare professionals. We specialize in creating matches between the professional and the different Nursing Facilities in New York.
	    </p>
	    <a href="/about">Read More</a>
	  </div>
	</div>

	<div class="clearfix"></div>
	<div id="jobposting">
	  <div class="jblst">
	    <div class="ttl">
	      <h3>Most Amazing Featured <span>JOBS</span> Listed</h3>
	      <div class="btmbrdr"><hr /></div>
	    </div>
	    <div id="carousel-jobs" class="carousel slide" data-ride="carousel" data-interval="5000">
	        <div class="carousel-inner" role="listbox">
	          <div class="item active">
				<div class="no-gutter">
			      <div class="col-lg-3">
			        <div class="jb">
			          <h3>Registered Nurses</h3>
			        </div>
			      </div>
			      <div class="col-lg-3">
			        <div class="jb">
			          <h3>Certified Nursing Assistants</h3>
			        </div>
			      </div>
			      <div class="col-lg-3">
			        <div class="jb">
			          <h3>Licensed Physical Therapists</h3>
			        </div>
			      </div>
			      <div class="col-lg-3">
			        <div class="jb">
			          <h3>Licensed Occupational Therapists</h3>
			        </div>
			      </div>
			    </div>
	          </div>
	          <div class="item">
	          	<div class="no-gutter">
			      <div class="col-lg-3">
			        <div class="jb">
			          <h3>Licensed Speech Therapists</h3>
			        </div>
			      </div>
			      <div class="col-lg-3">
			        <div class="jb">
			          <h3>Physical Therapy Assistants</h3>
			        </div>
			      </div>
			      <div class="col-lg-3">
			        <div class="jb">
			          <h3>Occupational Therapy Assistants</h3>
			        </div>
			      </div>
			      <div class="col-lg-3">
			        <div class="jb">
			          <h3>MDS Nurses</h3>
			        </div>
			      </div>
			    </div>
	          </div>
	        </div>
	  	</div>
	  </div>
	</div>

	<div class="clearfix"></div>
	<div class="no-gutter">
	  <div class="col-lg-6">
	    <div id="news">
	      <div class="ttl">
	        <h3>News & Events</h3>
	        <div class="btmbrdr"><hr /></div>
	      </div>
	      <div class="evnt">
	        <div class="evntimg">
	          <img src="img/news/opening/grand-opening.jpg" alt="">
	        </div>
	        <div class="evntdtls">
	          <h3>Grand Opening January 8, 2017</h3>
	          <p>
	            Last January 8, 2017 marked the start of 24/7 Global Nursing Solution and Consulting Services. Our aim is to be able to help healthcare professional find the right job and Provide our Clients with highly-skilled, competent and efficient RN’s, LPN’s, PT’s, OT’s and CNA’s. Good start of the year!
	          </p>
	          <a href="" data-toggle="modal" data-target="#myModal">Read More</a>
	        </div>
	        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Grand Opening January 8, 2017</h4>
			      </div>
			      <div class="modal-body">
			      	<div class="center">
			      		<img src="img/news/opening/grand-opening.jpg" alt="">
			      	</div>
			      	<div class="clearfix"></div>
			      	<br><br>
			        <p>
			        	Last January 8, 2017 marked the start of 24/7 Global Nursing Solution and Consulting Services. Our aim is to be able to help healthcare professional find the right job and Provide our Clients with highly-skilled, competent and efficient RN’s, LPN’s, PT’s, OT’s and CNA’s. Good start of the year!
			        </p>
			      	<div class="clearfix"></div><br><br>
			      	<div class="no-gutter">
			      		<div class="col-lg-4">
			      			<div class="mrgn">
			      				<img src="img/news/opening/grand-opening1.JPG" alt="" class="smlimg">
			      			</div>
			      		</div>
			      		<div class="col-lg-4">
			      			<div class="mrgn">
			      				<img src="img/news/opening/grand-opening2.JPG" alt="" class="smlimg">
			      			</div>
			      		</div>
			      		<div class="col-lg-4">
			      			<div class="mrgn">
			      				<img src="img/news/opening/grand-opening3.JPG" alt="" class="smlimg">
			      			</div>
			      		</div>
			      		<div class="col-lg-4">
			      			<div class="mrgn">
			      				<img src="img/news/opening/grand-opening4.JPG" alt="" class="smlimg">
			      			</div>
			      		</div>
			      		<div class="col-lg-4">
			      			<div class="mrgn">
			      				<img src="img/news/opening/grand-opening5.JPG" alt="" class="smlimg">
			      			</div>
			      		</div>
			      		<div class="col-lg-4">
			      			<div class="mrgn">
			      				<img src="img/news/opening/grand-opening6.JPG" alt="" class="smlimg">
			      			</div>
			      		</div>
			      		<div class="col-lg-4">
			      			<div class="mrgn">
			      				<img src="img/news/opening/grand-opening7.JPG" alt="" class="smlimg">
			      			</div>
			      		</div>
			      		<div class="col-lg-4">
			      			<div class="mrgn">
			      				<img src="img/news/opening/grand-opening8.JPG" alt="" class="smlimg">
			      			</div>
			      		</div>
			      		<div class="col-lg-4">
			      			<div class="mrgn">
			      				<img src="img/news/opening/grand-opening9.JPG" alt="" class="smlimg">
			      			</div>
			      		</div>
			      	</div>
			      	
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
	      </div>
	      <div class="evnt">
	        <div class="evntimg evntblnk">

	        </div>
	        <div class="evntdtls evntblnk">

	        </div>
	      </div>
	      <div class="evnt">
	        <div class="evntimg evntblnk">

	        </div>
	        <div class="evntdtls evntblnk">

	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="col-lg-6">
	    <div id="testimonials">
	      <div class="ttl">
	        <h3><span>CEO</span>'s Message</h3>
	        <div class="btmbrdr"><hr /></div>
	      </div>

	      <img src="img/ceo.png" class="ceo_img" alt="CEO's Message">
	      <div class="ceo_testi">
	      	<div class="popover left">
                <div class="arrow"></div>
                <div class="popover-content">
                    Let 24/7 Global Nursing Solution and Consulting Services help you to become a skilled, experienced and competitive healthcare professional. Finding the right job and not just a job. We offer assistance in every way we can to all our recruits, not only professionally but also in handling the struggles of our profession. We maybe new in the business but not in Nursing. Let us be your partner and we can work together to build not only your career but your dreams as well.
                </div>
            </div>
	      	<h2>Andrea Jose, BSN, RN</h2>
	      	<h4>President / CEO / Founder</h4>
	      </div>
	      
	    </div>
	  </div>
	</div>
</div>
@endsection