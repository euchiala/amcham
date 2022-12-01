function isXs() { return $('.breakpoint-detection .detect-xs').is(':visible') === true; }
function isSm() { return $('.breakpoint-detection .detect-sm').is(':visible') === true; }
function isMd() { return $('.breakpoint-detection .detect-md').is(':visible') === true; }
function isLg() { return $('.breakpoint-detection .detect-lg').is(':visible') === true; }
function isXl() { return $('.breakpoint-detection .detect-xl').is(':visible') === true; }

/*!
* Determine if an element is in the viewport
*/
var isInViewport = function (el) {
   var scroll = window.scrollY || window.pageYOffset;
   var boundsTop = el.getBoundingClientRect().top + scroll;
   var viewport = {
       top: scroll,
       bottom: scroll + window.innerHeight
   };
   var bounds = {
       top: boundsTop,
       bottom: boundsTop + el.clientHeight
   };
   return (
       (bounds.bottom >= viewport.top && bounds.bottom <= viewport.bottom) ||
       (bounds.top <= viewport.bottom && bounds.top >= viewport.top)
   );
};