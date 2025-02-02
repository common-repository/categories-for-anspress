<?php
/**
 * Display single question category page.
 */
?>
<div class="ap-category">
	<?php dynamic_sidebar( 'ap-top' ); ?>
	<div class="row">
		<div id="ap-lists" class="<?php echo is_active_sidebar( 'ap-category' ) && is_anspress() ? 'col-md-9' : 'col-md-12' ?>">
			
			<?php if( ap_category_have_image( $question_category->term_id ) ): ?>
				<div class="ap-category-feat" style="height: 300px;">
					<?php ap_category_image( $question_category->term_id, 300 ); ?>
				</div>
			<?php endif; ?>

			<div class="ap-taxo-detail">
				<div class="ap-pull-left">				
					<?php ap_category_icon( $question_category->term_id ); ?>
				</div>
				<div class="no-overflow">
					<div>
						<a class="entry-title" href="<?php echo get_category_link( $question_category );?>">
							<?php echo $question_category->name;?>
						</a>
						<span class="ap-tax-count">
							<?php printf( _n('1 Question', '%s Questions', $question_category->count, 'categories-for-anspress'),  $question_category->count); ?>
						</span>
						<?php ap_subscribe_btn_html($question_category->term_id, 'category'); ?>
					</div>
					

					<?php if($question_category->description !=''): ?>
						<p class="ap-taxo-description"><?php echo $question_category->description; ?></p>
					<?php endif; ?>
					<?php ap_question_subscribers($question_category->term_id, 'category'); ?>

					<?php
						$sub_cat_count = count(get_term_children( $question_category->term_id, 'question_category' ));

						if($sub_cat_count >0){
							echo '<div class="ap-term-sub">';
							echo '<div class="sub-taxo-label">' .$sub_cat_count.' '.__('Sub Categories', 'categories-for-anspress') .'</div>';
							ap_sub_category_list($question_category->term_id);
							echo '</div>';
						}
					?>
				</div>				
			</div><!-- close .ap-taxo-detail -->

			<?php ap_get_template_part('list-head'); ?>

			<?php if ( ap_have_questions() ) : ?>

				<div class="ap-questions">
					<?php
						/* Start the Loop */
						while ( ap_questions() ) : ap_the_question();
							include(ap_get_theme_location('content-list.php'));
						endwhile;
					?>
				</div><!-- close .ap-questions -->

				<?php ap_questions_the_pagination(); ?>

			<?php else : ?>

				<?php include(ap_get_theme_location('content-none.php')); ?>

			<?php endif; ?>

		</div><!-- close #ap-lists -->

		<?php if ( is_active_sidebar( 'ap-category' ) && is_anspress()){ ?>
			<div class="ap-question-right col-md-3">
				<?php dynamic_sidebar( 'ap-category' ); ?>
			</div>
		<?php } ?>
	</div><!-- close .row -->
</div>
