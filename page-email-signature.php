<?php get_header(); ?>

	<div class="row">

		<div class="small-12 large-9 column pageInner" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php $title = get_post_meta( get_the_ID(), "_word_title", true ); ?>
			<?php if($title != 'on') { ?>
				<h2 class="page-title"><?php the_title(); ?></h2>
			<?php } else {} ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail('header', array( 'class' => 'aligncenter' )); ?>
			<?php endif; ?>

			<?php
				global $current_user; get_currentuserinfo();
				$userID = $current_user->ID;
			?>
			<h4>Copy the information from the box below into Outlook to create your email signature</h4>
			<div id="emailSignature" contenteditable="true">
				<span class="larger"><?php echo $current_user->user_firstname ?> <?php echo $current_user->user_lastname ?><br /></span>
				<span class="larger"><?php echo $current_user->_me_title; ?> |
				<?php
					$centre = $current_user->_usercentre_centre;
					$centreName = get_the_title($centre);
					switch (true) {
						case stristr($centreName, 'Inflammation'):
							echo 'Centre for Cancer & Inflammation';
							break;
						case stristr($centreName, 'Ageing'):
							echo 'Centre for Stem Cells in Cancer & Ageing';
							break;
						case stristr($centreName, 'Medicine'):
							echo 'Centre for Experimental Cancer Medicine';
							break;
						case stristr($centreName, '-Oncology'):
							echo 'Centre for Haemato-Oncology';
							break;
						case stristr($centreName, ' Oncology'):
							echo 'Centre for Molecular Oncology';
							break;
						case stristr($centreName, 'Biology'):
							echo 'Centre for Tumour Biology';
							break;
						default:
							echo get_the_title($current_user->_usercentre_centre);
					}
				?><br /></span>
				Barts Cancer Institute - a Cancer Research UK Centre of Excellence<br />
				Queen Mary University of London<br />
				<?php echo $current_user->_me_building ?>, Charterhouse Square, London EC1M 6BQ</p>
				Tel: +44 (0)20 7882 <?php echo $current_user->_me_ext; ?> | Email: <a href="mailto:<?php echo $current_user->user_email ?>"><?php echo $current_user->user_email ?></a><br />
				<a href="http://www.bci.qmul.ac.uk">http://www.bci.qmul.ac.uk</a><br />
				<img src="http://dev.intranet.qmcr.qmul.ac.uk/wp-content/uploads/2013/01/Barts-SMD-blue.png" width="250" /><br />
				<a href="https://twitter.com/QMBCI"><img src="http://dev.intranet.qmcr.qmul.ac.uk/wp-content/uploads/2013/01/TW_BCIblue_whitefill_transp.png" width="35" /></a>
				<a href="https://www.facebook.com/BartsCancerInstitute"><img src="http://dev.intranet.qmcr.qmul.ac.uk/wp-content/uploads/2013/01/FB_BCIblue_whitefill_transp.png" width="35" /></a>
				<a href="http://www.linkedin.com/company/barts-cancer-institute"><img src="http://dev.intranet.qmcr.qmul.ac.uk/wp-content/uploads/2013/01/Lin_BCIblue_whitefill_transp.png" width="35" /></a>
				<a href="http://www.pinterest.com/qmbci/"><img src="http://dev.intranet.qmcr.qmul.ac.uk/wp-content/uploads/2013/01/Pin_BCIblue_whitefill_transp.png" width="35" /></a>
				<a href="http://www.flickr.com/photos/barts_cancer_institute/"><img src="http://dev.intranet.qmcr.qmul.ac.uk/wp-content/uploads/2013/01/Flickr_BCIblue_whitefill_transp.png" width="35" /></a>
				<a href="https://plus.google.com/u/0/105965589329058156929/posts"><img src="http://dev.intranet.qmcr.qmul.ac.uk/wp-content/uploads/2013/01/G_BCIblue_whitefill_transp.png" width="35" /></a>
				<a href="http://www.youtube.com/user/BCIQMUL?feature=watch"><img src="http://dev.intranet.qmcr.qmul.ac.uk/wp-content/uploads/2013/01/YT_BCIblue_whitefill_transp.png" width="35" /></a>
			</div>

			<?php the_content(); ?>

		<?php endwhile; ?>

		<?php endif; ?>

		</div>

		<aside class="small-12 large-3 columns sidebar sidebar-primary widget-area" role="complementary" aria-label="Primary Sidebar" itemscope="" itemtype="http://schema.org/WPSideBar">

			<ul class="widgets">
				<?php dynamic_sidebar('mainsidebar'); ?>
			</ul>

		</aside>

	</div>

<?php get_footer(); ?>