var FabrikModalRepeat=new Class({initialize:function(a,c,b){this.names=c;this.field=b;this.content=false;this.setup=false;this.elid=a;if(!this.ready()){this.timer=this.testReady.periodical(500,this)}else{this.setUp()}},ready:function(){return typeOf(document.id(this.elid))==="null"?false:true},testReady:function(){if(!this.ready()){return}if(this.timer){clearInterval(this.timer)}this.setUp()},setUp:function(){this.button=document.id(this.elid+"_button");this.el=document.id(this.elid).getElement("table");this.field=document.id(this.field);this.button.addEvent("click",function(a){if(!this.setup){SqueezeBox.open(this.el,{handler:"adopt",onClose:function(d){this.onClose(d)}.bind(this),onOpen:function(){this.content=this.el;this.build();this.watchButtons();this.setup=true}.bind(this)})}else{var b=this.content;SqueezeBox.open(null,{handler:"string",content:b,onClose:function(d){this.onClose(d)}.bind(this),onOpen:function(){this.content=b;this.watchButtons();this.resizeModal()}.bind(this)})}}.bind(this))},_getRadioValues:function(){var a=[];this.getTrs().each(function(c){var b=(sel=c.getElement("input[type=radio]:checked"))?sel.get("value"):b="";a.push(b)});return a},_setRadioValues:function(a){this.getTrs().each(function(c,b){if(r=c.getElement("input[type=radio][value="+a[b]+"]")){r.checked="checked"}})},watchButtons:function(){this.content.addEvent("click:relay(a.add)",function(b){if(tr=this.findTr(b)){var a=this._getRadioValues();tr.clone().inject(tr,"after");this.stripe();this._setRadioValues(a);this.resizeModal()}}.bind(this));this.content.addEvent("click:relay(a.remove)",function(a){if(tr=this.findTr(a)){tr.dispose();this.resizeModal()}}.bind(this))},getTrs:function(){return this.content.getElement("tbody").getElements("tr")},resizeModal:function(){var a=this.content.getSize();a.x=a.x+20;if(a.y+50>document.window.getSize().y){a.y=document.window.getSize().y-50}SqueezeBox.resize(a,true,false)},stripe:function(){trs=this.getTrs();for(var a=0;a<trs.length;a++){trs[a].removeClass("row1").removeClass("row0");trs[a].addClass("row"+a%2);var b=trs[a].getElements("input[type=radio]");b.each(function(c){c.name=c.name.replace(/\[([0-9])\]/,"["+a+"]")})}},build:function(){if(this.setup){return}var c=JSON.decode(this.field.get("value"));if(typeOf(c)==="null"){c={}}var g=this.content.getElement("tbody").getElement("tr");var e=Object.keys(c);var f=e.length===0?1:c[e[0]].length;for(var d=1;d<f;d++){g.clone().inject(g,"after")}this.stripe();var b=this.getTrs();for(d=0;d<f;d++){e.each(function(a){b[d].getElements("*[name*="+a+"]").each(function(h){if(h.get("type")==="radio"){if(h.value===c[a][d]){h.checked=true}}else{h.value=c[a][d]}})})}this.resizeModal()},findTr:function(b){var a=b.target.getParents().filter(function(c){return c.get("tag")==="tr"});return(a.length===0)?false:a[0]},onClose:function(f){this.content=f.getElement("table").clone();var d={};for(var b=0;b<this.names.length;b++){var e=this.names[b];var a=this.content.getElements("*[name*="+e+"]");d[e]=[];a.each(function(c){if(c.get("type")==="radio"){if(c.get("checked")===true){d[e].push(c.get("value"))}}else{d[e].push(c.get("value"))}}.bind(this))}this.field.value=JSON.encode(d);return true}});