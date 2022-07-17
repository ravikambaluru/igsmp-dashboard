var previewTemplate, dropzone, dropzonePreviewNode = document.querySelector("#dropzone-preview-list");
let dz = new Dropzone(".dropzone", {
	url: location.origin + '/igsmp/upload',
	method: "post",
	uploadMultiple: false,
	maxFileSize: 1000000,
	acceptedFiles: "image/*",

	renameFile: function (file) {
		file.upload.name = Date.now() + file.type;
	},
	previewTemplate: previewTemplate,
	previewsContainer: "#dropzone-preview"
});
FilePond.registerPlugin(FilePondPluginFileEncode, FilePondPluginFileValidateSize, FilePondPluginImageExifOrientation, FilePondPluginImagePreview);
var inputMultipleElements = document.querySelectorAll("input.filepond-input-multiple");
inputMultipleElements && (Array.from(inputMultipleElements).forEach(function (e) {
	FilePond.create(e)
}), FilePond.create(document.querySelector(".filepond-input-circle"), {
	labelIdle: 'Drag & Drop your picture or <span class="filepond--label-action">Browse</span>',
	imagePreviewHeight: 170,
	imageCropAspectRatio: "1:1",
	imageResizeTargetWidth: 200,
	imageResizeTargetHeight: 200,
	stylePanelLayout: "compact circle",
	styleLoadIndicatorPosition: "center bottom",
	styleProgressIndicatorPosition: "right bottom",
	styleButtonRemoveItemPosition: "left bottom",
	styleButtonProcessItemPosition: "right bottom"
}));
