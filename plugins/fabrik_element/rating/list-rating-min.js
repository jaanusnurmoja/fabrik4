var FbRatingList=new Class({options:{userid:0,mode:""},Implements:[Events,Options],initialize:function(b,a){a.element=b;this.setOptions(a);if(this.options.mode==="creator-rating"){return}this.col=$$(".fabrik_row___"+b);this.origRating={};this.col.each(function(d){var c=d.getElements(".starRating");c.each(function(e){e.addEvent("mouseover",function(f){this.origRating[d.id]=e.findClassUp("fabrik_element").getElement(".ratingMessage").innerHTML.toInt();c.each(function(g){if(this._getRating(e)>=this._getRating(g)){g.src=this.options.insrc}else{g.src=this.options.outsrc}}.bind(this));e.findClassUp("fabrik_element").getElement(".ratingMessage").innerHTML=e.alt}.bind(this));e.addEvent("mouseout",function(f){c.each(function(g){if(this.origRating[d.id]>=this._getRating(g)){g.src=this.options.insrc}else{g.src=this.options.outsrc}}.bind(this));e.findClassUp("fabrik_element").getElement(".ratingMessage").innerHTML=this.origRating[d.id]}.bind(this))}.bind(this));c.each(function(e){e.addEvent("click",this.doAjax.bindWithEvent(this,[e]))}.bind(this))}.bind(this))},_getRating:function(a){r=a.className.replace("rate_","").replace("starRating ","");return r.toInt()},doAjax:function(f,d){f.stop();this.rating=this._getRating(d);var h=d.findClassUp("fabrik_element").getElement(".ratingMessage");Fabrik.loader.start(h);var g=$(d).findClassUp("fabrik_row");var b=g.id.replace("list_"+this.options.listid+"_row_","");var c={row_id:b,elementname:this.options.elid,userid:this.options.userid,rating:this.rating,mode:this.options.mode};var a=Fabrik.liveSite+"/index.php?option=com_fabrik&format=raw&view=plugin&task=pluginAjax&g=element&plugin=rating&method=ajax_rate&element_id="+this.options.elid;new Request({url:a,data:c,onComplete:function(e){e=e.toInt();this.rating=e;h.set("html",this.rating);Fabrik.loader.stop(h);d.findClassUp("fabrik_element").getElements("img").each(function(k,j){k.src(j<e)?this.options.insrc:this.options.outsrc}.bind(this))}.bind(this)}).send()}});