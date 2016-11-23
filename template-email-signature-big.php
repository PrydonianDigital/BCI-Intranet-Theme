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
								</font></font>
							</td>
						</tr>
					</table>
		<?php endwhile; ?>

		<?php endif; ?>

		</div>


	</div>

<?php get_footer('email'); ?>