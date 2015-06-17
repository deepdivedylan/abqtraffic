<main class="container">
	<h2>View for Barricade #{{ detail.attributes.OBJECTID }}</h2>
	<div class="row">
		<section class="col-md-3">
			<p><strong>Location:</strong> {{ detail.attributes.LOCATION_DESC }}</p>
			<p><strong>Applicant:</strong> {{ detail.attributes.APPLICANT }}</p>
			<p><strong>Alternate Route Instructions:</strong> {{ detail.attributes.ALT_RTE }}</p>
			<p><strong>Additional Data:</strong> {{ detail.attributes.MORE_INFO }}</p>
		</section>
		<section id="googleMap" class="col-md-9"></section>
	</div>
</main>