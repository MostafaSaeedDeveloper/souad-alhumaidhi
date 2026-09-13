(function ($) {
  "use strict";

  $(function () {
    // Sticky header on scroll
    var $header = $("#siteHeader");
    var $progress = $("#scrollProgress");
    var $backToTop = $("#backToTop");

    function onScroll() {
      var st = $(window).scrollTop();
      $header.toggleClass("scrolled", st > 40);
      $backToTop.toggleClass("show", st > 500);

      var docHeight = $(document).height() - $(window).height();
      var pct = docHeight > 0 ? (st / docHeight) * 100 : 0;
      $progress.css("width", pct + "%");
    }
    $(window).on("scroll", onScroll);
    onScroll();

    $backToTop.on("click", function () {
      $("html, body").animate({ scrollTop: 0 }, 500);
    });

    // Active nav link highlighting by current path
    var path = window.location.pathname.replace(/\/$/, "") || "/";
    $("#siteHeader .nav-link").each(function () {
      var href = $(this).attr("href");
      if (!href) return;
      try {
        var linkPath = new URL(href, window.location.origin).pathname.replace(/\/$/, "") || "/";
        if (linkPath === path) $(this).addClass("active");
      } catch (e) {}
    });

    // Counter animation
    $(".counter-num[data-count]").each(function () {
      var $el = $(this);
      var target = parseInt($el.data("count"), 10) || 0;
      var animated = false;
      var trigger = function () {
        if (animated) return;
        var rect = $el[0].getBoundingClientRect();
        if (rect.top < window.innerHeight - 50) {
          animated = true;
          $({ n: 0 }).animate(
            { n: target },
            {
              duration: 1400,
              step: function (now) {
                $el.text(Math.ceil(now));
              },
              complete: function () {
                $el.text(target);
              },
            }
          );
        }
      };
      $(window).on("scroll", trigger);
      trigger();
    });

    // Video modal (YouTube embed on demand)
    var $videoModal = $("#videoModal");
    if ($videoModal.length) {
      $(document).on("click", "[data-video-embed]", function (e) {
        e.preventDefault();
        var embed = $(this).data("video-embed");
        var title = $(this).data("video-title") || "";
        $videoModal.find(".modal-title").text(title);
        $videoModal.find(".ratio").html(
          '<iframe src="' + embed + '?autoplay=1" title="' + title.replace(/"/g, "") +
            '" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
        );
        var modal = bootstrap.Modal.getOrCreateInstance($videoModal[0]);
        modal.show();
      });
      $videoModal.on("hidden.bs.modal", function () {
        $videoModal.find(".ratio").empty();
      });
    }

    // Init AOS
    if (window.AOS) {
      AOS.init({ once: true, duration: 800, easing: "ease-out-cubic", offset: 60 });
    }

    // Init Swiper sliders (guarded per-instance)
    if (window.Swiper) {
      document.querySelectorAll("[data-swiper]").forEach(function (el) {
        var config = JSON.parse(el.getAttribute("data-swiper") || "{}");
        new Swiper(el, config);
      });
    }

    // Init GLightbox
    if (window.GLightbox) {
      GLightbox({ selector: ".glightbox" });
    }
  });
})(jQuery);
