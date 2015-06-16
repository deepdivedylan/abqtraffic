<main class="container">
	<h2>Current Barricades</h2>
	<table class="table table-bordered table-condensed table-hover table-responsive table-striped">
		<tr>
			<th>Description</th><th>Start Time</th><th>End Date</th><th>Detour</th>
		</tr>
		<tr ng-repeat="barricade in barricades">
			<td><a ng-href="#/barricade/{{ $index }}" ng-click="open();">{{ barricade.attributes.LOCATION_DESC }}</a></td>
			<td>{{ barricade.attributes.STARTWORK | date: "medium" }}</td>
			<td>{{ barricade.attributes.ENDWORK | date: "medium" }}</td>
			<td ng-bind-html="barricade.abqtraffic.detour | checkmark"></td>
		</tr>
	</table>
</main>