var FbRating=new Class({Extends:FbElement,initialize:function(b,a,c){this.field=$(b);this.parent(b,a);if(this.options.mode==="creator-rating"&&this.options.view==="details"){return}this.element=$(b+"_div");this.rating=c;this.spinner=new Asset.image(Fabrik.liveSite+"media/com_fabrik/images/ajax-loader.gif",{alt:"loading","class":"ajax-loader"});this.stars=this.element.getElements(".starRating");this.ratingMessage=this.element.getElement(".ratingMessage");this.stars.each(function(d){d.addEvent("mouseover",function(f){this.stars.each(function(e){if(this._getRating(d)>=this._getRating(e)){e.src=this.options.insrc}}.bind(this));this.ratingMessage.innerHTML=d.alt}.bind(this))}.bind(this));this.stars.each(function(d){d.addEvent("mouseout",function(f){this.stars.each(function(e){e.src=this.options.outsrc}.bind(this))}.bind(this))}.bind(this));this.stars.each(function(d){d.addEvent("click",function(f){this.rating=this._getRating(d);this.field.value=this.rating;this.doAjax();this.setStars()}.bind(this))}.bind(this));this.element.addEvent("mouseout",function(d){this.setStars()}.bind(this));this.element.addEvent("mouseover",function(d){this.element.getElement(".rate_-1").setStyles({visibility:"visible"})}.bind(this));this.element.getElement(".rate_-1").addEvent("mouseover",function(d){d=new Event(d);d.target.src=this.options.clearinsrc;this.ratingMessage.innerHTML=Joomla.JText._("PLG_ELEMENT_RATING_NO_RATING")}.bind(this));this.element.getElement(".rate_-1").addEvent("mouseout",function(d){d=new Event(d);if(this.rating!==-1){d.target.src=this.options.clearoutsrc}}.bind(this));this.element.getElement(".rate_-1").addEvent("click",function(d){this.rating=-1;this.field.value="";this.stars.each(function(e){e.src=this.options.outsrc}.bind(this));d=new Event(d);this.element.getElement(".rate_-1").src=this.options.clearinsrc;this.doAjax()}.bind(this));this.setStars()},doAjax:function(){if(this.options.editable===false){this.spinner.inject(this.ratingMessage);var b={row_id:this.options.row_id,elementname:this.options.elid,userid:this.options.userid,rating:this.rating};var a=Fabrik.liveSite+"index.php?option=com_fabrik&format=raw&view=plugin&task=pluginAjax&g=element&plugin=rating&method=ajax_rate&element_id="+this.options.elid;var c=new Request({url:a,data:b,onComplete:function(){this.spinner.dispose()}.bind(this)}).send()}},_getRating:function(a){r=a.className.replace("rate_","").replace("starRating ","");return r.toInt()},setStars:function(){this.stars.each(function(a){var b=this._getRating(a);if(b<=this.rating){a.src=this.options.insrc}else{a.src=this.options.outsrc}}.bind(this));if(this.rating!==-1){this.element.getElement(".rate_-1").src=this.options.clearoutsrc}else{this.element.getElement(".rate_-1").src=this.options.clearinsrc}},update:function(a){this.rating=a;this.setStars()}});