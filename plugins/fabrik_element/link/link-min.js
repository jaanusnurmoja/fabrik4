/*! fabrik */
FbLink=new Class({Extends:FbElementList,initialize:function(a,b){this.plugin="fabrikLink",this.parent(a,b),this.subElements=this._getSubElements()},update:function(a){this.getElement();var b=this.element.getElements(".fabrikinput");"object"===typeOf(a)?(b[0].value=a.label,b[1].value=a.link):b.each(function(b){b.value=a})},getValue:function(){var a=this._getSubElements(),b=[];return a.each(function(a){b.push(a.get("value"))}),b}});