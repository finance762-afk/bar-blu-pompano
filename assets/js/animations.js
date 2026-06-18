/* ============================================================
   Bar Blu — Animations
   CSS Scroll Timeline progressive enhancement,
   floating accent drift, neon pulse on .stat-number
   ============================================================ */

/* ── CSS Scroll Timeline (native, no JS loops) ─────────────────
   Applies fade-in-up to .fade-in-up elements in supporting browsers.
   main.js IntersectionObserver provides the fallback everywhere else.
   ─────────────────────────────────────────────────────────────── */
(function () {
  if (!CSS.supports('animation-timeline', 'view()')) return;

  var style = document.createElement('style');
  style.textContent = [
    '@keyframes bb-fade-up {',
    '  from { opacity: 0; transform: translateY(30px); }',
    '  to   { opacity: 1; transform: none; }',
    '}',
    '.reveal-up, .reveal-down, .reveal-left, .reveal-right, .reveal-scale, [data-animate] {',
    '  animation: bb-fade-up linear;',
    '  animation-timeline: view();',
    '  animation-range: entry 0% entry 45%;',
    '  opacity: 1; transform: none;',  /* override JS initial state in native browsers */
    '}',
    '@media (prefers-reduced-motion: reduce) {',
    '  .reveal-up, .reveal-down, .reveal-left, .reveal-right, .reveal-scale, [data-animate] {',
    '    animation: none;',
    '  }',
    '}',
  ].join('\n');
  document.head.appendChild(style);
}());

/* ── Neon pulse on stat numbers (subtle glow cycle) ─────────── */
document.addEventListener('DOMContentLoaded', function () {
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  document.querySelectorAll('.stat-number').forEach(function (el, i) {
    el.style.animation =
      'bb-neon-pulse 3s ease-in-out ' + (i * 0.4) + 's infinite alternate';
  });

  /* Inject keyframe once */
  if (!document.getElementById('bb-neon-style')) {
    var s = document.createElement('style');
    s.id  = 'bb-neon-style';
    s.textContent = [
      '@keyframes bb-neon-pulse {',
      '  from { text-shadow: 0 0 12px rgba(0,197,255,0.3), 0 0 30px rgba(0,197,255,0.1); }',
      '  to   { text-shadow: 0 0 24px rgba(0,197,255,0.7), 0 0 60px rgba(0,197,255,0.3); }',
      '}',
    ].join('\n');
    document.head.appendChild(s);
  }
});
