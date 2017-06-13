/*! Fabrik */

define(["jquery","fab/element"],function(a,b){return window.FbTimer=new Class({options:{defaultVal:"",editable:!1,startCrono:"15:00",endCrono:"00:00",div:!1,stopOnComplete:!0,onComplete:function(){},onEveryMinute:function(){},onEveryHour:function(){}},Extends:b,initialize:function(a,b){this.setPlugin("fabriktimer"),this.parent(a,b);var c=document.id(this.options.element+"_button");this.seg=0,this.min=0,this.hour=0,!0===this.options.autostart?("null"!==typeOf(c)&&c.getElement("span").set("text",Joomla.JText._("PLG_ELEMENT_TIMER_STOP")),this.start()):this.state="paused",this.incremental=1,"null"!==typeOf(c)&&c.addEvent("click",function(a){if(a.stop(),"started"===this.state)this.pause(),c.getElement("span").set("text",Joomla.JText._("PLG_ELEMENT_TIMER_START"));else{var b=this.element.value.split(":");switch(b.length){case 3:this.hour=""===b[0]?0:b[0].toInt(),this.min=""===b[1]?0:b[1].toInt(),this.seg=""===b[2]?0:b[2].toInt();break;case 2:this.min=""===b[0]?0:b[0].toInt(),this.seg=""===b[1]?0:b[1].toInt();break;case 1:this.seg=""===b[0]?0:b[0].toInt()}this.start(),c.getElement("span").set("text",Joomla.JText._("PLG_ELEMENT_TIMER_STOP"))}}.bind(this))},start:function(){"started"!==this.state&&(this.timer=this.count.periodical(1e3,this),this.state="started")},pause:function(){"paused"!==this.state&&(clearInterval(this.timer),this.state="paused")},count:function(){this.seg+=this.incremental,-1!==this.seg&&60!==this.seg||(this.seg=this.incremental>0?0:59,this.min+=this.incremental,-1!==this.min&&60!==this.min||(this.min=this.incremental>0?0:59,this.hour+=this.incremental)),this.element.value=this.time(),this.min===this.endMin&&this.seg===this.endSeg&&(this.fireEvent("onComplete",""),this.options.stopOnComplete&&this.pause())},time:function(){var a=this.hour<10?"0"+this.hour:this.hour;return a+=(this.min<10?":0":":")+this.min,a+=(this.seg<10?":0":":")+this.seg},reset:function(){var a=this.options.startCrono.split(":"),b=this.options.endCrono.split(":");this.startMin=a[0].toInt(),this.startSeg=a[1].toInt(),this.endMin=b[0].toInt(),this.endSeg=b[1].toInt(),this.endMin!==this.startMin?this.incremental=this.endMin>this.startMin?1:-1:this.incremental=this.endSeg>this.startSeg?1:-1,this.min=this.startMin,this.seg=this.startSeg,!1!==this.options.div&&document.id(this.options.div).set("text",this.time())}}),window.FbTimer});