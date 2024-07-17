$(document).ready(function() {
	$("body").on('click', '[href*="#"]', function(e){
		var fixed_offset = 100;
		$('html,body').stop().animate({ scrollTop: $(this.hash).offset().top - fixed_offset }, 1000);
		e.preventDefault();
	});

  var btn = $('.top-block-head-fixed');  
  $(window).scroll(function() {     
    if ($(window).scrollTop() > 150) {
      btn.addClass('fix');
    } else {
      btn.removeClass('fix');
    }
  });

	$('#header-menu__toggle').on('click', function() {
		$('#header-menu__toggle').addClass('active');
        $('#header-menu__toggle2').addClass('active');
        $('.header-menu').addClass('active');
	});
    $('#header-menu__toggle2').on('click', function() {
        $('#header-menu__toggle').removeClass('active');
        $('#header-menu__toggle2').removeClass('active');
        $('.header-menu').removeClass('active');
    });
    $('.header-menu a').on('click', function() {
        $('#header-menu__toggle').removeClass('active');
        $('#header-menu__toggle2').removeClass('active');
        $('.header-menu').removeClass('active');
    });

    //LANG
    if(window.location.href.indexOf('?th') != -1) {
      $('[data-lang="en"]').show();
      $('[data-lang="ru"]').hide();
      $('.language-toggle a').removeClass('active');
      $('.language-toggle a[href="?th"]').addClass('active');
    } else if(window.location.href.indexOf('?ru') != -1) {
      $('[data-lang="ru"]').show();
      $('[data-lang="en"]').hide();
      $('[data-lang="th"]').hide();
      $('.language-toggle a').removeClass('active');
      $('.language-toggle a[href="?ru"]').addClass('active');
    } else {
      $('[data-lang="en"]').show();
      $('[data-lang="ru"]').hide();
      $('[data-lang="th"]').hide();
      $('.language-toggle a').removeClass('active');
      $('.language-toggle a[href="?en"]').addClass('active');
    }

	var swiper = new Swiper(".center-slider .slider", {
    	slidesPerView: 1,
    	spaceBetween: 5,
    	loop: true,
    	navigation: {
    		nextEl: ".center-slider .next",
    		prevEl: ".center-slider .prev"
    	},
    	breakpoints: {
    		632: {
    			slidesPerView: 3,
    		}
    	}
	});

  if ($(window).width() < 632) {
    setInterval(function () {
    $('.center-h').text($('.swiper-slide-prev').attr('data-value'));
  }, 100);
  } else {
    setInterval(function () {
    $('.center-h').text($('.swiper-slide-active').attr('data-value'));
  }, 100);
  }

 });

document.addEventListener("DOMContentLoaded", function() {
  var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

  if ("IntersectionObserver" in window) {
    var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(video) {
        if (video.isIntersecting) {
          for (var source in video.target.children) {
            var videoSource = video.target.children[source];
            if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
              videoSource.src = videoSource.dataset.src;
            }
          }

          video.target.load();
          video.target.classList.remove("lazy");
          lazyVideoObserver.unobserve(video.target);
        }
      });
    });

    lazyVideos.forEach(function(lazyVideo) {
      lazyVideoObserver.observe(lazyVideo);
    });
  }
});

(function(){var ac={frameRate:350,animationTime:700,stepSize:45,pulseAlgorithm:true,pulseScale:4,pulseNormalize:1,accelerationDelta:50,accelerationMax:3,keyboardSupport:true,arrowScroll:50,fixedBackground:true,excluded:""};var I=ac;var G=false;var C=false;var m={x:0,y:0};var b=false;var K=document.documentElement;var h;var R;var t;var ai=[];var i;var ad=/^Mac/.test(navigator.platform);var B={left:37,up:38,right:39,down:40,spacebar:32,pageup:33,pagedown:34,end:35,home:36};var T={37:1,38:1,39:1,40:1};function am(){if(I.keyboardSupport){k("keydown",H)}}function af(){if(b||!document.body){return}b=true;var e=document.body;var ar=document.documentElement;var au=window.innerHeight;var at=e.scrollHeight;K=(document.compatMode.indexOf("CSS")>=0)?ar:e;h=e;am();if(top!=self){C=true}else{if(X&&at>au&&(e.offsetHeight<=au||ar.offsetHeight<=au)){var ap=document.createElement("div");ap.style.cssText="position:absolute; z-index:-10000; top:0; left:0; right:0; height:"+K.scrollHeight+"px";document.body.appendChild(ap);var an;t=function(){if(an){return}an=setTimeout(function(){if(G){return}ap.style.height="0";ap.style.height=K.scrollHeight+"px";an=null},500)};setTimeout(t,10);k("resize",t);var aq={attributes:true,childList:true,characterData:false};R=new L(t);R.observe(e,aq);if(K.offsetHeight<=au){var ao=document.createElement("div");ao.style.clear="both";e.appendChild(ao)}}}if(!I.fixedBackground&&!G){e.style.backgroundAttachment="scroll";ar.style.backgroundAttachment="scroll"}}function d(){R&&R.disconnect();a(S,u);a("mousedown",w);a("keydown",H);a("resize",t);a("load",af)}var V=[];var l=false;var v=Date.now();function ag(ap,ao,at){M(ao,at);if(I.accelerationMax!=1){var e=Date.now();var av=e-v;if(av<I.accelerationDelta){var ar=(1+(50/av))/2;if(ar>1){ar=Math.min(ar,I.accelerationMax);ao*=ar;at*=ar}}v=Date.now()}V.push({x:ao,y:at,lastX:(ao<0)?0.99:-0.99,lastY:(at<0)?0.99:-0.99,start:Date.now()});if(l){return}var au=D();var aq=(ap===au||ap===document.body);if(ap.$scrollBehavior==null&&O(ap)){ap.$scrollBehavior=ap.style.scrollBehavior;ap.style.scrollBehavior="auto"}var an=function(ax){var aw=Date.now();var aE=0;var aD=0;for(var az=0;az<V.length;az++){var aG=V[az];var aF=aw-aG.start;var ay=(aF>=I.animationTime);var aA=(ay)?1:aF/I.animationTime;if(I.pulseAlgorithm){aA=p(aA)}var aC=(aG.x*aA-aG.lastX)>>0;var aB=(aG.y*aA-aG.lastY)>>0;aE+=aC;aD+=aB;aG.lastX+=aC;aG.lastY+=aB;if(ay){V.splice(az,1);az--}}if(aq){window.scrollBy(aE,aD)}else{if(aE){ap.scrollLeft+=aE}if(aD){ap.scrollTop+=aD}}if(!ao&&!at){V=[]}if(V.length){U(an,ap,(1000/I.frameRate+1))}else{l=false;if(ap.$scrollBehavior!=null){ap.style.scrollBehavior=ap.$scrollBehavior;ap.$scrollBehavior=null}}};U(an,ap,0);l=true}function u(ap){if(!b){af()}var aq=ap.target;if(ap.defaultPrevented||ap.ctrlKey){return true}if(s(h,"embed")||(s(aq,"embed")&&/\.pdf/i.test(aq.src))||s(h,"object")||aq.shadowRoot){return true}var an=-ap.wheelDeltaX||ap.deltaX||0;var e=-ap.wheelDeltaY||ap.deltaY||0;if(ad){if(ap.wheelDeltaX&&A(ap.wheelDeltaX,120)){an=-120*(ap.wheelDeltaX/Math.abs(ap.wheelDeltaX))}if(ap.wheelDeltaY&&A(ap.wheelDeltaY,120)){e=-120*(ap.wheelDeltaY/Math.abs(ap.wheelDeltaY))}}if(!an&&!e){e=-ap.wheelDelta||0}if(ap.deltaMode===1){an*=40;e*=40}var ao=Y(aq);if(!ao){if(C&&ah){Object.defineProperty(ap,"target",{value:window.frameElement});return parent.wheel(ap)}return true}if(ak(e)){return true}if(Math.abs(an)>1.2){an*=I.stepSize/120}if(Math.abs(e)>1.2){e*=I.stepSize/120}ag(ao,an,e);ap.preventDefault();r()}function H(e){var au=e.target;var aq=e.ctrlKey||e.altKey||e.metaKey||(e.shiftKey&&e.keyCode!==B.spacebar);if(!document.body.contains(h)){h=document.activeElement}var an=/^(textarea|select|embed|object)$/i;var ao=/^(button|submit|radio|checkbox|file|color|image)$/i;if(e.defaultPrevented||an.test(au.nodeName)||s(au,"input")&&!ao.test(au.type)||s(h,"video")||z(e)||au.isContentEditable||aq){return true}if((s(au,"button")||s(au,"input")&&ao.test(au.type))&&e.keyCode===B.spacebar){return true}if(s(au,"input")&&au.type=="radio"&&T[e.keyCode]){return true}var ap,ay=0,aw=0;var at=Y(h);if(!at){return(C&&ah)?parent.keydown(e):true}var ar=at.clientHeight;if(at==document.body){ar=window.innerHeight}switch(e.keyCode){case B.up:aw=-I.arrowScroll;break;case B.down:aw=I.arrowScroll;break;case B.spacebar:ap=e.shiftKey?1:-1;aw=-ap*ar*0.9;break;case B.pageup:aw=-ar*0.9;break;case B.pagedown:aw=ar*0.9;break;case B.home:if(at==document.body&&document.scrollingElement){at=document.scrollingElement}aw=-at.scrollTop;break;case B.end:var ax=at.scrollHeight-at.scrollTop;var av=ax-ar;aw=(av>0)?av+10:0;break;case B.left:ay=-I.arrowScroll;break;case B.right:ay=I.arrowScroll;break;default:return true}ag(at,ay,aw);e.preventDefault();r()}function w(e){h=e.target}var J=(function(){var e=0;return function(an){return an.uniqueID||(an.uniqueID=e++)}})();var o={};var n={};var ae;var al={};function r(){clearTimeout(ae);ae=setInterval(function(){o=n=al={}},1*1000)}function g(ap,ao,e){var an=e?o:n;for(var aq=ap.length;aq--;){an[J(ap[aq])]=ao}return ao}function j(an,e){return(e?o:n)[J(an)]}function Y(ar){var ao=[];var e=document.body;var an=K.scrollHeight;do{var aq=j(ar,false);if(aq){return g(ao,aq)}ao.push(ar);if(an===ar.scrollHeight){var at=W(K)&&W(e);var ap=at||N(K);if(C&&Z(K)||!C&&ap){return g(ao,D())}}else{if(Z(ar)&&N(ar)){return g(ao,ar)}}}while((ar=ar.parentElement))}function Z(e){return(e.clientHeight+10<e.scrollHeight)}function W(e){var an=getComputedStyle(e,"").getPropertyValue("overflow-y");return(an!=="hidden")}function N(e){var an=getComputedStyle(e,"").getPropertyValue("overflow-y");return(an==="scroll"||an==="auto")}function O(e){var ao=J(e);if(al[ao]==null){var an=getComputedStyle(e,"")["scroll-behavior"];al[ao]=("smooth"==an)}return al[ao]}function k(ao,an,e){window.addEventListener(ao,an,e||false)}function a(ao,an,e){window.removeEventListener(ao,an,e||false)}function s(an,e){return an&&(an.nodeName||"").toLowerCase()===e.toLowerCase()}function M(e,an){e=(e>0)?1:-1;an=(an>0)?1:-1;if(m.x!==e||m.y!==an){m.x=e;m.y=an;V=[];v=0}}if(window.localStorage&&localStorage.SS_deltaBuffer){try{ai=localStorage.SS_deltaBuffer.split(",")}catch(aj){}}function ak(e){if(!e){return}if(!ai.length){ai=[e,e,e]}e=Math.abs(e);ai.push(e);ai.shift();clearTimeout(i);i=setTimeout(function(){try{localStorage.SS_deltaBuffer=ai.join(",")}catch(ap){}},1000);var an=e>120&&F(e);var ao=!F(120)&&!F(100)&&!an;if(e<50){return true}return ao}function A(an,e){return(Math.floor(an/e)==an/e)}function F(e){return(A(ai[0],e)&&A(ai[1],e)&&A(ai[2],e))}function z(ao){var an=ao.target;var e=false;if(document.URL.indexOf("www.youtube.com/watch")!=-1){do{e=(an.classList&&an.classList.contains("html5-video-controls"));if(e){break}}while((an=an.parentNode))}return e}var U=(function(){return(window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(ao,an,e){window.setTimeout(ao,e||(1000/60))})})();var L=(window.MutationObserver||window.WebKitMutationObserver||window.MozMutationObserver);var D=(function(){var e=document.scrollingElement;return function(){if(!e){var ap=document.createElement("div");ap.style.cssText="height:10000px;width:1px;";document.body.appendChild(ap);var ao=document.body.scrollTop;var an=document.documentElement.scrollTop;window.scrollBy(0,3);if(document.body.scrollTop!=ao){(e=document.body)}else{(e=document.documentElement)}window.scrollBy(0,-3);document.body.removeChild(ap)}return e}})();function ab(e){var ao,ap,an;e=e*I.pulseScale;if(e<1){ao=e-(1-Math.exp(-e))}else{ap=Math.exp(-1);e-=1;an=1-Math.exp(-e);ao=ap+(an*(1-ap))}return ao*I.pulseNormalize}function p(e){if(e>=1){return 1}if(e<=0){return 0}if(I.pulseNormalize==1){I.pulseNormalize/=ab(1)}return ab(e)}var Q=window.navigator.userAgent;var aa=/Edge/.test(Q);var ah=/chrome/i.test(Q)&&!aa;var f=/safari/i.test(Q)&&!aa;var c=/firefox/i.test(Q);var P=/mobile/i.test(Q);var y=/Windows NT 6.1/i.test(Q)&&/rv:11/i.test(Q);var X=f&&(/Version\/8/i.test(Q)||/Version\/9/i.test(Q));var x=false;try{window.addEventListener("test",null,Object.defineProperty({},"passive",{get:function(){x=true}}))}catch(aj){}var E=x?{passive:false}:false;var S="onwheel" in document.createElement("div")?"wheel":"mousewheel";if(S){k(S,u,E);k("mousedown",w);k("load",af)}function q(an){for(var e in an){if(ac.hasOwnProperty(e)){I[e]=an[e]}}}q.destroy=d;if(window.SmoothScrollOptions){q(window.SmoothScrollOptions)}if(typeof define==="function"&&define.amd){define(function(){return q})}else{if("object"==typeof exports){module.exports=q}else{window.SmoothScroll=q}}})();

// when animating on canvas, it is best to use requestAnimationFrame instead of setTimeout or setInterval
// not supported in all browsers though and sometimes needs a prefix, so we need a shim
window.requestAnimFrame = ( function() {
  return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        function( callback ) {
          window.setTimeout( callback, 1000 / 60 );
        };
})();

// now we will setup our basic variables for the demo
var canvas = document.getElementById( 'canvas' ),
    ctx = canvas.getContext( '2d' ),
    // full screen dimensions
    cw = window.innerWidth,
    ch = window.innerHeight,
    // firework collection
    fireworks = [],
    // particle collection
    particles = [],
    // starting hue
    hue = 120,
    // when launching fireworks with a click, too many get launched at once without a limiter, one launch per 5 loop ticks
    limiterTotal = 5,
    limiterTick = 0,
    // this will time the auto launches of fireworks, one launch per 80 loop ticks
    timerTotal = 80,
    timerTick = 0,
    mousedown = false,
    // mouse x coordinate,
    mx,
    // mouse y coordinate
    my;
    
// set canvas dimensions
canvas.width = cw;
canvas.height = ch;

// now we are going to setup our function placeholders for the entire demo

// get a random number within a range
function random( min, max ) {
  return Math.random() * ( max - min ) + min;
}

// calculate the distance between two points
function calculateDistance( p1x, p1y, p2x, p2y ) {
  var xDistance = p1x - p2x,
      yDistance = p1y - p2y;
  return Math.sqrt( Math.pow( xDistance, 2 ) + Math.pow( yDistance, 2 ) );
}

// create firework
function Firework( sx, sy, tx, ty ) {
  // actual coordinates
  this.x = sx;
  this.y = sy;
  // starting coordinates
  this.sx = sx;
  this.sy = sy;
  // target coordinates
  this.tx = tx;
  this.ty = ty;
  // distance from starting point to target
  this.distanceToTarget = calculateDistance( sx, sy, tx, ty );
  this.distanceTraveled = 0;
  // track the past coordinates of each firework to create a trail effect, increase the coordinate count to create more prominent trails
  this.coordinates = [];
  this.coordinateCount = 3;
  // populate initial coordinate collection with the current coordinates
  while( this.coordinateCount-- ) {
    this.coordinates.push( [ this.x, this.y ] );
  }
  this.angle = Math.atan2( ty - sy, tx - sx );
  this.speed = 2;
  this.acceleration = 1.05;
  this.brightness = random( 50, 70 );
  // circle target indicator radius
  this.targetRadius = 1;
}

// update firework
Firework.prototype.update = function( index ) {
  // remove last item in coordinates array
  this.coordinates.pop();
  // add current coordinates to the start of the array
  this.coordinates.unshift( [ this.x, this.y ] );
  
  // cycle the circle target indicator radius
  if( this.targetRadius < 8 ) {
    this.targetRadius += 0.3;
  } else {
    this.targetRadius = 1;
  }
  
  // speed up the firework
  this.speed *= this.acceleration;
  
  // get the current velocities based on angle and speed
  var vx = Math.cos( this.angle ) * this.speed,
      vy = Math.sin( this.angle ) * this.speed;
  // how far will the firework have traveled with velocities applied?
  this.distanceTraveled = calculateDistance( this.sx, this.sy, this.x + vx, this.y + vy );
  
  // if the distance traveled, including velocities, is greater than the initial distance to the target, then the target has been reached
  if( this.distanceTraveled >= this.distanceToTarget ) {
    createParticles( this.tx, this.ty );
    // remove the firework, use the index passed into the update function to determine which to remove
    fireworks.splice( index, 1 );
  } else {
    // target not reached, keep traveling
    this.x += vx;
    this.y += vy;
  }
}

// draw firework
Firework.prototype.draw = function() {
  ctx.beginPath();
  // move to the last tracked coordinate in the set, then draw a line to the current x and y
  ctx.moveTo( this.coordinates[ this.coordinates.length - 1][ 0 ], this.coordinates[ this.coordinates.length - 1][ 1 ] );
  ctx.lineTo( this.x, this.y );
  ctx.strokeStyle = 'hsl(' + hue + ', 100%, ' + this.brightness + '%)';
  ctx.stroke();
  
  ctx.beginPath();
  // draw the target for this firework with a pulsing circle
  ctx.arc( this.tx, this.ty, this.targetRadius, 0, Math.PI * 2 );
  ctx.stroke();
}

// create particle
function Particle( x, y ) {
  this.x = x;
  this.y = y;
  // track the past coordinates of each particle to create a trail effect, increase the coordinate count to create more prominent trails
  this.coordinates = [];
  this.coordinateCount = 5;
  while( this.coordinateCount-- ) {
    this.coordinates.push( [ this.x, this.y ] );
  }
  // set a random angle in all possible directions, in radians
  this.angle = random( 0, Math.PI * 2 );
  this.speed = random( 1, 10 );
  // friction will slow the particle down
  this.friction = 0.95;
  // gravity will be applied and pull the particle down
  this.gravity = 1;
  // set the hue to a random number +-20 of the overall hue variable
  this.hue = random( hue - 20, hue + 20 );
  this.brightness = random( 50, 80 );
  this.alpha = 1;
  // set how fast the particle fades out
  this.decay = random( 0.015, 0.03 );
}

// update particle
Particle.prototype.update = function( index ) {
  // remove last item in coordinates array
  this.coordinates.pop();
  // add current coordinates to the start of the array
  this.coordinates.unshift( [ this.x, this.y ] );
  // slow down the particle
  this.speed *= this.friction;
  // apply velocity
  this.x += Math.cos( this.angle ) * this.speed;
  this.y += Math.sin( this.angle ) * this.speed + this.gravity;
  // fade out the particle
  this.alpha -= this.decay;
  
  // remove the particle once the alpha is low enough, based on the passed in index
  if( this.alpha <= this.decay ) {
    particles.splice( index, 1 );
  }
}

// draw particle
Particle.prototype.draw = function() {
  ctx. beginPath();
  // move to the last tracked coordinates in the set, then draw a line to the current x and y
  ctx.moveTo( this.coordinates[ this.coordinates.length - 1 ][ 0 ], this.coordinates[ this.coordinates.length - 1 ][ 1 ] );
  ctx.lineTo( this.x, this.y );
  ctx.strokeStyle = 'hsla(' + this.hue + ', 100%, ' + this.brightness + '%, ' + this.alpha + ')';
  ctx.stroke();
}

// create particle group/explosion
function createParticles( x, y ) {
  // increase the particle count for a bigger explosion, beware of the canvas performance hit with the increased particles though
  var particleCount = 30;
  while( particleCount-- ) {
    particles.push( new Particle( x, y ) );
  }
}

// main demo loop
function loop() {
  // this function will run endlessly with requestAnimationFrame
  requestAnimFrame( loop );
  
  // increase the hue to get different colored fireworks over time
  hue += 0.5;
  
  // normally, clearRect() would be used to clear the canvas
  // we want to create a trailing effect though
  // setting the composite operation to destination-out will allow us to clear the canvas at a specific opacity, rather than wiping it entirely
  ctx.globalCompositeOperation = 'destination-out';
  // decrease the alpha property to create more prominent trails
  ctx.fillStyle = 'rgba(0, 0, 0, 0.5)';
  ctx.fillRect( 0, 0, cw, ch );
  // change the composite operation back to our main mode
  // lighter creates bright highlight points as the fireworks and particles overlap each other
  ctx.globalCompositeOperation = 'lighter';
  
  // loop over each firework, draw it, update it
  var i = fireworks.length;
  while( i-- ) {
    fireworks[ i ].draw();
    fireworks[ i ].update( i );
  }
  
  // loop over each particle, draw it, update it
  var i = particles.length;
  while( i-- ) {
    particles[ i ].draw();
    particles[ i ].update( i );
  }
  
  // launch fireworks automatically to random coordinates, when the mouse isn't down
  if( timerTick >= timerTotal ) {
    if( !mousedown ) {
      // start the firework at the bottom middle of the screen, then set the random target coordinates, the random y coordinates will be set within the range of the top half of the screen
      fireworks.push( new Firework( cw / 2, ch, random( 0, cw ), random( 0, ch / 2 ) ) );
      timerTick = 0;
    }
  } else {
    timerTick++;
  }
  
  // limit the rate at which fireworks get launched when mouse is down
  if( limiterTick >= limiterTotal ) {
    if( mousedown ) {
      // start the firework at the bottom middle of the screen, then set the current mouse coordinates as the target
      fireworks.push( new Firework( cw / 2, ch, mx, my ) );
      limiterTick = 0;
    }
  } else {
    limiterTick++;
  }
}

// mouse event bindings
// update the mouse coordinates on mousemove
canvas.addEventListener( 'mousemove', function( e ) {
  mx = e.pageX - canvas.offsetLeft;
  my = e.pageY - canvas.offsetTop;
});

// toggle mousedown state and prevent canvas from being selected
canvas.addEventListener( 'mousedown', function( e ) {
  e.preventDefault();
  mousedown = true;
});

canvas.addEventListener( 'mouseup', function( e ) {
  e.preventDefault();
  mousedown = false;
});

// once the window loads, we are ready for some fireworks!
window.onload = loop;

