@extends('admin.master')

@section('title', 'Applicants')

@section('content')
<h3 class="pgttl">Job Posts</h3>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" ng-click="createJob()">
  Create Job Post
</button>
<div class="clearfix"></div><br>
<table class="table-responsive tbl">
	<thead>
		<tr>
			<th class="thd dwn">
				Job Title
				<span class="fa fa-play"></span>
			</th>
			<th class="thd dwn">
				Date Created
				<span class="fa fa-play"></span>
			</th>
			<th class="thd actns">Actions</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="tbdy"></td>
			<td class="tbdy"></td>
			<td class="tbdy center"></td>
		</tr>
		<tr>
			<td class="tbdy"></td>
			<td class="tbdy"></td>
			<td class="tbdy center"></td>
		</tr>
		<tr>
			<td class="tbdy"></td>
			<td class="tbdy"></td>
			<td class="tbdy center"></td>
		</tr>
		
	</tbody>
</table>

<!-- Modal -->
<div class="modal" id="createJob" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create Job Post</h4>
      </div>
      <div class="modal-body">
        <div class="no-gutter">
			<div class="col-lg-12">
				<div class="pddng nptgrp">
					<label>Job Title: <span>*</span></label>
					<input type="text" name="jbtitle" ng-model="jb.jbtitle" class="form-control" required>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="nptgrp pddng" ng-class="{'err': msg['error']['emp'][$index]['salary'][0]}">
					<label>Salary Range: <span>*</span></label>
					<div class="input-group">
						<div class="no-gutter">
							<div class="col-lg-6">
								<input type="text" name="minsalary" ng-model="jb.minsalary" class="form-control" placeholder="Minimum" required>
							</div>
							<div class="col-lg-6">
								<input type="text" name="maxsalary" ng-model="jb.maxsalary" class="form-control" placeholder="Maximum" required>	
							</div>
						</div>
					</div>
					<div class="dsplychckbx">
		              <input type="checkbox" name="shwsalary" ng-model="jb.shwsalary">
		              <span>Display Salary</span>
		            </div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="nptgrp pddng">
					<label>Expiry Date: <span>*</span></label>
					<input type="text" name="exprydate" ng-model="jb.exprydate" class="form-control" ng-click="open_calendar($event, $index, 'exprydate')" is-open="exprydate.open[$index]" datepicker-options="NoWeeks" show-button-bar="false" uib-datepicker-popup="MM/dd/yyyy">
					<div class="dsplychckbx">
		              <input type="checkbox" name="shwexprydate" ng-model="jb.shwexprydate">
		              <span>Display Expiry Date</span>
		            </div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="col-lg-12">
				<div class="pddng nptgrp txtarea">
					<label>Job Descriptios: <span>*</span></label>
					<summernote ng-model="jb.jbdscrptns" config="summernote_options"></summernote>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="pddng nptgrp txtarea">
					<label>Job Requirements: <span>*</span></label>
					<summernote ng-model="jb.jbrqrments" config="summernote_options"></summernote>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="pddng nptgrp txtarea">
					<label>Perks & Benefits: <span>*</span></label>
					<summernote ng-model="jb.prks_bnfts" config="summernote_options"></summernote>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>

@endsection