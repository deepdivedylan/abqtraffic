<main class="container">
	<h2>Current Barricades</h2>
	<form>
		<section class="form-group row">
			<div class="col-md-6">
				<div class="input-group">
					<input type="checkbox" id="detourOnly" name="detourOnly" ng-model="detourOnly" ng-click="detourFilter();" />
					<label for="detourOnly" class="control-label">Show Only Detours</label>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search By Street&hellip;" ng-model="searchStreet" />
					<span class="input-group-addon"><i class="fa fa-search"></i></span>
				</div>
			</div>
		</section>
	</form>
	<table class="table table-bordered table-condensed table-hover table-responsive table-striped">
		<tr>
			<th>Description</th><th>Start Time</th><th>End Date</th><th>Detour</th>
		</tr>
		<tr ng-class="{danger: barricade.abqtraffic.detour}" ng-repeat="barricade in barricades | filter: detourOnly | filter: searchStreet">
			<td><a ng-href="#/barricade/{{ $index }}">{{ barricade.attributes.LOCATION_DESC }}</a></td>
			<td>{{ barricade.attributes.STARTWORK | date: "medium" }}</td>
			<td>{{ barricade.attributes.ENDWORK | date: "medium" }}</td>
			<td ng-bind-html="barricade.abqtraffic.detour | checkmark"></td>
		</tr>
	</table>
</main>