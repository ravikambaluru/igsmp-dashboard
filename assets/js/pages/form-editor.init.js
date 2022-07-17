var ckClassicEditor = document.querySelectorAll(".ckeditor-classic");
ckClassicEditor && Array.from(ckClassicEditor).forEach(function () {
	ClassicEditor.create(document.querySelector(".ckeditor-classic")).then(function (e) {
		e.ui.view.editable.element.style.height = "200px";
	}).catch(function (e) {
		console.error(e)
	})
});




var snowEditor = document.querySelectorAll(".snow-editor");
snowEditor && Array.from(snowEditor).forEach(function (e) {
	var o = {};
	1 == e.classList.contains("snow-editor") && (o.theme = "snow", o.modules = {
		toolbar: [
			[{
				font: []
			}, {
				size: []
			}],
			["bold", "italic", "underline", "strike"],
			[{
				color: []
			}, {
				background: []
			}],
			[{
				script: "super"
			}, {
				script: "sub"
			}],
			[{
				header: [!1, 1, 2, 3, 4, 5, 6]
			}, "blockquote", "code-block"],
			[{
				list: "ordered"
			}, {
				list: "bullet"
			}, {
				indent: "-1"
			}, {
				indent: "+1"
			}],
			["direction", {
				align: []
			}],
			["link", "image", "video"],
			["clean"]
		]
	}), new Quill(e, o)
});
var bubbleEditor = document.querySelectorAll(".bubble-editor");
bubbleEditor && Array.from(bubbleEditor).forEach(function (e) {
	var o = {};
	1 == e.classList.contains("bubble-editor") && (o.theme = "bubble"), new Quill(e, o)
});

let snowEl = document.querySelector(".snow-editor");
snowEl.addEventListener("focusout", () => {
	document.querySelector(".editor").value = document.querySelector(".ql-editor p").innerHTML;
})
