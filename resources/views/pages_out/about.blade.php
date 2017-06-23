@extends('pages_out.master')

@section('title', 'About')

@section('content')
<div id="abt" ng-controller="ctrlAbout">
	<div id="intro">
		<div class="no-gutter" id="ourbackground">
			<div class="col-lg-12">
				<div class="mrgn">
					<div class="ttl">
				      <h3>Our Background</h3>
				      <div class="btmbrdr"><hr /></div>
				    </div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="mrgn mmbrbx lhtrblu">
					<img src="img/ourteam/group.jpg" alt="" class="tmmmbr">
					<div class="tminfo">
						<h2 style="border-bottom: 0; font-size: 30px;">24/7 GNSCS Board Members</h2>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="mrgn">
				    <p class="intro_dtls">
				    	The healthcare landscape in the United States is an ever- changing one. With this development, we’ve formed our company with one focus in mind-- always ready to adapt to constant challenges of times, flexible and discerning enough to take on the many forms and shapes of those changes. We exist to bridge the gap between the “then and now” and to maintain sustainable growth.
				    	<br /><br />
				    	We are young professionals, full of zest and energy. We are also knowledgeable in understanding the deep needs of the industry and in carrying out the things required to deliver quality care.
				    	<br /><br />
				    	We are a group of highly- skilled professionals from different cultural backgrounds and yet we all walk towards one direction: growth and consistency in our ideals in order to meet our clients’ unique needs.
				    	<br /><br />
				    	We are 24/7 Global Nursing Solution. You and US, together, will make success a part of our daily lives!
				    	<br /><br />
				    </p>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="mrgn">
					<p class="intro_dtls">
						<strong style="color: #6dc5e6; font-size: 16px;"><i>24/7 Global Nursing Solution and Consulting Services LLC is an equal opportunity employer. It does not discriminate based on Race, Creed, Color, National Origin, Sex, Disability, Veterans Status and any other category protected by the law or patient’s decision.</i></strong>
						<br /><br /><br /><br />
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="no-gutter">
		<div class="col-lg-6">
			<div id="msn" class="pddngbx">
				<h3>Mission</h3>
				<p>
					Our Mission is to deliver a comprehensive excellent healthcare services by providing experienced, competent, specialized and well trained staff in response to the competitive and ever changing demands and standards of the healthcare industry.
				</p>
			</div>
		</div>
		<div class="col-lg-6">
			<div id="vsn" class="pddngbx">
				<h3>Vision</h3>
				<p>
					24/7 Global Nursing Solution and Consulting Services will be a top of mind choice for highly skilled, compassionate and conscientious healthcare providers delivering unparalleled quality care to facilities with diverse need in the tristate area.
				</p>
			</div>
		</div>
	</div>
	<div class="clearfix"></div><br />
	
	<div id="ourteam">
		<div class="ttl">
	      <h3>Our <span>TEAM</span></h3>
	      <div class="btmbrdr"><hr /></div>
	    </div>
	    <p class="intro_dtls">
	    	We would like to welcome you to our team! 24/7 Global Nursing Solution and Consulting Services LLC provides excellent opportunity for highly qualified and talented professionals to start or establish your career in healthcare. We'll provide all the training and resources you need  to start and grow your career. We offer competitive salaries and benefits to all our employees.
	    	<br /><br />
	    	We are a licensed and bonded Staffing Agency that offers a comprehensive listing of career opportunities for healthcare professionals. We specialize in creating matches between the professional and the different Nursing Facilities in New York.
	    	<br /><br /><br />
	    </p>
		<div class="no-gutter">
			<div class="col-lg-5">
				<!-- <div class="mrgn">
					<div class="brand">
				        <img src="img/logo.png" alt="Logo">
				        Global Nursing Solution &
				        <br /><span>Consulting Services LLC</span>
				    </div>
				</div> -->
				<div class="mrgn mmbrbx lhtrblu">
					<img src="img/ourteam/member1.jpg" alt="" class="tmmmbr">
					<div class="tminfo">
						<h2 style="font-size: 20px;">Andrea F. Jose, RN, BSN</h2>
						<h3>President/ Chief Executive Officer - Chairman of the Board</h3>
					</div>
				</div>
			</div>
			<div class="col-lg-7">
				<div class="no-gutter">
					<div class="col-lg-6">
						<div class="mrgn mmbrbx drkrblu">
							<img src="img/ourteam/member3.jpg" alt="" class="tmmmbr">
							<div class="tminfo">
								<h2>Annemelissa C. Icban, RN, BSN</h2>
								<h3>Executive Vice President - Finance, Board Secretary</h3>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="mrgn mmbrbx lhtrblu">
							<img src="img/ourteam/member4.jpg" alt="" class="tmmmbr">
							<div class="tminfo">
								<h2>Jocelyn Pineda- Festin, RN, BSN</h2>
								<h3>Executive Vice President - Staff and Risk Management</h3>
							</div>
						</div>
					</div>
					
					<div class="col-lg-6">
						<div class="mrgn mmbrbx lhtrblu">
							<img src="img/ourteam/member5.jpg" alt="" class="tmmmbr">
							<div class="tminfo">
								<h2>Rosita Oliquiano, RN, BSN</h2>
								<h3>Executive Vice President - Human Resource Management</h3>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="mrgn mmbrbx drkrblu">
							<img src="img/ourteam/member2.jpg" alt="" class="tmmmbr">
							<div class="tminfo">
								<h2>Romeo Marimat, PT</h2>
								<h3>Executive Vice President - Marketing Operations</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection