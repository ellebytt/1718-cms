window.shrake = window.shrake || {};

(function( window, $, undefined ) {
	'use strict';

	var $window = $( window ),
		$body = $( 'body' ),
		shrake = window.shrake;

	function skipToElement( elementId ) {
		var element = document.getElementById( elementId );

		if ( element ) {
			if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
				element.tabIndex = -1;
			}

			element.focus();
		}
	}

	$.extend( shrake, {
		config: {},

		init: function() {
			$body.addClass( 'ontouchstart' in window || 'onmsgesturechange' in window ? 'touch' : 'no-touch' );

			/**
			 * Makes "skip to content" link work correctly in IE9, Chrome, and Opera
			 * for better accessibility.
			 *
			 * @link http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/
			 */
			if ( /webkit|opera|msie/i.test( navigator.userAgent ) && window.addEventListener ) {
				$window.on( 'hashchange', function() {
					skipToElement( location.hash.substring( 1 ) );
				});

				$( 'a.screen-reader-text' ).on ( 'click', function() {
					skipToElement( $( this ).attr( 'href' ).substring( 1 ) );
				});
			}
		},

		/**
		 * Set up comments.
		 *
		 * - Sets comments display based window hash. Automatically display
		 *   comments if the hash contains '#comment' or '#respond' string.
		 * - Toggles comments display when comments header is clicked.
		 */
		setupComments: function() {
			var $comments = $( '.comments-area' );

			if ( /^#(comment|respond)/.test( window.location.hash ) ) {
				$comments.addClass( 'is-open' );
				$( window.location.hash ).click();
			}

			// Toggle comments.
			$comments.on( 'click', '.comments-header', function() {
				$comments.toggleClass( 'is-open' );
			});
		},

		/**
		 * Set up navigation.
		 */
		setupNavigation: function() {
			var $siteHeader = $( '.site-header' ),
				$siteNavigation = $( '.site-navigation' ),
				$toggleButton = $( '.site-navigation-toggle' );

			// Toggle the main menu.
			$toggleButton.on( 'click', function() {
				$siteHeader.toggleClass( 'nav-menu-is-open' );
				$siteNavigation.toggleClass( 'is-open' );
			});
		},

		/**
		 * Set up submenu navigation.
		 */
		setupSubmenuNavigation: function() {
			var $navigation = $( '.submenu-navigation' ),
				$toggleButton = $( '.submenu-navigation-toggle' );

			// Toggle the main menu.
			$toggleButton.on( 'click', function() {
				$navigation.toggleClass( 'is-open' );
			});
		},

		/**
		 * Set up videos.
		 *
		 * - Makes videos responsive.
		 */
		setupVideos: function() {
			if ( $.isFunction( $.fn.fitVids ) ) {
				$( '.hentry, .entry-video' ).fitVids();
			}
		}
	});

	// Document ready.
	jQuery(function() {
		shrake.init();
		shrake.header.init();
		shrake.setupComments();
		shrake.setupNavigation();
		shrake.setupSubmenuNavigation();
		shrake.setupVideos();
	});

})( this, jQuery );
