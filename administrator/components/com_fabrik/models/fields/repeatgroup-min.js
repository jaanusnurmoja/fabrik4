var FbRepeatGroup=new Class({Implements:[Options,Events],options:{repeatmin:1},initialize:function(b,a){this.element=$(b);this.setOptions(a);this.counter=this.element.getElements("ul").length-1;this.watchAdd();this.watchDelete()},watchAdd:function(){var a;this.element.getElement("a.addButton").addEvent("click",function(b){b.stop();var g=this.element.getElements("div.repeatGroup").getLast();newc=this.counter+1;var f=g.id.replace("-"+this.counter,"-"+newc);var d=new Element("div",{"class":"repeatGroup",id:f}).set("html",g.innerHTML);d.injectAfter(g);this.counter=newc;if(this.counter!==0){d.getElements("input, select").each(function(h){var k=false;var e="";var j=h.id;if(h.id!==""){var c=h.id.split("-");c.pop();e=c.join("-")+"-"+this.counter;h.id=e}this.increaseName(h);$H(Fabrik.model.fields).each(function(i,l){var o=false;if(typeOf(Fabrik.model.fields[l][j])!=="null"){var n=Fabrik.model.fields[l][j];o=Object.clone(n);try{o.cloned(e,this.counter)}catch(m){fconsole("no clone method available for "+h.id)}}if(o!==false){Fabrik.model.fields[l][h.id]=o}}.bind(this))}.bind(this));d.getElements("img[src=components/com_fabrik/images/ajax-loader.gif]").each(function(h){var e=h.id.split("-");e.pop();var c=e.join("-")+"-"+this.counter+"_loader";h.id=c}.bind(this))}this.watchDelete()}.bind(this))},getCounter:function(){return this.element.getElements("ul").length},watchDelete:function(){this.element.getElements("a.removeButton").removeEvents();this.element.getElements("a.removeButton").each(function(b,a){b.addEvent("click",function(f){f.stop();var d=this.getCounter();if(d>this.options.repeatmin){var c=f.target.findClassUp("repeatGroup");c.destroy()}this.rename(a)}.bind(this))}.bind(this))},increaseName:function(b){var a=b.name.split("][");var c=a[2].replace("]","").toInt()+1;a.splice(2,1,c);b.name=a.join("][")+"]"},rename:function(a){this.element.getElements("input, select").each(function(b){b.name=this._decreaseName(b.name,a)}.bind(this))},_decreaseName:function(e,d){var a=e.split("][");var b=a[2].replace("]","").toInt();if(b>=1&&b>d){b--}if(a.length===3){b=b+"]"}a.splice(2,1,b);var c=a.join("][");return c}});