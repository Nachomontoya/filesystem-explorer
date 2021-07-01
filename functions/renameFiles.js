const openR = document.getElementById("renameFileButton");
const modalContainerR = document.getElementById("modal-container-2");
const closeR = document.getElementById("closeModal-2");
const modalR = document.getElementById("renameFileModal");
const oldName = document.getElementById("oldNames");
const oldNameValue = document.getElementById("renameFileButton").value;

openR.addEventListener("click", () => {
  modalContainerR.classList.remove("show");
  modalR.classList.remove("show");
  oldName.value = oldNameValue;
});

closeR.addEventListener("click", () => {
  modalContainerR.classList.add("show");
  modalR.classList.add("show");
});
