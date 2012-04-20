<div class="my_meta_control">
	<p>Event Details</p>
	<?php $mb->the_field('start_date'); ?>
	<label>start date</label>
	<input type="text" id="start_date" class="datey" name="<?php $mb->the_name(); ?>" value ="<?php $mb->the_value(); ?>">
	
	<?php $mb->the_field('start_time'); ?>
	<label>start time</label>
	<input type="text" id="start_time" class="timey" name="<?php $mb->the_name(); ?>" value ="<?php $mb->the_value(); ?>">
	
	<?php $mb->the_field('start_unix'); ?>
	<input type="hidden" id="start_unix" class="timey" name="<?php $mb->the_name(); ?>" value ="<?php $mb->the_value(); ?>">
	
	<hr>
	
	<?php $mb->the_field('end_date'); ?>
	<label>end date</label>
	<input type="text" id="end_date" class="datey" name="<?php $mb->the_name(); ?>" value ="<?php $mb->the_value(); ?>" >
	
	<?php $mb->the_field('end_time'); ?>
	<label>end time</label>
	<input type="text" id="end_time" class="timey" name="<?php $mb->the_name(); ?>" value ="<?php $mb->the_value(); ?>">
	
	<?php $mb->the_field('end_unix'); ?>
	<input type="hidden" id="end_unix" class="timey" name="<?php $mb->the_name(); ?>" value ="<?php $mb->the_value(); ?>">
</div>