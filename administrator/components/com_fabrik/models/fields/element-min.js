var elementElement=new Class({Implements:[Options,Events],options:{plugin:"chart",excludejoined:0,value:"",highlightpk:0},initialize:function(b,a){this.el=b;this.setOptions(a);if(!this.ready()){this.cnnperiodical=this.getCnn.periodical(500,this)}else{this.setUp()}},ready:function(){if(typeOf(document.id(this.options.conn))==="null"){return false}if(typeOf(FabrikAdmin.model.fields.fabriktable)==="undefined"){return false}if(Object.getLength(FabrikAdmin.model.fields.fabriktable)===0){return false}if(Object.keys(FabrikAdmin.model.fields.fabriktable).indexOf(this.options.table)===-1){return false}return true},getCnn:function(){if(!this.ready()){return}this.setUp();clearInterval(this.cnnperiodical)},setUp:function(){var a=this.el;this.el=document.id(this.el);if(typeOf(this.el)==="null"){fconsole("element didnt find me, ",a)}FabrikAdmin.model.fields.fabriktable[this.options.table].registerElement(this)},getOpts:function(){return $H({calcs:this.options.include_calculations,showintable:this.options.showintable,published:this.options.published,excludejoined:this.options.excludejoined,highlightpk:this.options.highlightpk})},cloned:function(b,a){this.el=b;var c=this.options.table.split("-");c.pop();this.options.table=c.join("-")+"-"+a;this.setUp()}});