/*! Fabrik */
define(["jquery","fab/element"],function(t,i){return window.FbRating=new Class({Extends:i,initialize:function(t,i){this.field=document.id(t),this.parent(t,i),!1===this.options.canRate||"creator-rating"===this.options.mode&&"details"===this.options.view||(this.rating=this.options.rating,Fabrik.addEvent("fabrik.form.refresh",function(t){this.setup(t)}.bind(this)),this.setup(this.options.row_id),this.setStars())},setup:function(t){this.options.row_id=t,this.element=document.id(this.options.element+"_div"),this.spinner=new Asset.image(Fabrik.liveSite+"media/com_fabrik/images/ajax-loader.gif",{alt:"loading",class:"ajax-loader"}),this.stars=this.element.getElements(".starRating"),this.ratingMessage=this.element.getElement(".ratingMessage"),this.stars.each(function(i){i.addEvent("mouseover",function(t){this.stars.each(function(t){this._getRating(i)>=this._getRating(t)?Fabrik.bootstrapped?t.removeClass(this.options.starIconEmpty).addClass(this.options.starIcon):t.src=this.options.insrc:Fabrik.bootstrapped?t.addClass(this.options.starIconEmpty).removeClass(this.options.starIcon):t.src=this.options.insrc}.bind(this)),this.ratingMessage.innerHTML=i.get("data-rating")}.bind(this))}.bind(this)),this.stars.each(function(t){t.addEvent("mouseout",function(t){this.stars.each(function(t){Fabrik.bootstrapped?t.removeClass(this.options.starIcon).addClass(this.options.starIconEmpty):t.src=this.options.outsrc}.bind(this)),this.ratingMessage.innerHTML="&nbsp;"}.bind(this))}.bind(this)),this.stars.each(function(i){i.addEvent("click",function(t){this.rating=this._getRating(i),this.field.value=this.rating,this.doAjax()}.bind(this))}.bind(this));var i=this.getClearButton();this.element.addEvent("mouseout",function(t){this.setStars()}.bind(this)),this.element.addEvent("mouseover",function(t){"null"!==typeOf(i)&&i.setStyles({visibility:"visible"})}.bind(this)),"null"!==typeOf(i)&&(i.addEvent("mouseover",function(t){Fabrik.bootstrapped||(t.target.src=this.options.clearinsrc),this.stars.each(function(t){t.removeClass(this.options.starIcon).addClass(this.options.starIconEmpty)}.bind(this)),this.ratingMessage.set("html",Joomla.JText._("PLG_ELEMENT_RATING_NO_RATING"))}.bind(this)),i.addEvent("mouseout",function(t){Fabrik.bootstrapped||-1===this.rating||(t.target.src=this.options.clearoutsrc),this.ratingMessage.innerHTML="&nbsp;"}.bind(this)),i.addEvent("click",function(t){this.rating=-1,this.field.value="",this.stars.each(function(t){Fabrik.bootstrapped?t.removeClass(this.options.starIcon).addClass(this.options.starIconEmpty):t.src=this.options.outsrc}.bind(this)),Fabrik.bootstrapped||(this.getClearButton().src=this.options.clearinsrc),this.doAjax()}.bind(this))),this.setStars()},doAjax:function(){var t;!1!==this.options.canRate&&!1!==this.options.doAjax&&(this.spinner.inject(this.ratingMessage),t={option:"com_fabrik",format:"raw",task:"plugin.pluginAjax",plugin:"rating",method:"ajax_rate",g:"element",element_id:this.options.elid,formid:this.options.formid,row_id:this.options.row_id,elementname:this.options.elid,userid:this.options.userid,rating:this.rating,listid:this.options.listid},new Request({url:"",data:t,onComplete:function(t){this.spinner.dispose(),this.update(t)}.bind(this)}).send())},_getRating:function(t){return t.get("data-rating").toInt()},setStars:function(){var t;"null"===typeOf(this.stars)||(this.stars.each(function(t){var i=this._getRating(t);Fabrik.bootstrapped?i<=this.rating?t.removeClass(this.options.starIconEmpty).addClass(this.options.starIcon):t.removeClass(this.options.starIconEmpty).addClass(this.options.starIconEmpty):t.src=i<=this.rating?this.options.insrc:this.options.outsrc}.bind(this)),Fabrik.bootstrapped)||"null"===typeOf(t)||((t=this.getClearButton()).src=-1!==this.rating?this.options.clearoutsrc:this.options.clearinsrc)},getClearButton:function(){return this.element.getElement("span[data-rating=-1]")},update:function(t){this.rating=Math.round(parseFloat(t)),this.field.value=this.rating;var i=this.element.getParent(".fabrikElementContainer").getElement(".ratingScore");"null"!==typeOf(i)&&i.set("text",t),this.setStars()},cloned:function(t){this.element.getParent(".fabrikElementContainer").getElement(".fabrikSubElementContainer").id=this.options.element+"_div",this.field=document.id(this.options.element),this.setup(),this.parent()},reset:function(){this.resetEvents(),this.update(this.options.defaultVal)}}),window.FbRating});