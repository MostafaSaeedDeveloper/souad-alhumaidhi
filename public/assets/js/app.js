(function ($) {
    'use strict';

    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Sticky header background on scroll
    var $header = $('.site-header');
    function toggleHeader() {
        if ($(window).scrollTop() > 40) {
            $header.addClass('is-scrolled');
        } else {
            $header.removeClass('is-scrolled');
        }
    }
    toggleHeader();
    $(window).on('scroll', toggleHeader);

    // Fade-up reveal on scroll using IntersectionObserver
    var revealTargets = document.querySelectorAll('.fade-up, .fade-in');
    if (reducedMotion) {
        revealTargets.forEach(function (el) { el.classList.add('is-visible'); });
    } else if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        revealTargets.forEach(function (el, i) {
            el.style.setProperty('--stagger-index', i % 6);
            observer.observe(el);
        });
    } else {
        revealTargets.forEach(function (el) { el.classList.add('is-visible'); });
    }

    // Media filter tabs
    $('.media-tabs button').on('click', function () {
        var filter = $(this).data('filter');
        $('.media-tabs button').removeClass('active');
        $(this).addClass('active');
        $('.media-card').each(function () {
            var cat = $(this).data('category');
            $(this).closest('.media-col').toggle(filter === 'all' || filter === cat);
        });
    });

    // Gallery filter tabs
    $('.gallery-tabs button').on('click', function () {
        var filter = $(this).data('filter');
        $('.gallery-tabs button').removeClass('active');
        $(this).addClass('active');
        $('.gallery-item-col').each(function () {
            var cat = $(this).data('category');
            $(this).toggle(filter === 'all' || filter === cat);
        });
    });

    // Video modal — do not load/play the iframe until opened
    var $videoModal = $('#videoModal');
    if ($videoModal.length) {
        $(document).on('click', '[data-video-embed]', function (e) {
            e.preventDefault();
            var embedUrl = $(this).data('video-embed');
            var title = $(this).data('video-title') || '';
            $videoModal.find('.modal-title').text(title);
            $videoModal.find('.ratio').html(
                '<iframe src="' + embedUrl + '?autoplay=1&rel=0" title="' + title + '" allow="autoplay; encrypted-media; picture-in-picture" allowfullscreen></iframe>'
            );
        });
        $videoModal.on('hidden.bs.modal', function () {
            $videoModal.find('.ratio').empty();
        });
    }

    // Smooth counter for highlight numbers (if any numeric stat is added later)
    $('.counter-num[data-count]').each(function () {
        var $el = $(this);
        var target = parseInt($el.data('count'), 10) || 0;
        if (reducedMotion) { $el.text(target); return; }
        var current = 0;
        var step = Math.max(1, Math.ceil(target / 60));
        var timer = setInterval(function () {
            current += step;
            if (current >= target) { current = target; clearInterval(timer); }
            $el.text(current);
        }, 20);
    });
})(jQuery);
