<?php
/*
Template Name: Email Long Signature
*/
get_header('email');
?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<?php
				global $current_user; get_currentuserinfo();
				$userID = $current_user->ID;
				$upload_dir = wp_upload_dir();
				$fax = $current_user->_me_fax;
			?>

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
								<?php if(bci_get_option( 'aslogo' ) != ''){ ?><img src="http://www.bci.qmul.ac.uk/images/stories/Hidden-page-media/AS-silver-white-background.png" width="88" /> <?php } ?><img src="http://www.bci.qmul.ac.uk/images/stories/Hidden-page-media/barts_blue_large.gif" width="250" /><br /><br />
								<a href="https://twitter.com/<?php echo bci_get_option( 'twitter' ); ?>"><img src="http://www.bci.qmul.ac.uk/images/stories/Hidden-page-media/TW_BCIblue_transp.png" width="35" /></a>&nbsp;
								<a href="https://www.facebook.com/<?php echo bci_get_option( 'facebook' ); ?>"><img src="http://www.bci.qmul.ac.uk/images/stories/Hidden-page-media/FB_BCIblue_transp.png" width="35" /></a>&nbsp;
								<a href="http://www.linkedin.com/company/<?php echo bci_get_option( "linkedin" ); ?>"><img src="http://www.bci.qmul.ac.uk/images/stories/Hidden-page-media/Lin_BCIblue_transp.png" width="35" /></a>&nbsp;
								<a href="http://www.pinterest.com/<?php echo bci_get_option( 'pinterest' ); ?>/"><img src="http://www.bci.qmul.ac.uk/images/stories/Hidden-page-media/Pin_BCIblue_transp.png" width="35" /></a>&nbsp;
								<a href="http://www.flickr.com/photos/<?php echo bci_get_option( 'flickr' ); ?>/"><img src="http://www.bci.qmul.ac.uk/images/stories/Hidden-page-media/Flickr_BCIblue_transp.png" width="35" /></a>&nbsp;
								<a href="https://plus.google.com/u/0/<?php echo bci_get_option( 'google' ); ?>/posts"><img src="http://www.bci.qmul.ac.uk/images/stories/Hidden-page-media/G_BCIblue_transp.png" width="35" /></a>&nbsp;
								<a href="http://www.youtube.com/user/<?php echo bci_get_option( 'youtube' ); ?>"><img src="http://www.bci.qmul.ac.uk/images/stories/Hidden-page-media/YT_BCIblue_transp.png" width="35" /></a></font></font>
							</td>
						</tr>
					</table>
		<?php endwhile; ?>

		<?php endif; ?>

		</div>


	</div>

<?php get_footer('email'); ?>