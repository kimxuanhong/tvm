	$(function() {
		CKEDITOR.replace('editor1')
		$('.textarea').wysihtml5
	})
	$('#file-5').fileinput({
		theme: 'fa',
		language: 'vi',
		showUpload: false,
		allowedFileExtensions: ['jpg', 'png', 'gif']
	})
