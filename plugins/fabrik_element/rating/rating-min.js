var FbRating=new Class({Extends:FbElement,initialize:function(b,a,c){this.field=$(b);this.parent(b,a);if(this.options.canRate===false){return}if(this.options.mode==="creator-rating"&&this.options.view==="details"){return}this.rating=c;Fabrik.addEvent("fabrik.form.refresh",this.setup.bindAsEventListener(this));this.setup(this.options.row_id);this.setStars()},setup:function(a){this.options.row_id=a;this.element=document.id(this.options.element+"_div");this.spinner=new Asset.image(Fabrik.liveSite+"media/com_fabrik/images/ajax-loader.gif",{alt:"loading","class":"ajax-loader"});this.stars=this.element.getElements(".starRating");this.ratingMessage=this.element.getElement(".ratingMessage");this.stars.each(function(c){c.addEvent("mouseover",function(d){this.stars.each(function(e){if(this._getRating(c)>=this._getRating(e)){e.src=this.options.insrc}}.bind(this));this.ratingMessage.innerHTML=c.alt}.bind(this))}.bind(this));this.stars.each(function(c){c.addEvent("mouseout",function(d){this.stars.each(function(e){e.src=this.options.outsrc}.bind(this))}.bind(this))}.bind(this));this.stars.each(function(c){c.addEvent("click",function(d){this.rating=this._getRating(c);this.field.value=this.rating;this.doAjax();this.setStars()}.bind(this))}.bind(this));var b=this.element.getElement(".rate_-1");this.element.addEvent("mouseout",function(c){this.setStars()}.bind(this));this.element.addEvent("mouseover",function(c){if(typeOf(b)!=="null"){b.setStyles({visibility:"visible"})}}.bind(this));if(typeOf(b)!=="null"){b.addEvent("mouseover",function(c){c.target.src=this.options.clearinsrc;this.ratingMessage.set("html",Joomla.JText._("PLG_ELEMENT_RATING_NO_RATING"))}.bind(this));b.addEvent("mouseout",function(c){if(this.rating!==-1){c.target.src=this.options.clearoutsrc}}.bind(this));b.addEvent("click",function(c){this.rating=-1;this.field.value="";this.stars.each(function(d){d.src=this.options.outsrc}.bind(this));this.element.getElement(".rate_-1").src=this.options.clearinsrc;this.doAjax()}.bind(this))}this.setStars()},doAjax:function(){if(this.options.canRate===false){return}if(this.options.editable===false){this.spinner.inject(this.ratingMessage);var a={option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"rating",method:"ajax_rate",g:"element",element_id:this.options.elid,row_id:this.options.row_id,elementname:this.options.elid,userid:this.options.userid,rating:this.rating};var b=new Request({url:"",data:a,onComplete:function(){this.spinner.dispose()}.bind(this)}).send()}},_getRating:function(a){r=a.className.replace("rate_","").replace("starRating ","");return r.toInt()},setStars:function(){this.stars.each(function(b){var c=this._getRating(b);b.src=c<=this.rating?this.options.insrc:this.options.outsrc}.bind(this));var a=this.element.getElement(".rate_-1");if(typeOf(a)!=="null"){a.src=this.rating!==-1?this.options.clearoutsrc:this.options.clearinsrc}},update:function(a){this.rating=a.toInt().round();this.field.value=this.rating;this.element.getElement(".ratingScore").setText(a);this.setStars()}});