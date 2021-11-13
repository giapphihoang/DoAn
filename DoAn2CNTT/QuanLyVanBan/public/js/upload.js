$('#formUpload .fileupload').on('change', function() {    
	$file = $('#formUpload .fileupload').val();
	if ($file != ''){
		$('#formUpload').ajaxSubmit({ 
			beforeSubmit: function() {
				target:   '#formUpload .output',	            
				$('#formUpload .output').hide();	            
				$("#formUpload .progress").show();	            
				$("#formUpload .progress-bar").width('0');
			},	        
			uploadProgress: function(event, position, total, percentComplete){ 

				$("#formUpload .progress-bar").css('width', percentComplete + '%');	            
				$("#formUpload .progress-bar").html(percentComplete + '%');
			},	        
			success: function() {
			},
			error : function() {	        	
				$('#formUpload .output').show();
			}
		}); 
		return false; 
	}
});
