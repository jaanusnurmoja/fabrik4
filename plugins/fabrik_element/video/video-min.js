var FbVideo=new Class({Extends:FbElement,initialize:function(b,a){this.plugin="fabrikvideo";this.parent(b,a);this.insertMovie()},play:function(){if(this.getVideoObj()){this.video.Play()}},stop:function(){if(this.getVideoObj()){this.video.Stop()}},rewind:function(){if(this.getVideoObj()){this.video.Rewind()}},step:function(a){if(this.getVideoObj()){this.video.Step(a)}return null},getTime:function(){if(this.getVideoObj()){return this.video.GetTime()}return null},setTime:function(a){if(this.getVideoObj()){this.video.SetTime(a)}return null},getTimeScale:function(){if(this.getVideoObj()){return this.video.GetTimeScale()}return null},update:function(b){if(!this.options.editable){this.element.set("html",b);return}if(this.options.file!==""){var d=$(this.options.element+"_placeholder");d.empty()}if(b!==""){b=this.options.livesite+b;var a=/\\/gi;b=b.replace(a,"/")}this.options.file=b;this.insertMovie()},getVideoObj:function(){this.video=$(this.options.element+"_placeholder").getElementsByTagName("embed")[0];return this.video},insertMovie:function(){var b=$(this.options.element+"_placeholder");var a=this.options.element+"_object";if(this.options.file!==""){str='<OBJECT CLASSID="clsid:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B"';str+=' CODEBASE="http://www.apple.com/qtactivex/qtplugin.cab"';str+=" HEIGHT="+this.options.height;str+=" WIDTH="+this.options.width;str+=' ID = "'+a+'"';str+=" >";str+='<PARAM NAME="src" VALUE="'+this.options.file+'" >';str+="<EMBED";str+=' NAME = "'+a+'"';str+=' SRC="'+this.options.file+'"';str+=" HEIGHT="+this.options.height+" WIDTH="+this.options.width;str+=' AUTOPLAY = "'+this.options.autoplay+'"';str+=' CONTROLLER = "'+this.options.controller+'"';str+=' LOOP = "'+this.options.loop+'"';str+=' ENABLEJAVASCRIPT = "'+this.options.ENABLEJAVASCRIPT+'"';str+=' PLAYEVERYFRAME = "'+this.options.PLAYEVERYFRAME+'"';str+=' LOOP = "'+this.options.loop+'"';str+=' TYPE="video/quicktime"';str+=' PLUGINSPAGE="http://www.apple.com/quicktime/download/"';str+="/>";str+="</OBJECT>";b.set("html",str)}}});