<div id="archive-question" class="dw-question">
	<div class="dwqa-list-question">
		<?php dwqa_load_template( 'search', 'question' ); ?>
		
		<?php do_action( 'dwqa-before-question-list' ); ?>

		<?php do_action( 'dwqa-prepare-archive-posts' ); ?>
		<?php if ( have_posts() ) : ?>
		<div class="loading"></div>
		<div class="questions-list">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php dwqa_load_template( 'content', 'question' ); ?>
		<?php endwhile; ?>
		</div>
		<div class="archive-question-footer">
			<?php dwqa_load_template( 'navigation', 'archive' ); ?>

			<?php dwqa_get_ask_question_link(); ?>
		</div>
		<?php else : ?>
			<?php dwqa_load_template( 'archive', 'question-notfound' ); ?>
		<?php endif; ?>

		<?php do_action( 'dwqa-after-archive-posts' ); ?>
	</div>
</div>