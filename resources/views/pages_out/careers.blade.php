@extends('pages_out.master')

@section('title', 'Careers')

@section('content')
<div ng-controller="ctrlCareers">
	<div class="ttl">
	  <h3>Careers</h3>
	  <div class="btmbrdr"><hr /></div>
	</div>
	<form ng-submit="usrApply(files, usr, edcs, emps, chrs)" novalidate>
		<div class="no-gutter">
		    <div class="col-lg-10">
		        <div class="panel-group" id="accordion">
		          	<div class="panel panel-default" ng-class="{'disabled': !form['resume_attachment']}">
			            <div class="panel-heading">
			              <div class="panel-title" ng-click="collapseTab(1)">
			                  <div class="glyph">
			                    <i class="fa fa-address-card"></i>
			                  </div>
			                  Attach your resume
			                  <i class="fa fa-chevron-down"></i>
			              </div>
			            </div>
			            <div class="panel-collapse">
			              <div class="panel-body" ng-show="form['resume_attachment']" ng-cloak>
							<div class="center">
								<div class="clearfix"></div><br />
								<div class="input-group rsmbtn">
					                <label class="input-group-btn">
					                    <span class="btn btn-primary">
					                        Browse File <input type="file" name="resume" id="resume" class="upload" file-input="files">
					                    </span>
					                </label>
					                <div class="nptgrp" ng-class="{'err': msg['error']['file'][0]}">
						                <input type="text" class="form-control" value="<%= resume_name %>" readonly>
						                <div class="am-flip-x response_msg" ng-if="msg['error']['file'][0]" ng-cloak>
				                          <div class="popover top">
				                            <div class="arrow"></div>
				                            <div class="popover-content">
				                              <%= msg['error']['file'][0] %>
				                              <span class="rmve" ng-click="msg['error']['file'][0] = ''">
				                                <i class="fa fa-close"></i>
				                              </span>
				                            </div>
				                          </div>
				                        </div>
				                    </div>
					            </div>
				            </div>
				            <div>
				                <div class="center">
					                <button type="submit" class="jpbtn">
					                	<i class="fa fa-hand-o-down"></i>
					                	<span style="position: relative; z-index: 9;">
					                		NEXT: Personal Information
					                	</span>
					                </button>
					            </div>
				            </div>
			              </div>
			            </div>
		          	</div>
		          	<div class="panel panel-default" ng-class="{'disabled': !form['personal_info']}">
			            <div class="panel-heading">
			              <div class="panel-title" ng-click="collapseTab(2)">
			                <div class="glyph">
			                  <i class="fa fa-address-book"></i>
			                </div>
			                Personal Information
			                <i class="fa fa-chevron-down"></i>
			              </div>
			            </div>
			            <div class="panel-collapse">
			            	<div class="panel-body" ng-show="form['personal_info']" ng-cloak>
			            	</div>
			            </div>
			        </div>

		        </div>
		        
		        <br><br><br>
		    </div>
		    <div class="col-lg-2">

		    </div>
		</div>
	</form>
</div>
@endsection