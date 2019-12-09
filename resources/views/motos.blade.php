{!! get_header() !!}

<section id="primary" class="content-area">
		<main id="main" class="site-main">
			@while(have_posts())
			{!! the_post() !!}
			<article id="post-{!! the_ID() !!}">
				<div class="entry-content">
					<h1>{!! get_the_title() !!}</h1>
					<p>{!! the_content() !!}</p>
				</div><!-- .entry-content -->
			</article><!-- #post-{!! the_ID() !!} -->
			@endwhile
	</main>
</section>

{!! get_footer() !!}