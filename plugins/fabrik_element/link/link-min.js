var FbLink=new Class({Extends:FbElementList,initialize:function(b,a){this.plugin="fabrikLink";this.parent(b,a);this.subElements=this._getSubElements()},update:function(b){this.getElement();var a=this.element.getElements(".fabrikinput");if(typeOf(b)==="object"){a[0].value=b.label;a[1].value=b.link}else{a.each(function(c){c.value=b})}},getValue:function(){var c=this._getSubElements();var b=[];c.each(function(a){b.push(a.get("value"))});return b}});