/*! Fabrik */
var FrontPackage=new Class({Extends:Canvas,initialize:function(i){i.editabe=!1,this.parent(i),this.setup(),Fabrik.addEvent("fabrik.list.add",function(i){this.loadForm(i)}.bind(this))},loadForm:function(i,a){Fabrik.loader.start();var t=this.pages,t=t.pages[t.activePage];this.insertPage(t,"forms_"+i.options.formid,"","forms",{width:100,height:100})},insertPage:function(i,a,t,e,s,n){var o;switch(n="function"!==typeOf(n)?Function.from():n,0===s.width&&(s.width=50),0===s.height&&(s.height=50),a=a.replace(e+"_",""),o="id",e){case"list":o="listid";break;case"form":o="formid";break;case"vizualizations":e="visualization"}s=new Element("div",{id:a,class:"itemPlaceHolder"}).setStyles(s);s.inject(i.page),(data={option:"com_fabrik",view:e,tmpl:"component",packageId:this.options.packageId,ajax:1,ajaxlinks:1})[o]=a,new Request.HTML({url:"index.php",data:data,method:"post",update:s,onSuccess:n}).send()}});