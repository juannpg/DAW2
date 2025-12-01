import Swal from "sweetalert2";

const deleteButtons = document.querySelectorAll(".btn-delete");

deleteButtons.forEach((button) => {
  const id = button.id;

  button.addEventListener("click", () => {
    Swal.fire({
      title: "Seguro?",
      text: "No podrás revertir esto!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Sí, eliminarlo!",
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          title: "Eliminado con id " + id,
          text: "Tu archivo ha sido eliminado.",
          icon: "success",
        });
      }
    });
  });
});
