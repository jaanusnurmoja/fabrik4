/*! Fabrik */
var FbButton=new Class({Extends:FbElement,initialize:function(a,b){this.plugin="fabrikButton",this.parent(a,b)},addNewEventAux:function(action,js){this.element.addEvent(action,function(e){e&&e.stop(),"function"===typeOf(js)?js.delay(0,this,this):eval(js)}.bind(this))}});