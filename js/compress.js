let loadImage = document.querySelector("#load-image");
let getFileInput = document.querySelector("#fileToUpload");

getFileInput.addEventListener("change", function () {
  imagePreview();
});

function imagePreview() {
  const files = getFileInput.files[0];
  if (files) {
    const reader = new FileReader();
    reader.readAsDataURL(files);
    reader.addEventListener("load", function () {
      loadImage.style.display = "flex";
      loadImage.innerHTML =
        '<div class="imgBox"><img src="' +
        this.result +
        '" /><div class="upload">Uploading...</div></div>';
    });
  }
}

// UPLOADING FILE ANIMATION
const submit = document.querySelector("#submit-compress");
submit.addEventListener("click", function () {
  const uploading = document.querySelector(".upload");
  uploading.classList.add("ing");
  console.log("success");
});
