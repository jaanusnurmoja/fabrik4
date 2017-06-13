/*! Fabrik */

define(["jquery","fab/element"],function(a,b){return window.FbRating=new Class({Extends:b,initialize:function(a,b){this.field=document.id(a),this.parent(a,b),!1!==this.options.canRate&&("creator-rating"===this.options.mode&&"details"===this.options.view||(this.rating=this.options.rating,Fabrik.addEvent("fabrik.form.refresh",function(a){this.setup(a)}.bind(this)),this.setup(this.options.row_id),this.setStars()))},setup:function(a){this.options.row_id=a,this.element=document.id(this.options.element+"_div"),this.spinner=new Asset.image(Fabrik.liveSite+"media/com_fabrik/images/ajax-loader.gif",{alt:"loading",class:"ajax-loader"}),this.stars=this.element.getElements(".starRating"),this.ratingMessage=this.element.getElement(".ratingMessage"),this.stars.each(function(a){a.addEvent("mouseover",function(b){this.stars.each(function(b){this._getRating(a)>=this._getRating(b)?Fabrik.bootstrapped?b.removeClass("icon-star-empty").addClass("icon-star"):b.src=this.options.insrc:Fabrik.bootstrapped?b.addClass("icon-star-empty").removeClass("icon-star"):b.src=this.options.insrc}.bind(this)),this.ratingMessage.innerHTML=a.get("data-rating")}.bind(this))}.bind(this)),this.stars.each(function(a){a.addEvent("mouseout",function(a){this.stars.each(function(a){Fabrik.bootstrapped?a.removeClass("icon-star").addClass("icon-star-empty"):a.src=this.options.outsrc}.bind(this)),this.ratingMessage.innerHTML=this.field.value}.bind(this))}.bind(this)),this.stars.each(function(a){a.addEvent("click",function(b){this.rating=this._getRating(a),this.field.value=this.rating,this.doAjax(),this.setStars()}.bind(this))}.bind(this));var b=this.getClearButton();this.element.addEvent("mouseout",function(a){this.setStars()}.bind(this)),this.element.addEvent("mouseover",function(a){"null"!==typeOf(b)&&b.setStyles({visibility:"visible"})}.bind(this)),"null"!==typeOf(b)&&(b.addEvent("mouseover",function(a){Fabrik.bootstrapped||(a.target.src=this.options.clearinsrc),this.ratingMessage.set("html",Joomla.JText._("PLG_ELEMENT_RATING_NO_RATING"))}.bind(this)),b.addEvent("mouseout",function(a){-1!==this.rating&&(a.target.src=this.options.clearoutsrc)}.bind(this)),b.addEvent("click",function(a){this.rating=-1,this.field.value="",this.stars.each(function(a){Fabrik.bootstrapped?a.removeClass("icon-star").addClass("icon-star-empty"):a.src=this.options.outsrc}.bind(this)),Fabrik.bootstrapped||(this.getClearButton().src=this.options.clearinsrc),this.doAjax()}.bind(this))),this.setStars()},doAjax:function(){if(!1!==this.options.canRate&&!1!==this.options.doAjax&&!1===this.options.editable){this.spinner.inject(this.ratingMessage);var a={option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"rating",method:"ajax_rate",g:"element",element_id:this.options.elid,formid:this.options.formid,row_id:this.options.row_id,elementname:this.options.elid,userid:this.options.userid,rating:this.rating,listid:this.options.listid};new Request({url:"",data:a,onComplete:function(){this.spinner.dispose()}.bind(this)}).send()}},_getRating:function(a){return a.get("data-rating").toInt()},setStars:function(){if("null"!==typeOf(this.stars)){this.stars.each(function(a){var b=this._getRating(a);Fabrik.bootstrapped?b<=this.rating?a.removeClass("icon-star-empty").addClass("icon-star"):a.removeClass("icon-star").addClass("icon-star-empty"):a.src=b<=this.rating?this.options.insrc:this.options.outsrc}.bind(this));var a=this.getClearButton();"null"!==typeOf(a)&&(a.src=-1!==this.rating?this.options.clearoutsrc:this.options.clearinsrc)}},getClearButton:function(){return this.element.getElement("i[data-rating=-1]")},update:function(a){this.rating=a.toInt().round(),this.field.value=this.rating;var b=this.element.getElement(".ratingScore");"null"!==typeOf(b)&&b.set("text",a),this.setStars()},cloned:function(a){this.element.getParent(".fabrikElementContainer").getElement(".fabrikSubElementContainer").id=this.options.element+"_div",this.field=document.id(this.options.element),this.setup(),this.parent()},reset:function(){this.resetEvents(),this.update(this.options.defaultVal)}}),window.FbRating});