$.fn.navigate = function($cycleArgs) {

	var self = this, skipHash = false, specialHashes = {};

	self.setIndexFromHash = function(hash, firingElement) {

		var pChildren = self.children();

		var compare = $(hash).get(0);

		self.cycle($.inArray(compare, pChildren));

		if (!firingElement) {
			var pArr = $('.action-link');
			for (var i = 0; i < pArr.length; i++) {
				if ($(pArr[i]).attr('slideanchor') == hash) {
					firingElement = pArr[i];
					break;
				}
			}
		}
		$('.action-link').removeClass('active');
		$(firingElement).addClass('active');

		var pFn = specialHashes[hash];
		if (pFn)
			pFn();
	}
	if (!jQuery.support.opacity)
		$cycleArgs.fx = 'none';

	self.cycle($cycleArgs);

	$('.action-link').click(function(evt) {
		// Determine target ID.
		var pHash = $(this).attr('slideanchor');
		skipHash = true;
		location.hash = pHash;
		self.setIndexFromHash(pHash, this);
	}, function(evt) {
	}).click(function(evt) {
		evt.preventDefault();
		return false;
	});

	if (location.hash) {
		self.setIndexFromHash(location.hash);
	}
	$(window).bind('hashchange', function() {
		if (skipHash)
			skipHash = false;
		else {
			self.setIndexFromHash(location.hash);
		}
	});

};
$(document).ready(function() {
	$('#slider').navigate({
		timeout : 0,
		cleartype : 'true',
		cleartypeNoBg : true,
		easeIn : 'easeInExpo',
		easeOut : 'easeOutExpo',
		delay : 2000,
		pagerAnchorBuilder : function(idx, slide) {
			return '';
		}
	});
});
