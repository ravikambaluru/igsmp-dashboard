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
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.2/main.min.js"></script>


  <script>
$(".toggleStatus").on("change", () => {

    let controller = $(".toggleStatus").attr("data-controller");
    let id = $(".toggleStatus").attr("data-id");
    let value = $(".toggleStatus").val();
    let link = location.origin + '/igsmp/status/' + controller + "/" + id + "/" + value;
    location.href = link;

});


let closeBtn = document.querySelector(".btnClose");
closeBtn.addEventListener("click", () => window.location.reload());
  </script>

  <script>
let confirmBtn = document.querySelector(".confirmDelete");

confirmBtn.addEventListener("click", (ev) => {

    let btn = document.getElementById("deleteBtn");
    let deleteId = btn.getAttribute("data-id");
    let controller = btn.getAttribute("data-controller");

    let endPoint = window.location.origin + "/igsmp/delete";

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
        url: location.origin + '/igsmp/upload',
        method: "post",
        uploadMultiple: false,
        maxFileSize: 1000000,
        acceptedFiles: "image/*",

        renameFile: function(File) {
            console.log(File);
            let name = File.name.split(".");
            let hiddenEl = document.getElementById(el.getAttribute(
                "data-hidden-element"));
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
    let keyTopicsChoices = [];


    editEl.addEventListener("click", (event) => {
        modal.toggle();
        $.ajax({
            url: window.origin + "/igsmp/fetchSingle",
            method: "post",
            data: {
                controller,
                id
            },
            success: function(res) {

                let data = JSON.parse(res);
                modal.show();

                for (let k of Object.keys(data)) {
                    let nodeList = document.getElementsByName(k);

                    //  schedules time control logics

                    if (k == "schedules") {
                        data.schedules = JSON.parse(data.schedules);
                        for (let sched of Object.keys(data.schedules)) {
                            let times = sched.split(" ");
                            let d = data.schedules[sched];

                            let control = addSchedules(times[0], times[1], d);
                            $("#dynamicControls").append(control);
                        }

                        $("#schedule-block").remove();
                    }

                    if (nodeList.length > 0) {

                        if (k == "description") {

                            snowEditor.setText(data[k]);

                        }

                        if (k == "thumbnail_image") {
                            $("#thumbnail-preview").attr("src", window.location.origin +
                                '/igsmp/' +
                                data[
                                    k]);
                        }
                        if (k == "banner_image") {
                            $("#banner-preview").attr('src', window.location.origin +
                                '/igsmp/' +
                                data[k]);
                        }
                        if (k == "id") {
                            $(".id").show();
                            $(".id").val(data[k]);
                        }
                        if (k == "keytopics") {
                            keyTopicsChoices = data[k].split(",");

                        } else {
                            nodeList[0].value = data[k];
                        }
                    }
                }
                choices.setValue(keyTopicsChoices);
                document.querySelector(`#${formID}`).setAttribute("action",
                    ` ${window.location.origin}/igsmp/update `);
                document.querySelector(".submit-form").innerHTML = "Update";




            },
            error: function(err) {
                console.error(err);
            }
        })
    });
});
  </script>

  <style>
.loader {
    height: 100vh;
    width: 100vw;
    background-color: #fff;
    opacity: 1;
    position: fixed;
    display: flex;
    align-items: center;
    justify-content: center;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 10001;
}
  </style>
  <div class="loader d-none">
      <lord-icon class="loader-animation text-white" src="https://cdn.lordicon.com/kvsszuvz.json" trigger="loop"
          style="width:250px;height:250px">
      </lord-icon>
  </div>

  <!-- close Hanlder functionality -->



  <!-- loader functionality starts  -->

  <script>
// list of events for which loader to triggered
let events = ["beforeunload"];

events.map(event => {
    window.addEventListener(event, () => {
        let loader = document.querySelector(".loader");
        loader.classList.toggle("d-none");
    })
})
  </script>



  <!-- calendar & schedule logics -->

  <script>
let addSlotHandler = () => {
    let el = addSchedules("", "", "");
    $("#dynamicControls").append(el);
};

function addSchedules(start, end, desc) {
    let string = `                <div class="row mb-3" id="schedule-block">
                    <label for="" class="form-label">Time Schedules</label>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Start Time</label>
                            <div class="input-group ">
                                <input type="datetime-local" name="startTime[]" class="form-control "
                                    placeholder="Select start time" value=${start}>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">End Time</label>
                            <div class="input-group ">
                                <input type="datetime-local" name="endTime[]" class="form-control "
                                    placeholder="Select end time" value=${end}>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-between align-items-center">
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input class="form-control" type="text" name="schedDesc[]" id="" value=${desc}>
                        </div>
                    <i class=" ri-add-circle-line ml-3" style="font-size: 25px;" onclick="addSlotHandler()"></i>
                    <i class="ri-delete-bin-3-fill" style="font-size:25px;" onclick="removeSlotHandler(event)"></i>

                    </div>
                    
                </div>
`;

    return string;
}

// =================== remove slot functionality logics ==================//
let removeSlotHandler = (e) => e.path[2].remove();
  </script>


  <!-- loader functionality starts  -->
  </body>



  </html>