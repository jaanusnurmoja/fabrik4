/*! Fabrik */

define(["jquery"],function(a){return new Class({queue:{},initialize:function(){this.periodical=this.processQueue.periodical(500,this)},add:function(a){var b=a.options.url+Object.toQueryString(a.options.data)+Math.random();this.queue[b]||(this.queue[b]=a)},processQueue:function(){if(0!==Object.keys(this.queue).length){var a=!1;$H(this.queue).each(function(b,c){b.isSuccess()?(delete this.queue[c],a=!1):500===b.status&&(console.log("Fabrik Request Queue: 500 "+b.xhr.statusText),delete this.queue[c],a=!1)}.bind(this)),$H(this.queue).each(function(b,c){b.isRunning()||b.isSuccess()||a||(b.send(),a=!0)})}},empty:function(){return 0===Object.keys(this.queue).length}})});