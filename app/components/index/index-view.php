<main class="container">
	<h2>Verify Your Route</h2>
	<form id="verifyRoute" class="form-horizontal">
		<input type="hidden" id="gpsOrigin-latitude" name="gpsOrigin-latitude" />
		<input type="hidden" id="gpsOrigin-longitude" name="gpsOrigin-longitude" />
		<input type="hidden" id="gpsDestination-latitude" name="gpsDestination-latitude" />
		<input type="hidden" id="gpsDestination-longitude" name="gpsDestination-longitude" />
		<section class="form-group">
			<div class="col-md-6">
				<label for="origin">Origin</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-map-marker"></i>
					</div>
					<input type="text" name="origin" id="origin" placeholder="Enter Origin&hellip;" maxlength="128" class="fullWidth" ng-disabled="origin" />
				</div>
				<div class="input-group">
					<input type="checkbox" id="gpsOrigin" name="gpsOrigin" ng-click="useOrigin();" />
					<label for="gpsOrigin" class="control-label">Use Current Location</label>
				</div>
			</div>
			<div class="col-md-6">
				<label for="destination">Destination</label>
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-map-marker"></i>
					</div>
					<input type="text" name="destination" id="destination" placeholder="Enter Destination&hellip;" maxlength="128" class="fullWidth" ng-disabled="destination" />
				</div>
				<div class="input-group">
					<input type="checkbox" id="gpsDestination" name="gpsDestination" ng-click="useDestination();" />
					<label for="gpsDestination" class="control-label">Use Current Location</label>
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group">
					<button type="submit" class="btn btn-lg btn-info">Verify</button>
					<button type="reset" class="btn btn-lg btn-warning">Clear</button>
				</div>
			</div>
		</section>
	</form>
	<section id="verifyStatusBar" class="alert alert-dismissible" ng-class="statusType" ng-show="showStatus" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close" ng-click="disableStatus();"><span aria-hidden="true">&times;</span></button>
		{{ statusContent }}
	</section>
	<hr />
	<h2>Current Barricades</h2>
	<form class="form-horizontal">
		<section class="form-group">
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