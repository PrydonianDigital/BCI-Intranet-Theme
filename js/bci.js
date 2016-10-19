var $s = jQuery.noConflict();

$s(window).load(function() {
	setTimeout(function() {
		var headH = $s('.site-header').outerHeight(true);
		$s('.site-inner').attr('style', 'padding-top: calc(' + headH + 'px + 2em);');
		$s('#appNav').attr('style', 'top: ' + headH + 'px;');
	}, 0.1);
});

$s(function() {

	$s('#user_login').attr('autocomplete', 'off');
	$s('#user_pass').attr('autocomplete', 'off');

	$s('.widgets').on('click', '#hover.closed', function(){
		$s(this).addClass('open').removeClass('closed');
		$s(this).next().addClass('open');
	});

	$s('.widgets').on('click', '#hover.open', function(){
		$s(this).addClass('closed').removeClass('open');
		$s(this).next().removeClass('open');
	});

	$s('.sitemap ul.submenu').hide();
	$s('.sitemap h2').on('click', 'i', function(){
		$s(this).toggleClass('nav-minus-circle nav-plus-circle');
		$s('.sitemap ul.submenu').slideToggle();
	});
	$s('#tour').on('click', function(e){
		e.preventDefault();
		localStorage.removeItem('BCITour_end');
		localStorage.removeItem('BCITour_current_step');
	});

	$s('#announcementClose').on('click', function(e){
		$s('#announcement').hide();
		var headH = $s('.site-header').outerHeight(true);
		$s('.site-inner').attr('style', 'padding-top: calc(' + headH + 'px + 2em);');
		$s('#appNav').attr('style', 'top: ' + headH + 'px;');
	});

	$s('select').not('.tribe-bar-views-select, .gfield_select, #advert_category, .tribe_events_filter_item select, .name_prefix select').select2();

	// Mobile show nav
	$s('#navShow').on('click', 'a', function(e){
		e.preventDefault();
		$s('#container, footer, #appNav, #appControls, header').toggleClass('open');
		$s('#sideNav').toggleClass('open');
		$s(this).children().toggleClass('nav-menu nav-close2');
	});

	$s('.search a[href*=".pdf"]').attr('target','_blank');

	// Show/Hide apps
	$s('#apps').on('click', '#openApps', function(e){
		e.preventDefault();
		$s('#appNav').slideToggle();
		$s(this).toggleClass('open close')
		//$s(this).children('i').toggleClass('nav-minus nav-plus');
		$s('#appControls span').text(function(i, text){
			return text === "Show" ? "Hide" : "Show";
		})
	});

	// Antibody Autocompete
	$s('.antibody').keyup(function(e) {
		if(this.value.length === 0) {
			$s('#results').empty();
		} else {
		$s('#results').empty();
		var searchField = $s('.antibody').val();
		var regex = new RegExp(searchField, "i");
		var output = '<table class="responsive"><thead><tr><th>Name</th><th>Contact</th><th>Centre</th><th>Comment</th><th>Company</th><th>Catalogue</th></tr></thead><tbody>';
		$s.getJSON('/bci_intranet/wp-json/wp/v2/antibody', function(data) {
			$s.each(data, function(i,a) {
				if (a.title.rendered.search(regex) != -1) {
					output += '<tr>';
					output += '<td><a href="' + a.link + '">' + a.title.rendered + '</a></td>';
					output += '<td>' + a._anti_user + '</td>';
					output += '<td>' + a._anti_centre + '</td>';
					output += '<td>' + a._anti_comment + '</td>';
					output += '<td>' + a._anti_company + '</td>';
					output += '<td>' + a._anti_catalogue + '</td>';
					output += '</tr>';
				}
			});
			output += '</tbody></table>';
			output += '<style>';
			output += '@media only screen and (max-width: 760px), (min-device-width: 768px) and (max-device-width: 1024px)  {';
			output += 'td:nth-of-type(1):before { content: "Name"; }';
			output += 'td:nth-of-type(2):before { content: "Contact"; }';
			output += 'td:nth-of-type(3):before { content: "Centre"; }';
			output += 'td:nth-of-type(4):before { content: "Comment"; }';
			output += 'td:nth-of-type(5):before { content: "Company"; }';
			output += 'td:nth-of-type(6):before { content: "Catalogue"; }';
			output += '}';
			output += '</style>'
			$s('#results').html(output);
		});
		}
	});


	// Homepage carousel
	var owl = $s('.owl-carousel');
	owl.owlCarousel({
		items: 1,
		loop: true,
		margin: 10,
		nav: true,
		dots: true,
		autoplay: true,
		autoplayTimeout: 7500,
		autoplayHoverPause: true
	});
	$s('.play').on('click',function(){
		owl.trigger('autoplay.play.owl',[1000])
	});
	$s('.stop').on('click',function(){
		owl.trigger('autoplay.stop.owl')
	});

	// Back to top behaviour
	var offset = 300,
		offset_opacity = 1200,
		scroll_top_duration = 700,
		$back_to_top = $s('.cd-top');

	$s(window).scroll(function(){
		( $s(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $s(this).scrollTop() > offset_opacity ) {
			$back_to_top.addClass('cd-fade-out');
		}
	});

	$back_to_top.on('click', function(event){
		event.preventDefault();
		$s('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
});
