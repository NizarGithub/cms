(function() {
  "use strict";
  var Enliven, e_google_maps;

  e_google_maps = '';

  jQuery(document).ready(function($) {
    Enliven.initNavigation();
    Enliven.clickToOpenSearchForm();
  });

  jQuery(window).load(function($) {
    Enliven.initEffect();
    Enliven.initTicker();
    Enliven.initPostsCarouselLargeThumb();
    Enliven.initPostsCarouselVerticalThumb();
    Enliven.initVideoResponsive();
    Enliven.initTabs();
    Enliven.initToggles();
    Enliven.initNotification();
    Enliven.initMaps();
    Enliven.initWow();
    Enliven.initSliderPro();
    Enliven.initPinBox();
    Enliven.applyMatchHeight();
    Enliven.initSideNav();
    Enliven.initGoTopButton();
  });

  jQuery(window).scroll(function($) {
    Enliven.stickyNavigation();
  });

  Enliven = {
    initGoTopButton: function() {
      var $back_to_top, offset, offset_opacity, scroll_top_duration;
      offset = 300;
      offset_opacity = 1200;
      scroll_top_duration = 700;
      $back_to_top = jQuery('.e_back_to_top');
      jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
          $back_to_top.addClass('e_is_visible');
        } else {
          $back_to_top.removeClass('e_is_visible e_fade_out');
        }
        if (jQuery(this).scrollTop() > offset_opacity) {
          $back_to_top.addClass('e_fade_out');
        }
      });
      $back_to_top.on('click', function(event) {
        event.preventDefault();
        jQuery('body,html').animate({
          scrollTop: 0
        }, scroll_top_duration);
      });
    },
    initSideNav: function() {
      if (jQuery('.e_side_nav.e_left.e_style_01').length) {
        jQuery('.e_side_nav.e_left.e_style_01').slideAndSwipe();
      }
      if (jQuery("#e_side_menu").length) {
        jQuery("#e_side_menu").navgoco({
          accordion: true,
          save: true,
          caretHtml: '<i class="e_icon ti-angle-up"></i>',
          onToggleAfter: function($sub_menu, $is_opened) {
            var $e_icon;
            $e_icon = $sub_menu.prev().find('.e_icon');
            if ($is_opened) {
              $e_icon.removeClass('ti-angle-up').addClass('ti-angle-down');
            } else {
              $e_icon.removeClass('ti-angle-down').addClass('ti-angle-up');
            }
          }
        });
      }
    },
    applyMatchHeight: function() {
      if (jQuery('.e_vertical_tabs').length) {
        jQuery.each(jQuery('.e_vertical_tabs'), function() {
          jQuery(this).find('.e_equal').matchHeight();
        });
      }
    },
    initPinBox: function() {
      if (1 === parseInt(enliven_config.is_use_sticky_right_sidebar, 10)) {
        if (jQuery('#e_sub_page #e_sidebar_right').length) {
          jQuery('#e_sub_page #e_sidebar_right').pinBox({
            Top: '0px',
            Container: '#e_sub_page',
            MinWidth: '1023px'
          });
        }
      }
    },
    initSliderPro: function() {
      if (jQuery('.e_slider_pro').length) {
        jQuery('.e_slider_pro').sliderPro({
          width: 1140,
          height: 260,
          fade: false,
          arrows: true,
          buttons: false,
          thumbnailPointer: true,
          waitForLayers: true,
          thumbnailWidth: 285,
          thumbnailHeight: 130,
          autoplay: true,
          autoplayDelay: 7000,
          autoScaleLayers: false,
          init: function() {
            jQuery('.e_slider_pro').show();
          }
        });
      }
    },
    clickToOpenSearchForm: function() {
      if (jQuery('.e_search_handle.e_style_01').length) {
        jQuery('body').on('click', '.e_search_handle.e_style_01', function(event) {
          event.preventDefault();
          jQuery('#searchbox').addClass('e_is_visible');
          return jQuery('.e_popup input').focus();
        });
        jQuery('.e_popup').on('click', '.e_popup_close', function(event) {
          event.preventDefault();
          return jQuery('.e_popup').removeClass('e_is_visible');
        });
        jQuery(document).keyup(function(event) {
          if (27 === event.which) {
            return jQuery('.e_popup').removeClass('e_is_visible');
          }
        });
      }
    },
    initEffect: function() {
      jQuery('[data-toggle="tooltip"]').tooltip();
    },
    initWow: function() {
      new WOW().init({
        mobile: false
      });
    },
    initTicker: function() {
      var $ticker;
      $ticker = jQuery('.e_ticker ul');
      if ($ticker.length) {
        $ticker.carouFredSel({
          align: false,
          items: 3,
          scroll: {
            items: 1,
            duration: 7000,
            timeoutDuration: 0,
            easing: 'linear',
            pauseOnHover: 'immediate'
          }
        });
      }
    },
    stickyNavigation: function() {
      var scrollTop, stickyNavTop;
      if (jQuery('#e_site_header.e_transparent').length) {
        stickyNavTop = jQuery('#e_site_header.e_transparent').offset().top;
        scrollTop = jQuery(window).scrollTop();
        if (scrollTop > stickyNavTop) {
          jQuery('#e_site_header.e_transparent').addClass('e_fixing').removeClass('e_wait');
        } else {
          jQuery('#e_site_header.e_transparent').removeClass('e_fixing').addClass('e_wait');
        }
        return;
      }
    },
    initNavigation: function() {
      if (jQuery('#e_site_header.e_style_01, #e_site_header.e_style_02').length) {
        if (jQuery('#e_primary_menu').length) {
          jQuery('#e_primary_menu').superfish({
            cssArrows: false,
            delay: 0,
            speed: 'fast',
            speedOut: 'fast',
            disableHI: false
          });
          jQuery("#e_primary_menu_mobile").navgoco({
            accordion: true,
            save: true,
            caretHtml: '<i class="e_icon ti-angle-up"></i>',
            onToggleAfter: function($sub_menu, $is_opened) {
              var $e_icon;
              $e_icon = $sub_menu.prev().find('.e_icon');
              if ($is_opened) {
                $e_icon.removeClass('ti-angle-up').addClass('ti-angle-down');
              } else {
                $e_icon.removeClass('ti-angle-down').addClass('ti-angle-up');
              }
            }
          });
          jQuery("#e_primary_navigation_mobile").on("click", ".e_handler", function() {
            jQuery("#e_primary_menu_mobile").slideToggle("slow");
            if (jQuery(this).hasClass('ti-align-justify')) {
              jQuery(this).removeClass('ti-align-justify').addClass('ti-close');
            } else {
              jQuery(this).removeClass('ti-close').addClass('ti-align-justify');
            }
          });
          jQuery("#e_primary_menu_mobile .caret").removeClass("caret").addClass("e_caret");
        }
        if (jQuery('#e_site_header.e_transparent').length) {
          new Waypoint.Sticky({
            element: jQuery('#e_site_header.e_transparent')
          });
        }
      }
      if (jQuery('#e_site_header.e_style_03').length) {
        if (jQuery('#e_primary_menu').length) {
          jQuery('#e_primary_menu').superfish({
            cssArrows: false,
            delay: 0,
            speed: 'fast',
            speedOut: 'fast',
            disableHI: false
          });
        }
      }
      if (jQuery('#e_secondary_menu').length) {
        jQuery("#e_secondary_nav").on("click", ".e_handler", function() {
          jQuery("#e_secondary_menu_mobile").slideToggle("slow");
        });
      }
    },
    initPostsCarouselLargeThumb: function() {
      var posts_carousel_large_thumb;
      posts_carousel_large_thumb = jQuery('.e_widget_posts_carousel_large_thumb .owl-carousel');
      if (posts_carousel_large_thumb.length) {
        jQuery.each(posts_carousel_large_thumb, function(index, item) {
          var owl;
          owl = jQuery(this);
          owl.owlCarousel({
            items: 5,
            navigation: false,
            pagination: false,
            itemsDesktop: [1199, 2],
            itemsDesktopSmall: [979, 2],
            afterInit: function() {
              var section;
              section = owl.parents('.e_section');
              if (section.find('.e_left').length) {
                section.find('.e_left').on("click", function() {
                  owl.trigger('owl.prev');
                });
              }
              if (section.find('.e_right').length) {
                section.find('.e_right').on("click", function() {
                  owl.trigger('owl.next');
                });
              }
            }
          });
        });
      }
    },
    initPostsCarouselVerticalThumb: function() {
      var e_widget_posts_carousel_vertical_thumb;
      e_widget_posts_carousel_vertical_thumb = jQuery('.e_widget_posts_carousel_vertical_thumb .owl-carousel');
      if (e_widget_posts_carousel_vertical_thumb.length) {
        jQuery.each(e_widget_posts_carousel_vertical_thumb, function(index, item) {
          jQuery(item).owlCarousel({
            items: 3,
            navigation: false,
            pagination: true,
            autoPlay: true,
            stopOnHover: true,
            itemsDesktop: [1199, 3]
          });
        });
      }
    },
    initTabs: function() {
      jQuery('.e_tabs').on('click', '.e_title', function(event) {
        event.preventDefault();
        if (!jQuery(this).hasClass('e_active')) {
          jQuery(this).parents('ul').find('.e_title.e_active').removeClass('e_active');
          jQuery(this).addClass('e_active');
          jQuery(this).parents('.e_tabs').find('.e_tab_content.e_active').removeClass('e_active');
          return jQuery(jQuery(this).attr('href')).addClass('e_active');
        }
      });
    },
    initToggles: function() {
      return jQuery('.e_toggle').on('click', '.e_toggle_title', function(event) {
        event.preventDefault();
        if (jQuery(this).parent().hasClass('e_active')) {
          jQuery(this).parent().removeClass('e_active');
          jQuery(this).find('.e_action').text('+');
          jQuery(this).next().slideUp(500);
        } else {
          if (jQuery(this).parents('.e_toggles').hasClass('e_accordions')) {
            jQuery(this).parents('.e_toggles').find('.e_toggle').removeClass('e_active');
            jQuery(this).parents('.e_toggles').find('.e_action').text('+');
            jQuery(this).parents('.e_toggles').find('.e_toggle_content').slideUp(500);
          }
          jQuery(this).parent().addClass('e_active');
          jQuery(this).find('.e_action').text('-');
          jQuery(this).next().slideDown(500);
        }
      });
    },
    initNotification: function() {
      jQuery('.e_notification').on('click', '.e_close', function(event) {
        event.preventDefault();
        jQuery(this).parents('.e_notification').slideUp(500);
      });
    },
    initMaps: function() {
      var id_map, lat, lng, place, styles;
      if (jQuery('.e_google_maps').length) {
        id_map = jQuery('.e_google_maps').attr('id');
        lat = parseFloat(jQuery('.e_google_maps').attr('data-latitude'));
        lng = parseFloat(jQuery('.e_google_maps').attr('data-longitude'));
        place = jQuery('.e_google_maps').attr('data-place');
        e_google_maps = new GMaps({
          el: '#' + id_map,
          lat: lat,
          lng: lng,
          zoom: 10,
          scrollwheel: false,
          zoomControl: true,
          zoomControlOpt: {
            style: 'SMALL',
            position: 'TOP_LEFT'
          },
          panControl: true,
          streetViewControl: true,
          mapTypeControl: true,
          overviewMapControl: true
        });
        e_google_maps.addMarker({
          lat: lat,
          lng: lng,
          title: place
        });
        styles = [
          {
            'featureType': 'administrative',
            'elementType': 'labels.text.fill',
            'stylers': [
              {
                'color': '#444444'
              }
            ]
          }, {
            'featureType': 'landscape',
            'elementType': 'all',
            'stylers': [
              {
                'color': '#f2f2f2'
              }
            ]
          }, {
            'featureType': 'poi',
            'elementType': 'all',
            'stylers': [
              {
                'visibility': 'off'
              }
            ]
          }, {
            'featureType': 'road',
            'elementType': 'all',
            'stylers': [
              {
                'saturation': -100
              }, {
                'lightness': 45
              }
            ]
          }, {
            'featureType': 'road.highway',
            'elementType': 'all',
            'stylers': [
              {
                'visibility': 'simplified'
              }
            ]
          }, {
            'featureType': 'road.arterial',
            'elementType': 'labels.icon',
            'stylers': [
              {
                'visibility': 'off'
              }
            ]
          }, {
            'featureType': 'transit',
            'elementType': 'all',
            'stylers': [
              {
                'visibility': 'off'
              }
            ]
          }, {
            'featureType': 'water',
            'elementType': 'all',
            'stylers': [
              {
                'color': '#e74c3c'
              }, {
                'visibility': 'on'
              }
            ]
          }
        ];
        e_google_maps.setOptions({
          styles: styles
        });
      }
    },
    initVideoResponsive: function() {
      jQuery('body').fitVids();
    }
  };

}).call(this);
