@extends('admin.master')

@section('title', 'Applicants')

@section('content')
<div>
	<h3 class="pgttl">Applicants</h3>
	<table class="table-responsive tbl">
		<thead>
			<tr>
				<th class="thd dwn">
					Name
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
			<tr ng-repeat="usr in applicants">
				<td class="tbdy">
					<a href="#" ng-click="viewResume(usr)">
						<%=usr.fname%> <%=usr.mname%> <%=usr.lname%>
					</a>
				</td>
				<td class="tbdy"><%= usr.creation_date %></td>
				<td class="tbdy center">
					<button class="btn btn-primary" ng-click="viewResume(usr)">Resume</button>
				</td>
			</tr>
		</tbody>
	</table>

	<div class="clearfix"></div>
	<!-- <div class="center">
		<nav>
		  <ul class="pagination pgntn">
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>
		    <li class="active"><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li>
		      <a href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
		  </ul>
		</nav>
	</div> -->
    <!-- <%=applicants%> -->
</div>
<div ng-include src="'/careers/resume_tpl'"></div>
@endsection