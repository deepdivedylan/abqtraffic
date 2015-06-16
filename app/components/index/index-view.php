<main class="container">
	<h2>Current Barricades</h2>
	<div class="row">
		<div ng-repeat="barricade in barricades">
			{{ barricade.attributes.OBJECTID }}
		</div>
	</div>
</main>