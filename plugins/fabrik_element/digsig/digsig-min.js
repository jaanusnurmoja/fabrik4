/*! Fabrik */
define(["jquery","fab/element"],function(a,b){return window.FbDigsig=new Class({Extends:b,initialize:function(b,c){if(this.setPlugin("digsig"),this.parent(b,c),"undefined"!=typeof a&&a.noConflict(),this.options.editable===!0){if("null"===typeOf(this.element))return void fconsole("no element found for digsig");var d={defaultAction:"drawIt",lineTop:"100",output:"#"+this.options.sig_id,canvas:"#"+this.element.id+"_oc_pad",drawOnly:!0};a("#"+this.element.id).signaturePad(d).regenerate(this.options.value)}else a("#"+this.options.sig_id).signaturePad({displayOnly:!0}).regenerate(this.options.value)},getValue:function(){return this.options.value},addNewEvent:function(a,b){return"load"===a?(this.loadEvents.push(b),void this.runLoadEvent(b)):void("change"===a&&(this.changejs=b))}}),window.FbDigsig});