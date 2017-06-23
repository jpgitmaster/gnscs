@extends('pages_out.master')

@section('title', 'Careers')

@section('content')
<div ng-controller="ctrlCareers">
	<div class="ttl">
	  <h3>Careers</h3>
	  <div class="btmbrdr"><hr /></div>
	</div>
	<form ng-submit="usrApply(selection, files, usr, edcs, emps, chrs)" novalidate>
		<div class="no-gutter">
		    <div class="col-lg-10">
		        <div class="panel-group" id="accordion">
		          <div class="panel panel-default" ng-class="{'disabled': !form['position_applying']}">
		            <div class="panel-heading">
		              <div class="panel-title" ng-click="collapseTab(1)">
		                  <div class="glyph">
		                    <i class="fa fa-medkit"></i>
		                  </div>
		                  Position applying for
		                  <i class="fa fa-chevron-down"></i>
		              </div>
		            </div>
		            <div class="panel-collapse">
		              <div class="panel-body" ng-show="form['position_applying']" ng-cloak>
						<div class="no-gutter">
		                  <div class="col-lg-4" ng-repeat="jb in jbpositions" ng-if="jbpositions" ng-cloak>
		                    <div class="mrgn jb">
		                      <input type="checkbox" class="styled" id="b_<%= $index %>"
		                        name="selectedPositions[]" value="<%= jb.name %>" ng-model="jb.selected">
		                      <label class="styled" for="b_<%= $index %>"><%=jb.name%></label>
		                    </div>
		                  </div>
		                </div>
		                <div class="clearfix"></div>
		                
			            <div class="center pstnapply nptgrp" ng-class="{'err': msg['error']['slctn'][0]}">
			                <button type="submit" class="jpbtn">
			                	<i class="fa fa-hand-o-down"></i>
			                	Resume Attachment
			                </button>
			                <div class="am-flip-x response_msg" ng-if="msg['error']['slctn'][0]" ng-cloak>
	                          <div class="popover top">
	                            <div class="arrow"></div>
	                            <div class="popover-content">
	                              <%= msg['error']['slctn'][0] %>
	                              <span class="rmve" ng-click="msg['error']['slctn'][0] = ''">
	                                <i class="fa fa-close"></i>
	                              </span>
	                            </div>
	                          </div>
	                        </div>
			            </div>
			            <div class="loader" ng-if="loader1 == true" ng-cloak>
						    <svg width="132px" height="132px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-clock">
						      <rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="30" fill="#d6f1ff" stroke="#2b74ba" stroke-width="8px"></circle><line x1="50" y1="50" x2="50" y2="30" stroke="#000" stroke-width="5" stroke-linecap="round" transform="rotate(190.8 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="5s" repeatCount="indefinite"></animateTransform></line><line x1="50" y1="50" x2="50" y2="20" stroke="#f00" stroke-width="2px" stroke-linecap="round" opacity="1" transform="rotate(234 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"></animateTransform></line>
						    </svg>
						</div>
		              </div>
		            </div>
		          </div>
		          <div class="panel panel-default" ng-class="{'disabled': !form['resume_attachment']}">
		            <div class="panel-heading">
		              <div class="panel-title" ng-click="collapseTab(2)">
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

			              	<!-- <h3 class="resume_name" ng-if="resume_name">
			              		<%= resume_name %>
			              	</h3>
			              	<div class="nptgrp">
			                    <div class="fileUpload btn-gradient">
			                        Browse your resume here <input type="file" name="resume" id="resume" class="upload" file-input="files">
			                    </div>
			                </div> -->
			            </div>
			            <div>
			                <div class="center">
				                <button type="submit" class="jpbtn">
				                	<i class="fa fa-hand-o-down"></i>
				                	Personal Information
				                </button>
				            </div>
			            </div>
			            <div class="loader" ng-if="loader2 == true" ng-cloak>
						    <svg width="132px" height="132px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-clock">
						      <rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="30" fill="#d6f1ff" stroke="#2b74ba" stroke-width="8px"></circle><line x1="50" y1="50" x2="50" y2="30" stroke="#000" stroke-width="5" stroke-linecap="round" transform="rotate(190.8 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="5s" repeatCount="indefinite"></animateTransform></line><line x1="50" y1="50" x2="50" y2="20" stroke="#f00" stroke-width="2px" stroke-linecap="round" opacity="1" transform="rotate(234 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"></animateTransform></line>
						    </svg>
						</div>
		              </div>
		            </div>
		          </div>
		          
		          <div class="panel panel-default" ng-class="{'disabled': !form['personal_info']}">
		            <div class="panel-heading">
		              <div class="panel-title" ng-click="collapseTab(3)">
		                <div class="glyph">
		                  <i class="fa fa-address-book"></i>
		                </div>
		                Personal Information
		                <i class="fa fa-chevron-down"></i>
		              </div>
		            </div>
		            <div class="panel-collapse">
		              <div class="panel-body" ng-show="form['personal_info']" ng-cloak>
				      	<div class="no-gutter">
				      		<div class="col-lg-6">
				      			<div class="pddng nptgrp" ng-class="{'err': msg['error']['typofwork'][0]}">
				      				<label>Type of work: <span>*</span></label>
				      				<select class="form-control" ng-model="usr.typofwork" ng-focus="fcstypofwork = true" ng-blur="fcstypofwork = false" required>
			                          <option value=""></option>
			                          <option ng-repeat="wrk in typework" ng-value="wrk.id"><%=wrk.name%></option>
			                        </select>
				      				<div class="am-flip-x response_msg" ng-if="msg['error']['typofwork'][0] && fcstypofwork === true" ng-cloak>
			                          <div class="popover top">
			                            <div class="arrow"></div>
			                            <div class="popover-content">
			                              <%= msg['error']['typofwork'][0] %>
			                              <span class="rmve" ng-click="msg['error']['typofwork'][0] = ''">
			                                <i class="fa fa-close"></i>
			                              </span>
			                            </div>
			                          </div>
			                        </div>
				      			</div>
				      		</div>
				      		<div class="col-lg-6">
				      			<div class="pddng nptgrp" ng-class="{'err': msg['error']['avlforwrk'][0]}">
				      				<label>Availability for work: <span>*</span></label>
				      				<input type="text" name="avlforwrk" ng-model="usr.avlforwrk" class="form-control" uib-datepicker-popup="MM/dd/yyyy" readonly datepicker-options="MinDate" ng-click="open($event, 'date1', usr.avlforwrk)" is-open="is_open.date1" close-text="Close" ng-focus="fcsavlforwrk = true" ng-blur="fcsavlforwrk = false">
				      				<div class="am-flip-x response_msg" ng-if="msg['error']['avlforwrk'][0] && fcsavlforwrk === true" ng-cloak>
			                          <div class="popover top">
			                            <div class="arrow"></div>
			                            <div class="popover-content">
			                              <%= msg['error']['avlforwrk'][0] %>
			                              <span class="rmve" ng-click="msg['error']['avlforwrk'][0] = ''">
			                                <i class="fa fa-close"></i>
			                              </span>
			                            </div>
			                          </div>
			                        </div>
				      			</div>
				      		</div>
		              		<div class="col-lg-4">
		              			<div class="pddng nptgrp" ng-class="{'err': msg['error']['fname'][0]}">
		              				<label>First Name: <span>*</span></label>
		              				<input type="text" name="fname" ng-model="usr.fname" class="form-control" ng-focus="fcsfname = true" ng-blur="fcsfname = false" required>
		              				<div class="am-flip-x response_msg" ng-if="msg['error']['fname'][0] && fcsfname === true" ng-cloak>
			                          <div class="popover top">
			                            <div class="arrow"></div>
			                            <div class="popover-content">
			                              <%= msg['error']['fname'][0] %>
			                              <span class="rmve" ng-click="msg['error']['fname'][0] = ''">
			                                <i class="fa fa-close"></i>
			                              </span>
			                            </div>
			                          </div>
			                        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="pddng nptgrp" ng-class="{'err': msg['error']['mname'][0]}">
		              				<label>Middle Name: <span>*</span></label>
		              				<input type="text" name="mname" ng-model="usr.mname" class="form-control" ng-focus="fcsmname = true" ng-blur="fcsmname = false" required>
		              				<div class="am-flip-x response_msg" ng-if="msg['error']['mname'][0] && fcsmname === true" ng-cloak>
			                          <div class="popover top">
			                            <div class="arrow"></div>
			                            <div class="popover-content">
			                              <%= msg['error']['mname'][0] %>
			                              <span class="rmve" ng-click="msg['error']['mname'][0] = ''">
			                                <i class="fa fa-close"></i>
			                              </span>
			                            </div>
			                          </div>
			                        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="pddng nptgrp" ng-class="{'err': msg['error']['lname'][0]}">
		              				<label>Last Name: <span>*</span></label>
		              				<input type="text" name="lname" ng-model="usr.lname" class="form-control" ng-focus="fcslname = true" ng-blur="fcslname = false" required>
		              				<div class="am-flip-x response_msg" ng-if="msg['error']['lname'][0] && fcslname === true" ng-cloak>
			                          <div class="popover top">
			                            <div class="arrow"></div>
			                            <div class="popover-content">
			                              <%= msg['error']['lname'][0] %>
			                              <span class="rmve" ng-click="msg['error']['lname'][0] = ''">
			                                <i class="fa fa-close"></i>
			                              </span>
			                            </div>
			                          </div>
			                        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-12">
		              			<div class="pddng nptgrp" ng-class="{'err': msg['error']['address1'][0]}">
		              				<label>Present Address: <span>*</span></label>
		              				<input type="text" class="form-control" placeholder="Unit No., House / Bldg. / St. No. + Street Name, Postal Code" ng-model="usr.address1" ng-focus="fcsaddress1 = true" ng-blur="fcsaddress1 = false" required ng-change="makeSameAddress(check, usr.address1)">
		              				<div class="am-flip-x response_msg" ng-if="msg['error']['address1'][0] && fcsaddress1 === true" ng-cloak>
			                          <div class="popover top">
			                            <div class="arrow"></div>
			                            <div class="popover-content">
			                              <%= msg['error']['address1'][0] %>
			                              <span class="rmve" ng-click="msg['error']['address1'][0] = ''">
			                                <i class="fa fa-close"></i>
			                              </span>
			                            </div>
			                          </div>
			                        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-12">
		              			<div class="pddng nptgrp" ng-class="{'err': msg['error']['address2'][0]}">
		              				<label>Permanent Address:</label>
			                        <input type="text" class="form-control" placeholder="Unit No., House / Bldg. / St. No. + Street Name, Postal Code" ng-model="usr.address2" ng-disabled="check">
			                        <div class="am-flip-x response_msg" ng-if="msg['error']['address2'][0] && fcsaddress2 === true" ng-cloak>
			                          <div class="popover top">
			                            <div class="arrow"></div>
			                            <div class="popover-content">
			                              <%= msg['error']['address2'][0] %>
			                              <span class="rmve" ng-click="msg['error']['address2'][0] = ''">
			                                <i class="fa fa-close"></i>
			                              </span>
			                            </div>
			                          </div>
			                        </div>
			                        <div><input type="checkbox" ng-model="check" ng-change="makeSameAddress(check, usr.address1)"> <span class="lblbtm">Same as Present Address</span></div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="pddng nptgrp" ng-class="{'err': msg['error']['email'][0]}">
		              				<label>Email: <span>*</span></label>
		              				<input type="text" name="email" placeholder="user@example.com" ng-model="usr.email" class="form-control" ng-focus="fcsemail = true" ng-blur="fcsemail = false" required>
		              				<div class="am-flip-x response_msg" ng-if="msg['error']['email'][0] && fcsemail === true" ng-cloak>
			                          <div class="popover top">
			                            <div class="arrow"></div>
			                            <div class="popover-content">
			                              <%= msg['error']['email'][0] %>
			                              <span class="rmve" ng-click="msg['error']['email'][0] = ''">
			                                <i class="fa fa-close"></i>
			                              </span>
			                            </div>
			                          </div>
			                        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="pddng nptgrp" ng-class="{'err': msg['error']['mobile'][0]}">
		              				<label>Mobile No.: <span>*</span></label>
		              				<input type="text" class="form-control" ng-model="usr.mobile" ng-focus="fcsmobile = true" ng-blur="fcsmobile = false" ui-mask="+999-9999-999" ui-mask-placeholder ui-mask-placeholder-char="_" model-view-value="true" required>
		              				<div class="am-flip-x response_msg" ng-if="msg['error']['mobile'][0] && fcsmobile === true" ng-cloak>
			                          <div class="popover top">
			                            <div class="arrow"></div>
			                            <div class="popover-content">
			                              <%=msg['error']['mobile'][0]%>
			                              <span class="rmve" ng-click="msg['error']['mobile'][0] = ''">
			                                <i class="fa fa-close"></i>
			                              </span>
			                            </div>
			                          </div>
			                        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              			<div class="pddng nptgrp">
		              				<label>Phone No.:</label>
	                        		<input type="text" class="form-control" ng-model="usr.phone" ui-mask="(999) 999-9999" ui-mask-placeholder model-view-value="true" ui-mask-placeholder-char="_">
		              			</div>
		              		</div>
		              		<div class="col-lg-3">
		              			<div class="pddng nptgrp" ng-class="{'err': msg['error']['bday'][0]}">
		              				<label>Birthdate:<span>*</span></label>
		              				<input type="text" name="bday" ng-model="usr.bday" class="form-control" uib-datepicker-popup="MM/dd/yyyy" readonly datepicker-options="BirthDate" ng-click="open($event, 'date2', usr.bday)" is-open="is_open.date2" close-text="Close" ng-change="getAge(usr.bday)" show-button-bar="false"
		              				ng-focus="fcsbday = true" ng-blur="fcsbday = false">
									<input type="hidden" class="form-control" ng-model="usr.age">
		              				<div class="am-flip-x response_msg" ng-if="msg['error']['bday'][0] && fcsbday === true" ng-cloak>
			                          <div class="popover top">
			                            <div class="arrow"></div>
			                            <div class="popover-content">
			                              <%=msg['error']['bday'][0]%>
			                              <span class="rmve" ng-click="msg['error']['bday'][0] = ''">
			                                <i class="fa fa-close"></i>
			                              </span>
			                            </div>
			                          </div>
			                        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-3">
		              			<div class="pddng nptgrp" ng-class="{'err': msg['error']['bplace'][0]}">
		              				<label>Birthplace:<span>*</span></label>
		              				<input type="text" class="form-control" ng-model="usr.bplace" ng-focus="fcsbplace = true" ng-blur="fcsbplace = false" required>
		              				<div class="am-flip-x response_msg" ng-if="msg['error']['bplace'][0] && fcsbplace === true" ng-cloak>
			                          <div class="popover top">
			                            <div class="arrow"></div>
			                            <div class="popover-content">
			                              <%= msg['error']['bplace'][0] %>
			                              <span class="rmve" ng-click="msg['error']['bplace'][0] = ''">
			                                <i class="fa fa-close"></i>
			                              </span>
			                            </div>
			                          </div>
			                        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-4">
		              		</div>
		              		<div class="col-lg-3">
		              			<div class="pddng nptgrp" ng-class="{'err gndr': msg['error']['gender'][0]}">
		              				<label>Gender: <span>*</span></label>
		              				<div class="clearfix"></div>
		              				<div class="mlbx">
			                          <input type="radio" id="male" class="btnbx" ng-model="usr.gender" name="radios" value="2" required>
			                          <label for="male">Male</label>
			                        </div>
			                        <div class="fmlbx">
			                          <input type="radio" id="female" class="btnbx" ng-model="usr.gender" name="radios" value="1" required>
			                          <label for="female">Female</label>
			                        </div>
			                        <div class="am-flip-x response_msg" ng-if="msg['error']['gender'][0]" ng-cloak>
			                          <div class="popover top">
			                            <div class="arrow"></div>
			                            <div class="popover-content">
			                              <%=msg['error']['gender'][0]%>
			                              <span class="rmve" ng-click="msg['error']['gender'][0] = ''">
			                                <i class="fa fa-close"></i>
			                              </span>
			                            </div>
			                          </div>
			                        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-3">
		              			<div class="pddng nptgrp" ng-class="{'err': msg['error']['cstatus'][0]}">
		              				<label>Civil Status: <span>*</span></label>
		              				<select class="form-control" ng-model="usr.cstatus" ng-focus="fcscstatus = true" ng-blur="fcscstatus = false" required>
			                          <option value=""></option>
			                          <option ng-repeat="stat in cstatus" ng-value="stat.id"><%=stat.name%></option>
			                        </select>
			                        <div class="am-flip-x response_msg" ng-if="msg['error']['cstatus'][0] && fcscstatus === true" ng-cloak>
			                          <div class="popover top">
			                            <div class="arrow"></div>
			                            <div class="popover-content">
			                              <%=msg['error']['cstatus'][0]%>
			                              <span class="rmve" ng-click="msg['error']['cstatus'][0] = ''">
			                                <i class="fa fa-close"></i>
			                              </span>
			                            </div>
			                          </div>
			                        </div>
		              			</div>
		              		</div>
		              		<div class="col-lg-12">
		              			<div class="pddng nptgrp txtarea" ng-class="{'err': msg['error']['objectives'][0]}">
		              				<label>Career Objectives: <span>*</span></label>
		              				<textarea ng-model="usr.objectives" class="form-control" ng-focus="fcsobjectives = true" ng-blur="fcsobjectives = false" required cols="30" rows="4"></textarea>
		              				<div class="am-flip-x response_msg" ng-if="msg['error']['objectives'][0] && fcsobjectives === true" ng-cloak>
			                          <div class="popover top">
			                            <div class="arrow"></div>
			                            <div class="popover-content">
			                              <%=msg['error']['objectives'][0]%>
			                              <span class="rmve" ng-click="msg['error']['objectives'][0] = ''">
			                                <i class="fa fa-close"></i>
			                              </span>
			                            </div>
			                          </div>
			                        </div>
		              			</div>
		              		</div>
		              	</div>
		              	<div class="clearfix"></div>
		              	<div class="clearfix"></div>
						<div class="center">
			                <button type="submit" class="jpbtn">
			                	<i class="fa fa-hand-o-down"></i>
			                	Educational Background
			                </button>
			            </div>
				        <div class="loader" ng-if="loader3 == true" ng-cloak>
						    <svg width="132px" height="132px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-clock">
						      <rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="30" fill="#d6f1ff" stroke="#2b74ba" stroke-width="8px"></circle><line x1="50" y1="50" x2="50" y2="30" stroke="#000" stroke-width="5" stroke-linecap="round" transform="rotate(190.8 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="5s" repeatCount="indefinite"></animateTransform></line><line x1="50" y1="50" x2="50" y2="20" stroke="#f00" stroke-width="2px" stroke-linecap="round" opacity="1" transform="rotate(234 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"></animateTransform></line>
						    </svg>
						</div>
		              </div>
		            </div>
		          </div>
		          <div class="panel panel-default" ng-class="{'disabled': !form['educ_bg']}">
		            <div class="panel-heading">
		              <div class="panel-title" ng-click="collapseTab(4)">
		                <div class="glyph">
		                  <i class="fa fa-graduation-cap"></i>
		                </div>
		                Educational Background
		                <i class="fa fa-chevron-down"></i>
		              </div>
		            </div>
		            <div class="panel-collapse">
		              <div class="panel-body" ng-show="form['educ_bg']" ng-cloak>
		              	<button ng-click="addEdc(edc)" ng-disabled="edcs.length > 4" class="btn btngreen" type="button">
		                    Add More
		                </button>
						<div class="ibox am-fade" ng-repeat="edc in edcs | limitTo: 4">
							<h4>
			                    <%=edc.educ_type == 1 ? 'High School' : ''%>
			                    <%=edc.educ_type == 2 ? 'Collage' : ''%>
			                    <%=edc.educ_type == 3 ? 'Vocational' : ''%>
			                    <%=edc.educ_type == 4 ? 'Others' : ''%>
			                    <%=!edc.educ_type ? 'School' : ''%>
		                  	</h4>
		                  	<button ng-click="removeEdc(edc)" class="btncls" type="button" ng-disabled="edcs.length == 1">
		                    	<span class="fa fa-close"></span>
		                  	</button>
		                  	<div class="clearfix"></div>
							<div class="no-gutter">
								<div class="col-lg-4">
									<div class="nptgrp pddng" ng-class="{'err': msg['error']['edc'][$index]['educ_type'][0]}">
										<label>Type of Education: <span>*</span></label>
										<select class="form-control" ng-model="edc.educ_type" ng-focus="fcseduc_type = true" ng-blur="fcseduc_type = false" ng-change="edc.course = edc.educ_type == 1 ? '' : edc.course" required>
			                            <option value=""></option>
			                            <option ng-repeat="edctype in edctypes" ng-value="edctype.id"><%=edctype.name%></option>
			                          </select>
			                          <div class="am-flip-x response_msg" ng-if="msg['error']['edc'][$index]['educ_type'][0] && fcseduc_type === true" ng-cloak>
			                            <div class="popover top">
			                              <div class="arrow"></div>
			                              <div class="popover-content">
			                                <%= msg['error']['edc'][$index]['educ_type'][0] %>
			                                <span class="rmve" ng-click="msg['error']['edc'][$index]['educ_type'][0] = ''">
			                                  <i class="fa fa-close"></i>
			                                </span>
			                              </div>
			                            </div>
			                          </div>
									</div>
								</div>
								<div class="col-lg-8">
			              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['edc'][$index]['school'][0]}">
			              				<label>School Name: <span>*</span></label>
			              				<input type="text" name="school" ng-model="edc.school" class="form-control" ng-focus="fcsschool = true" ng-blur="fcsschool = false" required>
			              				<div class="am-flip-x response_msg" ng-if="msg['error']['edc'][$index]['school'][0] && fcsschool === true" ng-cloak>
				                          <div class="popover top">
				                            <div class="arrow"></div>
				                            <div class="popover-content">
				                              <%=msg['error']['edc'][$index]['school'][0]%>
				                              <span class="rmve" ng-click="msg['error']['edc'][$index]['school'][0] = ''">
				                                <i class="fa fa-close"></i>
				                              </span>
				                            </div>
				                          </div>
				                        </div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="no-gutter">
			              				<div class="col-lg-6">
		              						<div class="nptgrp pddng" ng-class="{'err': msg['error']['edc'][$index]['sdate'][0]}">
					              				<label>Start Date: <span>*</span></label>
					              				<input type="text" name="sdate" ng-model="edc.sdate" class="form-control" ng-focus="fcssdate = true" ng-blur="fcssdate = false" ng-click="open_calendar($event, $index, 'sdate')" is-open="sdate.open[$index]" show-button-bar="false" datepicker-options="MaxCurrentDate" uib-datepicker-popup="MM/dd/yyyy" readonly required>

					              				<div class="am-flip-x response_msg" ng-if="msg['error']['edc'][$index]['sdate'][0] && fcssdate === true" ng-cloak>
						                          <div class="popover top">
						                            <div class="arrow"></div>
						                            <div class="popover-content">
						                              <%=msg['error']['edc'][$index]['sdate'][0]%>
						                              <span class="rmve" ng-click="msg['error']['edc'][$index]['sdate'][0] = ''">
						                                <i class="fa fa-close"></i>
						                              </span>
						                            </div>
						                          </div>
						                        </div>
					              			</div>
			              				</div>
			              				<div class="col-lg-6">
			              					<div class="nptgrp pddng" ng-class="{'err': msg['error']['edc'][$index]['edate'][0]}">
					              				<label>End Date: <span>*</span></label>
					              				<input type="text" name="edate" ng-model="edc.edate" class="form-control" ng-focus="fcsedate = true" ng-blur="fcsedate = false" ng-click="open_calendar($event, $index, 'edate')" is-open="edate.open[$index]" datepicker-options="NoWeeks" show-button-bar="false" uib-datepicker-popup="MM/dd/yyyy" readonly required>
					              				<div class="am-flip-x response_msg" ng-if="msg['error']['edc'][$index]['edate'][0] && fcsedate === true" ng-cloak>
						                          <div class="popover top">
						                            <div class="arrow"></div>
						                            <div class="popover-content">
						                              <%=msg['error']['edc'][$index]['edate'][0]%>
						                              <span class="rmve" ng-click="msg['error']['edc'][$index]['edate'][0] = ''">
						                                <i class="fa fa-close"></i>
						                              </span>
						                            </div>
						                          </div>
						                        </div>
					              			</div>
			              				</div>
			              			</div>
			              		</div>
			              		<div class="col-lg-8">
			              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['edc'][$index]['course'][0]}">
			              				<label>Course: <span ng-if="edc.educ_type == 2">*</span></label>
			              				<input type="text" class="form-control" ng-class="{'get_educbg': edc.educ_type == 2}" ng-model="edc.course" ng-disabled="edc.educ_type == 1" ng-focus="fcscourse = true" ng-blur="fcscourse = false" required>
			              				<div class="am-flip-x response_msg" ng-if="msg['error']['edc'][$index]['course'][0] && fcscourse === true" ng-cloak>
				                          <div class="popover top">
				                            <div class="arrow"></div>
				                            <div class="popover-content">
				                              <%=msg['error']['edc'][$index]['course'][0]%>
				                              <span class="rmve" ng-click="msg['error']['edc'][$index]['course'][0] = ''">
				                                <i class="fa fa-close"></i>
				                              </span>
				                            </div>
				                          </div>
				                        </div>
			              			</div>
			              		</div>
			              		<div class="col-lg-12">
			              			<div class="nptgrp pddng txtarea" ng-class="{'err': msg['error']['edc'][$index]['awrdsnrcgntn'][0]}">
			              				<label style="float: none;">Awards and Recognition:</label>
			              				<summernote ng-model="edc.awrdsnrcgntn" config="summernote_options"></summernote>
			              				<div class="am-flip-x response_msg" ng-if="msg['error']['edc'][$index]['awrdsnrcgntn'][0]" ng-cloak>
				                          <div class="popover top">
				                            <div class="arrow"></div>
				                            <div class="popover-content">
				                              <%=msg['error']['edc'][$index]['awrdsnrcgntn'][0]%>
				                              <span class="rmve" ng-click="msg['error']['edc'][$index]['awrdsnrcgntn'][0] = ''">
				                                <i class="fa fa-close"></i>
				                              </span>
				                            </div>
				                          </div>
				                        </div>
			              			</div>
			              		</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="center">
			                <button type="submit" class="jpbtn">
			                	<i class="fa fa-hand-o-down"></i>
			                	Employment History
			                </button>
			            </div>
						<div class="loader" ng-if="loader4 == true" ng-cloak>
						    <svg width="132px" height="132px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-clock">
						      <rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="30" fill="#d6f1ff" stroke="#2b74ba" stroke-width="8px"></circle><line x1="50" y1="50" x2="50" y2="30" stroke="#000" stroke-width="5" stroke-linecap="round" transform="rotate(190.8 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="5s" repeatCount="indefinite"></animateTransform></line><line x1="50" y1="50" x2="50" y2="20" stroke="#f00" stroke-width="2px" stroke-linecap="round" opacity="1" transform="rotate(234 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"></animateTransform></line>
						    </svg>
						</div>
		              </div>
		            </div>
		          </div>
		          <div class="panel panel-default" ng-class="{'disabled': !form['emphistory']}">
		            <div class="panel-heading">
		              <div class="panel-title" ng-click="collapseTab(5)">
		                <div class="glyph">
		                  <i class="fa fa-stethoscope"></i>
		                </div>
		                Employment History
		                <i class="fa fa-chevron-down"></i>
		              </div>
		            </div>
		            <div class="panel-collapse">
		              <div class="panel-body" ng-show="form['emphistory']" ng-cloak>
		              	<div class="nptgrp pddng wrkxprnc" ng-class="{'err': msg['error']['workexperience'][0]}">
		              		<label>Work Experience: <span>*</span></label>
		              		<select ng-model="usr.workexperience" class="form-control" ng-change="removeEmperrors(usr.workexperience, emps.length)"
		                      ng-focus="fcsworkexperience = true" ng-blur="fcsworkexperience = false">
		                      <option ng-value=""></option>
		                      <option ng-value="1">No Work Experience</option>
		                      <option ng-value="2">1-3 Yrs. of Experience</option>
		                      <option ng-value="3">4-6 Yrs. of Experience</option>
		                      <option ng-value="4">7 yrs. and Above</option>
		                    </select>
		                    <div class="am-flip-x response_msg" ng-if="msg['error']['workexperience'][0] && fcsworkexperience === true" ng-cloak>
		                      <div class="popover top">
		                        <div class="arrow"></div>
		                        <div class="popover-content">
		                          <%=msg['error']['workexperience'][0]%>
		                          <span class="rmve" ng-click="msg['error']['workexperience'][0] = ''">
		                            <i class="fa fa-close"></i>
		                          </span>
		                        </div>
		                      </div>
		                    </div>
		              	</div>
		                <div ng-if="usr.workexperience && usr.workexperience != 1" ng-cloak>
		                	<button ng-click="addEmp(emp)" ng-disabled="emps.length > 4" class="btn btngreen" type="button">
		                    	Add More
		                	</button>
							<div class="ibox am-fade" ng-repeat="emp in emps | limitTo: 4">
								<button ng-click="removeEmp(emp)" class="btncls" type="button" ng-disabled="emps.length == 1">
			                    	<span class="fa fa-close"></span>
			                  	</button>
			                  	<div class="clearfix"></div><br>
								<div class="no-gutter">
									<div class="col-lg-8">
				              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['emp'][$index]['company'][0]}">
				              				<label>Employer Name: <span>*</span></label>
				              				<input type="text" name="company" ng-model="emp.company" class="form-control" ng-focus="fcscompany = true" ng-blur="fcscompany = false" ng-disabled="usr.workexperience == 1" required>
				              				<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['company'][0] && fcscompany === true" ng-cloak>
					                          <div class="popover top">
					                            <div class="arrow"></div>
					                            <div class="popover-content">
					                              <%=msg['error']['emp'][$index]['company'][0]%>
					                              <span class="rmve" ng-click="msg['error']['emp'][$index]['company'][0] = ''">
					                                <i class="fa fa-close"></i>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
				              			</div>
				              		</div>
				              		<div class="col-lg-4">
				              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['emp'][$index]['position'][0]}">
					              			<label>Position: <span>*</span></label>
					              			<input type="text" name="position" ng-model="emp.position" class="form-control" ng-focus="fcsposition = true" ng-blur="fcsposition = false" ng-disabled="usr.workexperience == 1" required>
				              				<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['position'][0] && fcsposition === true" ng-cloak>
					                          <div class="popover top">
					                            <div class="arrow"></div>
					                            <div class="popover-content">
					                              <%=msg['error']['emp'][$index]['position'][0]%>
					                              <span class="rmve" ng-click="msg['error']['emp'][$index]['position'][0] = ''">
					                                <i class="fa fa-close"></i>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
					                    </div>
				              		</div>
				              		<div class="col-lg-4">
				              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['emp'][$index]['salary'][0]}">
											<label>Salary Rate: <span>*</span></label>
											<div class="input-group">
												<span class="input-group-addon">
											        <select name="currency" ng-model="emp.currency" class="form-control" ng-disabled="usr.workexperience == 1" required ng-init="emp.currency='1'">
														<option ng-repeat="crncy in currencies" value="<%=crncy.id%>"><%=crncy.name%></option>
													</select>
											    </span>
												<input type="text" name="salary" ng-model="emp.salary" class="form-control" ng-focus="fcssalary = true" ng-blur="fcssalary = false" ng-disabled="usr.workexperience == 1" currency-input required>
											</div>
											<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['salary'][0] && fcssalary === true" ng-cloak>
											  	<div class="popover top">
												    <div class="arrow"></div>
												    <div class="popover-content">
												      <%=msg['error']['emp'][$index]['salary'][0]%>
												      <span class="rmve" ng-click="msg['error']['emp'][$index]['salary'][0] = ''">
												        <i class="fa fa-close"></i>
												      </span>
												    </div>
												</div>
											</div>
										</div>
				              		</div>
				              		<div class="col-lg-8">
				              			<div class="no-gutter">
				              				<div class="col-lg-6">
			              						<div class="nptgrp pddng" ng-class="{'err': msg['error']['emp'][$index]['empsdate'][0]}">
						              				<label>Start Date: <span>*</span></label>
						              				<input type="text" name="empsdate" ng-model="emp.empsdate" class="form-control" ng-focus="fcsempsdate = true" ng-blur="fcsempsdate = false" ng-click="open_calendar($event, $index, 'empsdate')" is-open="empsdate.open[$index]" show-button-bar="false" datepicker-options="MaxCurrentDate" uib-datepicker-popup="MM/dd/yyyy" ng-disabled="usr.workexperience == 1" readonly required>

						              				<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['empsdate'][0] && fcsempsdate === true" ng-cloak>
							                          <div class="popover top">
							                            <div class="arrow"></div>
							                            <div class="popover-content">
							                              <%=msg['error']['emp'][$index]['empsdate'][0]%>
							                              <span class="rmve" ng-click="msg['error']['emp'][$index]['empsdate'][0] = ''">
							                                <i class="fa fa-close"></i>
							                              </span>
							                            </div>
							                          </div>
							                        </div>
						              			</div>
				              				</div>
				              				<div class="col-lg-6">
				              					<div class="nptgrp pddng" ng-class="{'err': msg['error']['emp'][$index]['empedate'][0]}">
						              				<label>End Date: <span>*</span></label>
						              				<input type="text" name="empedate" ng-model="emp.empedate" class="form-control" ng-focus="fcsempedate = true" ng-blur="fcsempedate = false" ng-click="open_calendar($event, $index, 'empedate')" is-open="empedate.open[$index]" datepicker-options="NoWeeks" show-button-bar="false" uib-datepicker-popup="MM/dd/yyyy" readonly ng-disabled="emp.ispresent || usr.workexperience == 1" required>
						              				<div class="ispresentemp">
					                                  <input type="checkbox" ng-model="emp.ispresent"
					                                     ng-change="clearEndate($index, emp.ispresent)" ng-disabled="checked == 1 && !emp.ispresent || usr.workexperience == 1">
					                                  <span style="font-size: 10px; font-weight: bold; text-transform: uppercase; position: relative; top: -3px;">Present Employer</span>
					                                </div>
						              				<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['empedate'][0] && fcsempedate === true" ng-cloak>
							                          <div class="popover top">
							                            <div class="arrow"></div>
							                            <div class="popover-content">
							                              <%=msg['error']['emp'][$index]['empedate'][0]%>
							                              <span class="rmve" ng-click="msg['error']['emp'][$index]['empedate'][0] = ''">
							                                <i class="fa fa-close"></i>
							                              </span>
							                            </div>
							                          </div>
							                        </div>
						              			</div>
				              				</div>
				              			</div>
				              		</div>
				              		
				              		<div class="col-lg-8">
				              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['emp'][$index]['supname'][0]}">
				              				<label>Supervisor's Name: <span>*</span></label>
				              				<input type="text" name="supname" ng-model="emp.supname" class="form-control" ng-focus="fcssupname = true" ng-blur="fcssupname = false" ng-disabled="usr.workexperience == 1" required>
				              				<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['supname'][0] && fcssupname === true" ng-cloak>
					                          <div class="popover top">
					                            <div class="arrow"></div>
					                            <div class="popover-content">
					                              <%=msg['error']['emp'][$index]['supname'][0]%>
					                              <span class="rmve" ng-click="msg['error']['emp'][$index]['supname'][0] = ''">
					                                <i class="fa fa-close"></i>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
				              			</div>
				              		</div>
				              		<div class="col-lg-4">
				              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['emp'][$index]['canwecontact'][0]}">
				              				<label>Can we contact him/her? <span>*</span></label>
				              				<select ng-model="emp.canwecontact" class="form-control" ng-focus="fcscanwecontact = true" ng-blur="fcscanwecontact = false" ng-disabled="usr.workexperience == 1" required>
				                              <option value=""></option>
				                              <option value="1">No</option>
				                              <option value="2">Yes</option>
				                            </select>
				              				<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['canwecontact'][0] && fcscanwecontact === true" ng-cloak>
					                          <div class="popover top">
					                            <div class="arrow"></div>
					                            <div class="popover-content">
					                              <%=msg['error']['emp'][$index]['canwecontact'][0]%>
					                              <span class="rmve" ng-click="msg['error']['emp'][$index]['canwecontact'][0] = ''">
					                                <i class="fa fa-close"></i>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
				              			</div>
				              		</div>
				              		<div class="col-lg-4" ng-if="emp.canwecontact == 2" ng-cloak>
				              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['emp'][$index]['contctby'][0]}">
				              				<label>Contact By: <span>*</span></label>
				              				<select class="form-control" ng-model="emp.contctby" ng-focus="fcscontctby = true" ng-blur="fcscontctby = false" ng-disabled="usr.workexperience == 1" required>
				              					<option value=""></option>
					                            <option ng-repeat="cntctby in cntctbys" ng-value="cntctby.id"><%=cntctby.name%></option>
					                        </select>
					                        <div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['contctby'][0] && fcscontctby === true" ng-cloak>
					                          <div class="popover top">
					                            <div class="arrow"></div>
					                            <div class="popover-content">
					                              <%= msg['error']['emp'][$index]['contctby'][0] %>
					                              <span class="rmve" ng-click="msg['error']['emp'][$index]['contctby'][0] = ''">
					                                <i class="fa fa-close"></i>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
				              			</div>
				              		</div>
				              		<div class="col-lg-8" ng-if="emp.canwecontact == 2" ng-cloak>
				              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['emp'][$index]['empemail'][0] || msg['error']['emp'][$index]['empphone'][0] || msg['error']['emp'][$index]['empmobile'][0] || msg['error']['emp'][$index]['empskype'][0] || msg['error']['emp'][$index]['empviber'][0] || msg['error']['emp'][$index]['empym'][0]}">
				              				<label><%=get_selection(cntctbys, emp.contctby)%> <span>*</span></label>
				              				<span ng-if="emp.contctby == 1 || !emp.contctby">
				              					<input type="text" name="empemail" placeholder="user@example.com" ng-model="emp.empemail" class="form-control" ng-focus="fcsempemail = true" ng-blur="fcsempemail = false" ng-disabled="usr.workexperience == 1" required>
					              				<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['empemail'][0] && fcsempemail === true" ng-cloak>
						                          <div class="popover top">
						                            <div class="arrow"></div>
						                            <div class="popover-content">
						                              <%= msg['error']['emp'][$index]['empemail'][0] %>
						                              <span class="rmve" ng-click="msg['error']['emp'][$index]['empemail'][0] = ''">
						                                <i class="fa fa-close"></i>
						                              </span>
						                            </div>
						                          </div>
						                        </div>
				              				</span>
				              				<span ng-if="emp.contctby == 2">
				              					<input type="text" class="form-control" ng-model="emp.empphone" ui-mask="(999) 999-9999" ui-mask-placeholder ui-mask-placeholder-char="_" ng-focus="fcsempphone = true" ng-blur="fcsempphone = false" model-view-value="true" ng-disabled="usr.workexperience == 1" required>
				              					<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['empphone'][0] && fcsempphone === true" ng-cloak>
						                          <div class="popover top">
						                            <div class="arrow"></div>
						                            <div class="popover-content">
						                              <%= msg['error']['emp'][$index]['empphone'][0] %>
						                              <span class="rmve" ng-click="msg['error']['emp'][$index]['empphone'][0] = ''">
						                                <i class="fa fa-close"></i>
						                              </span>
						                            </div>
						                          </div>
						                        </div>
				              				</span>
				              				<span ng-if="emp.contctby == 3">
												<input type="text" class="form-control" ng-model="emp.empmobile" ui-mask="+999-9999-999" ui-mask-placeholder ui-mask-placeholder-char="_" ng-focus="fcsempmobile = true" ng-blur="fcsempmobile = false" model-view-value="true" ng-disabled="usr.workexperience == 1" required>
												<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['empmobile'][0] && fcsempmobile === true" ng-cloak>
						                          <div class="popover top">
						                            <div class="arrow"></div>
						                            <div class="popover-content">
						                              <%= msg['error']['emp'][$index]['empmobile'][0] %>
						                              <span class="rmve" ng-click="msg['error']['emp'][$index]['empmobile'][0] = ''">
						                                <i class="fa fa-close"></i>
						                              </span>
						                            </div>
						                          </div>
						                        </div>
				              				</span>
				              				<span ng-if="emp.contctby == 4">
												<input type="text" class="form-control" ng-model="emp.empskype" ng-focus="fcsempskype = true" ng-blur="fcsempskype = false" ng-disabled="usr.workexperience == 1" required>
												<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['empskype'][0] && fcsempskype === true" ng-cloak>
						                          <div class="popover top">
						                            <div class="arrow"></div>
						                            <div class="popover-content">
						                              <%= msg['error']['emp'][$index]['empskype'][0] %>
						                              <span class="rmve" ng-click="msg['error']['emp'][$index]['empskype'][0] = ''">
						                                <i class="fa fa-close"></i>
						                              </span>
						                            </div>
						                          </div>
						                        </div>
				              				</span>
				              				<span ng-if="emp.contctby == 5">
												<input type="text" class="form-control" ng-model="emp.empviber" ng-focus="fcsempviber = true" ng-blur="fcsempviber = false" ng-disabled="usr.workexperience == 1" required>
												<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['empviber'][0] && fcsempviber === true" ng-cloak>
						                          <div class="popover top">
						                            <div class="arrow"></div>
						                            <div class="popover-content">
						                              <%= msg['error']['emp'][$index]['empviber'][0] %>
						                              <span class="rmve" ng-click="msg['error']['emp'][$index]['empviber'][0] = ''">
						                                <i class="fa fa-close"></i>
						                              </span>
						                            </div>
						                          </div>
						                        </div>
				              				</span>
				              				<span ng-if="emp.contctby == 6">
												<input type="text" class="form-control" ng-model="emp.empym" ng-focus="fcsempym = true" ng-blur="fcsempym = false" ng-disabled="usr.workexperience == 1" required>
												<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['empym'][0] && fcsempym === true" ng-cloak>
						                          <div class="popover top">
						                            <div class="arrow"></div>
						                            <div class="popover-content">
						                              <%= msg['error']['emp'][$index]['empym'][0] %>
						                              <span class="rmve" ng-click="msg['error']['emp'][$index]['empym'][0] = ''">
						                                <i class="fa fa-close"></i>
						                              </span>
						                            </div>
						                          </div>
						                        </div>
				              				</span>
				              			</div>
				              		</div>
				              		
				              		<div class="col-lg-6">
				              			<div class="nptgrp pddng txtarea" ng-class="{'err': msg['error']['emp'][$index]['jbdscrptn'][0]}">
				              				<label style="float: none;">Job Description: <span>*</span></label>
				              				<summernote ng-model="emp.jbdscrptn" config="summernote_options"></summernote>
				              				<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['jbdscrptn'][0]" ng-cloak>
					                          <div class="popover top">
					                            <div class="arrow"></div>
					                            <div class="popover-content">
					                              <%=msg['error']['emp'][$index]['jbdscrptn'][0]%>
					                              <span class="rmve" ng-click="msg['error']['emp'][$index]['jbdscrptn'][0] = ''">
					                                <i class="fa fa-close"></i>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
				              			</div>
				              		</div>
				              		<div class="col-lg-6">
				              			<div class="nptgrp pddng txtarea" ng-class="{'err': msg['error']['emp'][$index]['rsnfrlvng'][0]}">
				              				<label style="float: none;">Reason for Leaving: <span>*</span></label>
				              				<summernote ng-model="emp.rsnfrlvng" config="summernote_options" placeholder="Please indicate your reason(s) why you need to leave in this company..."></summernote>
				              				<div class="am-flip-x response_msg" ng-if="msg['error']['emp'][$index]['rsnfrlvng'][0]" ng-cloak>
					                          <div class="popover top">
					                            <div class="arrow"></div>
					                            <div class="popover-content">
					                              <%=msg['error']['emp'][$index]['rsnfrlvng'][0]%>
					                              <span class="rmve" ng-click="msg['error']['emp'][$index]['rsnfrlvng'][0] = ''">
					                                <i class="fa fa-close"></i>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
				              			</div>
				              		</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="center">
			                <button type="submit" class="jpbtn">
			                	<i class="fa fa-hand-o-down"></i>
			                	Character Reference
			                </button>
			            </div>
						<div class="loader" ng-if="loader5 == true" ng-cloak>
						    <svg width="132px" height="132px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-clock">
						      <rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="30" fill="#d6f1ff" stroke="#2b74ba" stroke-width="8px"></circle><line x1="50" y1="50" x2="50" y2="30" stroke="#000" stroke-width="5" stroke-linecap="round" transform="rotate(190.8 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="5s" repeatCount="indefinite"></animateTransform></line><line x1="50" y1="50" x2="50" y2="20" stroke="#f00" stroke-width="2px" stroke-linecap="round" opacity="1" transform="rotate(234 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"></animateTransform></line>
						    </svg>
						</div>
		              </div>
		            </div>
		          </div>
		          <div class="panel panel-default" ng-class="{'disabled': !form['char_reference']}">
		            <div class="panel-heading">
		              <div class="panel-title" ng-click="collapseTab(6)">
		                <div class="glyph">
		                  <i class="fa fa-users"></i>
		                </div>
		                Character Reference
		                <i class="fa fa-chevron-down"></i>
		              </div>
		            </div>
		            <div class="panel-collapse">
		              <div class="panel-body" ng-show="form['char_reference']" ng-cloak>
		              	<button ng-click="addChr(chr)" ng-disabled="chrs.length > 3" class="btn btngreen" type="button">
		                    Add More
		                </button>
		                <div class="ibox am-fade" ng-repeat="chr in chrs | limitTo: 4">
							<button ng-click="removeChr(chr)" class="btncls" type="button" ng-disabled="chrs.length == 1">
		                    	<span class="fa fa-close"></span>
		                  	</button>
		                  	<div class="clearfix"></div><br>
			              	<div class="no-gutter">
			              		<div class="col-lg-8">
			              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['chr'][$index]['chrname'][0]}">
			              				<label>Name: <span>*</span></label>
			              				<input type="text" name="chrname" ng-model="chr.chrname" class="form-control" ng-focus="fcschrname = true" ng-blur="fcschrname = false" required>
			              				<div class="am-flip-x response_msg" ng-if="msg['error']['chr'][$index]['chrname'][0] && fcschrname === true" ng-cloak>
				                          <div class="popover top">
				                            <div class="arrow"></div>
				                            <div class="popover-content">
				                              <%=msg['error']['chr'][$index]['chrname'][0]%>
				                              <span class="rmve" ng-click="msg['error']['chr'][$index]['chrname'][0] = ''">
				                                <i class="fa fa-close"></i>
				                              </span>
				                            </div>
				                          </div>
				                        </div>
			              			</div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['chr'][$index]['chrrelation'][0]}">
			              				<label>Relation at Work: <span>*</span></label>
			              				<input type="text" name="chrrelation" ng-model="chr.chrrelation" class="form-control" ng-focus="fcschrrelation = true" ng-blur="fcschrrelation = false" required>
			              				<div class="am-flip-x response_msg" ng-if="msg['error']['chr'][$index]['chrrelation'][0] && fcschrrelation === true" ng-cloak>
				                          <div class="popover top">
				                            <div class="arrow"></div>
				                            <div class="popover-content">
				                              <%=msg['error']['chr'][$index]['chrrelation'][0]%>
				                              <span class="rmve" ng-click="msg['error']['chr'][$index]['chrrelation'][0] = ''">
				                                <i class="fa fa-close"></i>
				                              </span>
				                            </div>
				                          </div>
				                        </div>
			              			</div>
			              		</div>
			              		<div class="col-lg-6">
			              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['chr'][$index]['chremployer'][0]}">
			              				<label>Employer: <span>*</span></label>
			              				<input type="text" name="chremployer" ng-model="chr.chremployer" class="form-control" ng-focus="fcschremployer = true" ng-blur="fcschremployer = false" required>
			              				<div class="am-flip-x response_msg" ng-if="msg['error']['chr'][$index]['chremployer'][0] && fcschremployer === true" ng-cloak>
				                          <div class="popover top">
				                            <div class="arrow"></div>
				                            <div class="popover-content">
				                              <%=msg['error']['chr'][$index]['chremployer'][0]%>
				                              <span class="rmve" ng-click="msg['error']['chr'][$index]['chremployer'][0] = ''">
				                                <i class="fa fa-close"></i>
				                              </span>
				                            </div>
				                          </div>
				                        </div>
			              			</div>
			              		</div>
			              		<div class="col-lg-6">
			              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['chr'][$index]['chrposition'][0]}">
				              			<label>Position: <span>*</span></label>
				              			<input type="text" name="chrposition" ng-model="chr.chrposition" class="form-control" ng-focus="fcschrposition = true" ng-blur="fcschrposition = false" required>
			              				<div class="am-flip-x response_msg" ng-if="msg['error']['chr'][$index]['chrposition'][0] && fcschrposition === true" ng-cloak>
				                          <div class="popover top">
				                            <div class="arrow"></div>
				                            <div class="popover-content">
				                              <%=msg['error']['chr'][$index]['chrposition'][0]%>
				                              <span class="rmve" ng-click="msg['error']['chr'][$index]['chrposition'][0] = ''">
				                                <i class="fa fa-close"></i>
				                              </span>
				                            </div>
				                          </div>
				                        </div>
				                    </div>
			              		</div>
			              		<div class="col-lg-4">
			              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['chr'][$index]['contctby'][0]}">
			              				<label>Contact By: <span>*</span></label>
			              				<select class="form-control" ng-model="chr.contctby" ng-focus="fcscontctby = true" ng-blur="fcscontctby = false" required>
			              					<option value=""></option>
				                            <option ng-repeat="cntctby in cntctbys" ng-value="cntctby.id"><%=cntctby.name%></option>
				                        </select>
				                        <div class="am-flip-x response_msg" ng-if="msg['error']['chr'][$index]['contctby'][0] && fcscontctby === true" ng-cloak>
				                          <div class="popover top">
				                            <div class="arrow"></div>
				                            <div class="popover-content">
				                              <%= msg['error']['chr'][$index]['contctby'][0] %>
				                              <span class="rmve" ng-click="msg['error']['chr'][$index]['contctby'][0] = ''">
				                                <i class="fa fa-close"></i>
				                              </span>
				                            </div>
				                          </div>
				                        </div>
			              			</div>
			              		</div>
			              		<div class="col-lg-8">
			              			<div class="nptgrp pddng" ng-class="{'err': msg['error']['chr'][$index]['chremail'][0] || msg['error']['chr'][$index]['chrphone'][0] || msg['error']['chr'][$index]['chrmobile'][0] || msg['error']['chr'][$index]['chrskype'][0] || msg['error']['chr'][$index]['chrviber'][0] || msg['error']['chr'][$index]['chrym'][0]}">
			              				<label><%=get_selection(cntctbys, chr.contctby)%> <span>*</span></label>
			              				<span ng-if="chr.contctby == 1 || !chr.contctby">
			              					<input type="text" name="chremail" placeholder="user@example.com" ng-model="chr.chremail" class="form-control" ng-focus="fcschremail = true" ng-blur="fcschremail = false" required>
				              				<div class="am-flip-x response_msg" ng-if="msg['error']['chr'][$index]['chremail'][0] && fcschremail === true" ng-cloak>
					                          <div class="popover top">
					                            <div class="arrow"></div>
					                            <div class="popover-content">
					                              <%= msg['error']['chr'][$index]['chremail'][0] %>
					                              <span class="rmve" ng-click="msg['error']['chr'][$index]['chremail'][0] = ''">
					                                <i class="fa fa-close"></i>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
			              				</span>
			              				<span ng-if="chr.contctby == 2">
			              					<input type="text" class="form-control" ng-model="chr.chrphone" ui-mask="(999) 999-9999" ui-mask-placeholder ui-mask-placeholder-char="_" ng-focus="fcschrphone = true" ng-blur="fcschrphone = false" model-view-value="true" required>
			              					<div class="am-flip-x response_msg" ng-if="msg['error']['chr'][$index]['chrphone'][0] && fcschrphone === true" ng-cloak>
					                          <div class="popover top">
					                            <div class="arrow"></div>
					                            <div class="popover-content">
					                              <%= msg['error']['chr'][$index]['chrphone'][0] %>
					                              <span class="rmve" ng-click="msg['error']['chr'][$index]['chrphone'][0] = ''">
					                                <i class="fa fa-close"></i>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
			              				</span>
			              				<span ng-if="chr.contctby == 3">
											<input type="text" class="form-control" ng-model="chr.chrmobile" ui-mask="+999-9999-999" ui-mask-placeholder ui-mask-placeholder-char="_" ng-focus="fcschrmobile = true" ng-blur="fcschrmobile = false" model-view-value="true" required>
											<div class="am-flip-x response_msg" ng-if="msg['error']['chr'][$index]['chrmobile'][0] && fcschrmobile === true" ng-cloak>
					                          <div class="popover top">
					                            <div class="arrow"></div>
					                            <div class="popover-content">
					                              <%= msg['error']['chr'][$index]['chrmobile'][0] %>
					                              <span class="rmve" ng-click="msg['error']['chr'][$index]['chrmobile'][0] = ''">
					                                <i class="fa fa-close"></i>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
			              				</span>
			              				<span ng-if="chr.contctby == 4">
											<input type="text" class="form-control" ng-model="chr.chrskype" ng-focus="fcschrskype = true" ng-blur="fcschrskype = false" required>
											<div class="am-flip-x response_msg" ng-if="msg['error']['chr'][$index]['chrskype'][0] && fcschrskype === true" ng-cloak>
					                          <div class="popover top">
					                            <div class="arrow"></div>
					                            <div class="popover-content">
					                              <%= msg['error']['chr'][$index]['chrskype'][0] %>
					                              <span class="rmve" ng-click="msg['error']['chr'][$index]['chrskype'][0] = ''">
					                                <i class="fa fa-close"></i>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
			              				</span>
			              				<span ng-if="chr.contctby == 5">
											<input type="text" class="form-control" ng-model="chr.chrviber" ng-focus="fcschrviber = true" ng-blur="fcschrviber = false" required>
											<div class="am-flip-x response_msg" ng-if="msg['error']['chr'][$index]['chrviber'][0] && fcschrviber === true" ng-cloak>
					                          <div class="popover top">
					                            <div class="arrow"></div>
					                            <div class="popover-content">
					                              <%= msg['error']['chr'][$index]['chrviber'][0] %>
					                              <span class="rmve" ng-click="msg['error']['chr'][$index]['chrviber'][0] = ''">
					                                <i class="fa fa-close"></i>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
			              				</span>
			              				<span ng-if="chr.contctby == 6">
											<input type="text" class="form-control" ng-model="chr.chrym" ng-focus="fcschrym = true" ng-blur="fcschrym = false" required>
											<div class="am-flip-x response_msg" ng-if="msg['error']['chr'][$index]['chrym'][0] && fcschrym === true" ng-cloak>
					                          <div class="popover top">
					                            <div class="arrow"></div>
					                            <div class="popover-content">
					                              <%= msg['error']['chr'][$index]['chrym'][0] %>
					                              <span class="rmve" ng-click="msg['error']['chr'][$index]['chrym'][0] = ''">
					                                <i class="fa fa-close"></i>
					                              </span>
					                            </div>
					                          </div>
					                        </div>
			              				</span>
			              			</div>
			              		</div>
			              	</div>
			            </div>
			            <div class="clearfix"></div>
			            <div class="ibox" style="padding-bottom: 10px;">
			            	<p>
			            		<section title=".squaredTwo">
								    <!-- .squaredTwo -->
								    <div class="squaredTwo nptgrp">
								      <input type="checkbox" id="squaredTwo" name="check" ng-model="usr.dclrechckbx" />
								      <label for="squaredTwo"></label>
								      	<div class="am-flip-x response_msg" ng-if="msg['error']['dclrechckbx'][0]" ng-cloak style="width: 250px; left: -5px; bottom: 30px;">
				                          <div class="popover top">
				                            <div class="arrow" style="left: 20px;"></div>
				                            <div class="popover-content">
				                              <%= msg['error']['dclrechckbx'][0] %>
				                              <span class="rmve" ng-click="msg['error']['dclrechckbx'][0] = ''">
				                                <i class="fa fa-close"></i>
				                              </span>
				                            </div>
				                          </div>
				                        </div>
								    </div>
								    <!-- end .squaredTwo -->
								</section>
					          I hereby declare that all the facts set forth in my application for employment are accurate and complete. I recognize that, if hired, any false statement on this application shall be sufficient cause for the termination of my employment.
					        </p>
			            </div>
			            <div class="clearfix"></div>
			            <hr style="margin-bottom: 5px;">
			            <div class="center">
			                <button type="submit" class="jpbtn">
			                	<i class="fa fa-hand-o-down"></i>
			                	Click and apply!
			                </button>
			            </div>
			            <div class="loader" ng-if="loader6 == true" ng-cloak>
						    <svg width="132px" height="132px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-clock">
						      <rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><circle cx="50" cy="50" r="30" fill="#d6f1ff" stroke="#2b74ba" stroke-width="8px"></circle><line x1="50" y1="50" x2="50" y2="30" stroke="#000" stroke-width="5" stroke-linecap="round" transform="rotate(190.8 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="5s" repeatCount="indefinite"></animateTransform></line><line x1="50" y1="50" x2="50" y2="20" stroke="#f00" stroke-width="2px" stroke-linecap="round" opacity="1" transform="rotate(234 50 50)"><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="1s" repeatCount="indefinite"></animateTransform></line>
						    </svg>
						</div>
		              </div>
		            </div>
		          </div>
		        </div>
		        
		        <br><br><br>
		    </div>
		    <div class="col-lg-2">
				<div class="preview" ng-click="viewResume(usr)">
					<div class="prvimg">
						<div class="prvbg">
							<h2>PREVIEW</h2>
						</div>
						<img src="{{asset('img/preview.jpg')}}" alt="">
					</div>
				</div>
		    </div>
		</div>

		<div class="modal" id="completeMdl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">
		        	Congrats <%=usr.fname%>, you are now successfully applied!
		        </h4>
		      </div>
		      <div class="modal-body">
		      	Thank you for your interest in joining 24/7 Global Nursing Solution & Consulting Services LLC. We appreciate the time you've taken to apply for the position<span ng-if="slctjbs.length > 1">s</span> of <span ng-repeat="gtjb in slctjbs"><%=get_selection(jbpositions, gtjb)%><span ng-if="slctjbs.length > 1 && (slctjbs.length - 1) != $index">,</span> </span>

		      	<br><br>
		      	Kindly check your e-mail regularly for any correspondence regarding your application.
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
	</form>
	<div ng-include src="'/careers/resume_tpl'"></div>
</div>
@endsection