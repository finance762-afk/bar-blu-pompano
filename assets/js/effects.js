/* ============================================================
   Bar Blu — Effects
   Ticker-strip pause on hover, form submit state,
   ripple on buttons, FAQ accordion
   ============================================================ */

document.addEventListener('DOMContentLoaded', function () {

  /* ── Ticker-strip: pause animation on hover ──────────────── */
  document.querySelectorAll('.ticker-track').forEach(function (track) {
    var strip = track.closest('.ticker-strip');
    if (!strip) return;
    strip.addEventListener('mouseenter', function () {
      track.style.animationPlayState = 'paused';
    });
    strip.addEventListener('mouseleave', function () {
      track.style.animationPlayState = 'running';
    });
  });

  /* ── Form: loading state on submit ──────────────────────── */
  document.querySelectorAll('form[action]').forEach(function (form) {
    form.addEventListener('submit', function () {
      var btn = form.querySelector('[type="submit"]');
      if (btn) {
        btn.textContent = 'Sending…';
        btn.disabled = true;
      }
    });
  });

  /* ── Ripple effect on .btn clicks ───────────────────────── */
  document.querySelectorAll('.btn').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      var rect   = btn.getBoundingClientRect();
      var circle = document.createElement('span');
      var size   = Math.max(rect.width, rect.height);
      circle.style.cssText = [
        'position:absolute',
        'border-radius:50%',
        'width:'  + size + 'px',
        'height:' + size + 'px',
        'left:'   + (e.clientX - rect.left  - size / 2) + 'px',
        'top:'    + (e.clientY - rect.top   - size / 2) + 'px',
        'background:rgba(255,255,255,0.18)',
        'transform:scale(0)',
        'animation:ripple 0.55s linear',
        'pointer-events:none',
      ].join(';');
      btn.appendChild(circle);
      setTimeout(function () { circle.remove(); }, 600);
    });
  });

  /* ── FAQ accordion (pages that use it) ──────────────────── */
  document.querySelectorAll('.faq-item[data-toggle]').forEach(function (item) {
    var trigger = item.querySelector('[data-faq-trigger]');
    var answer  = item.querySelector('.faq-answer');
    if (!trigger || !answer) return;

    answer.style.overflow = 'hidden';
    answer.style.maxHeight = '0';
    answer.style.transition = 'max-height 0.35s ease';

    trigger.addEventListener('click', function () {
      var open = item.classList.toggle('is-open');
      answer.style.maxHeight = open ? answer.scrollHeight + 'px' : '0';
      trigger.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  });

});

/* Ripple keyframe — injected once */
(function () {
  if (document.getElementById('bb-ripple-style')) return;
  var s = document.createElement('style');
  s.id = 'bb-ripple-style';
  s.textContent = '@keyframes ripple{to{transform:scale(2.5);opacity:0}}';
  document.head.appendChild(s);
}());
