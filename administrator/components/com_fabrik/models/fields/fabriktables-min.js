var fabriktablesElement=new Class({Implements:[Options,Events],options:{conn:null,connInRepeat:true,container:""},initialize:function(b,a){this.el=b;this.setOptions(a);this.elements=[];this.elementLists=$H({});this.waitingElements=$H({});if(typeOf($(this.options.conn))==="null"){this.periodical=this.getCnn.periodical(500,this)}else{this.setUp()}},getCnn:function(){if(typeOf($(this.options.conn))==="null"){return}this.setUp();clearInterval(this.periodical)},registerElement:function(a){this.elements.push(a);this.updateElements()},setUp:function(){this.el=$(this.el);if(typeOf($(this.options.conn))==="null"){return}$(this.options.conn).addEvent("change",this.updateMe.bindWithEvent(this));this.el.addEvent("change",this.updateElements.bindWithEvent(this));var a=$(this.options.conn).get("value");if(a!==""&&a!==-1){this.updateMe()}},updateMe:function(c){if(c){c.stop()}var d=$(this.options.conn).get("value");if(!d){return}if($(this.el.id+"_loader")){$(this.el.id+"_loader").setStyle("display","inline")}var a="index.php?option=com_fabrik&format=raw&task=plugin.pluginAjax&g=element&plugin=field&method=ajax_tables&showf=1&cid="+d;var b=new Request({url:a,method:"get",onComplete:function(f){var e=JSON.decode(f);if(typeOf(e)!=="null"){if(e.err){alert(e.err)}else{this.el.empty();e.each(function(g){var h={value:g.id};if(g.id===this.options.value){h.selected="selected"}new Element("option",h).appendText(g.label).inject(this.el)}.bind(this));if($(this.el.id+"_loader")){$(this.el.id+"_loader").setStyle("display","none")}this.updateElements()}}}.bind(this)}).send()},updateElements:function(){this.elements.each(function(d){var f=d.getOpts();var e=this.el.get("value");if(e===""){return}if($(d.el.id+"_loader")){$(d.el.id+"_loader").setStyle("display","")}var c=f.getValues().toString()+","+e;if(!this.waitingElements.has(c)){this.waitingElements[c]=$H({})}if(this.elementLists[c]!==undefined){if(this.elementLists[c]===""){this.waitingElements[c][d.el.id]=d}else{this.updateElementOptions(this.elementLists[c],d)}}else{var h=$(this.options.conn).get("value");this.elementLists.set(c,"");var b=this.options.livesite+"index.php?option=com_fabrik&format=raw&view=plugin&task=pluginAjax&g=visualization&plugin=chart&method=ajax_fields&k=2&t="+e+"&cid="+h;var a={};f.each(function(j,i){a[i]=j});var g=new Request({url:b,method:"get",data:a,onComplete:function(i){this.elementLists.set(c,i);this.updateElementOptions(i,d);this.waitingElements.get(c).each(function(k,j){this.updateElementOptions(i,k);this.waitingElements[c].erase(j)}.bind(this))}.bind(this)}).send()}}.bind(this))},updateElementOptions:function(r,element){var table=$(this.el).get("value");var key=element.getOpts().getValues().toString()+","+table;var opts=eval(r);element.el.empty();var o={value:""};if(element.options.value===""){o.selected="selected"}new Element("option",o).appendText("-").inject(element.el);opts.each(function(opt){opt.value=opt.value.replace("[]","");var o={value:opt.value};if(opt.value===element.options.value){o.selected="selected"}new Element("option",o).appendText(opt.label).inject(element.el)}.bind(this));if($(element.el.id+"_loader")){$(element.el.id+"_loader").hide()}},cloned:function(b,a){if(this.options.connInRepeat===true){var c=this.options.conn.split("-");c.pop();this.options.conn=c.join("-")+"-"+a}this.el=b;this.elements=[];this.elementLists=$H({});this.waitingElements=$H({});this.setUp();Fabrik.model.fields.fabriktable[this.el.id]=this}});