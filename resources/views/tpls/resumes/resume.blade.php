<div class="modal" id="resume_tpl" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<div class="tpactns">
    		<div class="applyng">
	    		<strong>Applying for:</strong>
	    		<p>
	    			<span ng-repeat="gtjb in slctjbs"><%=get_selection(jbpositions, gtjb)%><span ng-if="slctjbs.length > 1 && (slctjbs.length - 1) != $index">,</span> </span>
	    		</p>
	    	</div>
	    	<div ng-if="usr.resume_name" ng-cloak>
	    		<a href="/<%=usr.folder%>/<%=usr.resume_name%>.<%=usr.extension%>" class="btn btn-success" target="_blank">
		    		Uploaded Resume
		    	</a>
	    	</div>
    	</div>
    	<div class="clearfix"></div>
		<div id="resume_wrpr">
			<div id="rsm_hdr">
				<div class="rsmrght"></div>
	            <div class="rsmlft">
					<div class="center">
						<h2 class="whlname" ng-if="usr.fname && usr.mname && usr.lname">
							<%=usr.fname%> <%=usr.mname%> <%=usr.lname%>
						</h2>
						<div class="bglghtblu sml" ng-if="!usr.fname || !usr.mname || !usr.lname"></div>
						
						<span class="desc" ng-if="usr.objectives">
							<div ng-bind-html="usr.objectives"></div>
						</span>
						<div class="bglghtblu lrg" ng-if="!usr.objectives"></div>
					</div>
				</div>
			</div>
			<div id="rsm_cntnt">
		        <div class="rsmlft">
		        	<div class="rsmttl">Contact</div>
		        	<ul class="infos frst">
		        		<li class="info" ng-if="usr.email">
		        			<i class="fa fa-envelope"></i>
		        			<div class="txt"><a href="mailto:<%=usr.email%>" class="hrflnk"><%=usr.email%></a></div>
		        		</li>
		        		<div class="bglghtblu sml" ng-if="!usr.email"></div>
		        		<li class="info" ng-if="usr.phone">
		        			<i class="fa fa-phone"></i>
		        			<div class="txt"><%=usr.phone%></div>
		        		</li>
		        		<div class="bglghtblu sml" ng-if="!usr.phone"></div>
		        		<li class="info" ng-if="usr.mobile">
		        			<i class="fa fa-mobile"></i>
		        			<div class="txt"><%=usr.mobile%></div>
		        		</li>
		        		<div class="bglghtblu sml" ng-if="!usr.mobile"></div>
		        		<li class="info" ng-if="usr.address1">
		        			<i class="fa fa-home"></i>
		        			<div class="txt">
		        				<span ng-if="usr.address1">
			        				<label style="margin-top: -6px;">Present Address</label>
			        				<p><%=usr.address1%></p>
			        			</span>
		        				<br>
		        				<span ng-if="usr.address2 && usr.address1 != usr.address2">
		        					<label>Permanent Address</label>
		        					<p><%=usr.address2%></p>
		        				</span>
		        			</div>
		        		</li>
		        		<div class="bglghtblu lrg" ng-if="!usr.address1"></div>
		        	</ul>
		        	<div class="rsmttl bgbl clrwht">Work Details</div>
		        	<ul class="infos">
		        		<li class="info" ng-if="usr.typofwork">
							<label>Type of Work:</label>&nbsp;
		        			<div class="txt"><%=get_selection(typework, usr.typofwork)%></div>
		        		</li>
		        		<div class="bglghtblu sml" ng-if="!usr.typofwork"></div>
		        		<li class="info" ng-if="usr.avlforwrk">
							<label>Availability:</label>&nbsp;
		        			<div class="txt"><%=usr.avlforwrk | date : 'MMMM d, yyyy'%></div>
		        		</li>
		        		<div class="bglghtblu sml" ng-if="!usr.avlforwrk"></div>
		        		<li class="info" ng-if="usr.workexperience">
							<label>Yrs. of Experience:</label>&nbsp;
		        			<div class="txt"><%=get_selection(yrsxprncs, usr.workexperience)%></div>
		        		</li>
		        		<div class="bglghtblu sml" ng-if="!usr.workexperience"></div>
		        	</ul>
		        	<div class="rsmttl bgbl clrwht">Personal Info</div>
					<ul class="infos">
		        		<li class="info" ng-if="usr.age">
							<label>Age</label>&nbsp;
		        			<div class="txt"><%=usr.age%> yrs. old</div>
		        		</li>
		        		<div class="bglghtblu sml" ng-if="!usr.age"></div>
		        		<li class="info" ng-if="usr.bday">
							<label>Birthday</label>&nbsp;
		        			<div class="txt"><%=usr.bday | date : 'MMMM d, yyyy'%></div>
		        		</li>
		        		<div class="bglghtblu sml" ng-if="!usr.bday"></div>
		        		<li class="info" ng-if="usr.bplace">
		        			<label>Birthplace</label>&nbsp;
		        			<div class="txt"><%=usr.bplace%></div>
		        		</li>
		        		<div class="bglghtblu sml" ng-if="!usr.bplace"></div>
		        		<li class="info" ng-if="usr.cstatus">
		        			<label>Civil Status</label>&nbsp;
		        			<div class="txt">
		        				<%=get_selection(cstatus, usr.cstatus)%>
		        			</div>
		        		</li>
		        		<div class="bglghtblu sml" ng-if="!usr.cstatus"></div>
		        		<li class="info" ng-if="usr.gender">
		        			<label>Gender</label>&nbsp;
		        			<div class="txt">
		        				<%=get_selection(gender, usr.gender)%>
		        			</div>
		        		</li>
		        		<div class="bglghtblu sml" ng-if="!usr.gender"></div>
		        	</ul>
				</div>
				<div class="rsmrght">
					<div class="dvdr">
						<h3 class="rsmttl">Educational Background</h3>
						<ul class="rsmrght_list">
				            <li class="rcrd" ng-repeat="edc in edcs" ng-class="{'nocntntli': !edc.school}">
				            	<div ng-if="edc.school">
				            		<div class="tprcrd">
					            		<span class="date"><%=edc.sdate | date : 'MMMM d, yyyy'%> - <%=edc.edate | date : 'MMMM d, yyyy'%></span>
					            		<h3 class="rghttl" ng-if="edc.school">
					            			<%=edc.school%>
					            		</h3>
					            	</div>
					            	<h4 class="hline"><%=get_selection(edctypes, edc.educ_type)%></h4>
				            	</div>
				            	<div class="bglghtblu sml" ng-if="!edc.school"></div>
				            	<div class="cntnt" ng-if="edc.course">
				            		<p><strong>Course:</strong> <%=edc.course%></p>
				            	</div>
				            	<div class="bglghtblu sml" ng-if="!edc.course && edc.educ_type != 1"></div>
				            	<div class="cntnt" ng-if="edc.awrdsnrcgntn.length > 60">
				            		<label>Awards & Recognition:</label>
				            		<div ng-bind-html="edc.awrdsnrcgntn"></div>
				            	</div>
				            </li>
				        </ul>
					</div>
					<div class="dvdr">
						<h3 class="rsmttl">Work Experience</h3>
						<ul class="rsmrght_list">
				            <li class="rcrd" ng-repeat="emp in emps" ng-class="{'nocntntli': !emp.company}">
				            	<div ng-if="emp.company">
				            		<div class="tprcrd">
					            		<span class="date">
					            			<%=emp.empsdate | date : 'MMMM d, yyyy'%> 
					            			- 
					            			<span ng-if="emp.ispresent != 1">
					            				<%=emp.empedate | date : 'MMMM d, yyyy'%>
					            			</span>
					            			<span ng-if="emp.ispresent == 1">
					            				<strong>PRESENT</strong>
					            			</span>
					            		</span>
					            		<h3 class="rghttl"><%=emp.company%></h3>
					            	</div>
					            	<h4 class="hline">
					            		<%=emp.position%>&nbsp; / &nbsp;Salary: <%=get_selection(currencies, emp.currency)%> <%=emp.salary | number%>
					            	</h4>	
				            	</div>
				            	<div class="bglghtblu sml" ng-if="!emp.company"></div>
				            	<div class="btmcntnt" ng-if="emp.supname">
				            		Supervisor's Name: <%=emp.supname%>
				            		<span ng-if="emp.canwecontact == 2">
				            			&nbsp; - &nbsp;
				            			<%= get_selection(cntctbys, emp.contctby) %>:
				            			<%=emp.empemail%>
				            			<%=emp.empphone%>
				            			<%=emp.empmobile%>
				            			<%=emp.empskype%>
				            			<%=emp.empviber%>
				            			<%=emp.empym%>
				            		</span>
				            	</div>
				            	<div class="bglghtblu sml" ng-if="!emp.supname"></div>
				            	<div class="cntnt" ng-if="emp.jbdscrptn.length > 60">
				            		<label>Job Description:</label>
				            		<div ng-bind-html="emp.jbdscrptn"></div>
				            	</div>
				            	<div class="bglghtblu lrg" ng-if="emp.jbdscrptn.length < 60" style="margin-bottom: 15px;"></div>
								<hr>
				            	<div class="cntnt" ng-if="emp.rsnfrlvng.length > 60">
				            		<label>Reason for Leaving:</label>
				            		<div ng-bind-html="emp.rsnfrlvng"></div>
				            	</div>
				            	<div class="bglghtblu lrg" ng-if="emp.rsnfrlvng.length < 60"></div>
				            </li>
				        </ul>
					</div>
					
					<div class="dvdr">
						<h3 class="rsmttl">Character Reference</h3>
						<ul class="rsmrght_list">
				            <li class="rcrd" ng-repeat="chr in chrs" ng-class="{'nocntntli': !chr.chrname}">
				            	<div ng-if="chr.chrname">
					            	<div class="tprcrd">
					            		<h3 class="rghttl"><%=chr.chrname%></h3>
					            	</div>
					            	<h4 class="hline">
					            		<strong>Company:</strong> <%=chr.chremployer%> 
					            		&nbsp; / &nbsp;
					            		<strong>Position:</strong> <%=chr.chrposition%>
					            	</h4>
				            	</div>
				            	<div class="bglghtblu sml" ng-if="!chr.chrname"></div>
				            	<div class="bglghtblu xlrg" ng-if="!chr.chrrelation"></div>
				            	<div class="cntnt" ng-if="chr.chrrelation">
				            		<ul>
				            			<li>
				            				<strong>Relation:</strong> <%=chr.chrrelation%>
				            			</li>
				            			<li>
				            				<strong><%= get_selection(cntctbys, chr.contctby) %> :</strong>
				            				<%=chr.chremail%>
				            				<%=chr.chrphone%>
				            				<%=chr.chrmobile%>
				            				<%=chr.chrskype%>
				            				<%=chr.chrviber%>
				            				<%=chr.chrym%>
				            			</li>
				            		</ul>
				            	</div>
				            </li>
				        </ul>
					</div>
					<div class="clearfix"></div><br />
		        </div>
			</div>
		</div>
		
	</div>
  </div>
</div>