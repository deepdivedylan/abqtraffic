<main class="container">
	<h2>Current Barricades</h2>
	<table class="table table-bordered table-condensed table-hover table-striped">
		<tr>
			<th>Description</th><th>Start Time</th><th>End Date</th>
		</tr>
		<tr ng-repeat="barricade in barricades">
			<td>{{ barricade.attributes.LOCATION_DESC }}</td>
			<td>{{ barricade.attributes.STARTWORK | date: "medium" }}</td>
			<td>{{ barricade.attributes.ENDWORK | date: "medium" }}</td>
		</tr>
	</table>
</main>