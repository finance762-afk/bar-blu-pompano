/* ============================================================
   Bar Blu — Main JavaScript
   Handles: nav scroll, mobile menu, smooth scroll,
            scroll reveals, stat counters, Swiper
   ============================================================ */

document.addEventListener('DOMContentLoaded', function () {

  /* ── Sticky Header: add .scrolled at 50px ────────────────── */
  var header = document.getElementById('site-header');
  if (header) {
    function onScroll() {
      header.classList.toggle('scrolled', window.scrollY > 50);
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // apply on load if already scrolled
  }

  /* ── Mobile Hamburger ← → Mobile Menu ───────────────────── */
  var hamburger  = document.getElementById('hamburger');
  var mobileMenu = document.getElementById('mobile-menu');

  if (hamburger && mobileMenu) {
    hamburger.addEventListener('click', function () {
      var isOpen = mobileMenu.classList.toggle('active');
      hamburger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    // Close when any link inside is clicked
    mobileMenu.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        mobileMenu.classList.remove('active');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });

    // Close on Escape key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
        mobileMenu.classList.remove('active');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
        hamburger.focus();
      }
    });
  }

  /* ── Smooth Scroll for in-page Anchor Links ──────────────── */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      var targetId = this.getAttribute('href').substring(1);
      if (!targetId) return;
      var target = document.getElementById(targetId);
      if (target) {
        e.preventDefault();
        var offset = header ? header.offsetHeight + 16 : 20;
        var top = target.getBoundingClientRect().top + window.pageYOffset - offset;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

  /* ── Scroll Reveal: [data-animate] + .reveal-* ───────────── */
  if ('IntersectionObserver' in window) {
    var revealObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('animated', 'is-visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

    var revealTargets = document.querySelectorAll(
      '[data-animate], .reveal-up, .reveal-down, .reveal-left, .reveal-right, .reveal-scale'
    );
    revealTargets.forEach(function (el) { revealObserver.observe(el); });
  }

  /* ── Stat Counters: [data-counter] ──────────────────────── */
  var counters = document.querySelectorAll('[data-counter]');
  if (counters.length > 0 && 'IntersectionObserver' in window) {
    var counterObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var el       = entry.target;
        var target   = parseInt(el.getAttribute('data-counter'), 10);
        var suffix   = el.getAttribute('data-suffix') || '';
        var prefix   = el.getAttribute('data-prefix') || '';
        var duration = 1800;
        var startTs  = null;

        function tick(ts) {
          if (!startTs) startTs = ts;
          var progress = Math.min((ts - startTs) / duration, 1);
          var eased    = 1 - Math.pow(1 - progress, 3); // ease-out cubic
          var current  = Math.floor(eased * target);
          el.textContent = prefix + current.toLocaleString() + suffix;
          if (progress < 1) {
            requestAnimationFrame(tick);
          } else {
            el.textContent = prefix + target.toLocaleString() + suffix;
          }
        }
        requestAnimationFrame(tick);
        counterObserver.unobserve(el);
      });
    }, { threshold: 0.3 });

    counters.forEach(function (el) { counterObserver.observe(el); });
  }

  /* ── Swiper Carousel (loaded conditionally on pages that need it) ── */
  if (typeof Swiper !== 'undefined') {
    var reviewsEl = document.querySelector('.reviews-swiper');
    if (reviewsEl) {
      new Swiper('.reviews-swiper', {
        slidesPerView:  1,
        spaceBetween:   24,
        loop:           true,
        autoplay:       { delay: 5000, disableOnInteraction: false },
        pagination:     { el: '.swiper-pagination', clickable: true },
        navigation:     { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        breakpoints: {
          640:  { slidesPerView: 2 },
          1024: { slidesPerView: 3 },
        },
      });
    }
  }

});
