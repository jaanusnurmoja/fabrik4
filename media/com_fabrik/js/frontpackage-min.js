var FrontPackage=new Class({Extends:Canvas,initialize:function(a){a.editabe=false;this.parent(a);this.setup();Fabrik.addEvent("fabrik.list.add",this.loadForm.bindWithEvent(this))},loadForm:function(d,f){Fabrik.loader.start();var a=this.pages;var c=a.pages[a.activePage];var b={width:100,height:100};this.insertPage(c,"forms_"+d.options.formid,"","forms",b)},insertPage:function(h,e,k,j,d,g){var l;g=typeOf(g)!=="function"?Function.from():g;if(d.width===0){d.width=50}if(d.height===0){d.height=50}e=e.replace(j+"_","");l="id";switch(j){case"list":l="listid";break;case"form":l="formid";break;case"vizualizations":j="visualization";break}var f="{fabrik view="+j+" id="+e+"}";var i=new Element("div",{id:e,"class":"itemPlaceHolder"}).setStyles(d);i.inject(h.page);data={option:"com_fabrik",view:j,tmpl:"component",packageId:this.options.packageId,ajax:1,ajaxlinks:1};data[l]=e;var b="index.php";var a=new Request.HTML({url:b,data:data,method:"post",update:i,onSuccess:g}).send()}});
