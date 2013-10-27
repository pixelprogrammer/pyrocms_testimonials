<div class="one_full">
	<section class="title">
		<h4>Testimonials</h4>
	</section>
	<?php if($testimonials !== false) : ?>
	<section class="item">
		<div class="content">
			<form action="admin/testimonials/action">
				<table>
					<thead>
						<tr>
							<th>Name</th>
							<th>Bio</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($testimonials as $testimonial) : ?>
							<tr>
								<td>
									<?php echo $testimonial->name; ?>
								</td>
								<td>
									<?php echo substr($testimonial->bio, 0, 25); ?>
								</td>
								<td>
									<?php echo $testimonial->status == 1 ? 'Live' : 'Draft'; ?>
								</td>
								<td>
									<a href="admin/testimonials/edit/<?php echo $testimonial->id;?>" class="button" title="Edit">Edit</a>
									<a href="admin/testimonials/delete/<?php echo $testimonial->id;?>" class="button" title="Delete">Delete</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</form>
		</div>
	</section>
	<?php else : ?>
		<section class="item">
			<div class="content">
				<div class="no_data">
					You haven't added any testimonials yet. You can add one <a href="admin/testimonials/create">here</a>.
				</div>
			</div>
		</section>
	<?php endif; ?>
</div>
