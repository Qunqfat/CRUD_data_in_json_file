window.addEventListener("DOMContentLoaded", () => {
  const tableContainer = document.getElementById("tabel-container");
  const customDialog = document.getElementById("custom-wrapper");

  tableContainer.addEventListener("click", (event) => {
    const target = event.target;
    if (target.classList.contains("btn-remove")) {
      event.preventDefault();
      const userId = target.getAttribute("data-user-id");
      customDialog.classList.remove("d-none");

      const confirmBtn = document.getElementById("confirm-btn");
      const cancelBtn = document.getElementById("cancel-btn");

      confirmBtn.addEventListener("click", () => {
        window.location.href = `./?action=remove&id=${userId}`;
      });

      cancelBtn.addEventListener("click", () => {
        customDialog.classList.add("d-none");
      });
    }
  });

  const btnAdd = document.getElementById("btn-add");
  const formContainer = document.getElementById("form-container");

  btnAdd.addEventListener("click", () => {
    formContainer.classList.toggle("d-none");
    if (formContainer.classList.contains("d-none")) {
      btnAdd.textContent = "Dodaj wpis";
    } else {
      btnAdd.textContent = "Ukryj formularz";
    }
  });
});
