<!DOCTYPE>
	<html>
		<head>
			<title>Text fit.</title>
		</head>
		<body>
			<div id='_main' style='width:400px; height: 300px; background: #B7B0B0'>
				<div id='_txt_wp' style='width:300px; height: 200px; background: #F7CACA'>
					Integer iaculis nisi enim, sit amet placerat enim sodales vel. In facilisis nisi a lacus volutpat molestie. Ut in efficitur lectus. Nunc lacinia urna quis sollicitudin volutpat. Curabitur vel eleifend nibh, sed elementum purus. Fusce ligula enim, mollis sit amet enim sed, ultrices convallis eros. Proin velit erat, rhoncus non pellentesque eget, malesuada vel enim. Cras nisl mi, ullamcorper non pretium id, suscipit ac urna. Etiam placerat vehicula lorem, eget consequat turpis feugiat id. In sit amet porttitor mauris. Aenean molestie non nisl vel pharetra. Sed euismod ut nisi non varius. Vivamus volutpat enim mauris, a tincidunt sapien pulvinar sed.
				</div>
			</div>
			
		</body>
		<script>				
			//_get_H returns 0 if the size can not be found / calculated
			HTMLElement.prototype._get_H=function(){
				var _height=this.offsetHeight
				//search  in the style if the div is not visible or not in the DOM.
				if(_height==0)_height=_px2number(this.style.height)
				if(!isNaN(_height))return _height
				return 0
			}
			HTMLElement.prototype._get_W=function(){
				var _width=this.offsetWidth
				//search  in the style if the div is not visible or not in the DOM.
				if(_width==0)_width=_px2number(this.style.width)
				if(!isNaN(_width))return _width
				return 0
			}			
			
			HTMLElement.prototype._textfit=function(_max_width,_max_height){
				//save actual CSS
				var bkp_css=this.style.cssText
				this.style.width=_max_width+'px'
				this.style.height='auto'
				this.style.position='absolute'
				this.style.visibility='hidden'				
				this.style.overflowY='auto'
				var _fontsize='1px';
				for (var f=1;f<400;f++){
					this.style.fontSize=f+'px'
					if(this._get_H()<=_max_height && this._get_W()<=_max_width){
						_fontsize=this.style.fontSize}else break;
				}
				this.style.cssText=bkp_css
				this.style.fontSize=_fontsize
			}
			
			var _txt_wp=document.getElementById('_txt_wp')			
			var _txt_wp_width=parseInt(_txt_wp.style.width)
			var _txt_wp_height=parseInt(_txt_wp.style.height)
			_txt_wp._textfit(_txt_wp_width,_txt_wp_height)			
		</script>
	</html>
