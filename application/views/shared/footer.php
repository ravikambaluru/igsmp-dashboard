  <?php if ($controller != "login") { ?>
  </div>
  </div>
  </div>
  <footer class="footer">
      <div class="container-fluid">
          <div class="row">
              <div class="col-sm-12">
                  <script>
                  document.write(new Date().getFullYear())
                  </script> © IGSMP International
              </div>
          </div>
      </div>
  </footer>

  </div>
  <?php } ?>
  <div id="deleteModals" data-bs-backdrop="static" class="modal fade bs-example-modal-center" tabindex="-1"
      role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-body text-center p-5">

                  <lord-icon class="animateDelete" src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                      style="width:250px;height:250px">
                  </lord-icon>
                  <div class="mt-4">
                      <h4 class="mb-3 deleteStatement">Are you sure you want to delete??</h4>

                      <div class="hstack gap-2 justify-content-center ctaDeleteSection">
                          <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
                          <btn class="btn btn-danger confirmDelete">Yes</btn>
                      </div>
                  </div>
              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <!--datatable js-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?= base_url('assets/js/pages/datatables.init.js') ?>"></script>

  <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/plugins.js') ?>"></script>
  <script src="<?= base_url('assets/libs/quill/quill.min.js') ?>"></script>
  <!-- App js -->
  <script src="<?= base_url('assets/js/pages/form-editor.init.js') ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
  <!-- <script src="<?= base_url('assets/js/app.js') ?>"></script> -->
  <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>


  <!-- close Hanlder functionality -->



  <script>
$(".toggleStatus").on("change", () => {

    let controller = $(".toggleStatus").attr("data-controller");
    let id = $(".toggleStatus").attr("data-id");
    let value = $(".toggleStatus").val();
    let link = location.origin + '/igsmp/status/' + controller + "/" + id + "/" + value;
    location.href = link;

});


let closeBtn = document.querySelector(".btnClose");
closeBtn.addEventListener("click", () => {
    let formId = closeBtn.getAttribute("data-form-ref");
    let formRef = document.querySelector(`#${formId}`);
    console.log(formRef);
    debugger;
    formRef.reset();
});
  </script>

  <script>
let confirmBtn = document.querySelector(".confirmDelete");

confirmBtn.addEventListener("click", (ev) => {

    let btn = document.getElementById("deleteBtn");
    let deleteId = btn.getAttribute("data-id");
    let controller = btn.getAttribute("data-controller");

    let endPoint = window.location.origin + "/delete";

    let deleteAnimate = document.querySelector(".animateDelete");
    let deleteStatement = document.querySelector(".deleteStatement");
    let ctaDeleteSection = document.querySelector(".ctaDeleteSection");

    $.ajax({
        url: endPoint,
        method: "post",
        data: {
            controller,
            deleteId

        },
        beforeSend: function(xhr) {
            deleteAnimate.setAttribute("src", "https://cdn.lordicon.com/kvsszuvz.json");
            ctaDeleteSection.style.display = "none";
            deleteStatement.innerHTML = "";

        },
        success: function(res) {
            deleteAnimate.setAttribute("src", "https://cdn.lordicon.com/lupuorrc.json");
            deleteStatement.innerHTML = "Sucessfully Deleted";

            setTimeout(() => {
                location.reload()
            }, 500);
        },
        error: function(err) {
            alert("something went wrong");
            console.log(err);
        }
    });
});
  </script>

  <script>
var choices;
window.addEventListener("DOMContentLoaded", () => {
    let element = document.querySelector(".choices");
    if (element) {
        choices = new Choices(element, {
            removeItemButton: true,
            duplicateItemsAllowed: false,
            editItems: true
        });
    } else {
        // alert("choices id not found");
    }

})
  </script>

  <script>
$(".dropzone").each((i, el) => {
    let dz = new Dropzone(el, {
        url: location.origin + '/upload',
        method: "post",
        uploadMultiple: false,
        maxFileSize: 1000000,
        acceptedFiles: "image/*",

        renameFile: function(File) {
            console.log(File);
            let name = File.name.split(".");
            let hiddenEl = document.getElementById(el.getAttribute("data-hidden-element"));
            hiddenEl.setAttribute("value", "uploads/" + Date.now() + "." + name[1]);
            return Date.now() + "." + name[1];
        },

    });

    dz.on("complete", (file) => {
        let dzEl = document.querySelector(".dropzone");

    })
});
  </script>


  <script>
$(document).ready(function() {


    let editEl = document.querySelector(".global-edit");
    let controller = editEl.getAttribute("data-controller");
    let id = editEl.getAttribute("data-id");
    let modalRef = editEl.getAttribute("data-bs-target");

    let modal = new bootstrap.Modal(modalRef);
    let formID = editEl.getAttribute("data-formID");



    editEl.addEventListener("click", (event) => {
        modal.toggle();
        $.ajax({
            url: window.origin + "/fetchSingle",
            method: "post",
            data: {
                controller,
                id
            },
            success: function(res) {

                let data = JSON.parse(res);
                modal.show();
                console.log(typeof data, data.title);
                for (let k of Object.keys(data)) {
                    let nodeList = document.getElementsByName(k);

                    if (nodeList.length > 0) {

                        if (k == "description") {

                            snowEditor.setText(data[k]);

                        }
                        if (k == "id") {
                            $(".id").show();
                            $(".id").val(data[k]);
                        }
                        if (k == "keytopics") {
                            choices.setValue([data[k]]);
                        } else {
                            nodeList[0].value = data[k];
                        }
                    }
                }


                document.querySelector(`#${formID}`).setAttribute("action",
                    ` ${window.location.origin}/update `);
                document.querySelector(".submit-form").innerHTML = "Update";




            },
            error: function(err) {
                console.error(err);
            }
        })
    });
});
  </script>


  </body>



  </html>