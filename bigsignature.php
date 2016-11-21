
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
								<?php if(bci_get_option( 'aslogo' ) != ''){ ?><img src="<?php echo bci_get_option( 'aslogofile' ); ?>" width="88" /> <?php } ?><img src="<?php echo $upload_dir['baseurl']; ?>/2013/01/Barts-SMD-blue.png" width="250" /><br /><br />
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