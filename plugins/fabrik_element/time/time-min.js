/*! Fabrik */
define(["jquery","fab/element"],function(t,e){return window.FbTime=new Class({Extends:e,initialize:function(t,e){this.setPlugin("time"),this.parent(t,e)},getValue:function(){var e=[];return this.options.editable?(this.getElement(),this._getSubElements().each(function(t){e.push(t.get("value"))}),e):this.options.value},update:function(i){"string"===typeOf(i)&&(i=i.split(this.options.separator)),this._getSubElements().each(function(t,e){t.value=i[e]})}}),window.FbTime});