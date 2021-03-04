/**
 * Modernizr Support Plugin
 *
 * @version 2.3.4
 * @author Vivid Planet Software GmbH
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
!function(n,i,t,o,r){var s={transition:{end:{WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd",transition:"transitionend"}},animation:{end:{WebkitAnimation:"webkitAnimationEnd",MozAnimation:"animationend",OAnimation:"oAnimationEnd",animation:"animationend"}}};if(!i)throw new Error("Modernizr is not loaded.");n.each(["cssanimations","csstransitions","csstransforms","csstransforms3d","prefixed"],(function(n,t){if(void 0===i[t])throw new Error(['Modernizr "',t,'" is not loaded.'].join(""))})),i.csstransitions&&(n.support.transition=new String(i.prefixed("transition")),n.support.transition.end=s.transition.end[n.support.transition],/Android 4\.[123]/.test(navigator.userAgent)&&(n.support.transition.end="webkitTransitionEnd")),i.cssanimations&&(n.support.animation=new String(i.prefixed("animation")),n.support.animation.end=s.animation.end[n.support.animation]),i.csstransforms&&(n.support.transform=new String(i.prefixed("transform")),n.support.transform3d=i.csstransforms3d)}(window.Zepto||window.jQuery,window.Modernizr,window,document);