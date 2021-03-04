/*! bigSlide - v0.12.0 - 2016-08-01
* http://ascott1.github.io/bigSlide.js/
* Copyright (c) 2016 Adam D. Scott; Licensed MIT */
!function(e){"use strict";"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof exports?module.exports=e(require("jquery")):e(jQuery)}((function(e){"use strict";function t(e,t){for(var s,i=e.split(";"),n=t.split(" "),h="",d=0,a=i.length;a>d;d++){s=!0;for(var o=0,c=n.length;c>o;o++)(""===i[d]||-1!==i[d].indexOf(n[o]))&&(s=!1);s&&(h+=i[d]+"; ")}return h}e.fn.bigSlide=function(s){var i=this,n=e.extend({menu:"#menu",push:".push",shrink:".shrink",hiddenThin:".hiddenThin",side:"left",menuWidth:"15.625em",semiOpenMenuWidth:"4em",speed:"300",state:"closed",activeBtn:"active",easyClose:!1,saveState:!1,semiOpenStatus:!1,semiOpenScreenWidth:480,beforeOpen:function(){},afterOpen:function(){},beforeClose:function(){},afterClose:function(){}},s),h="transition -o-transition -ms-transition -moz-transitions webkit-transition "+n.side,d={menuCSSDictionary:h+" position top bottom height width",pushCSSDictionary:h,state:n.state},a={init:function(){o.init()},_destroy:function(){return o._destroy(),delete i.bigSlideAPI,i},changeState:function(){"closed"===d.state?d.state="open":d.state="closed"},setState:function(e){d.state=e},getState:function(){return d.state}},o={init:function(){this.$menu=e(n.menu),this.$push=e(n.push),this.$shrink=e(n.shrink),this.$hiddenThin=e(n.hiddenThin),this.width=n.menuWidth,this.semiOpenMenuWidth=n.semiOpenMenuWidth;var t={position:"fixed",top:"0",bottom:"0",height:"100%"},s={"-webkit-transition":n.side+" "+n.speed+"ms ease","-moz-transition":n.side+" "+n.speed+"ms ease","-ms-transition":n.side+" "+n.speed+"ms ease","-o-transition":n.side+" "+n.speed+"ms ease",transition:n.side+" "+n.speed+"ms ease"},h={"-webkit-transition":"all "+n.speed+"ms ease","-moz-transition":"all "+n.speed+"ms ease","-ms-transition":"all "+n.speed+"ms ease","-o-transition":"all "+n.speed+"ms ease",transition:"all "+n.speed+"ms ease"},d=!1;t[n.side]="-"+n.menuWidth,t.width=n.menuWidth;var c="closed";n.saveState?(c=localStorage.getItem("bigSlide-savedState"))||(c=n.state):c=n.state,a.setState(c),this.$menu.css(t);var r=e(window).width();"closed"===c?n.semiOpenStatus&&r>n.semiOpenScreenWidth?(this.$hiddenThin.hide(),this.$menu.css(n.side,"0"),this.$menu.css("width",this.semiOpenMenuWidth),this.$push.css(n.side,this.semiOpenMenuWidth),this.$shrink.css({width:"calc(100% - "+this.semiOpenMenuWidth+")"}),this.$menu.addClass("semiOpen")):this.$push.css(n.side,"0"):"open"===c&&(this.$menu.css(n.side,"0"),this.$push.css(n.side,this.width),this.$shrink.css({width:"calc(100% - "+this.width+")"}),i.addClass(n.activeBtn));var u=this;i.on("click.bigSlide touchstart.bigSlide",(function(e){d||(u.$menu.css(s),u.$push.css(s),u.$shrink.css(h),d=!0),e.preventDefault(),"open"===a.getState()?o.toggleClose():o.toggleOpen()})),n.semiOpenStatus&&e(window).resize((function(){e(window).width()>n.semiOpenScreenWidth?"closed"===a.getState()&&(u.$hiddenThin.hide(),u.$menu.css({width:u.semiOpenMenuWidth}),u.$menu.css(n.side,"0"),u.$push.css(n.side,u.semiOpenMenuWidth),u.$shrink.css({width:"calc(100% - "+u.semiOpenMenuWidth+")"}),u.$menu.addClass("semiOpen")):(u.$menu.removeClass("semiOpen"),"closed"===a.getState()&&(u.$menu.css(n.side,"-"+u.width).css({width:u.width}),u.$push.css(n.side,"0"),u.$shrink.css("width","100%"),u.$hiddenThin.show()))})),n.easyClose&&e(document).on("click.bigSlide",(function(t){e(t.target).parents().addBack().is(i)||e(t.target).closest(n.menu).length||"open"!==a.getState()||o.toggleClose()}))},_destroy:function(){this.$menu.each((function(){var s=e(this);s.attr("style",t(s.attr("style"),d.menuCSSDictionary).trim())})),this.$push.each((function(){var s=e(this);s.attr("style",t(s.attr("style"),d.pushCSSDictionary).trim())})),this.$shrink.each((function(){var s=e(this);s.attr("style",t(s.attr("style"),d.pushCSSDictionary).trim())})),i.removeClass(n.activeBtn).off("click.bigSlide touchstart.bigSlide"),this.$menu=null,this.$push=null,this.$shrink=null,localStorage.removeItem("bigSlide-savedState")},toggleOpen:function(){n.beforeOpen(),a.changeState(),o.applyOpenStyles(),i.addClass(n.activeBtn),n.afterOpen(),n.saveState&&localStorage.setItem("bigSlide-savedState","open")},toggleClose:function(){n.beforeClose(),a.changeState(),o.applyClosedStyles(),i.removeClass(n.activeBtn),n.afterClose(),n.saveState&&localStorage.setItem("bigSlide-savedState","closed")},applyOpenStyles:function(){var t=e(window).width();n.semiOpenStatus&&t>n.semiOpenScreenWidth?(this.$hiddenThin.show(),this.$menu.animate({width:this.width},{duration:Math.abs(n.speed-100),easing:"linear"}),this.$push.css(n.side,this.width),this.$shrink.css({width:"calc(100% - "+this.width+")"}),this.$menu.removeClass("semiOpen")):(this.$menu.css(n.side,"0"),this.$push.css(n.side,this.width),this.$shrink.css({width:"calc(100% - "+this.width+")"}))},applyClosedStyles:function(){var t=e(window).width();n.semiOpenStatus&&t>n.semiOpenScreenWidth?(this.$hiddenThin.hide(),this.$menu.animate({width:this.semiOpenMenuWidth},{duration:Math.abs(n.speed-100),easing:"linear"}),this.$push.css(n.side,this.semiOpenMenuWidth),this.$shrink.css({width:"calc(100% - "+this.semiOpenMenuWidth+")"}),this.$menu.addClass("semiOpen")):(this.$menu.css(n.side,"-"+this.width),this.$push.css(n.side,"0"),this.$shrink.css("width","100%"))}};return a.init(),this.bigSlideAPI={settings:n,model:d,controller:a,view:o,destroy:a._destroy},this}}));