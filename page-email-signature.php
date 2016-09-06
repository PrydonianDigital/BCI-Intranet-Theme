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
				$upload_dir = wp_upload_dir();
				$fax = $current_user->_me_fax;
			?>
			<h4>Copy the information from the box below into Outlook to create your email signature</h4>
			<div class="row">
				<div  class="large-6 small-12 columns">
					<h5>BCI Long Signature</h5>
					<div id="emailSignature" contenteditable="true">
					<table width="600" border="0" style="border: 0; border-collapse: collapse;">
						<tr>
							<td style="font-family: Arial; font-size: 13px;">
								<font face="Arial"><font size="2"><?php echo $current_user->user_firstname ?> <?php echo $current_user->user_lastname ?></font></font>
							</td>
						</tr>
						<tr>
							<td style="font-family: Arial; font-size: 13px;">
								<font face="Arial"><font size="2"><?php echo $current_user->_me_title; ?> |
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
								?></font></font>
							</td>
						</tr>
						<tr>
							<td style="font-family: Arial; font-size: 11px;">
								<font face="Arial"><font size="1">Barts Cancer Institute - a Cancer Research UK Centre of Excellence<br />
								Queen Mary University of London<br />
								<?php echo $current_user->_me_building ?>, Charterhouse Square, London EC1M 6BQ</p>
								T: +44 (0)20 7882 <?php echo $current_user->_me_ext; ?> <?php if($fax !='') { echo '| F: ' . $fax; } ?> | E: <a href="mailto:<?php echo $current_user->user_email ?>"><?php echo $current_user->user_email ?></a><br />
								<a href="http://www.bci.qmul.ac.uk">http://www.bci.qmul.ac.uk</a><br /><br />
								<img src="<?php echo $upload_dir['baseurl']; ?>/2013/01/Barts-SMD-blue.png" width="250" /><br /><br />
								<a href="https://twitter.com/<?php echo bci_get_option( 'twitter' ); ?>"><img src="<?php echo $upload_dir['baseurl']; ?>/2013/01/TW_BCIblue_whitefill_transp.png" width="35" /></a>&nbsp;
								<a href="https://www.facebook.com/<?php echo bci_get_option( 'facebook' ); ?>"><img src="<?php echo $upload_dir['baseurl']; ?>/2013/01/FB_BCIblue_whitefill_transp.png" width="35" /></a>&nbsp;
								<a href="http://www.linkedin.com/company/<?php echo bci_get_option( 'linkedin' ); ?>"><img src="<?php echo $upload_dir['baseurl']; ?>/2013/01/Lin_BCIblue_whitefill_transp.png" width="35" /></a>&nbsp;
								<a href="http://www.pinterest.com/<?php echo bci_get_option( 'pinterest' ); ?>/"><img src="<?php echo $upload_dir['baseurl']; ?>/2013/01/Pin_BCIblue_whitefill_transp.png" width="35" /></a>&nbsp;
								<a href="http://www.flickr.com/photos/<?php echo bci_get_option( 'flickr' ); ?>/"><img src="<?php echo $upload_dir['baseurl']; ?>/2013/01/Flickr_BCIblue_whitefill_transp.png" width="35" /></a>&nbsp;
								<a href="https://plus.google.com/u/0/<?php echo bci_get_option( 'google' ); ?>/posts"><img src="<?php echo $upload_dir['baseurl']; ?>/2013/01/G_BCIblue_whitefill_transp.png" width="35" /></a>&nbsp;
								<a href="http://www.youtube.com/user/<?php echo bci_get_option( 'youtube' ); ?>"><img src="<?php echo $upload_dir['baseurl']; ?>/2013/01/YT_BCIblue_whitefill_transp.png" width="35" /></a></font></font>
							</td>
						</tr>
					</table>
				</div>
				</div>
				<div class="large-6 small-12 columns">
					<h5>BCI Short Signature</h5>
					<div id="emailSignature" contenteditable="true">
					<table width="600" border="0" style="border: 0; border-collapse: collapse;">
						<tr>
							<td style="font-family: Arial; font-size: 13px;">
								<font face="Arial"><font size="2"><?php echo $current_user->user_firstname ?> <?php echo $current_user->user_lastname ?></font></font>
							</td>
						</tr>
						<tr>
							<td style="font-family: Arial; font-size: 13px;">
								<font face="Arial"><font size="2">
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
								?></font></font>
							</td>
						</tr>
						<tr>
							<td style="font-family: Arial; font-size: 11px;">
								<font face="Arial"><font size="1">Barts Cancer Institute - a Cancer Research UK Centre of Excellence</p>
								T: +44 (0)20 7882 <?php echo $current_user->_me_ext; ?> <?php if($fax !='') { echo '| F: ' . $fax; } ?> | E: <a href="mailto:<?php echo $current_user->user_email ?>"><?php echo $current_user->user_email ?></a><br />
								<a href="http://www.bci.qmul.ac.uk">http://www.bci.qmul.ac.uk</a><br /></font></font>
							</td>
						</tr>
					</table>
				</div>
				</div>
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