/* 
 * Selecter v3.1.2 - 2014-05-30 
 * A jQuery plugin for replacing default select elements. Part of the Formstone Library. 
 * http://formstone.it/selecter/ 
 * 
 * Copyright 2014 Ben Plum; MIT Licensed 
 */ 

!function(a,b){"use strict";function c(b){b=a.extend({},F,b||{}),null===E&&(E=a("body"));for(var c=a(this),e=0,f=c.length;f>e;e++)d(c.eq(e),b);return c}function d(b,c){if(!b.hasClass("selecter-element")){c=a.extend({},c,b.data("selecter-options")),c.external&&(c.links=!0);var d=b.find("option, optgroup"),g=d.filter("option"),h=g.filter(":selected"),j=h.length>0?g.index(h):1,k="div";c.tabIndex=b[0].tabIndex,b[0].tabIndex=-1,c.multiple=b.prop("multiple"),c.disabled=b.is(":disabled");var q="",s="";s+="<"+k+' class="selecter '+c.customClass,C?s+=" mobile":c.cover&&(s+=" cover"),s+=c.multiple?" multiple":" closed",c.disabled&&(s+=" disabled"),s+='" tabindex="'+c.tabIndex+'">',s+="</"+k+">",c.multiple||(q+='<span class="selecter-selected'+(""!==c.label?" placeholder":"")+'">',q+=a("<span></span>").text(v(""!==h.text()?h.text():c.label,c.trim)).html(),q+="</span>"),q+='<div class="selecter-options">',q+="</div>",b.addClass("selecter-element").wrap(s).after(q);var t=b.parent(".selecter"),u=a.extend({$select:b,$allOptions:d,$options:g,$selecter:t,$selected:t.find(".selecter-selected"),$itemsWrapper:t.find(".selecter-options"),index:-1,guid:z++},c);e(u),u.multiple||r(j,u),void 0!==a.fn.scroller&&u.$itemsWrapper.scroller(),u.$selecter.on("touchstart.selecter",".selecter-selected",u,f).on("click.selecter",".selecter-selected",u,i).on("click.selecter",".selecter-item",u,m).on("close.selecter",u,l).data("selecter",u),u.$select.on("change.selecter",u,n),C||(u.$selecter.on("focus.selecter",u,o).on("blur.selecter",u,p),u.$select.on("focus.selecter",u,function(a){a.data.$selecter.trigger("focus")}))}}function e(b){for(var c="",d=b.links?"a":"span",e=0,f=0,g=b.$allOptions.length;g>f;f++){var h=b.$allOptions.eq(f);if("OPTGROUP"===h[0].tagName)c+='<span class="selecter-group',h.is(":disabled")&&(c+=" disabled"),c+='">'+h.attr("label")+"</span>";else{var i=h.val();h.attr("value")||h.attr("value",i),c+="<"+d+' class="selecter-item',h.is(":selected")&&(c+=" selected"),h.is(":disabled")&&(c+=" disabled"),c+='" ',c+=b.links?'href="'+i+'"':'data-value="'+i+'"',c+=">"+a("<span></span>").text(v(h.text(),b.trim)).html()+"</"+d+">",e++}}b.$itemsWrapper.html(c),b.$items=b.$selecter.find(".selecter-item")}function f(a){a.stopPropagation();var b=a.data,c=a.originalEvent;y(b.timer),b.touchStartX=c.touches[0].clientX,b.touchStartY=c.touches[0].clientY,b.$selecter.on("touchmove.selecter",".selecter-selected",b,g).on("touchend.selecter",".selecter-selected",b,h)}function g(a){var b=a.data,c=a.originalEvent;(Math.abs(c.touches[0].clientX-b.touchStartX)>10||Math.abs(c.touches[0].clientY-b.touchStartY)>10)&&b.$selecter.off("touchmove.selecter touchend.selecter")}function h(a){var b=a.data;b.$selecter.off("touchmove.selecter touchend.selecter click.selecter"),b.timer=x(b.timer,1e3,function(){b.$selecter.on("click.selecter",".selecter-selected",b,i)}),i(a)}function i(c){c.preventDefault(),c.stopPropagation();var d=c.data;if(!d.$select.is(":disabled"))if(a(".selecter").not(d.$selecter).trigger("close.selecter",[d]),C&&!D){var e=d.$select[0];if(b.document.createEvent){var f=b.document.createEvent("MouseEvents");f.initMouseEvent("mousedown",!1,!0,b,0,0,0,0,0,!1,!1,!1,!1,0,null),e.dispatchEvent(f)}else e.fireEvent&&e.fireEvent("onmousedown")}else d.$selecter.hasClass("closed")?j(c):d.$selecter.hasClass("open")&&l(c)}function j(a){a.preventDefault(),a.stopPropagation();var b=a.data;if(!b.$selecter.hasClass("open")){{var c=b.$selecter.offset(),d=E.outerHeight(),e=b.$itemsWrapper.outerHeight(!0);b.index>=0?b.$items.eq(b.index).position():{left:0,top:0}}c.top+e>d&&b.$selecter.addClass("bottom"),b.$itemsWrapper.show(),b.$selecter.removeClass("closed").addClass("open"),E.on("click.selecter-"+b.guid,":not(.selecter-options)",b,k),s(b)}}function k(b){b.preventDefault(),b.stopPropagation(),0===a(b.currentTarget).parents(".selecter").length&&l(b)}function l(a){a.preventDefault(),a.stopPropagation();var b=a.data;b.$selecter.hasClass("open")&&(b.$itemsWrapper.hide(),b.$selecter.removeClass("open bottom").addClass("closed"),E.off(".selecter-"+b.guid))}function m(b){b.preventDefault(),b.stopPropagation();var c=a(this),d=b.data;if(!d.$select.is(":disabled")){if(d.$itemsWrapper.is(":visible")){var e=d.$items.index(c);e!==d.index&&(r(e,d),t(d))}d.multiple||l(b)}}function n(b,c){var d=a(this),e=b.data;if(!c&&!e.multiple){var f=e.$options.index(e.$options.filter("[value='"+w(d.val())+"']"));r(f,e),t(e)}}function o(b){b.preventDefault(),b.stopPropagation();var c=b.data;c.$select.is(":disabled")||c.multiple||(c.$selecter.addClass("focus").on("keydown.selecter-"+c.guid,c,q),a(".selecter").not(c.$selecter).trigger("close.selecter",[c]))}function p(b){b.preventDefault(),b.stopPropagation();var c=b.data;c.$selecter.removeClass("focus").off("keydown.selecter-"+c.guid),a(".selecter").not(c.$selecter).trigger("close.selecter",[c])}function q(b){var c=b.data;if(13===b.keyCode)c.$selecter.hasClass("open")&&(l(b),r(c.index,c)),t(c);else if(!(9===b.keyCode||b.metaKey||b.altKey||b.ctrlKey||b.shiftKey)){b.preventDefault(),b.stopPropagation();var d=c.$items.length-1,e=c.index<0?0:c.index;if(a.inArray(b.keyCode,B?[38,40,37,39]:[38,40])>-1)e+=38===b.keyCode||B&&37===b.keyCode?-1:1,0>e&&(e=0),e>d&&(e=d);else{var f,g,h=String.fromCharCode(b.keyCode).toUpperCase();for(g=c.index+1;d>=g;g++)if(f=c.$options.eq(g).text().charAt(0).toUpperCase(),f===h){e=g;break}if(0>e||e===c.index)for(g=0;d>=g;g++)if(f=c.$options.eq(g).text().charAt(0).toUpperCase(),f===h){e=g;break}}e>=0&&(r(e,c),s(c))}}function r(a,b){var c=b.$items.eq(a),d=c.hasClass("selected"),e=c.hasClass("disabled");if(!e){if(-1===a&&""!==b.label)b.$selected.html(b.label);else if(d)b.multiple&&(b.$options.eq(a).prop("selected",null),c.removeClass("selected"));else{{var f=c.html();c.data("value")}b.multiple?b.$options.eq(a).prop("selected",!0):(b.$selected.html(f).removeClass("placeholder"),b.$items.filter(".selected").removeClass("selected"),b.$select[0].selectedIndex=a),c.addClass("selected")}b.multiple||(b.index=a)}}function s(b){var c=b.index>=0?b.$items.eq(b.index).position():{left:0,top:0};void 0!==a.fn.scroller?b.$itemsWrapper.scroller("scroll",b.$itemsWrapper.find(".scroller-content").scrollTop()+c.top,0).scroller("reset"):b.$itemsWrapper.scrollTop(b.$itemsWrapper.scrollTop()+c.top)}function t(a){a.links?u(a):(a.callback.call(a.$selecter,a.$select.val(),a.index),a.$select.trigger("change",[!0]))}function u(a){var c=a.$select.val();a.external?b.open(c):b.location.href=c}function v(a,b){return 0===b?a:a.length>b?a.substring(0,b)+"...":a}function w(a){return"string"==typeof a?a.replace(/([;&,\.\+\*\~':"\!\^#$%@\[\]\(\)=>\|])/g,"\\$1"):a}function x(a,b,c,d){return y(a,d),d===!0?setInterval(c,b):setTimeout(c,b)}function y(a){null!==a&&(clearInterval(a),a=null)}var z=0,A=b.navigator.userAgent||b.navigator.vendor||b.opera,B=/Firefox/i.test(A),C=/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(A),D=B&&C,E=null,F={callback:a.noop,cover:!1,customClass:"",label:"",external:!1,links:!1,trim:0},G={defaults:function(b){return F=a.extend(F,b||{}),a(this)},disable:function(b){return a(this).each(function(c,d){var e=a(d).parent(".selecter").data("selecter");if(e)if("undefined"!=typeof b){var f=e.$items.index(e.$items.filter("[data-value="+b+"]"));e.$items.eq(f).addClass("disabled"),e.$options.eq(f).prop("disabled",!0)}else e.$selecter.hasClass("open")&&e.$selecter.find(".selecter-selected").trigger("click.selecter"),e.$selecter.addClass("disabled"),e.$select.prop("disabled",!0)})},enable:function(b){return a(this).each(function(c,d){var e=a(d).parent(".selecter").data("selecter");if(e)if("undefined"!=typeof b){var f=e.$items.index(e.$items.filter("[data-value="+b+"]"));e.$items.eq(f).removeClass("disabled"),e.$options.eq(f).prop("disabled",!1)}else e.$selecter.removeClass("disabled"),e.$select.prop("disabled",!1)})},destroy:function(){return a(this).each(function(b,c){var d=a(c).parent(".selecter").data("selecter");d&&(d.$selecter.hasClass("open")&&d.$selecter.find(".selecter-selected").trigger("click.selecter"),void 0!==a.fn.scroller&&d.$selecter.find(".selecter-options").scroller("destroy"),d.$select[0].tabIndex=d.tabIndex,d.$selected.remove(),d.$itemsWrapper.remove(),d.$selecter.off(".selecter"),d.$select.off(".selecter").removeClass("selecter-element").show().unwrap())})},refresh:function(){return a(this).each(function(b,c){var d=a(c).parent(".selecter").data("selecter");if(d){var f=d.index;d.$allOptions=d.$select.find("option, optgroup"),d.$options=d.$allOptions.filter("option"),d.index=-1,f=d.$options.index(d.$options.filter(":selected")),e(d),d.multiple||r(f,d)}})}};a.fn.selecter=function(a){return G[a]?G[a].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof a&&a?this:c.apply(this,arguments)},a.selecter=function(a){"defaults"===a&&G.defaults.apply(this,Array.prototype.slice.call(arguments,1))}}(jQuery,window);
/* 
 * Stepper v3.0.7 - 2014-05-07 
 * A jQuery plugin for cross browser number inputs. Part of the Formstone Library. 
 * http://formstone.it/stepper/ 
 * 
 * Copyright 2014 Ben Plum; MIT Licensed 
 */ 

!function(a){"use strict";function b(b){b=a.extend({},l,b||{});for(var d=a(this),e=0,f=d.length;f>e;e++)c(d.eq(e),b);return d}function c(b,c){if(!b.hasClass("stepper-input")){c=a.extend({},c,b.data("stepper-options"));var f=parseFloat(b.attr("min")),g=parseFloat(b.attr("max")),h=parseFloat(b.attr("step"))||1;b.addClass("stepper-input").wrap('<div class="stepper '+c.customClass+'" />').after('<span class="stepper-arrow up">'+c.labels.up+'</span><span class="stepper-arrow down">'+c.labels.down+"</span>");var i=b.parent(".stepper"),k=a.extend({$stepper:i,$input:b,$arrow:i.find(".stepper-arrow"),min:void 0===typeof f||isNaN(f)?!1:f,max:void 0===typeof g||isNaN(g)?!1:g,step:void 0===typeof h||isNaN(h)?1:h,timer:null},c);k.digits=j(k.step),b.is(":disabled")&&i.addClass("disabled"),i.on("keypress",".stepper-input",k,d),i.on("touchstart.stepper mousedown.stepper",".stepper-arrow",k,e).data("stepper",k)}}function d(a){var b=a.data;(38===a.keyCode||40===a.keyCode)&&(a.preventDefault(),g(b,38===a.keyCode?b.step:-b.step))}function e(b){b.preventDefault(),b.stopPropagation(),f(b);var c=b.data;if(!c.$input.is(":disabled")&&!c.$stepper.hasClass("disabled")){var d=a(b.target).hasClass("up")?c.step:-c.step;c.timer=h(c.timer,125,function(){g(c,d,!1)}),g(c,d),a("body").on("touchend.stepper mouseup.stepper",c,f)}}function f(b){b.preventDefault(),b.stopPropagation();var c=b.data;i(c.timer),a("body").off(".stepper")}function g(a,b){var c=parseFloat(a.$input.val()),d=b;void 0===typeof c||isNaN(c)?d=a.min!==!1?a.min:0:a.min!==!1&&c<a.min?d=a.min:d+=c;var e=(d-a.min)%a.step;0!==e&&(d-=e),a.min!==!1&&d<a.min&&(d=a.min),a.max!==!1&&d>a.max&&(d-=a.step),d!==c&&(d=k(d,a.digits),a.$input.val(d).trigger("change"))}function h(a,b,c){return i(a),setInterval(c,b)}function i(a){a&&(clearInterval(a),a=null)}function j(a){var b=String(a);return b.indexOf(".")>-1?b.length-b.indexOf(".")-1:0}function k(a,b){var c=Math.pow(10,b);return Math.round(a*c)/c}var l={customClass:"",labels:{up:"Up",down:"Down"}},m={defaults:function(b){return l=a.extend(l,b||{}),a(this)},destroy:function(){return a(this).each(function(){var b=a(this).data("stepper");b&&(b.$stepper.off(".stepper").find(".stepper-arrow").remove(),b.$input.unwrap().removeClass("stepper-input"))})},disable:function(){return a(this).each(function(){var b=a(this).data("stepper");b&&(b.$input.attr("disabled","disabled"),b.$stepper.addClass("disabled"))})},enable:function(){return a(this).each(function(){var b=a(this).data("stepper");b&&(b.$input.attr("disabled",null),b.$stepper.removeClass("disabled"))})}};a.fn.stepper=function(a){return m[a]?m[a].apply(this,Array.prototype.slice.call(arguments,1)):"object"!=typeof a&&a?this:b.apply(this,arguments)},a.stepper=function(a){"defaults"===a&&m.defaults.apply(this,Array.prototype.slice.call(arguments,1))}}(jQuery,this);
/**
 * IAS History Extension
 * An IAS extension to enable browser history
 * http://infiniteajaxscroll.com
 *
 * This file is part of the Infinite AJAX Scroll package
 *
 * Copyright 2014-2016 Webcreate (Jeroen Fiege)
 */

var IASHistoryExtension = function (options) {
  options = jQuery.extend({}, this.defaults, options);

  this.ias = null;
  this.prevSelector = options.prev;
  this.prevUrl = null;
  this.listeners = {
    prev: new IASCallbacks()
  };

  /**
   * @private
   * @param pageNum
   * @param scrollOffset
   * @param url
   */
  this.onPageChange = function (pageNum, scrollOffset, url) {
    if (!window.history || !window.history.replaceState) {
      return;
    }
    
    var state = history.state;

    history.replaceState(state, document.title, url);
  };

  /**
   * @private
   * @param currentScrollOffset
   * @param scrollThreshold
   */
  this.onScroll = function (currentScrollOffset, scrollThreshold) {
    var firstItemScrollThreshold = this.getScrollThresholdFirstItem();

    if (!this.prevUrl) {
      return;
    }

    currentScrollOffset -= this.ias.$scrollContainer.height();

    if (currentScrollOffset <= firstItemScrollThreshold) {
      this.prev();
    }
  };

  this.onReady = function () {
    var currentScrollOffset = this.ias.getCurrentScrollOffset(this.ias.$scrollContainer),
        firstItemScrollThreshold = this.getScrollThresholdFirstItem();

    currentScrollOffset -= this.ias.$scrollContainer.height();

    if (currentScrollOffset <= firstItemScrollThreshold) {
      this.prev();
    }
  };

  /**
   * Returns the url for the next page
   *
   * @private
   */
  this.getPrevUrl = function (container) {
    if (!container) {
      container = this.ias.$container;
    }

    // always take the last matching item
    return jQuery(this.prevSelector, container).last().attr('href');
  };

  /**
   * Returns scroll threshold. This threshold marks the line from where
   * IAS should start loading the next page.
   *
   * @private
   * @return {number}
   */
  this.getScrollThresholdFirstItem = function () {
    var $firstElement;

    $firstElement = this.ias.getFirstItem();

    // if the don't have a first element, the DOM might not have been loaded,
    // or the selector is invalid
    if (0 === $firstElement.length) {
      return -1;
    }

    return ($firstElement.offset().top);
  };

  /**
   * Renders items
   *
   * @private
   * @param items
   * @param callback
   */
  this.renderBefore = function (items, callback) {
    var ias = this.ias,
        $firstItem = ias.getFirstItem(),
        count = 0;

    ias.fire('render', [items]);

    jQuery(items).hide(); // at first, hide it so we can fade it in later

    $firstItem.before(items);

    jQuery(items).fadeIn(400, function () {
      if (++count < items.length) {
        return;
      }

      ias.fire('rendered', [items]);

      if (callback) {
        callback();
      }
    });
  };

  return this;
};

/**
 * @public
 */
IASHistoryExtension.prototype.initialize = function (ias) {
  var self = this;

  this.ias = ias;

  // expose the extensions listeners
  jQuery.extend(ias.listeners, this.listeners);

  // expose prev method
  ias.prev = function() {
    return self.prev();
  };

  this.prevUrl = this.getPrevUrl();
};

/**
 * Bind to events
 *
 * @public
 * @param ias
 */
IASHistoryExtension.prototype.bind = function (ias) {
  ias.on('pageChange', jQuery.proxy(this.onPageChange, this));
  ias.on('scroll', jQuery.proxy(this.onScroll, this));
  ias.on('ready', jQuery.proxy(this.onReady, this));
};

/**
 * @public
 * @param {object} ias
 */
IASHistoryExtension.prototype.unbind = function(ias) {
  ias.off('pageChange', this.onPageChange);
  ias.off('scroll', this.onScroll);
  ias.off('ready', this.onReady);
};

/**
 * Load the prev page
 *
 * @public
 */
IASHistoryExtension.prototype.prev = function () {
  var url = this.prevUrl,
      self = this,
      ias = this.ias;

  if (!url) {
    return false;
  }

  ias.pause();

  var promise = ias.fire('prev', [url]);

  promise.done(function () {
    ias.load(url, function (data, items) {
      self.renderBefore(items, function () {
        self.prevUrl = self.getPrevUrl(data);

        ias.resume();

        if (self.prevUrl) {
          self.prev();
        }
      });
    });
  });

  promise.fail(function () {
    ias.resume();
  });

  return true;
};

/**
 * @public
 */
IASHistoryExtension.prototype.defaults = {
  prev: ".prev"
};

/**
 * IAS None Left Extension
 * An IAS extension to show a message when there are no more pages te load
 * http://infiniteajaxscroll.com
 *
 * This file is part of the Infinite AJAX Scroll package
 *
 * Copyright 2014-2016 Webcreate (Jeroen Fiege)
 */

var IASNoneLeftExtension = function(options) {
  options = jQuery.extend({}, this.defaults, options);

  this.ias = null;
  this.uid = (new Date()).getTime();
  this.html = (options.html).replace('{text}', options.text);

  /**
   * Shows none left message
   */
  this.showNoneLeft = function() {
    var $element = jQuery(this.html).attr('id', 'ias_noneleft_' + this.uid),
        $lastItem = this.ias.getLastItem();

    $lastItem.after($element);
    $element.fadeIn();
  };

  return this;
};

/**
 * @public
 */
IASNoneLeftExtension.prototype.bind = function(ias) {
  this.ias = ias;

  ias.on('noneLeft', jQuery.proxy(this.showNoneLeft, this));
};

/**
 * @public
 * @param {object} ias
 */
IASNoneLeftExtension.prototype.unbind = function(ias) {
  ias.off('noneLeft', this.showNoneLeft);
};

/**
 * @public
 */
IASNoneLeftExtension.prototype.defaults = {
  text: 'You reached the end.',
  html: '<div class="ias-noneleft" style="text-align: center;">{text}</div>'
};

/**
 * IAS Paging Extension
 * An IAS extension providing additional events
 * http://infiniteajaxscroll.com
 *
 * This file is part of the Infinite AJAX Scroll package
 *
 * Copyright 2014-2016 Webcreate (Jeroen Fiege)
 */

var IASPagingExtension = function() {
  this.ias = null;
  this.pagebreaks = [[0, document.location.toString()]];
  this.lastPageNum = 1;
  this.enabled = true;
  this.listeners = {
    pageChange: new IASCallbacks()
  };

  /**
   * Fires pageChange event
   *
   * @param currentScrollOffset
   * @param scrollThreshold
   */
  this.onScroll = function(currentScrollOffset, scrollThreshold) {
    if (!this.enabled) {
      return;
    }

    var ias = this.ias,
        currentPageNum = this.getCurrentPageNum(currentScrollOffset),
        currentPagebreak = this.getCurrentPagebreak(currentScrollOffset),
        urlPage;

    if (this.lastPageNum !== currentPageNum) {
      urlPage = currentPagebreak[1];

      ias.fire('pageChange', [currentPageNum, currentScrollOffset, urlPage]);
    }

    this.lastPageNum = currentPageNum;
  };

  /**
   * Keeps track of pagebreaks
   *
   * @param url
   */
  this.onNext = function(url) {
    var currentScrollOffset = this.ias.getCurrentScrollOffset(this.ias.$scrollContainer);

    this.pagebreaks.push([currentScrollOffset, url]);

    // trigger pageChange and update lastPageNum
    var currentPageNum = this.getCurrentPageNum(currentScrollOffset) + 1;

    this.ias.fire('pageChange', [currentPageNum, currentScrollOffset, url]);

    this.lastPageNum = currentPageNum;
  };

  /**
   * Keeps track of pagebreaks
   *
   * @param url
   */
  this.onPrev = function(url) {
    var self = this,
        ias = self.ias,
        currentScrollOffset = ias.getCurrentScrollOffset(ias.$scrollContainer),
        prevCurrentScrollOffset = currentScrollOffset - ias.$scrollContainer.height(),
        $firstItem = ias.getFirstItem();

    this.enabled = false;

    this.pagebreaks.unshift([0, url]);

    ias.one('rendered', function() {
      // update pagebreaks
      for (var i = 1, l = self.pagebreaks.length; i < l; i++) {
        self.pagebreaks[i][0] = self.pagebreaks[i][0] + $firstItem.offset().top;
      }

      // trigger pageChange and update lastPageNum
      var currentPageNum = self.getCurrentPageNum(prevCurrentScrollOffset) + 1;

      ias.fire('pageChange', [currentPageNum, prevCurrentScrollOffset, url]);

      self.lastPageNum = currentPageNum;

      self.enabled = true;
    });
  };

  return this;
};

/**
 * @public
 */
IASPagingExtension.prototype.initialize = function(ias) {
  this.ias = ias;

  // expose the extensions listeners
  jQuery.extend(ias.listeners, this.listeners);
};

/**
 * @public
 */
IASPagingExtension.prototype.bind = function(ias) {
  try {
    ias.on('prev', jQuery.proxy(this.onPrev, this), this.priority);
  } catch (exception) {}

  ias.on('next', jQuery.proxy(this.onNext, this), this.priority);
  ias.on('scroll', jQuery.proxy(this.onScroll, this), this.priority);
};

/**
 * @public
 * @param {object} ias
 */
IASPagingExtension.prototype.unbind = function(ias) {
  try {
    ias.off('prev', this.onPrev);
  } catch (exception) {}

  ias.off('next', this.onNext);
  ias.off('scroll', this.onScroll);
};

/**
 * Returns current page number based on scroll offset
 *
 * @param {number} scrollOffset
 * @returns {number}
 */
IASPagingExtension.prototype.getCurrentPageNum = function(scrollOffset) {
  for (var i = (this.pagebreaks.length - 1); i > 0; i--) {
    if (scrollOffset > this.pagebreaks[i][0]) {
      return i + 1;
    }
  }

  return 1;
};

/**
 * Returns current pagebreak information based on scroll offset
 *
 * @param {number} scrollOffset
 * @returns {number}|null
 */
IASPagingExtension.prototype.getCurrentPagebreak = function(scrollOffset) {
  for (var i = (this.pagebreaks.length - 1); i >= 0; i--) {
    if (scrollOffset > this.pagebreaks[i][0]) {
      return this.pagebreaks[i];
    }
  }

  return null;
};

/**
 * @public
 * @type {number}
 */
IASPagingExtension.prototype.priority = 500;

/**
 * IAS Spinner Extension
 * An IAS extension to show a spinner when loading
 * http://infiniteajaxscroll.com
 *
 * This file is part of the Infinite AJAX Scroll package
 *
 * Copyright 2014-2016 Webcreate (Jeroen Fiege)
 */

var IASSpinnerExtension = function(options) {
  options = jQuery.extend({}, this.defaults, options);

  this.ias = null;
  this.uid = new Date().getTime();
  this.src = options.src;
  this.html = (options.html).replace('{src}', this.src);

  /**
   * Shows spinner
   */
  this.showSpinner = function() {
    var $spinner = this.getSpinner() || this.createSpinner(),
        $lastItem = this.ias.getLastItem();

    $lastItem.after($spinner);
    $spinner.fadeIn();
  };

  /**
   * Shows spinner
   */
  this.showSpinnerBefore = function() {
    var $spinner = this.getSpinner() || this.createSpinner(),
        $firstItem = this.ias.getFirstItem();

    $firstItem.before($spinner);
    $spinner.fadeIn();
  };

  /**
   * Removes spinner
   */
  this.removeSpinner = function() {
    if (this.hasSpinner()) {
      this.getSpinner().remove();
    }
  };

  /**
   * @returns {jQuery|boolean}
   */
  this.getSpinner = function() {
    var $spinner = jQuery('#ias_spinner_' + this.uid);

    if ($spinner.length > 0) {
      return $spinner;
    }

    return false;
  };

  /**
   * @returns {boolean}
   */
  this.hasSpinner = function() {
    var $spinner = jQuery('#ias_spinner_' + this.uid);

    return ($spinner.length > 0);
  };

  /**
   * @returns {jQuery}
   */
  this.createSpinner = function() {
    var $spinner = jQuery(this.html).attr('id', 'ias_spinner_' + this.uid);

    $spinner.hide();

    return $spinner;
  };

  return this;
};

/**
 * @public
 */
IASSpinnerExtension.prototype.bind = function(ias) {
  this.ias = ias;

  ias.on('next', jQuery.proxy(this.showSpinner, this));
  ias.on('render', jQuery.proxy(this.removeSpinner, this));

  try {
    ias.on('prev', jQuery.proxy(this.showSpinnerBefore, this));
  } catch (exception) {}
};

/**
 * @public
 * @param {object} ias
 */
IASSpinnerExtension.prototype.unbind = function(ias) {
  ias.off('next', this.showSpinner);
  ias.off('render', this.removeSpinner);

  try {
    ias.off('prev', this.showSpinnerBefore);
  } catch (exception) {}
};

/**
 * @public
 */
IASSpinnerExtension.prototype.defaults = {
  src: 'data:image/gif;base64,R0lGODlhEAAQAPQAAP///wAAAPDw8IqKiuDg4EZGRnp6egAAAFhYWCQkJKysrL6+vhQUFJycnAQEBDY2NmhoaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCgAAACwAAAAAEAAQAAAFdyAgAgIJIeWoAkRCCMdBkKtIHIngyMKsErPBYbADpkSCwhDmQCBethRB6Vj4kFCkQPG4IlWDgrNRIwnO4UKBXDufzQvDMaoSDBgFb886MiQadgNABAokfCwzBA8LCg0Egl8jAggGAA1kBIA1BAYzlyILczULC2UhACH5BAkKAAAALAAAAAAQABAAAAV2ICACAmlAZTmOREEIyUEQjLKKxPHADhEvqxlgcGgkGI1DYSVAIAWMx+lwSKkICJ0QsHi9RgKBwnVTiRQQgwF4I4UFDQQEwi6/3YSGWRRmjhEETAJfIgMFCnAKM0KDV4EEEAQLiF18TAYNXDaSe3x6mjidN1s3IQAh+QQJCgAAACwAAAAAEAAQAAAFeCAgAgLZDGU5jgRECEUiCI+yioSDwDJyLKsXoHFQxBSHAoAAFBhqtMJg8DgQBgfrEsJAEAg4YhZIEiwgKtHiMBgtpg3wbUZXGO7kOb1MUKRFMysCChAoggJCIg0GC2aNe4gqQldfL4l/Ag1AXySJgn5LcoE3QXI3IQAh+QQJCgAAACwAAAAAEAAQAAAFdiAgAgLZNGU5joQhCEjxIssqEo8bC9BRjy9Ag7GILQ4QEoE0gBAEBcOpcBA0DoxSK/e8LRIHn+i1cK0IyKdg0VAoljYIg+GgnRrwVS/8IAkICyosBIQpBAMoKy9dImxPhS+GKkFrkX+TigtLlIyKXUF+NjagNiEAIfkECQoAAAAsAAAAABAAEAAABWwgIAICaRhlOY4EIgjH8R7LKhKHGwsMvb4AAy3WODBIBBKCsYA9TjuhDNDKEVSERezQEL0WrhXucRUQGuik7bFlngzqVW9LMl9XWvLdjFaJtDFqZ1cEZUB0dUgvL3dgP4WJZn4jkomWNpSTIyEAIfkECQoAAAAsAAAAABAAEAAABX4gIAICuSxlOY6CIgiD8RrEKgqGOwxwUrMlAoSwIzAGpJpgoSDAGifDY5kopBYDlEpAQBwevxfBtRIUGi8xwWkDNBCIwmC9Vq0aiQQDQuK+VgQPDXV9hCJjBwcFYU5pLwwHXQcMKSmNLQcIAExlbH8JBwttaX0ABAcNbWVbKyEAIfkECQoAAAAsAAAAABAAEAAABXkgIAICSRBlOY7CIghN8zbEKsKoIjdFzZaEgUBHKChMJtRwcWpAWoWnifm6ESAMhO8lQK0EEAV3rFopIBCEcGwDKAqPh4HUrY4ICHH1dSoTFgcHUiZjBhAJB2AHDykpKAwHAwdzf19KkASIPl9cDgcnDkdtNwiMJCshACH5BAkKAAAALAAAAAAQABAAAAV3ICACAkkQZTmOAiosiyAoxCq+KPxCNVsSMRgBsiClWrLTSWFoIQZHl6pleBh6suxKMIhlvzbAwkBWfFWrBQTxNLq2RG2yhSUkDs2b63AYDAoJXAcFRwADeAkJDX0AQCsEfAQMDAIPBz0rCgcxky0JRWE1AmwpKyEAIfkECQoAAAAsAAAAABAAEAAABXkgIAICKZzkqJ4nQZxLqZKv4NqNLKK2/Q4Ek4lFXChsg5ypJjs1II3gEDUSRInEGYAw6B6zM4JhrDAtEosVkLUtHA7RHaHAGJQEjsODcEg0FBAFVgkQJQ1pAwcDDw8KcFtSInwJAowCCA6RIwqZAgkPNgVpWndjdyohACH5BAkKAAAALAAAAAAQABAAAAV5ICACAimc5KieLEuUKvm2xAKLqDCfC2GaO9eL0LABWTiBYmA06W6kHgvCqEJiAIJiu3gcvgUsscHUERm+kaCxyxa+zRPk0SgJEgfIvbAdIAQLCAYlCj4DBw0IBQsMCjIqBAcPAooCBg9pKgsJLwUFOhCZKyQDA3YqIQAh+QQJCgAAACwAAAAAEAAQAAAFdSAgAgIpnOSonmxbqiThCrJKEHFbo8JxDDOZYFFb+A41E4H4OhkOipXwBElYITDAckFEOBgMQ3arkMkUBdxIUGZpEb7kaQBRlASPg0FQQHAbEEMGDSVEAA1QBhAED1E0NgwFAooCDWljaQIQCE5qMHcNhCkjIQAh+QQJCgAAACwAAAAAEAAQAAAFeSAgAgIpnOSoLgxxvqgKLEcCC65KEAByKK8cSpA4DAiHQ/DkKhGKh4ZCtCyZGo6F6iYYPAqFgYy02xkSaLEMV34tELyRYNEsCQyHlvWkGCzsPgMCEAY7Cg04Uk48LAsDhRA8MVQPEF0GAgqYYwSRlycNcWskCkApIyEAOwAAAAAAAAAAAA==',
  html: '<div class="ias-spinner" style="text-align: center;"><img src="{src}"/></div>'
};

/**
 * IAS Trigger Extension
 * An IAS extension to show a trigger link to load the next page
 * http://infiniteajaxscroll.com
 *
 * This file is part of the Infinite AJAX Scroll package
 *
 * Copyright 2014-2016 Webcreate (Jeroen Fiege)
 */

var IASTriggerExtension = function(options) {
  options = jQuery.extend({}, this.defaults, options);

  this.ias = null;
  this.html = (options.html).replace('{text}', options.text);
  this.htmlPrev = (options.htmlPrev).replace('{text}', options.textPrev);
  this.enabled = true;
  this.count = 0;
  this.offset = options.offset;
  this.$triggerNext = null;
  this.$triggerPrev = null;

  /**
   * Shows trigger for next page
   */
  this.showTriggerNext = function() {
    if (!this.enabled) {
      return true;
    }

    if (false === this.offset || ++this.count < this.offset) {
      return true;
    }

    var $trigger = this.$triggerNext || (this.$triggerNext = this.createTrigger(this.next, this.html));
    var $lastItem = this.ias.getLastItem();

    $lastItem.after($trigger);
    $trigger.fadeIn();

    return false;
  };

  /**
   * Shows trigger for previous page
   */
  this.showTriggerPrev = function() {
    if (!this.enabled) {
      return true;
    }

    var $trigger = this.$triggerPrev || (this.$triggerPrev = this.createTrigger(this.prev, this.htmlPrev));
    var $firstItem = this.ias.getFirstItem();

    $firstItem.before($trigger);
    $trigger.fadeIn();

    return false;
  };

  this.onRendered = function() {
    this.enabled = true;
  };

  /**
   * @param clickCallback
   * @returns {*|jQuery}
   * @param {string} html
   */
  this.createTrigger = function(clickCallback, html) {
    var uid = (new Date()).getTime(),
        $trigger;

    html = html || this.html;
    $trigger = jQuery(html).attr('id', 'ias_trigger_' + uid);

    $trigger.hide();
    $trigger.on('click', jQuery.proxy(clickCallback, this));

    return $trigger;
  };

  return this;
};

/**
 * @public
 * @param {object} ias
 */
IASTriggerExtension.prototype.bind = function(ias) {
  var self = this;

  this.ias = ias;

  ias.on('next', jQuery.proxy(this.showTriggerNext, this), this.priority);
  ias.on('rendered', jQuery.proxy(this.onRendered, this), this.priority);

  try {
    ias.on('prev', jQuery.proxy(this.showTriggerPrev, this), this.priority);
  } catch (exception) {}
};

/**
 * @public
 * @param {object} ias
 */
IASTriggerExtension.prototype.unbind = function(ias) {
  ias.off('next', this.showTriggerNext);
  ias.off('rendered', this.onRendered);

  try {
    ias.off('prev', this.showTriggerPrev);
  } catch (exception) {}
};

/**
 * @public
 */
IASTriggerExtension.prototype.next = function() {
  this.enabled = false;
  this.ias.pause();

  if (this.$triggerNext) {
    this.$triggerNext.remove();
    this.$triggerNext = null;
  }

  this.ias.next();
};

/**
 * @public
 */
IASTriggerExtension.prototype.prev = function() {
  this.enabled = false;
  this.ias.pause();

  if (this.$triggerPrev) {
    this.$triggerPrev.remove();
    this.$triggerPrev = null;
  }

  this.ias.prev();
};

/**
 * @public
 */
IASTriggerExtension.prototype.defaults = {
  text: 'Load more items',
  html: '<div class="ias-trigger ias-trigger-next" style="text-align: center; cursor: pointer;"><a>{text}</a></div>',
  textPrev: 'Load previous items',
  htmlPrev: '<div class="ias-trigger ias-trigger-prev" style="text-align: center; cursor: pointer;"><a>{text}</a></div>',
  offset: 0
};

/**
 * @public
 * @type {number}
 */
IASTriggerExtension.prototype.priority = 1000;

/**
 * IASCallbacks v2.2.2
 * http://infiniteajaxscroll.com
 *
 * This file is part of the Infinite AJAX Scroll package
 *
 * Copyright 2014-2016 Webcreate (Jeroen Fiege)
 */

var IASCallbacks = function () {
  this.list = [];
  this.fireStack = [];
  this.isFiring = false;
  this.isDisabled = false;

  /**
   * Calls all added callbacks
   *
   * @private
   * @param args
   */
  this.fire = function (args) {
    var context = args[0],
        deferred = args[1],
        callbackArguments = args[2];

    this.isFiring = true;

    for (var i = 0, l = this.list.length; i < l; i++) {
      if (this.list[i] != undefined) {
        if (false === this.list[i].fn.apply(context, callbackArguments)) {
          deferred.reject();

          break;
        }
      }
    }

    this.isFiring = false;

    deferred.resolve();

    if (this.fireStack.length) {
      this.fire(this.fireStack.shift());
    }
  };

  /**
   * Returns index of the callback in the list in a similar way as
   * the indexOf function.
   *
   * @param callback
   * @param {number} index index to start the search from
   * @returns {number}
   */
  this.inList = function (callback, index) {
    index = index || 0;

    for (var i = index, length = this.list.length; i < length; i++) {
      if (this.list[i].fn === callback || (callback.guid && this.list[i].fn.guid && callback.guid === this.list[i].fn.guid)) {
        return i;
      }
    }

    return -1;
  };

  return this;
};

IASCallbacks.prototype = {
  /**
   * Adds a callback
   *
   * @param callback
   * @returns {IASCallbacks}
   * @param priority
   */
  add: function (callback, priority) {
    var callbackObject = {fn: callback, priority: priority};

    priority = priority || 0;

    for (var i = 0, length = this.list.length; i < length; i++) {
      if (priority > this.list[i].priority) {
        this.list.splice(i, 0, callbackObject);

        return this;
      }
    }

    this.list.push(callbackObject);

    return this;
  },

  /**
   * Removes a callback
   *
   * @param callback
   * @returns {IASCallbacks}
   */
  remove: function (callback) {
    var index = 0;

    while (( index = this.inList(callback, index) ) > -1) {
      this.list.splice(index, 1);
    }

    return this;
  },

  /**
   * Checks if callback is added
   *
   * @param callback
   * @returns {*}
   */
  has: function (callback) {
    return (this.inList(callback) > -1);
  },


  /**
   * Calls callbacks with a context
   *
   * @param context
   * @param args
   * @returns {object|void}
   */
  fireWith: function (context, args) {
    var deferred = jQuery.Deferred();

    if (this.isDisabled) {
      return deferred.reject();
    }

    args = args || [];
    args = [ context, deferred, args.slice ? args.slice() : args ];

    if (this.isFiring) {
      this.fireStack.push(args);
    } else {
      this.fire(args);
    }

    return deferred;
  },

  /**
   * Disable firing of new events
   */
  disable: function () {
    this.isDisabled = true;
  },

  /**
   * Enable firing of new events
   */
  enable: function () {
    this.isDisabled = false;
  }
};

/**
 * Infinite Ajax Scroll v2.2.2
 * A jQuery plugin for infinite scrolling
 * http://infiniteajaxscroll.com
 *
 * Commercial use requires one-time purchase of a commercial license
 * http://infiniteajaxscroll.com/docs/license.html
 *
 * Non-commercial use is licensed under the MIT License
 *
 * Copyright 2014-2016 Webcreate (Jeroen Fiege)
 */

(function($) {

  'use strict';

  var UNDETERMINED_SCROLLOFFSET = -1;

  var IAS = function($element, options) {
    this.itemsContainerSelector = options.container;
    this.itemSelector = options.item;
    this.nextSelector = options.next;
    this.paginationSelector = options.pagination;
    this.$scrollContainer = $element;
    this.$container = (window === $element.get(0) ? $(document) : $element);
    this.defaultDelay = options.delay;
    this.negativeMargin = options.negativeMargin;
    this.nextUrl = null;
    this.isBound = false;
    this.isPaused = false;
    this.isInitialized = false;
    this.jsXhr = false;
    this.listeners = {
      next:     new IASCallbacks(),
      load:     new IASCallbacks(),
      loaded:   new IASCallbacks(),
      render:   new IASCallbacks(),
      rendered: new IASCallbacks(),
      scroll:   new IASCallbacks(),
      noneLeft: new IASCallbacks(),
      ready:    new IASCallbacks()
    };
    this.extensions = [];

    /**
     * Scroll event handler
     *
     * Note: calls to this functions should be throttled
     *
     * @private
     */
    this.scrollHandler = function() {
      // the throttle method can call the scrollHandler even thought we have called unbind()
      if (!this.isBound || this.isPaused) {
        return;
      }

      var currentScrollOffset = this.getCurrentScrollOffset(this.$scrollContainer),
          scrollThreshold = this.getScrollThreshold()
      ;

      // invalid scrollThreshold. The DOM might not have loaded yet...
      if (UNDETERMINED_SCROLLOFFSET == scrollThreshold) {
        return;
      }

      this.fire('scroll', [currentScrollOffset, scrollThreshold]);

      if (currentScrollOffset >= scrollThreshold) {
        this.next();
      }
    };

    /**
     * Returns the items container currently in the DOM
     *
     * @private
     * @returns {object}
     */
    this.getItemsContainer = function() {
      return $(this.itemsContainerSelector, this.$container);
    };

    /**
     * Returns the last item currently in the DOM
     *
     * @private
     * @returns {object}
     */
    this.getLastItem = function() {
      return $(this.itemSelector, this.getItemsContainer().get(0)).last();
    };

    /**
     * Returns the first item currently in the DOM
     *
     * @private
     * @returns {object}
     */
    this.getFirstItem = function() {
      return $(this.itemSelector, this.getItemsContainer().get(0)).first();
    };

    /**
     * Returns scroll threshold. This threshold marks the line from where
     * IAS should start loading the next page.
     *
     * @private
     * @param negativeMargin defaults to {this.negativeMargin}
     * @return {number}
     */
    this.getScrollThreshold = function(negativeMargin) {
      var $lastElement;

      negativeMargin = negativeMargin || this.negativeMargin;
      negativeMargin = (negativeMargin >= 0 ? negativeMargin * -1 : negativeMargin);

      $lastElement = this.getLastItem();

      // if the don't have a last element, the DOM might not have been loaded,
      // or the selector is invalid
      if (0 === $lastElement.length) {
        return UNDETERMINED_SCROLLOFFSET;
      }

      return ($lastElement.offset().top + $lastElement.height() + negativeMargin);
    };

    /**
     * Returns current scroll offset for the given scroll container
     *
     * @private
     * @param $container
     * @returns {number}
     */
    this.getCurrentScrollOffset = function($container) {
      var scrollTop = 0,
          containerHeight = $container.height();

      if (window === $container.get(0))  {
        scrollTop = $container.scrollTop();
      } else {
        scrollTop = $container.offset().top;
      }

      // compensate for iPhone
      if (navigator.platform.indexOf("iPhone") != -1 || navigator.platform.indexOf("iPod") != -1) {
        containerHeight += 80;
      }

      return (scrollTop + containerHeight);
    };

    /**
     * Returns the url for the next page
     *
     * @private
     */
    this.getNextUrl = function(container) {
      container = container || this.$container;

      // always take the last matching item
      return $(this.nextSelector, container).last().attr('href');
    };

    /**
     * Loads a page url
     *
     * @param url
     * @param callback
     * @param delay
     * @returns {object}        jsXhr object
     */
    this.load = function(url, callback, delay) {
      var self = this,
          $itemContainer,
          items = [],
          timeStart = +new Date(),
          timeDiff;

      delay = delay || this.defaultDelay;

      var loadEvent = {
        url: url
      };

      self.fire('load', [loadEvent]);

      this.jsXhr = $.get(loadEvent.url, null, $.proxy(function(data) {
        $itemContainer = $(this.itemsContainerSelector, data).eq(0);
        if (0 === $itemContainer.length) {
          $itemContainer = $(data).filter(this.itemsContainerSelector).eq(0);
        }

        if ($itemContainer) {
          $itemContainer.find(this.itemSelector).each(function() {
            items.push(this);
          });
        }

        self.fire('loaded', [data, items]);

        if (callback) {
          timeDiff = +new Date() - timeStart;
          if (timeDiff < delay) {
            setTimeout(function() {
              callback.call(self, data, items);
            }, delay - timeDiff);
          } else {
            callback.call(self, data, items);
          }
        }
      }, self), 'html');

      return this.jsXhr;
    };

    /**
     * Renders items
     *
     * @param callback
     * @param items
     */
    this.render = function(items, callback) {
      var self = this,
          $lastItem = this.getLastItem(),
          count = 0;

      var promise = this.fire('render', [items]);

      promise.done(function() {
        $(items).hide(); // at first, hide it so we can fade it in later

        $lastItem.after(items);

        $(items).fadeIn(400, function() {
          // complete callback get fired for each item,
          // only act on the last item
          if (++count < items.length) {
            return;
          }

          self.fire('rendered', [items]);

          if (callback) {
            callback();
          }
        });
      });

      promise.fail(function() {
        if (callback) {
          callback();
        }
      });
    };

    /**
     * Hides the pagination
     */
    this.hidePagination = function() {
      if (this.paginationSelector) {
        $(this.paginationSelector, this.$container).hide();
      }
    };

    /**
     * Restores the pagination
     */
    this.restorePagination = function() {
      if (this.paginationSelector) {
        $(this.paginationSelector, this.$container).show();
      }
    };

    /**
     * Throttles a method
     *
     * Adopted from Ben Alman's jQuery throttle / debounce plugin
     *
     * @param callback
     * @param delay
     * @return {object}
     */
    this.throttle = function(callback, delay) {
      var lastExecutionTime = 0,
          wrapper,
          timerId
      ;

      wrapper = function() {
        var that = this,
            args = arguments,
            diff = +new Date() - lastExecutionTime;

        function execute() {
          lastExecutionTime = +new Date();
          callback.apply(that, args);
        }

        if (!timerId) {
          execute();
        } else {
          clearTimeout(timerId);
        }

        if (diff > delay) {
          execute();
        } else {
          timerId = setTimeout(execute, delay);
        }
      };

      if ($.guid) {
        wrapper.guid = callback.guid = callback.guid || $.guid++;
      }

      return wrapper;
    };

    /**
     * Fires an event with the ability to cancel further processing. This
     * can be achieved by returning false in a listener.
     *
     * @param event
     * @param args
     * @returns {*}
     */
    this.fire = function(event, args) {
      return this.listeners[event].fireWith(this, args);
    };

    /**
     * Pauses the scroll handler
     *
     * Note: internal use only, if you need to pause IAS use `unbind` method.
     *
     * @private
     */
    this.pause = function() {
      this.isPaused = true;
    };

    /**
     * Resumes the scroll handler
     *
     * Note: internal use only, if you need to resume IAS use `bind` method.
     *
     * @private
     */
    this.resume = function() {
      this.isPaused = false;
    };

    return this;
  };

  /**
   * Initialize IAS
   *
   * Note: Should be called when the document is ready
   *
   * @public
   */
  IAS.prototype.initialize = function() {
    if (this.isInitialized) {
      return false;
    }

    var supportsOnScroll = (!!('onscroll' in this.$scrollContainer.get(0))),
        currentScrollOffset = this.getCurrentScrollOffset(this.$scrollContainer),
        scrollThreshold = this.getScrollThreshold();

    // bail out when the browser doesn't support the scroll event
    if (!supportsOnScroll) {
      return false;
    }

    this.hidePagination();
    this.bind();

    this.fire('ready');

    this.nextUrl = this.getNextUrl();

    // start loading next page if content is shorter than page fold
    if (currentScrollOffset >= scrollThreshold) {
      this.next();

      // flag as initialized when rendering is completed
      this.one('rendered', function() {
        this.isInitialized = true;
      });
    } else {
      this.isInitialized = true;
    }

    return this;
  };

  /**
   * Reinitializes IAS, for example after an ajax page update
   *
   * @public
   */
  IAS.prototype.reinitialize = function () {
    this.isInitialized = false;

    this.unbind();
    this.initialize();
  };

  /**
   * Binds IAS to DOM events
   *
   * @public
   */
  IAS.prototype.bind = function() {
    if (this.isBound) {
      return;
    }

    this.$scrollContainer.on('scroll', $.proxy(this.throttle(this.scrollHandler, 150), this));

    for (var i = 0, l = this.extensions.length; i < l; i++) {
      this.extensions[i].bind(this);
    }

    this.isBound = true;
    this.resume();
  };

  /**
   * Unbinds IAS to events
   *
   * @public
   */
  IAS.prototype.unbind = function() {
    if (!this.isBound) {
      return;
    }

    this.$scrollContainer.off('scroll', this.scrollHandler);

    // notify extensions about unbinding
    for (var i = 0, l = this.extensions.length; i < l; i++) {
      if (typeof this.extensions[i]['unbind'] != 'undefined') {
        this.extensions[i].unbind(this);
      }
    }

    this.isBound = false;
  };

  /**
   * Destroys IAS instance
   *
   * @public
   */
  IAS.prototype.destroy = function() {
    try {
      this.jsXhr.abort();
    } catch (e) {}

    this.unbind();

    this.$scrollContainer.data('ias', null);
  };

  /**
   * Registers an eventListener
   *
   * Note: chainable
   *
   * @public
   * @returns IAS
   */
  IAS.prototype.on = function(event, callback, priority) {
    if (typeof this.listeners[event] == 'undefined') {
      throw new Error('There is no event called "' + event + '"');
    }

    priority = priority || 0;

    this.listeners[event].add($.proxy(callback, this), priority);

    return this;
  };

  /**
   * Registers an eventListener which only gets
   * fired once.
   *
   * Note: chainable
   *
   * @public
   * @returns IAS
   */
  IAS.prototype.one = function(event, callback) {
    var self = this;

    var remover = function() {
      self.off(event, callback);
      self.off(event, remover);
    };

    this.on(event, callback);
    this.on(event, remover);

    return this;
  };

  /**
   * Removes an eventListener
   *
   * Note: chainable
   *
   * @public
   * @returns IAS
   */
  IAS.prototype.off = function(event, callback) {
    if (typeof this.listeners[event] == 'undefined') {
      throw new Error('There is no event called "' + event + '"');
    }

    this.listeners[event].remove(callback);

    return this;
  };

  /**
   * Load the next page
   *
   * @public
   */
  IAS.prototype.next = function() {
    var url = this.nextUrl,
        self = this;

    this.pause();

    if (!url) {
      this.fire('noneLeft', [this.getLastItem()]);
      this.listeners['noneLeft'].disable(); // disable it so it only fires once

      self.resume();

      return false;
    }

    var promise = this.fire('next', [url]);

    promise.done(function() {
      self.load(url, function(data, items) {
        self.render(items, function() {
          self.nextUrl = self.getNextUrl(data);

          self.resume();
        });
      });
    });

    promise.fail(function() {
      self.resume();
    });

    return true;
  };

  /**
   * Adds an extension
   *
   * @public
   */
  IAS.prototype.extension = function(extension) {
    if (typeof extension['bind'] == 'undefined') {
      throw new Error('Extension doesn\'t have required method "bind"');
    }

    if (typeof extension['initialize'] != 'undefined') {
      extension.initialize(this);
    }

    this.extensions.push(extension);

    if (this.isInitialized) {
      this.reinitialize();
    }

    return this;
  };

  /**
   * Shortcut. Sets the window as scroll container.
   *
   * @public
   * @param option
   * @returns {*}
   */
  $.ias = function(option) {
    var $window = $(window);

    return $window.ias.apply($window, arguments);
  };

  /**
   * jQuery plugin initialization
   *
   * @public
   * @param option
   * @returns {*} the last IAS instance will be returned
   */
  $.fn.ias = function(option) {
    var args = Array.prototype.slice.call(arguments);
    var retval = this;

    this.each(function() {
      var $this = $(this),
          instance = $this.data('ias'),
          options = $.extend({}, $.fn.ias.defaults, $this.data(), typeof option == 'object' && option)
          ;

      // set a new instance as data
      if (!instance) {
        $this.data('ias', (instance = new IAS($this, options)));

        $(document).ready($.proxy(instance.initialize, instance));
      }

      // when the plugin is called with a method
      if (typeof option === 'string') {
        if (typeof instance[option] !== 'function') {
          throw new Error('There is no method called "' + option + '"');
        }

        args.shift(); // remove first argument ('option')
        instance[option].apply(instance, args);
      }

      retval = instance;
    });

    return retval;
  };

  /**
   * Plugin defaults
   *
   * @public
   * @type {object}
   */
  $.fn.ias.defaults = {
    item: '.item',
    container: '.listing',
    next: '.next',
    pagination: false,
    delay: 600,
    negativeMargin: 10
  };
})(jQuery);

!function(){function t(t){var e=parseInt(t,10);return e>s?s:e}function e(t){return t.hasAttribute("data-no-resize")||(0===t.offsetWidth&&0===t.offsetHeight?(t.setAttribute("width",t.naturalWidth),t.setAttribute("height",t.naturalHeight)):(t.setAttribute("width",t.offsetWidth),t.setAttribute("height",t.offsetHeight))),t}function r(t,r){var n=t.nodeName.toLowerCase(),i=document.createElement("img");i.addEventListener("load",function(){"img"===n?e(t).setAttribute("src",r):t.style.backgroundImage="url("+r+")"}),i.setAttribute("src",r)}function n(e,n){var i=arguments.length<=2||void 0===arguments[2]?1:arguments[2],o=t(i);if(n&&o>1){var a=n.replace(f,"@"+o+"x$1");r(e,a)}}function i(t,e,n){s>1&&r(t,n)}function o(){return"undefined"!=typeof document?Array.prototype.slice.call(document.querySelectorAll(l)):[]}function a(t){return t.style.backgroundImage.replace(c,"$2")}function u(){o().forEach(function(t){var e="img"===t.nodeName.toLowerCase(),r=e?t.getAttribute("src"):a(t),o=t.getAttribute("data-rjs"),u=!isNaN(parseInt(o,10));u?n(t,r,o):i(t,r,o)})}"undefined"==typeof exports&&(exports={}),Object.defineProperty(exports,"__esModule",{value:!0});var d="undefined"!=typeof window,s=d?window.devicePixelRatio||1:1,f=/(\.[A-z]{3,4}\/?(\?.*)?)$/,c=/url\(('|")?([^\)'"]+)('|")?\)/i,l="[data-rjs]";d&&(window.addEventListener("load",u),window.retinajs=u),exports["default"]=u}();
/* ========================================================================
 * Bootstrap: affix.js v3.3.7
 * http://getbootstrap.com/javascript/#affix
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // AFFIX CLASS DEFINITION
  // ======================

  var Affix = function (element, options) {
    this.options = $.extend({}, Affix.DEFAULTS, options)

    this.$target = $(this.options.target)
      .on('scroll.bs.affix.data-api', $.proxy(this.checkPosition, this))
      .on('click.bs.affix.data-api',  $.proxy(this.checkPositionWithEventLoop, this))

    this.$element     = $(element)
    this.affixed      = null
    this.unpin        = null
    this.pinnedOffset = null

    this.checkPosition()
  }

  Affix.VERSION  = '3.3.7'

  Affix.RESET    = 'affix affix-top affix-bottom'

  Affix.DEFAULTS = {
    offset: 0,
    target: window
  }

  Affix.prototype.getState = function (scrollHeight, height, offsetTop, offsetBottom) {
    var scrollTop    = this.$target.scrollTop()
    var position     = this.$element.offset()
    var targetHeight = this.$target.height()

    if (offsetTop != null && this.affixed == 'top') return scrollTop < offsetTop ? 'top' : false

    if (this.affixed == 'bottom') {
      if (offsetTop != null) return (scrollTop + this.unpin <= position.top) ? false : 'bottom'
      return (scrollTop + targetHeight <= scrollHeight - offsetBottom) ? false : 'bottom'
    }

    var initializing   = this.affixed == null
    var colliderTop    = initializing ? scrollTop : position.top
    var colliderHeight = initializing ? targetHeight : height

    if (offsetTop != null && scrollTop <= offsetTop) return 'top'
    if (offsetBottom != null && (colliderTop + colliderHeight >= scrollHeight - offsetBottom)) return 'bottom'

    return false
  }

  Affix.prototype.getPinnedOffset = function () {
    if (this.pinnedOffset) return this.pinnedOffset
    this.$element.removeClass(Affix.RESET).addClass('affix')
    var scrollTop = this.$target.scrollTop()
    var position  = this.$element.offset()
    return (this.pinnedOffset = position.top - scrollTop)
  }

  Affix.prototype.checkPositionWithEventLoop = function () {
    setTimeout($.proxy(this.checkPosition, this), 1)
  }

  Affix.prototype.checkPosition = function () {
    if (!this.$element.is(':visible')) return

    var height       = this.$element.height()
    var offset       = this.options.offset
    var offsetTop    = offset.top
    var offsetBottom = offset.bottom
    var scrollHeight = Math.max($(document).height(), $(document.body).height())

    if (typeof offset != 'object')         offsetBottom = offsetTop = offset
    if (typeof offsetTop == 'function')    offsetTop    = offset.top(this.$element)
    if (typeof offsetBottom == 'function') offsetBottom = offset.bottom(this.$element)

    var affix = this.getState(scrollHeight, height, offsetTop, offsetBottom)

    if (this.affixed != affix) {
      if (this.unpin != null) this.$element.css('top', '')

      var affixType = 'affix' + (affix ? '-' + affix : '')
      var e         = $.Event(affixType + '.bs.affix')

      this.$element.trigger(e)

      if (e.isDefaultPrevented()) return

      this.affixed = affix
      this.unpin = affix == 'bottom' ? this.getPinnedOffset() : null

      this.$element
        .removeClass(Affix.RESET)
        .addClass(affixType)
        .trigger(affixType.replace('affix', 'affixed') + '.bs.affix')
    }

    if (affix == 'bottom') {
      this.$element.offset({
        top: scrollHeight - height - offsetBottom
      })
    }
  }


  // AFFIX PLUGIN DEFINITION
  // =======================

  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.affix')
      var options = typeof option == 'object' && option

      if (!data) $this.data('bs.affix', (data = new Affix(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  var old = $.fn.affix

  $.fn.affix             = Plugin
  $.fn.affix.Constructor = Affix


  // AFFIX NO CONFLICT
  // =================

  $.fn.affix.noConflict = function () {
    $.fn.affix = old
    return this
  }


  // AFFIX DATA-API
  // ==============

  $(window).on('load', function () {
    $('[data-spy="affix"]').each(function () {
      var $spy = $(this)
      var data = $spy.data()

      data.offset = data.offset || {}

      if (data.offsetBottom != null) data.offset.bottom = data.offsetBottom
      if (data.offsetTop    != null) data.offset.top    = data.offsetTop

      Plugin.call($spy, data)
    })
  })

}(jQuery);

/* ========================================================================
 * Bootstrap: alert.js v3.3.7
 * http://getbootstrap.com/javascript/#alerts
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // ALERT CLASS DEFINITION
  // ======================

  var dismiss = '[data-dismiss="alert"]'
  var Alert   = function (el) {
    $(el).on('click', dismiss, this.close)
  }

  Alert.VERSION = '3.3.7'

  Alert.TRANSITION_DURATION = 150

  Alert.prototype.close = function (e) {
    var $this    = $(this)
    var selector = $this.attr('data-target')

    if (!selector) {
      selector = $this.attr('href')
      selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
    }

    var $parent = $(selector === '#' ? [] : selector)

    if (e) e.preventDefault()

    if (!$parent.length) {
      $parent = $this.closest('.alert')
    }

    $parent.trigger(e = $.Event('close.bs.alert'))

    if (e.isDefaultPrevented()) return

    $parent.removeClass('in')

    function removeElement() {
      // detach from parent, fire event then clean up data
      $parent.detach().trigger('closed.bs.alert').remove()
    }

    $.support.transition && $parent.hasClass('fade') ?
      $parent
        .one('bsTransitionEnd', removeElement)
        .emulateTransitionEnd(Alert.TRANSITION_DURATION) :
      removeElement()
  }


  // ALERT PLUGIN DEFINITION
  // =======================

  function Plugin(option) {
    return this.each(function () {
      var $this = $(this)
      var data  = $this.data('bs.alert')

      if (!data) $this.data('bs.alert', (data = new Alert(this)))
      if (typeof option == 'string') data[option].call($this)
    })
  }

  var old = $.fn.alert

  $.fn.alert             = Plugin
  $.fn.alert.Constructor = Alert


  // ALERT NO CONFLICT
  // =================

  $.fn.alert.noConflict = function () {
    $.fn.alert = old
    return this
  }


  // ALERT DATA-API
  // ==============

  $(document).on('click.bs.alert.data-api', dismiss, Alert.prototype.close)

}(jQuery);

/* ========================================================================
 * Bootstrap: button.js v3.3.7
 * http://getbootstrap.com/javascript/#buttons
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // BUTTON PUBLIC CLASS DEFINITION
  // ==============================

  var Button = function (element, options) {
    this.$element  = $(element)
    this.options   = $.extend({}, Button.DEFAULTS, options)
    this.isLoading = false
  }

  Button.VERSION  = '3.3.7'

  Button.DEFAULTS = {
    loadingText: 'loading...'
  }

  Button.prototype.setState = function (state) {
    var d    = 'disabled'
    var $el  = this.$element
    var val  = $el.is('input') ? 'val' : 'html'
    var data = $el.data()

    state += 'Text'

    if (data.resetText == null) $el.data('resetText', $el[val]())

    // push to event loop to allow forms to submit
    setTimeout($.proxy(function () {
      $el[val](data[state] == null ? this.options[state] : data[state])

      if (state == 'loadingText') {
        this.isLoading = true
        $el.addClass(d).attr(d, d).prop(d, true)
      } else if (this.isLoading) {
        this.isLoading = false
        $el.removeClass(d).removeAttr(d).prop(d, false)
      }
    }, this), 0)
  }

  Button.prototype.toggle = function () {
    var changed = true
    var $parent = this.$element.closest('[data-toggle="buttons"]')

    if ($parent.length) {
      var $input = this.$element.find('input')
      if ($input.prop('type') == 'radio') {
        if ($input.prop('checked')) changed = false
        $parent.find('.active').removeClass('active')
        this.$element.addClass('active')
      } else if ($input.prop('type') == 'checkbox') {
        if (($input.prop('checked')) !== this.$element.hasClass('active')) changed = false
        this.$element.toggleClass('active')
      }
      $input.prop('checked', this.$element.hasClass('active'))
      if (changed) $input.trigger('change')
    } else {
      this.$element.attr('aria-pressed', !this.$element.hasClass('active'))
      this.$element.toggleClass('active')
    }
  }


  // BUTTON PLUGIN DEFINITION
  // ========================

  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.button')
      var options = typeof option == 'object' && option

      if (!data) $this.data('bs.button', (data = new Button(this, options)))

      if (option == 'toggle') data.toggle()
      else if (option) data.setState(option)
    })
  }

  var old = $.fn.button

  $.fn.button             = Plugin
  $.fn.button.Constructor = Button


  // BUTTON NO CONFLICT
  // ==================

  $.fn.button.noConflict = function () {
    $.fn.button = old
    return this
  }


  // BUTTON DATA-API
  // ===============

  $(document)
    .on('click.bs.button.data-api', '[data-toggle^="button"]', function (e) {
      var $btn = $(e.target).closest('.btn')
      Plugin.call($btn, 'toggle')
      if (!($(e.target).is('input[type="radio"], input[type="checkbox"]'))) {
        // Prevent double click on radios, and the double selections (so cancellation) on checkboxes
        e.preventDefault()
        // The target component still receive the focus
        if ($btn.is('input,button')) $btn.trigger('focus')
        else $btn.find('input:visible,button:visible').first().trigger('focus')
      }
    })
    .on('focus.bs.button.data-api blur.bs.button.data-api', '[data-toggle^="button"]', function (e) {
      $(e.target).closest('.btn').toggleClass('focus', /^focus(in)?$/.test(e.type))
    })

}(jQuery);

/* ========================================================================
 * Bootstrap: carousel.js v3.3.7
 * http://getbootstrap.com/javascript/#carousel
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // CAROUSEL CLASS DEFINITION
  // =========================

  var Carousel = function (element, options) {
    this.$element    = $(element)
    this.$indicators = this.$element.find('.carousel-indicators')
    this.options     = options
    this.paused      = null
    this.sliding     = null
    this.interval    = null
    this.$active     = null
    this.$items      = null

    this.options.keyboard && this.$element.on('keydown.bs.carousel', $.proxy(this.keydown, this))

    this.options.pause == 'hover' && !('ontouchstart' in document.documentElement) && this.$element
      .on('mouseenter.bs.carousel', $.proxy(this.pause, this))
      .on('mouseleave.bs.carousel', $.proxy(this.cycle, this))
  }

  Carousel.VERSION  = '3.3.7'

  Carousel.TRANSITION_DURATION = 600

  Carousel.DEFAULTS = {
    interval: 5000,
    pause: 'hover',
    wrap: true,
    keyboard: true
  }

  Carousel.prototype.keydown = function (e) {
    if (/input|textarea/i.test(e.target.tagName)) return
    switch (e.which) {
      case 37: this.prev(); break
      case 39: this.next(); break
      default: return
    }

    e.preventDefault()
  }

  Carousel.prototype.cycle = function (e) {
    e || (this.paused = false)

    this.interval && clearInterval(this.interval)

    this.options.interval
      && !this.paused
      && (this.interval = setInterval($.proxy(this.next, this), this.options.interval))

    return this
  }

  Carousel.prototype.getItemIndex = function (item) {
    this.$items = item.parent().children('.item')
    return this.$items.index(item || this.$active)
  }

  Carousel.prototype.getItemForDirection = function (direction, active) {
    var activeIndex = this.getItemIndex(active)
    var willWrap = (direction == 'prev' && activeIndex === 0)
                || (direction == 'next' && activeIndex == (this.$items.length - 1))
    if (willWrap && !this.options.wrap) return active
    var delta = direction == 'prev' ? -1 : 1
    var itemIndex = (activeIndex + delta) % this.$items.length
    return this.$items.eq(itemIndex)
  }

  Carousel.prototype.to = function (pos) {
    var that        = this
    var activeIndex = this.getItemIndex(this.$active = this.$element.find('.item.active'))

    if (pos > (this.$items.length - 1) || pos < 0) return

    if (this.sliding)       return this.$element.one('slid.bs.carousel', function () { that.to(pos) }) // yes, "slid"
    if (activeIndex == pos) return this.pause().cycle()

    return this.slide(pos > activeIndex ? 'next' : 'prev', this.$items.eq(pos))
  }

  Carousel.prototype.pause = function (e) {
    e || (this.paused = true)

    if (this.$element.find('.next, .prev').length && $.support.transition) {
      this.$element.trigger($.support.transition.end)
      this.cycle(true)
    }

    this.interval = clearInterval(this.interval)

    return this
  }

  Carousel.prototype.next = function () {
    if (this.sliding) return
    return this.slide('next')
  }

  Carousel.prototype.prev = function () {
    if (this.sliding) return
    return this.slide('prev')
  }

  Carousel.prototype.slide = function (type, next) {
    var $active   = this.$element.find('.item.active')
    var $next     = next || this.getItemForDirection(type, $active)
    var isCycling = this.interval
    var direction = type == 'next' ? 'left' : 'right'
    var that      = this

    if ($next.hasClass('active')) return (this.sliding = false)

    var relatedTarget = $next[0]
    var slideEvent = $.Event('slide.bs.carousel', {
      relatedTarget: relatedTarget,
      direction: direction
    })
    this.$element.trigger(slideEvent)
    if (slideEvent.isDefaultPrevented()) return

    this.sliding = true

    isCycling && this.pause()

    if (this.$indicators.length) {
      this.$indicators.find('.active').removeClass('active')
      var $nextIndicator = $(this.$indicators.children()[this.getItemIndex($next)])
      $nextIndicator && $nextIndicator.addClass('active')
    }

    var slidEvent = $.Event('slid.bs.carousel', { relatedTarget: relatedTarget, direction: direction }) // yes, "slid"
    if ($.support.transition && this.$element.hasClass('slide')) {
      $next.addClass(type)
      $next[0].offsetWidth // force reflow
      $active.addClass(direction)
      $next.addClass(direction)
      $active
        .one('bsTransitionEnd', function () {
          $next.removeClass([type, direction].join(' ')).addClass('active')
          $active.removeClass(['active', direction].join(' '))
          that.sliding = false
          setTimeout(function () {
            that.$element.trigger(slidEvent)
          }, 0)
        })
        .emulateTransitionEnd(Carousel.TRANSITION_DURATION)
    } else {
      $active.removeClass('active')
      $next.addClass('active')
      this.sliding = false
      this.$element.trigger(slidEvent)
    }

    isCycling && this.cycle()

    return this
  }


  // CAROUSEL PLUGIN DEFINITION
  // ==========================

  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.carousel')
      var options = $.extend({}, Carousel.DEFAULTS, $this.data(), typeof option == 'object' && option)
      var action  = typeof option == 'string' ? option : options.slide

      if (!data) $this.data('bs.carousel', (data = new Carousel(this, options)))
      if (typeof option == 'number') data.to(option)
      else if (action) data[action]()
      else if (options.interval) data.pause().cycle()
    })
  }

  var old = $.fn.carousel

  $.fn.carousel             = Plugin
  $.fn.carousel.Constructor = Carousel


  // CAROUSEL NO CONFLICT
  // ====================

  $.fn.carousel.noConflict = function () {
    $.fn.carousel = old
    return this
  }


  // CAROUSEL DATA-API
  // =================

  var clickHandler = function (e) {
    var href
    var $this   = $(this)
    var $target = $($this.attr('data-target') || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '')) // strip for ie7
    if (!$target.hasClass('carousel')) return
    var options = $.extend({}, $target.data(), $this.data())
    var slideIndex = $this.attr('data-slide-to')
    if (slideIndex) options.interval = false

    Plugin.call($target, options)

    if (slideIndex) {
      $target.data('bs.carousel').to(slideIndex)
    }

    e.preventDefault()
  }

  $(document)
    .on('click.bs.carousel.data-api', '[data-slide]', clickHandler)
    .on('click.bs.carousel.data-api', '[data-slide-to]', clickHandler)

  $(window).on('load', function () {
    $('[data-ride="carousel"]').each(function () {
      var $carousel = $(this)
      Plugin.call($carousel, $carousel.data())
    })
  })

}(jQuery);

/* ========================================================================
 * Bootstrap: collapse.js v3.3.7
 * http://getbootstrap.com/javascript/#collapse
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */

/* jshint latedef: false */

+function ($) {
  'use strict';

  // COLLAPSE PUBLIC CLASS DEFINITION
  // ================================

  var Collapse = function (element, options) {
    this.$element      = $(element)
    this.options       = $.extend({}, Collapse.DEFAULTS, options)
    this.$trigger      = $('[data-toggle="collapse"][href="#' + element.id + '"],' +
                           '[data-toggle="collapse"][data-target="#' + element.id + '"]')
    this.transitioning = null

    if (this.options.parent) {
      this.$parent = this.getParent()
    } else {
      this.addAriaAndCollapsedClass(this.$element, this.$trigger)
    }

    if (this.options.toggle) this.toggle()
  }

  Collapse.VERSION  = '3.3.7'

  Collapse.TRANSITION_DURATION = 350

  Collapse.DEFAULTS = {
    toggle: true
  }

  Collapse.prototype.dimension = function () {
    var hasWidth = this.$element.hasClass('width')
    return hasWidth ? 'width' : 'height'
  }

  Collapse.prototype.show = function () {
    if (this.transitioning || this.$element.hasClass('in')) return

    var activesData
    var actives = this.$parent && this.$parent.children('.panel').children('.in, .collapsing')

    if (actives && actives.length) {
      activesData = actives.data('bs.collapse')
      if (activesData && activesData.transitioning) return
    }

    var startEvent = $.Event('show.bs.collapse')
    this.$element.trigger(startEvent)
    if (startEvent.isDefaultPrevented()) return

    if (actives && actives.length) {
      Plugin.call(actives, 'hide')
      activesData || actives.data('bs.collapse', null)
    }

    var dimension = this.dimension()

    this.$element
      .removeClass('collapse')
      .addClass('collapsing')[dimension](0)
      .attr('aria-expanded', true)

    this.$trigger
      .removeClass('collapsed')
      .attr('aria-expanded', true)

    this.transitioning = 1

    var complete = function () {
      this.$element
        .removeClass('collapsing')
        .addClass('collapse in')[dimension]('')
      this.transitioning = 0
      this.$element
        .trigger('shown.bs.collapse')
    }

    if (!$.support.transition) return complete.call(this)

    var scrollSize = $.camelCase(['scroll', dimension].join('-'))

    this.$element
      .one('bsTransitionEnd', $.proxy(complete, this))
      .emulateTransitionEnd(Collapse.TRANSITION_DURATION)[dimension](this.$element[0][scrollSize])
  }

  Collapse.prototype.hide = function () {
    if (this.transitioning || !this.$element.hasClass('in')) return

    var startEvent = $.Event('hide.bs.collapse')
    this.$element.trigger(startEvent)
    if (startEvent.isDefaultPrevented()) return

    var dimension = this.dimension()

    this.$element[dimension](this.$element[dimension]())[0].offsetHeight

    this.$element
      .addClass('collapsing')
      .removeClass('collapse in')
      .attr('aria-expanded', false)

    this.$trigger
      .addClass('collapsed')
      .attr('aria-expanded', false)

    this.transitioning = 1

    var complete = function () {
      this.transitioning = 0
      this.$element
        .removeClass('collapsing')
        .addClass('collapse')
        .trigger('hidden.bs.collapse')
    }

    if (!$.support.transition) return complete.call(this)

    this.$element
      [dimension](0)
      .one('bsTransitionEnd', $.proxy(complete, this))
      .emulateTransitionEnd(Collapse.TRANSITION_DURATION)
  }

  Collapse.prototype.toggle = function () {
    this[this.$element.hasClass('in') ? 'hide' : 'show']()
  }

  Collapse.prototype.getParent = function () {
    return $(this.options.parent)
      .find('[data-toggle="collapse"][data-parent="' + this.options.parent + '"]')
      .each($.proxy(function (i, element) {
        var $element = $(element)
        this.addAriaAndCollapsedClass(getTargetFromTrigger($element), $element)
      }, this))
      .end()
  }

  Collapse.prototype.addAriaAndCollapsedClass = function ($element, $trigger) {
    var isOpen = $element.hasClass('in')

    $element.attr('aria-expanded', isOpen)
    $trigger
      .toggleClass('collapsed', !isOpen)
      .attr('aria-expanded', isOpen)
  }

  function getTargetFromTrigger($trigger) {
    var href
    var target = $trigger.attr('data-target')
      || (href = $trigger.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '') // strip for ie7

    return $(target)
  }


  // COLLAPSE PLUGIN DEFINITION
  // ==========================

  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.collapse')
      var options = $.extend({}, Collapse.DEFAULTS, $this.data(), typeof option == 'object' && option)

      if (!data && options.toggle && /show|hide/.test(option)) options.toggle = false
      if (!data) $this.data('bs.collapse', (data = new Collapse(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  var old = $.fn.collapse

  $.fn.collapse             = Plugin
  $.fn.collapse.Constructor = Collapse


  // COLLAPSE NO CONFLICT
  // ====================

  $.fn.collapse.noConflict = function () {
    $.fn.collapse = old
    return this
  }


  // COLLAPSE DATA-API
  // =================

  $(document).on('click.bs.collapse.data-api', '[data-toggle="collapse"]', function (e) {
    var $this   = $(this)

    if (!$this.attr('data-target')) e.preventDefault()

    var $target = getTargetFromTrigger($this)
    var data    = $target.data('bs.collapse')
    var option  = data ? 'toggle' : $this.data()

    Plugin.call($target, option)
  })

}(jQuery);

/* ========================================================================
 * Bootstrap: dropdown.js v3.3.7
 * http://getbootstrap.com/javascript/#dropdowns
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // DROPDOWN CLASS DEFINITION
  // =========================

  var backdrop = '.dropdown-backdrop'
  var toggle   = '[data-toggle="dropdown"]'
  var Dropdown = function (element) {
    $(element).on('click.bs.dropdown', this.toggle)
  }

  Dropdown.VERSION = '3.3.7'

  function getParent($this) {
    var selector = $this.attr('data-target')

    if (!selector) {
      selector = $this.attr('href')
      selector = selector && /#[A-Za-z]/.test(selector) && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
    }

    var $parent = selector && $(selector)

    return $parent && $parent.length ? $parent : $this.parent()
  }

  function clearMenus(e) {
    if (e && e.which === 3) return
    $(backdrop).remove()
    $(toggle).each(function () {
      var $this         = $(this)
      var $parent       = getParent($this)
      var relatedTarget = { relatedTarget: this }

      if (!$parent.hasClass('open')) return

      if (e && e.type == 'click' && /input|textarea/i.test(e.target.tagName) && $.contains($parent[0], e.target)) return

      $parent.trigger(e = $.Event('hide.bs.dropdown', relatedTarget))

      if (e.isDefaultPrevented()) return

      $this.attr('aria-expanded', 'false')
      $parent.removeClass('open').trigger($.Event('hidden.bs.dropdown', relatedTarget))
    })
  }

  Dropdown.prototype.toggle = function (e) {
    var $this = $(this)

    if ($this.is('.disabled, :disabled')) return

    var $parent  = getParent($this)
    var isActive = $parent.hasClass('open')

    clearMenus()

    if (!isActive) {
      if ('ontouchstart' in document.documentElement && !$parent.closest('.navbar-nav').length) {
        // if mobile we use a backdrop because click events don't delegate
        $(document.createElement('div'))
          .addClass('dropdown-backdrop')
          .insertAfter($(this))
          .on('click', clearMenus)
      }

      var relatedTarget = { relatedTarget: this }
      $parent.trigger(e = $.Event('show.bs.dropdown', relatedTarget))

      if (e.isDefaultPrevented()) return

      $this
        .trigger('focus')
        .attr('aria-expanded', 'true')

      $parent
        .toggleClass('open')
        .trigger($.Event('shown.bs.dropdown', relatedTarget))
    }

    return false
  }

  Dropdown.prototype.keydown = function (e) {
    if (!/(38|40|27|32)/.test(e.which) || /input|textarea/i.test(e.target.tagName)) return

    var $this = $(this)

    e.preventDefault()
    e.stopPropagation()

    if ($this.is('.disabled, :disabled')) return

    var $parent  = getParent($this)
    var isActive = $parent.hasClass('open')

    if (!isActive && e.which != 27 || isActive && e.which == 27) {
      if (e.which == 27) $parent.find(toggle).trigger('focus')
      return $this.trigger('click')
    }

    var desc = ' li:not(.disabled):visible a'
    var $items = $parent.find('.dropdown-menu' + desc)

    if (!$items.length) return

    var index = $items.index(e.target)

    if (e.which == 38 && index > 0)                 index--         // up
    if (e.which == 40 && index < $items.length - 1) index++         // down
    if (!~index)                                    index = 0

    $items.eq(index).trigger('focus')
  }


  // DROPDOWN PLUGIN DEFINITION
  // ==========================

  function Plugin(option) {
    return this.each(function () {
      var $this = $(this)
      var data  = $this.data('bs.dropdown')

      if (!data) $this.data('bs.dropdown', (data = new Dropdown(this)))
      if (typeof option == 'string') data[option].call($this)
    })
  }

  var old = $.fn.dropdown

  $.fn.dropdown             = Plugin
  $.fn.dropdown.Constructor = Dropdown


  // DROPDOWN NO CONFLICT
  // ====================

  $.fn.dropdown.noConflict = function () {
    $.fn.dropdown = old
    return this
  }


  // APPLY TO STANDARD DROPDOWN ELEMENTS
  // ===================================

  $(document)
    .on('click.bs.dropdown.data-api', clearMenus)
    .on('click.bs.dropdown.data-api', '.dropdown form', function (e) { e.stopPropagation() })
    .on('click.bs.dropdown.data-api', toggle, Dropdown.prototype.toggle)
    .on('keydown.bs.dropdown.data-api', toggle, Dropdown.prototype.keydown)
    .on('keydown.bs.dropdown.data-api', '.dropdown-menu', Dropdown.prototype.keydown)

}(jQuery);

/* ========================================================================
 * Bootstrap: modal.js v3.3.7
 * http://getbootstrap.com/javascript/#modals
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // MODAL CLASS DEFINITION
  // ======================

  var Modal = function (element, options) {
    this.options             = options
    this.$body               = $(document.body)
    this.$element            = $(element)
    this.$dialog             = this.$element.find('.modal-dialog')
    this.$backdrop           = null
    this.isShown             = null
    this.originalBodyPad     = null
    this.scrollbarWidth      = 0
    this.ignoreBackdropClick = false

    if (this.options.remote) {
      this.$element
        .find('.modal-content')
        .load(this.options.remote, $.proxy(function () {
          this.$element.trigger('loaded.bs.modal')
        }, this))
    }
  }

  Modal.VERSION  = '3.3.7'

  Modal.TRANSITION_DURATION = 300
  Modal.BACKDROP_TRANSITION_DURATION = 150

  Modal.DEFAULTS = {
    backdrop: true,
    keyboard: true,
    show: true
  }

  Modal.prototype.toggle = function (_relatedTarget) {
    return this.isShown ? this.hide() : this.show(_relatedTarget)
  }

  Modal.prototype.show = function (_relatedTarget) {
    var that = this
    var e    = $.Event('show.bs.modal', { relatedTarget: _relatedTarget })

    this.$element.trigger(e)

    if (this.isShown || e.isDefaultPrevented()) return

    this.isShown = true

    this.checkScrollbar()
    this.setScrollbar()
    this.$body.addClass('modal-open')

    this.escape()
    this.resize()

    this.$element.on('click.dismiss.bs.modal', '[data-dismiss="modal"]', $.proxy(this.hide, this))

    this.$dialog.on('mousedown.dismiss.bs.modal', function () {
      that.$element.one('mouseup.dismiss.bs.modal', function (e) {
        if ($(e.target).is(that.$element)) that.ignoreBackdropClick = true
      })
    })

    this.backdrop(function () {
      var transition = $.support.transition && that.$element.hasClass('fade')

      if (!that.$element.parent().length) {
        that.$element.appendTo(that.$body) // don't move modals dom position
      }

      that.$element
        .show()
        .scrollTop(0)

      that.adjustDialog()

      if (transition) {
        that.$element[0].offsetWidth // force reflow
      }

      that.$element.addClass('in')

      that.enforceFocus()

      var e = $.Event('shown.bs.modal', { relatedTarget: _relatedTarget })

      transition ?
        that.$dialog // wait for modal to slide in
          .one('bsTransitionEnd', function () {
            that.$element.trigger('focus').trigger(e)
          })
          .emulateTransitionEnd(Modal.TRANSITION_DURATION) :
        that.$element.trigger('focus').trigger(e)
    })
  }

  Modal.prototype.hide = function (e) {
    if (e) e.preventDefault()

    e = $.Event('hide.bs.modal')

    this.$element.trigger(e)

    if (!this.isShown || e.isDefaultPrevented()) return

    this.isShown = false

    this.escape()
    this.resize()

    $(document).off('focusin.bs.modal')

    this.$element
      .removeClass('in')
      .off('click.dismiss.bs.modal')
      .off('mouseup.dismiss.bs.modal')

    this.$dialog.off('mousedown.dismiss.bs.modal')

    $.support.transition && this.$element.hasClass('fade') ?
      this.$element
        .one('bsTransitionEnd', $.proxy(this.hideModal, this))
        .emulateTransitionEnd(Modal.TRANSITION_DURATION) :
      this.hideModal()
  }

  Modal.prototype.enforceFocus = function () {
    $(document)
      .off('focusin.bs.modal') // guard against infinite focus loop
      .on('focusin.bs.modal', $.proxy(function (e) {
        if (document !== e.target &&
            this.$element[0] !== e.target &&
            !this.$element.has(e.target).length) {
          this.$element.trigger('focus')
        }
      }, this))
  }

  Modal.prototype.escape = function () {
    if (this.isShown && this.options.keyboard) {
      this.$element.on('keydown.dismiss.bs.modal', $.proxy(function (e) {
        e.which == 27 && this.hide()
      }, this))
    } else if (!this.isShown) {
      this.$element.off('keydown.dismiss.bs.modal')
    }
  }

  Modal.prototype.resize = function () {
    if (this.isShown) {
      $(window).on('resize.bs.modal', $.proxy(this.handleUpdate, this))
    } else {
      $(window).off('resize.bs.modal')
    }
  }

  Modal.prototype.hideModal = function () {
    var that = this
    this.$element.hide()
    this.backdrop(function () {
      that.$body.removeClass('modal-open')
      that.resetAdjustments()
      that.resetScrollbar()
      that.$element.trigger('hidden.bs.modal')
    })
  }

  Modal.prototype.removeBackdrop = function () {
    this.$backdrop && this.$backdrop.remove()
    this.$backdrop = null
  }

  Modal.prototype.backdrop = function (callback) {
    var that = this
    var animate = this.$element.hasClass('fade') ? 'fade' : ''

    if (this.isShown && this.options.backdrop) {
      var doAnimate = $.support.transition && animate

      this.$backdrop = $(document.createElement('div'))
        .addClass('modal-backdrop ' + animate)
        .appendTo(this.$body)

      this.$element.on('click.dismiss.bs.modal', $.proxy(function (e) {
        if (this.ignoreBackdropClick) {
          this.ignoreBackdropClick = false
          return
        }
        if (e.target !== e.currentTarget) return
        this.options.backdrop == 'static'
          ? this.$element[0].focus()
          : this.hide()
      }, this))

      if (doAnimate) this.$backdrop[0].offsetWidth // force reflow

      this.$backdrop.addClass('in')

      if (!callback) return

      doAnimate ?
        this.$backdrop
          .one('bsTransitionEnd', callback)
          .emulateTransitionEnd(Modal.BACKDROP_TRANSITION_DURATION) :
        callback()

    } else if (!this.isShown && this.$backdrop) {
      this.$backdrop.removeClass('in')

      var callbackRemove = function () {
        that.removeBackdrop()
        callback && callback()
      }
      $.support.transition && this.$element.hasClass('fade') ?
        this.$backdrop
          .one('bsTransitionEnd', callbackRemove)
          .emulateTransitionEnd(Modal.BACKDROP_TRANSITION_DURATION) :
        callbackRemove()

    } else if (callback) {
      callback()
    }
  }

  // these following methods are used to handle overflowing modals

  Modal.prototype.handleUpdate = function () {
    this.adjustDialog()
  }

  Modal.prototype.adjustDialog = function () {
    var modalIsOverflowing = this.$element[0].scrollHeight > document.documentElement.clientHeight

    this.$element.css({
      paddingLeft:  !this.bodyIsOverflowing && modalIsOverflowing ? this.scrollbarWidth : '',
      paddingRight: this.bodyIsOverflowing && !modalIsOverflowing ? this.scrollbarWidth : ''
    })
  }

  Modal.prototype.resetAdjustments = function () {
    this.$element.css({
      paddingLeft: '',
      paddingRight: ''
    })
  }

  Modal.prototype.checkScrollbar = function () {
    var fullWindowWidth = window.innerWidth
    if (!fullWindowWidth) { // workaround for missing window.innerWidth in IE8
      var documentElementRect = document.documentElement.getBoundingClientRect()
      fullWindowWidth = documentElementRect.right - Math.abs(documentElementRect.left)
    }
    this.bodyIsOverflowing = document.body.clientWidth < fullWindowWidth
    this.scrollbarWidth = this.measureScrollbar()
  }

  Modal.prototype.setScrollbar = function () {
    var bodyPad = parseInt((this.$body.css('padding-right') || 0), 10)
    this.originalBodyPad = document.body.style.paddingRight || ''
    if (this.bodyIsOverflowing) this.$body.css('padding-right', bodyPad + this.scrollbarWidth)
  }

  Modal.prototype.resetScrollbar = function () {
    this.$body.css('padding-right', this.originalBodyPad)
  }

  Modal.prototype.measureScrollbar = function () { // thx walsh
    var scrollDiv = document.createElement('div')
    scrollDiv.className = 'modal-scrollbar-measure'
    this.$body.append(scrollDiv)
    var scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth
    this.$body[0].removeChild(scrollDiv)
    return scrollbarWidth
  }


  // MODAL PLUGIN DEFINITION
  // =======================

  function Plugin(option, _relatedTarget) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.modal')
      var options = $.extend({}, Modal.DEFAULTS, $this.data(), typeof option == 'object' && option)

      if (!data) $this.data('bs.modal', (data = new Modal(this, options)))
      if (typeof option == 'string') data[option](_relatedTarget)
      else if (options.show) data.show(_relatedTarget)
    })
  }

  var old = $.fn.modal

  $.fn.modal             = Plugin
  $.fn.modal.Constructor = Modal


  // MODAL NO CONFLICT
  // =================

  $.fn.modal.noConflict = function () {
    $.fn.modal = old
    return this
  }


  // MODAL DATA-API
  // ==============

  $(document).on('click.bs.modal.data-api', '[data-toggle="modal"]', function (e) {
    var $this   = $(this)
    var href    = $this.attr('href')
    var $target = $($this.attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, ''))) // strip for ie7
    var option  = $target.data('bs.modal') ? 'toggle' : $.extend({ remote: !/#/.test(href) && href }, $target.data(), $this.data())

    if ($this.is('a')) e.preventDefault()

    $target.one('show.bs.modal', function (showEvent) {
      if (showEvent.isDefaultPrevented()) return // only register focus restorer if modal will actually get shown
      $target.one('hidden.bs.modal', function () {
        $this.is(':visible') && $this.trigger('focus')
      })
    })
    Plugin.call($target, option, this)
  })

}(jQuery);

/* ========================================================================
 * Bootstrap: tooltip.js v3.3.7
 * http://getbootstrap.com/javascript/#tooltip
 * Inspired by the original jQuery.tipsy by Jason Frame
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // TOOLTIP PUBLIC CLASS DEFINITION
  // ===============================

  var Tooltip = function (element, options) {
    this.type       = null
    this.options    = null
    this.enabled    = null
    this.timeout    = null
    this.hoverState = null
    this.$element   = null
    this.inState    = null

    this.init('tooltip', element, options)
  }

  Tooltip.VERSION  = '3.3.7'

  Tooltip.TRANSITION_DURATION = 150

  Tooltip.DEFAULTS = {
    animation: true,
    placement: 'top',
    selector: false,
    template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
    trigger: 'hover focus',
    title: '',
    delay: 0,
    html: false,
    container: false,
    viewport: {
      selector: 'body',
      padding: 0
    }
  }

  Tooltip.prototype.init = function (type, element, options) {
    this.enabled   = true
    this.type      = type
    this.$element  = $(element)
    this.options   = this.getOptions(options)
    this.$viewport = this.options.viewport && $($.isFunction(this.options.viewport) ? this.options.viewport.call(this, this.$element) : (this.options.viewport.selector || this.options.viewport))
    this.inState   = { click: false, hover: false, focus: false }

    if (this.$element[0] instanceof document.constructor && !this.options.selector) {
      throw new Error('`selector` option must be specified when initializing ' + this.type + ' on the window.document object!')
    }

    var triggers = this.options.trigger.split(' ')

    for (var i = triggers.length; i--;) {
      var trigger = triggers[i]

      if (trigger == 'click') {
        this.$element.on('click.' + this.type, this.options.selector, $.proxy(this.toggle, this))
      } else if (trigger != 'manual') {
        var eventIn  = trigger == 'hover' ? 'mouseenter' : 'focusin'
        var eventOut = trigger == 'hover' ? 'mouseleave' : 'focusout'

        this.$element.on(eventIn  + '.' + this.type, this.options.selector, $.proxy(this.enter, this))
        this.$element.on(eventOut + '.' + this.type, this.options.selector, $.proxy(this.leave, this))
      }
    }

    this.options.selector ?
      (this._options = $.extend({}, this.options, { trigger: 'manual', selector: '' })) :
      this.fixTitle()
  }

  Tooltip.prototype.getDefaults = function () {
    return Tooltip.DEFAULTS
  }

  Tooltip.prototype.getOptions = function (options) {
    options = $.extend({}, this.getDefaults(), this.$element.data(), options)

    if (options.delay && typeof options.delay == 'number') {
      options.delay = {
        show: options.delay,
        hide: options.delay
      }
    }

    return options
  }

  Tooltip.prototype.getDelegateOptions = function () {
    var options  = {}
    var defaults = this.getDefaults()

    this._options && $.each(this._options, function (key, value) {
      if (defaults[key] != value) options[key] = value
    })

    return options
  }

  Tooltip.prototype.enter = function (obj) {
    var self = obj instanceof this.constructor ?
      obj : $(obj.currentTarget).data('bs.' + this.type)

    if (!self) {
      self = new this.constructor(obj.currentTarget, this.getDelegateOptions())
      $(obj.currentTarget).data('bs.' + this.type, self)
    }

    if (obj instanceof $.Event) {
      self.inState[obj.type == 'focusin' ? 'focus' : 'hover'] = true
    }

    if (self.tip().hasClass('in') || self.hoverState == 'in') {
      self.hoverState = 'in'
      return
    }

    clearTimeout(self.timeout)

    self.hoverState = 'in'

    if (!self.options.delay || !self.options.delay.show) return self.show()

    self.timeout = setTimeout(function () {
      if (self.hoverState == 'in') self.show()
    }, self.options.delay.show)
  }

  Tooltip.prototype.isInStateTrue = function () {
    for (var key in this.inState) {
      if (this.inState[key]) return true
    }

    return false
  }

  Tooltip.prototype.leave = function (obj) {
    var self = obj instanceof this.constructor ?
      obj : $(obj.currentTarget).data('bs.' + this.type)

    if (!self) {
      self = new this.constructor(obj.currentTarget, this.getDelegateOptions())
      $(obj.currentTarget).data('bs.' + this.type, self)
    }

    if (obj instanceof $.Event) {
      self.inState[obj.type == 'focusout' ? 'focus' : 'hover'] = false
    }

    if (self.isInStateTrue()) return

    clearTimeout(self.timeout)

    self.hoverState = 'out'

    if (!self.options.delay || !self.options.delay.hide) return self.hide()

    self.timeout = setTimeout(function () {
      if (self.hoverState == 'out') self.hide()
    }, self.options.delay.hide)
  }

  Tooltip.prototype.show = function () {
    var e = $.Event('show.bs.' + this.type)

    if (this.hasContent() && this.enabled) {
      this.$element.trigger(e)

      var inDom = $.contains(this.$element[0].ownerDocument.documentElement, this.$element[0])
      if (e.isDefaultPrevented() || !inDom) return
      var that = this

      var $tip = this.tip()

      var tipId = this.getUID(this.type)

      this.setContent()
      $tip.attr('id', tipId)
      this.$element.attr('aria-describedby', tipId)

      if (this.options.animation) $tip.addClass('fade')

      var placement = typeof this.options.placement == 'function' ?
        this.options.placement.call(this, $tip[0], this.$element[0]) :
        this.options.placement

      var autoToken = /\s?auto?\s?/i
      var autoPlace = autoToken.test(placement)
      if (autoPlace) placement = placement.replace(autoToken, '') || 'top'

      $tip
        .detach()
        .css({ top: 0, left: 0, display: 'block' })
        .addClass(placement)
        .data('bs.' + this.type, this)

      this.options.container ? $tip.appendTo(this.options.container) : $tip.insertAfter(this.$element)
      this.$element.trigger('inserted.bs.' + this.type)

      var pos          = this.getPosition()
      var actualWidth  = $tip[0].offsetWidth
      var actualHeight = $tip[0].offsetHeight

      if (autoPlace) {
        var orgPlacement = placement
        var viewportDim = this.getPosition(this.$viewport)

        placement = placement == 'bottom' && pos.bottom + actualHeight > viewportDim.bottom ? 'top'    :
                    placement == 'top'    && pos.top    - actualHeight < viewportDim.top    ? 'bottom' :
                    placement == 'right'  && pos.right  + actualWidth  > viewportDim.width  ? 'left'   :
                    placement == 'left'   && pos.left   - actualWidth  < viewportDim.left   ? 'right'  :
                    placement

        $tip
          .removeClass(orgPlacement)
          .addClass(placement)
      }

      var calculatedOffset = this.getCalculatedOffset(placement, pos, actualWidth, actualHeight)

      this.applyPlacement(calculatedOffset, placement)

      var complete = function () {
        var prevHoverState = that.hoverState
        that.$element.trigger('shown.bs.' + that.type)
        that.hoverState = null

        if (prevHoverState == 'out') that.leave(that)
      }

      $.support.transition && this.$tip.hasClass('fade') ?
        $tip
          .one('bsTransitionEnd', complete)
          .emulateTransitionEnd(Tooltip.TRANSITION_DURATION) :
        complete()
    }
  }

  Tooltip.prototype.applyPlacement = function (offset, placement) {
    var $tip   = this.tip()
    var width  = $tip[0].offsetWidth
    var height = $tip[0].offsetHeight

    // manually read margins because getBoundingClientRect includes difference
    var marginTop = parseInt($tip.css('margin-top'), 10)
    var marginLeft = parseInt($tip.css('margin-left'), 10)

    // we must check for NaN for ie 8/9
    if (isNaN(marginTop))  marginTop  = 0
    if (isNaN(marginLeft)) marginLeft = 0

    offset.top  += marginTop
    offset.left += marginLeft

    // $.fn.offset doesn't round pixel values
    // so we use setOffset directly with our own function B-0
    $.offset.setOffset($tip[0], $.extend({
      using: function (props) {
        $tip.css({
          top: Math.round(props.top),
          left: Math.round(props.left)
        })
      }
    }, offset), 0)

    $tip.addClass('in')

    // check to see if placing tip in new offset caused the tip to resize itself
    var actualWidth  = $tip[0].offsetWidth
    var actualHeight = $tip[0].offsetHeight

    if (placement == 'top' && actualHeight != height) {
      offset.top = offset.top + height - actualHeight
    }

    var delta = this.getViewportAdjustedDelta(placement, offset, actualWidth, actualHeight)

    if (delta.left) offset.left += delta.left
    else offset.top += delta.top

    var isVertical          = /top|bottom/.test(placement)
    var arrowDelta          = isVertical ? delta.left * 2 - width + actualWidth : delta.top * 2 - height + actualHeight
    var arrowOffsetPosition = isVertical ? 'offsetWidth' : 'offsetHeight'

    $tip.offset(offset)
    this.replaceArrow(arrowDelta, $tip[0][arrowOffsetPosition], isVertical)
  }

  Tooltip.prototype.replaceArrow = function (delta, dimension, isVertical) {
    this.arrow()
      .css(isVertical ? 'left' : 'top', 50 * (1 - delta / dimension) + '%')
      .css(isVertical ? 'top' : 'left', '')
  }

  Tooltip.prototype.setContent = function () {
    var $tip  = this.tip()
    var title = this.getTitle()

    $tip.find('.tooltip-inner')[this.options.html ? 'html' : 'text'](title)
    $tip.removeClass('fade in top bottom left right')
  }

  Tooltip.prototype.hide = function (callback) {
    var that = this
    var $tip = $(this.$tip)
    var e    = $.Event('hide.bs.' + this.type)

    function complete() {
      if (that.hoverState != 'in') $tip.detach()
      if (that.$element) { // TODO: Check whether guarding this code with this `if` is really necessary.
        that.$element
          .removeAttr('aria-describedby')
          .trigger('hidden.bs.' + that.type)
      }
      callback && callback()
    }

    this.$element.trigger(e)

    if (e.isDefaultPrevented()) return

    $tip.removeClass('in')

    $.support.transition && $tip.hasClass('fade') ?
      $tip
        .one('bsTransitionEnd', complete)
        .emulateTransitionEnd(Tooltip.TRANSITION_DURATION) :
      complete()

    this.hoverState = null

    return this
  }

  Tooltip.prototype.fixTitle = function () {
    var $e = this.$element
    if ($e.attr('title') || typeof $e.attr('data-original-title') != 'string') {
      $e.attr('data-original-title', $e.attr('title') || '').attr('title', '')
    }
  }

  Tooltip.prototype.hasContent = function () {
    return this.getTitle()
  }

  Tooltip.prototype.getPosition = function ($element) {
    $element   = $element || this.$element

    var el     = $element[0]
    var isBody = el.tagName == 'BODY'

    var elRect    = el.getBoundingClientRect()
    if (elRect.width == null) {
      // width and height are missing in IE8, so compute them manually; see https://github.com/twbs/bootstrap/issues/14093
      elRect = $.extend({}, elRect, { width: elRect.right - elRect.left, height: elRect.bottom - elRect.top })
    }
    var isSvg = window.SVGElement && el instanceof window.SVGElement
    // Avoid using $.offset() on SVGs since it gives incorrect results in jQuery 3.
    // See https://github.com/twbs/bootstrap/issues/20280
    var elOffset  = isBody ? { top: 0, left: 0 } : (isSvg ? null : $element.offset())
    var scroll    = { scroll: isBody ? document.documentElement.scrollTop || document.body.scrollTop : $element.scrollTop() }
    var outerDims = isBody ? { width: $(window).width(), height: $(window).height() } : null

    return $.extend({}, elRect, scroll, outerDims, elOffset)
  }

  Tooltip.prototype.getCalculatedOffset = function (placement, pos, actualWidth, actualHeight) {
    return placement == 'bottom' ? { top: pos.top + pos.height,   left: pos.left + pos.width / 2 - actualWidth / 2 } :
           placement == 'top'    ? { top: pos.top - actualHeight, left: pos.left + pos.width / 2 - actualWidth / 2 } :
           placement == 'left'   ? { top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left - actualWidth } :
        /* placement == 'right' */ { top: pos.top + pos.height / 2 - actualHeight / 2, left: pos.left + pos.width }

  }

  Tooltip.prototype.getViewportAdjustedDelta = function (placement, pos, actualWidth, actualHeight) {
    var delta = { top: 0, left: 0 }
    if (!this.$viewport) return delta

    var viewportPadding = this.options.viewport && this.options.viewport.padding || 0
    var viewportDimensions = this.getPosition(this.$viewport)

    if (/right|left/.test(placement)) {
      var topEdgeOffset    = pos.top - viewportPadding - viewportDimensions.scroll
      var bottomEdgeOffset = pos.top + viewportPadding - viewportDimensions.scroll + actualHeight
      if (topEdgeOffset < viewportDimensions.top) { // top overflow
        delta.top = viewportDimensions.top - topEdgeOffset
      } else if (bottomEdgeOffset > viewportDimensions.top + viewportDimensions.height) { // bottom overflow
        delta.top = viewportDimensions.top + viewportDimensions.height - bottomEdgeOffset
      }
    } else {
      var leftEdgeOffset  = pos.left - viewportPadding
      var rightEdgeOffset = pos.left + viewportPadding + actualWidth
      if (leftEdgeOffset < viewportDimensions.left) { // left overflow
        delta.left = viewportDimensions.left - leftEdgeOffset
      } else if (rightEdgeOffset > viewportDimensions.right) { // right overflow
        delta.left = viewportDimensions.left + viewportDimensions.width - rightEdgeOffset
      }
    }

    return delta
  }

  Tooltip.prototype.getTitle = function () {
    var title
    var $e = this.$element
    var o  = this.options

    title = $e.attr('data-original-title')
      || (typeof o.title == 'function' ? o.title.call($e[0]) :  o.title)

    return title
  }

  Tooltip.prototype.getUID = function (prefix) {
    do prefix += ~~(Math.random() * 1000000)
    while (document.getElementById(prefix))
    return prefix
  }

  Tooltip.prototype.tip = function () {
    if (!this.$tip) {
      this.$tip = $(this.options.template)
      if (this.$tip.length != 1) {
        throw new Error(this.type + ' `template` option must consist of exactly 1 top-level element!')
      }
    }
    return this.$tip
  }

  Tooltip.prototype.arrow = function () {
    return (this.$arrow = this.$arrow || this.tip().find('.tooltip-arrow'))
  }

  Tooltip.prototype.enable = function () {
    this.enabled = true
  }

  Tooltip.prototype.disable = function () {
    this.enabled = false
  }

  Tooltip.prototype.toggleEnabled = function () {
    this.enabled = !this.enabled
  }

  Tooltip.prototype.toggle = function (e) {
    var self = this
    if (e) {
      self = $(e.currentTarget).data('bs.' + this.type)
      if (!self) {
        self = new this.constructor(e.currentTarget, this.getDelegateOptions())
        $(e.currentTarget).data('bs.' + this.type, self)
      }
    }

    if (e) {
      self.inState.click = !self.inState.click
      if (self.isInStateTrue()) self.enter(self)
      else self.leave(self)
    } else {
      self.tip().hasClass('in') ? self.leave(self) : self.enter(self)
    }
  }

  Tooltip.prototype.destroy = function () {
    var that = this
    clearTimeout(this.timeout)
    this.hide(function () {
      that.$element.off('.' + that.type).removeData('bs.' + that.type)
      if (that.$tip) {
        that.$tip.detach()
      }
      that.$tip = null
      that.$arrow = null
      that.$viewport = null
      that.$element = null
    })
  }


  // TOOLTIP PLUGIN DEFINITION
  // =========================

  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.tooltip')
      var options = typeof option == 'object' && option

      if (!data && /destroy|hide/.test(option)) return
      if (!data) $this.data('bs.tooltip', (data = new Tooltip(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  var old = $.fn.tooltip

  $.fn.tooltip             = Plugin
  $.fn.tooltip.Constructor = Tooltip


  // TOOLTIP NO CONFLICT
  // ===================

  $.fn.tooltip.noConflict = function () {
    $.fn.tooltip = old
    return this
  }

}(jQuery);

/* ========================================================================
 * Bootstrap: popover.js v3.3.7
 * http://getbootstrap.com/javascript/#popovers
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // POPOVER PUBLIC CLASS DEFINITION
  // ===============================

  var Popover = function (element, options) {
    this.init('popover', element, options)
  }

  if (!$.fn.tooltip) throw new Error('Popover requires tooltip.js')

  Popover.VERSION  = '3.3.7'

  Popover.DEFAULTS = $.extend({}, $.fn.tooltip.Constructor.DEFAULTS, {
    placement: 'right',
    trigger: 'click',
    content: '',
    template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'
  })


  // NOTE: POPOVER EXTENDS tooltip.js
  // ================================

  Popover.prototype = $.extend({}, $.fn.tooltip.Constructor.prototype)

  Popover.prototype.constructor = Popover

  Popover.prototype.getDefaults = function () {
    return Popover.DEFAULTS
  }

  Popover.prototype.setContent = function () {
    var $tip    = this.tip()
    var title   = this.getTitle()
    var content = this.getContent()

    $tip.find('.popover-title')[this.options.html ? 'html' : 'text'](title)
    $tip.find('.popover-content').children().detach().end()[ // we use append for html objects to maintain js events
      this.options.html ? (typeof content == 'string' ? 'html' : 'append') : 'text'
    ](content)

    $tip.removeClass('fade top bottom left right in')

    // IE8 doesn't accept hiding via the `:empty` pseudo selector, we have to do
    // this manually by checking the contents.
    if (!$tip.find('.popover-title').html()) $tip.find('.popover-title').hide()
  }

  Popover.prototype.hasContent = function () {
    return this.getTitle() || this.getContent()
  }

  Popover.prototype.getContent = function () {
    var $e = this.$element
    var o  = this.options

    return $e.attr('data-content')
      || (typeof o.content == 'function' ?
            o.content.call($e[0]) :
            o.content)
  }

  Popover.prototype.arrow = function () {
    return (this.$arrow = this.$arrow || this.tip().find('.arrow'))
  }


  // POPOVER PLUGIN DEFINITION
  // =========================

  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.popover')
      var options = typeof option == 'object' && option

      if (!data && /destroy|hide/.test(option)) return
      if (!data) $this.data('bs.popover', (data = new Popover(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  var old = $.fn.popover

  $.fn.popover             = Plugin
  $.fn.popover.Constructor = Popover


  // POPOVER NO CONFLICT
  // ===================

  $.fn.popover.noConflict = function () {
    $.fn.popover = old
    return this
  }

}(jQuery);

/* ========================================================================
 * Bootstrap: scrollspy.js v3.3.7
 * http://getbootstrap.com/javascript/#scrollspy
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // SCROLLSPY CLASS DEFINITION
  // ==========================

  function ScrollSpy(element, options) {
    this.$body          = $(document.body)
    this.$scrollElement = $(element).is(document.body) ? $(window) : $(element)
    this.options        = $.extend({}, ScrollSpy.DEFAULTS, options)
    this.selector       = (this.options.target || '') + ' .nav li > a'
    this.offsets        = []
    this.targets        = []
    this.activeTarget   = null
    this.scrollHeight   = 0

    this.$scrollElement.on('scroll.bs.scrollspy', $.proxy(this.process, this))
    this.refresh()
    this.process()
  }

  ScrollSpy.VERSION  = '3.3.7'

  ScrollSpy.DEFAULTS = {
    offset: 10
  }

  ScrollSpy.prototype.getScrollHeight = function () {
    return this.$scrollElement[0].scrollHeight || Math.max(this.$body[0].scrollHeight, document.documentElement.scrollHeight)
  }

  ScrollSpy.prototype.refresh = function () {
    var that          = this
    var offsetMethod  = 'offset'
    var offsetBase    = 0

    this.offsets      = []
    this.targets      = []
    this.scrollHeight = this.getScrollHeight()

    if (!$.isWindow(this.$scrollElement[0])) {
      offsetMethod = 'position'
      offsetBase   = this.$scrollElement.scrollTop()
    }

    this.$body
      .find(this.selector)
      .map(function () {
        var $el   = $(this)
        var href  = $el.data('target') || $el.attr('href')
        var $href = /^#./.test(href) && $(href)

        return ($href
          && $href.length
          && $href.is(':visible')
          && [[$href[offsetMethod]().top + offsetBase, href]]) || null
      })
      .sort(function (a, b) { return a[0] - b[0] })
      .each(function () {
        that.offsets.push(this[0])
        that.targets.push(this[1])
      })
  }

  ScrollSpy.prototype.process = function () {
    var scrollTop    = this.$scrollElement.scrollTop() + this.options.offset
    var scrollHeight = this.getScrollHeight()
    var maxScroll    = this.options.offset + scrollHeight - this.$scrollElement.height()
    var offsets      = this.offsets
    var targets      = this.targets
    var activeTarget = this.activeTarget
    var i

    if (this.scrollHeight != scrollHeight) {
      this.refresh()
    }

    if (scrollTop >= maxScroll) {
      return activeTarget != (i = targets[targets.length - 1]) && this.activate(i)
    }

    if (activeTarget && scrollTop < offsets[0]) {
      this.activeTarget = null
      return this.clear()
    }

    for (i = offsets.length; i--;) {
      activeTarget != targets[i]
        && scrollTop >= offsets[i]
        && (offsets[i + 1] === undefined || scrollTop < offsets[i + 1])
        && this.activate(targets[i])
    }
  }

  ScrollSpy.prototype.activate = function (target) {
    this.activeTarget = target

    this.clear()

    var selector = this.selector +
      '[data-target="' + target + '"],' +
      this.selector + '[href="' + target + '"]'

    var active = $(selector)
      .parents('li')
      .addClass('active')

    if (active.parent('.dropdown-menu').length) {
      active = active
        .closest('li.dropdown')
        .addClass('active')
    }

    active.trigger('activate.bs.scrollspy')
  }

  ScrollSpy.prototype.clear = function () {
    $(this.selector)
      .parentsUntil(this.options.target, '.active')
      .removeClass('active')
  }


  // SCROLLSPY PLUGIN DEFINITION
  // ===========================

  function Plugin(option) {
    return this.each(function () {
      var $this   = $(this)
      var data    = $this.data('bs.scrollspy')
      var options = typeof option == 'object' && option

      if (!data) $this.data('bs.scrollspy', (data = new ScrollSpy(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  var old = $.fn.scrollspy

  $.fn.scrollspy             = Plugin
  $.fn.scrollspy.Constructor = ScrollSpy


  // SCROLLSPY NO CONFLICT
  // =====================

  $.fn.scrollspy.noConflict = function () {
    $.fn.scrollspy = old
    return this
  }


  // SCROLLSPY DATA-API
  // ==================

  $(window).on('load.bs.scrollspy.data-api', function () {
    $('[data-spy="scroll"]').each(function () {
      var $spy = $(this)
      Plugin.call($spy, $spy.data())
    })
  })

}(jQuery);

/* ========================================================================
 * Bootstrap: tab.js v3.3.7
 * http://getbootstrap.com/javascript/#tabs
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // TAB CLASS DEFINITION
  // ====================

  var Tab = function (element) {
    // jscs:disable requireDollarBeforejQueryAssignment
    this.element = $(element)
    // jscs:enable requireDollarBeforejQueryAssignment
  }

  Tab.VERSION = '3.3.7'

  Tab.TRANSITION_DURATION = 150

  Tab.prototype.show = function () {
    var $this    = this.element
    var $ul      = $this.closest('ul:not(.dropdown-menu)')
    var selector = $this.data('target')

    if (!selector) {
      selector = $this.attr('href')
      selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
    }

    if ($this.parent('li').hasClass('active')) return

    var $previous = $ul.find('.active:last a')
    var hideEvent = $.Event('hide.bs.tab', {
      relatedTarget: $this[0]
    })
    var showEvent = $.Event('show.bs.tab', {
      relatedTarget: $previous[0]
    })

    $previous.trigger(hideEvent)
    $this.trigger(showEvent)

    if (showEvent.isDefaultPrevented() || hideEvent.isDefaultPrevented()) return

    var $target = $(selector)

    this.activate($this.closest('li'), $ul)
    this.activate($target, $target.parent(), function () {
      $previous.trigger({
        type: 'hidden.bs.tab',
        relatedTarget: $this[0]
      })
      $this.trigger({
        type: 'shown.bs.tab',
        relatedTarget: $previous[0]
      })
    })
  }

  Tab.prototype.activate = function (element, container, callback) {
    var $active    = container.find('> .active')
    var transition = callback
      && $.support.transition
      && ($active.length && $active.hasClass('fade') || !!container.find('> .fade').length)

    function next() {
      $active
        .removeClass('active')
        .find('> .dropdown-menu > .active')
          .removeClass('active')
        .end()
        .find('[data-toggle="tab"]')
          .attr('aria-expanded', false)

      element
        .addClass('active')
        .find('[data-toggle="tab"]')
          .attr('aria-expanded', true)

      if (transition) {
        element[0].offsetWidth // reflow for transition
        element.addClass('in')
      } else {
        element.removeClass('fade')
      }

      if (element.parent('.dropdown-menu').length) {
        element
          .closest('li.dropdown')
            .addClass('active')
          .end()
          .find('[data-toggle="tab"]')
            .attr('aria-expanded', true)
      }

      callback && callback()
    }

    $active.length && transition ?
      $active
        .one('bsTransitionEnd', next)
        .emulateTransitionEnd(Tab.TRANSITION_DURATION) :
      next()

    $active.removeClass('in')
  }


  // TAB PLUGIN DEFINITION
  // =====================

  function Plugin(option) {
    return this.each(function () {
      var $this = $(this)
      var data  = $this.data('bs.tab')

      if (!data) $this.data('bs.tab', (data = new Tab(this)))
      if (typeof option == 'string') data[option]()
    })
  }

  var old = $.fn.tab

  $.fn.tab             = Plugin
  $.fn.tab.Constructor = Tab


  // TAB NO CONFLICT
  // ===============

  $.fn.tab.noConflict = function () {
    $.fn.tab = old
    return this
  }


  // TAB DATA-API
  // ============

  var clickHandler = function (e) {
    e.preventDefault()
    Plugin.call($(this), 'show')
  }

  $(document)
    .on('click.bs.tab.data-api', '[data-toggle="tab"]', clickHandler)
    .on('click.bs.tab.data-api', '[data-toggle="pill"]', clickHandler)

}(jQuery);

/* ========================================================================
 * Bootstrap: transition.js v3.3.7
 * http://getbootstrap.com/javascript/#transitions
 * ========================================================================
 * Copyright 2011-2016 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
  'use strict';

  // CSS TRANSITION SUPPORT (Shoutout: http://www.modernizr.com/)
  // ============================================================

  function transitionEnd() {
    var el = document.createElement('bootstrap')

    var transEndEventNames = {
      WebkitTransition : 'webkitTransitionEnd',
      MozTransition    : 'transitionend',
      OTransition      : 'oTransitionEnd otransitionend',
      transition       : 'transitionend'
    }

    for (var name in transEndEventNames) {
      if (el.style[name] !== undefined) {
        return { end: transEndEventNames[name] }
      }
    }

    return false // explicit for ie8 (  ._.)
  }

  // http://blog.alexmaccaw.com/css-transitions
  $.fn.emulateTransitionEnd = function (duration) {
    var called = false
    var $el = this
    $(this).one('bsTransitionEnd', function () { called = true })
    var callback = function () { if (!called) $($el).trigger($.support.transition.end) }
    setTimeout(callback, duration)
    return this
  }

  $(function () {
    $.support.transition = transitionEnd()

    if (!$.support.transition) return

    $.event.special.bsTransitionEnd = {
      bindType: $.support.transition.end,
      delegateType: $.support.transition.end,
      handle: function (e) {
        if ($(e.target).is(this)) return e.handleObj.handler.apply(this, arguments)
      }
    }
  })

}(jQuery);

/*! iCheck v1.0.1 by Damir Sultanov, http://git.io/arlzeA, MIT Licensed */
(function(f){function A(a,b,d){var c=a[0],g=/er/.test(d)?_indeterminate:/bl/.test(d)?n:k,e=d==_update?{checked:c[k],disabled:c[n],indeterminate:"true"==a.attr(_indeterminate)||"false"==a.attr(_determinate)}:c[g];if(/^(ch|di|in)/.test(d)&&!e)x(a,g);else if(/^(un|en|de)/.test(d)&&e)q(a,g);else if(d==_update)for(var f in e)e[f]?x(a,f,!0):q(a,f,!0);else if(!b||"toggle"==d){if(!b)a[_callback]("ifClicked");e?c[_type]!==r&&q(a,g):x(a,g)}}function x(a,b,d){var c=a[0],g=a.parent(),e=b==k,u=b==_indeterminate,
v=b==n,s=u?_determinate:e?y:"enabled",F=l(a,s+t(c[_type])),B=l(a,b+t(c[_type]));if(!0!==c[b]){if(!d&&b==k&&c[_type]==r&&c.name){var w=a.closest("form"),p='input[name="'+c.name+'"]',p=w.length?w.find(p):f(p);p.each(function(){this!==c&&f(this).data(m)&&q(f(this),b)})}u?(c[b]=!0,c[k]&&q(a,k,"force")):(d||(c[b]=!0),e&&c[_indeterminate]&&q(a,_indeterminate,!1));D(a,e,b,d)}c[n]&&l(a,_cursor,!0)&&g.find("."+C).css(_cursor,"default");g[_add](B||l(a,b)||"");g.attr("role")&&!u&&g.attr("aria-"+(v?n:k),"true");
g[_remove](F||l(a,s)||"")}function q(a,b,d){var c=a[0],g=a.parent(),e=b==k,f=b==_indeterminate,m=b==n,s=f?_determinate:e?y:"enabled",q=l(a,s+t(c[_type])),r=l(a,b+t(c[_type]));if(!1!==c[b]){if(f||!d||"force"==d)c[b]=!1;D(a,e,s,d)}!c[n]&&l(a,_cursor,!0)&&g.find("."+C).css(_cursor,"pointer");g[_remove](r||l(a,b)||"");g.attr("role")&&!f&&g.attr("aria-"+(m?n:k),"false");g[_add](q||l(a,s)||"")}function E(a,b){if(a.data(m)){a.parent().html(a.attr("style",a.data(m).s||""));if(b)a[_callback](b);a.off(".i").unwrap();
f(_label+'[for="'+a[0].id+'"]').add(a.closest(_label)).off(".i")}}function l(a,b,f){if(a.data(m))return a.data(m).o[b+(f?"":"Class")]}function t(a){return a.charAt(0).toUpperCase()+a.slice(1)}function D(a,b,f,c){if(!c){if(b)a[_callback]("ifToggled");a[_callback]("ifChanged")[_callback]("if"+t(f))}}var m="iCheck",C=m+"-helper",r="radio",k="checked",y="un"+k,n="disabled";_determinate="determinate";_indeterminate="in"+_determinate;_update="update";_type="type";_click="click";_touch="touchbegin.i touchend.i";
_add="addClass";_remove="removeClass";_callback="trigger";_label="label";_cursor="cursor";_mobile=/ipad|iphone|ipod|android|blackberry|windows phone|opera mini|silk/i.test(navigator.userAgent);f.fn[m]=function(a,b){var d='input[type="checkbox"], input[type="'+r+'"]',c=f(),g=function(a){a.each(function(){var a=f(this);c=a.is(d)?c.add(a):c.add(a.find(d))})};if(/^(check|uncheck|toggle|indeterminate|determinate|disable|enable|update|destroy)$/i.test(a))return a=a.toLowerCase(),g(this),c.each(function(){var c=
f(this);"destroy"==a?E(c,"ifDestroyed"):A(c,!0,a);f.isFunction(b)&&b()});if("object"!=typeof a&&a)return this;var e=f.extend({checkedClass:k,disabledClass:n,indeterminateClass:_indeterminate,labelHover:!0},a),l=e.handle,v=e.hoverClass||"hover",s=e.focusClass||"focus",t=e.activeClass||"active",B=!!e.labelHover,w=e.labelHoverClass||"hover",p=(""+e.increaseArea).replace("%","")|0;if("checkbox"==l||l==r)d='input[type="'+l+'"]';-50>p&&(p=-50);g(this);return c.each(function(){var a=f(this);E(a);var c=this,
b=c.id,g=-p+"%",d=100+2*p+"%",d={position:"absolute",top:g,left:g,display:"block",width:d,height:d,margin:0,padding:0,background:"#fff",border:0,opacity:0},g=_mobile?{position:"absolute",visibility:"hidden"}:p?d:{position:"absolute",opacity:0},l="checkbox"==c[_type]?e.checkboxClass||"icheckbox":e.radioClass||"i"+r,z=f(_label+'[for="'+b+'"]').add(a.closest(_label)),u=!!e.aria,y=m+"-"+Math.random().toString(36).substr(2,6),h='<div class="'+l+'" '+(u?'role="'+c[_type]+'" ':"");u&&z.each(function(){h+=
'aria-labelledby="';this.id?h+=this.id:(this.id=y,h+=y);h+='"'});h=a.wrap(h+"/>")[_callback]("ifCreated").parent().append(e.insert);d=f('<ins class="'+C+'"/>').css(d).appendTo(h);a.data(m,{o:e,s:a.attr("style")}).css(g);e.inheritClass&&h[_add](c.className||"");e.inheritID&&b&&h.attr("id",m+"-"+b);"static"==h.css("position")&&h.css("position","relative");A(a,!0,_update);if(z.length)z.on(_click+".i mouseover.i mouseout.i "+_touch,function(b){var d=b[_type],e=f(this);if(!c[n]){if(d==_click){if(f(b.target).is("a"))return;
A(a,!1,!0)}else B&&(/ut|nd/.test(d)?(h[_remove](v),e[_remove](w)):(h[_add](v),e[_add](w)));if(_mobile)b.stopPropagation();else return!1}});a.on(_click+".i focus.i blur.i keyup.i keydown.i keypress.i",function(b){var d=b[_type];b=b.keyCode;if(d==_click)return!1;if("keydown"==d&&32==b)return c[_type]==r&&c[k]||(c[k]?q(a,k):x(a,k)),!1;if("keyup"==d&&c[_type]==r)!c[k]&&x(a,k);else if(/us|ur/.test(d))h["blur"==d?_remove:_add](s)});d.on(_click+" mousedown mouseup mouseover mouseout "+_touch,function(b){var d=
b[_type],e=/wn|up/.test(d)?t:v;if(!c[n]){if(d==_click)A(a,!1,!0);else{if(/wn|er|in/.test(d))h[_add](e);else h[_remove](e+" "+t);if(z.length&&B&&e==v)z[/ut|nd/.test(d)?_remove:_add](w)}if(_mobile)b.stopPropagation();else return!1}})})}})(window.jQuery||window.Zepto);

(function ($) {
    var ias = $.ias({
        container: '.ias-container',
        item: '.ias-item',
        pagination: '.ias-pagination',
        next: '.ias-nav-next a'
    });

    ias.extension(new IASSpinnerExtension({
        html: '<div class="col-md-12"><div class="ias-spinner-container"><div class="ias-spinner"><img src="{src}"/></div></div></div>'
    }));

    ias.extension(new IASNoneLeftExtension({
        text: translations.noMoreResults,
        html: '<div class="col-md-12"><div class="ias-end-container"><p class="ias-end">{text}</p></div></div>'
    }));
})(jQuery);
(function ($) {
    $('.thumb-slider .slick-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        focusOnSelect: true,
        adaptiveHeight: true,
        asNavFor: '.portfolio-slider .slick-slider'
    });

    $('.portfolio-slider .slick-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '.thumb-slider .slick-slider'
    });

    var container = $('.portfolio-slider');
    var content = $('.portfolio-slider .slick-list');
    var containerHeight = container.height();
    var contentHeight = content.height();

    if (containerHeight > contentHeight) {
        content.css('margin-top', (containerHeight - contentHeight) / 2);
    }
})(jQuery);
(function ($) {
    $('document').ready(function () {
        $("[rel='tooltip']").tooltip();
    });
})(jQuery);