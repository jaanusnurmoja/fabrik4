/*! Fabrik */
define(["jquery","fab/element"],function(a,b){return window.FbBirthday=new Class({Extends:b,initialize:function(a,b){this.setPlugin("birthday"),this.default_sepchar="-",this.parent(a,b)},getFocusEvent:function(){return"click"},getValue:function(){var b=[];return this.options.editable?(this.getElement(),this._getSubElements().each(function(c){b.push(a(c).val())}),b):this.options.value},update:function(a){var b;"string"==typeof a&&(b=this.options.separator,-1===a.indexOf(b)&&(b=this.default_sepchar),a=a.split(b)),this._getSubElements().each(function(b,c){b.value=a[c]})}}),window.FbBirthday});