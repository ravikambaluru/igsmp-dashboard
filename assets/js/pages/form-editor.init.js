var ckClassicEditor = document.querySelectorAll(".ckeditor-classic");
ckClassicEditor && Array.from(ckClassicEditor).forEach(function () {
	ClassicEditor.create(document.querySelector(".ckeditor-classic")).then(function (e) {
		e.ui.view.editable.element.style.height = "200px";
	}).catch(function (e) {
		console.error(e)
	})
});





var snowEditor = new Quill(".snow-editor", {
	"theme": "snow"
})

var bubbleEditor = document.querySelectorAll(".bubble-editor");
bubbleEditor && Array.from(bubbleEditor).forEach(function (e) {
	var o = {};
	1 == e.classList.contains("bubble-editor") && (o.theme = "bubble"), new Quill(e, o)
});

let snowEl = document.querySelector(".snow-editor");
snowEl.addEventListener("focusout", () => {
	document.querySelector(".editor").value = document.querySelector(".ql-editor").innerHTML;
})
