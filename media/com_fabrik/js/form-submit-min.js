/*! fabrik */
var FbFormSubmit=new Class({elements:$H({}),running:!1,results:{},addElement:function(a,b){this.elements[a]=b},enabled:function(){return this.running},submit:function(a){this.running=!0,this.elements.each(function(a,b){this.results[b]=null,a.onsubmit(function(a){this.results[b]=a}.bind(this))}.bind(this)),this.checker=this.check.periodical(500,this,[a])},check:function(a){var b=Object.values(this.results),c=b.every(function(a){return a===!0});c&&(clearInterval(this.checker),this.running=!1,a()),b.contains(!1)&&(this.running=!1,clearInterval(this.checker))}});