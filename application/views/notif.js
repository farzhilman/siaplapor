var UIAlertsApi=function(){
	var e=function(){
		$("#alert_show").click(function(){
			App.alert({
				container:$("#alert_container").val(),
				place:$("#alert_place").val(),
				type:$("#alert_type").val(),
				message:$("#alert_message").val(),
				close:$("#alert_close").is(":checked"),
				reset:$("#alert_reset").is(":checked"),
				focus:$("#alert_focus").is(":checked"),
				closeInSeconds:$("#alert_close_in_seconds").val(),
				icon:$("#alert_icon").val()
				})
			})
		},
		t=function(){
			var e=document.getElementById("code_editor_demo");CodeMirror.fromTextArea(e,{
				lineNumbers:!0,
				matchBrackets:!0,
				styleActiveLine:!0,
				mode:"javascript",
				smartIndent:!0,
				indentWithTabs:!0,
				readOnly:!0,
				inputStyle:"textarea",theme:"neo"})
		};
			return{
				init:function(){
					e(),t()
				}
			}
	}();
			jQuery(document).ready(function(){
				UIAlertsApi.init()
			});