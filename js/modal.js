document.addEventListener("DOMContentLoaded", function () {
  window.openModal = function (id) {
    const modal = document.getElementById(id);
    if (modal) modal.style.display = "flex";
  };
  window.closeModal = function (id) {
    const modal = document.getElementById(id);
    if (modal) modal.style.display = "none";
  };
  document.querySelectorAll('[data-close]').forEach(btn => {
    btn.addEventListener('click', function () {
      const modalId = this.getAttribute('data-close');
      closeModal(modalId);
    });
  });
  window.addEventListener("click", function (event) {
    document.querySelectorAll('.modal').forEach(modal => {
      if (event.target === modal) {
        closeModal(modal.id);
      }
    });
  });

});