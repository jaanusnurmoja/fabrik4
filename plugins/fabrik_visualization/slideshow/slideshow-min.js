var FbSlideshowViz=new Class({Implements:[Options],options:{},initialize:function(b,a){this.setOptions(a);head.ready(function(){var c={controller:true,delay:parseInt(this.options.slideshow_delay,10),duration:parseInt(this.options.slideshow_duration,10),height:parseInt(this.options.slideshow_height,10),width:parseInt(this.options.slideshow_width,10),hu:this.options.liveSite,thumbnails:this.options.slideshow_thumbnails,captions:this.options.slideshow_captions};switch(this.options.slideshow_type){case 1:c=Object.append(c,{fast:true});this.slideshow=new Slideshow(this.options.html_id,this.options.slideshow_data,c);break;case 2:c=Object.append(c,{zoom:parseInt(this.options.slideshow_zoom,10),pan:parseInt(this.options.slideshow_pan,10)});this.slideshow=new Slideshow.KenBurns(this.options.html_id,this.options.slideshow_data,c);break;case 3:this.slideshow=new Slideshow.Push(this.options.html_id,this.options.slideshow_data,c);break;case 4:this.slideshow=new Slideshow.Fold(this.options.html_id,this.options.slideshow_data,c);break}}.bind(this))}});